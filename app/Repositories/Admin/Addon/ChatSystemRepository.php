<?php

namespace App\Repositories\Admin\Addon;

use App\Models\ChatRoom;
use App\Models\Message;
use App\Models\User;

class ChatSystemRepository
{
    public function messageUser($user,$data=[]): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return ChatRoom::with('user','receiver','lastMessage')->whereHas('lastMessage')->where(function ($query) use($user) {
            $query->where('user_id',$user->id)->orWhere('receiver_id',$user->id);
        })->when(arrayCheck('search',$data),function ($query) use($data) {
            $query->whereHas('user',function ($q) use($data) {
                $q->where('user_type','customer')->where(function ($q) use($data) {
                    $q->where('first_name','like','%'.$data['search'].'%')->orWhere('email','like','%'.$data['search'].'%')->orWhere('last_name','like','%'.$data['search'].'%');
                });
            })->orWhereHas('receiver',function ($q) use($data) {
                $q->where('user_type','customer')->where(function ($q) use($data) {
                    $q->where('first_name','like','%'.$data['search'].'%')->orWhere('email','like','%'.$data['search'].'%')->orWhere('last_name','like','%'.$data['search'].'%');
                });
            });
        })->latest()->paginate(10);
    }



    public function messageUserWithApi($authUserId, $filters = [])
    {
        $perPage = $filters['per_page'] ?? 15;

        return ChatRoom::with(['user', 'receiver', 'lastMessage'])
            ->where(function ($q) use ($authUserId) {
                $q->where('user_id', $authUserId)
                  ->orWhere('receiver_id', $authUserId);
            })
            ->accepted()
            ->orderByDesc(
                \DB::raw('(SELECT created_at FROM messages WHERE messages.chat_room_id = chat_rooms.id ORDER BY id DESC LIMIT 1)')
            )
            ->paginate($perPage);
    }




    public function firstChatroom($user)
    {
        return ChatRoom::with('user','receiver','lastMessage')->whereHas('lastMessage')->where(function ($query) use($user) {
            $query->where('user_id',$user->id)->orWhere('receiver_id',$user->id);
        })->latest()->first();
    }

    public function userMessages($chat_room): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $chat_room->messages()->update(['is_seen' => 1]);

        return Message::with('chatRoom')->where('chat_room_id',$chat_room->id)->latest()->paginate(9);
    }

    public function findChatRoom($data)
    {
        return ChatRoom::where(function ($q) use ($data){
            $q->where(function ($query) use ($data){
                $query->where('user_id',$data['user_id'])->where('receiver_id',$data['receiver_id']);
            })->orWhere(function ($query) use ($data){
                $query->where('user_id',$data['receiver_id'])->where('receiver_id',$data['user_id']);
            });
        })->latest()->first();
    }

    public function sendMessage($data)
    {
        return Message::create($data);
    }

    public function createChatroom($data)
    {
        return ChatRoom::create($data);
    }

    public function find($id)
    {
        return ChatRoom::find($id);
    }

    public function chatSellers($data): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return User::with('sellerProfile','chatRoom.lastMessage')->where('user_type','seller')->where('status',1)->where('is_user_banned',0)
            ->where('user_type','seller')->whereHas('sellerProfile',function ($q){
                $q->where('verified_at','!=',null);
            })->when(arrayCheck('search',$data),function ($query) use($data) {
                $query->where('user_type','customer')->where(function ($q) use($data) {
                        $q->where('first_name','like','%'.$data['search'].'%')->orWhere('email','like','%'.$data['search'].'%')->orWhere('last_name','like','%'.$data['search'].'%');
                    });
            })->when(arrayCheck('seller_name',$data),function ($query) use($data) {
                $query->where('user_type','seller')->whereHas('sellerProfile',function ($q) use($data) {
                        $q->where('shop_name','like','%'.$data['seller_name'].'%');
                    });
            })->paginate(25);
    }
}
