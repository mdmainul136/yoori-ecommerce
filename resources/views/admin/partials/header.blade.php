<!-- hide "visit store" button from movile view -->
<style>
    @media (max-width: 767px) {
        .icon-visible {
            display: none !important;
        }
    }
</style>
<!-- hide "visit store" button from movile view -->

<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline {{ $locale_language->text_direction == 'rtl' ? 'ml-auto' : 'mr-auto' }}">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="bx bx-menu"></i></a>
            </li>
        </ul>
    </form>

    <ul class="navbar-nav navbar-right">
        <!-- <li>
            <a href="#" class="nav-link nav-link-lg icon"><i class='bx bx-dots-vertical-rounded'></i></a>
        </li> -->
        <li>
            <a href="{{ route('cache.clear') }}" class="btn btn-outline-danger btn-cache icon border-0" data-toggle="tooltip" data-original-title="{{ __('Clear Cache') }}">
                <!-- {{ __('Clear Cache') }} -->
                  

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="512" height="512"><g id="_01_align_center" data-name="01 align center"><path d="M18.965,8.464l5.029-5.029L22.565,2.006,17.519,7.051,15.313,4.895a2.011,2.011,0,0,0-2.724-.073A19.71,19.71,0,0,1,6.226,8.687L-.006,10.514v.756A12.892,12.892,0,0,0,13.006,24.006h1.241l.261-.182a14.98,14.98,0,0,0,6.886-12.081,2.013,2.013,0,0,0-.611-1.5ZM13.9,6.34l5.477,5.341a12.652,12.652,0,0,1-.456,3.015L11.941,7.9A24.691,24.691,0,0,0,13.9,6.34Zm-.294,15.645h-.6a11.153,11.153,0,0,1-4.293-.859,11.55,11.55,0,0,0,4.348-3.8l.518-.76L11.91,15.43l-.518.761A9.539,9.539,0,0,1,7.8,19.324l-1.229.618a10.9,10.9,0,0,1-2.585-2.563,11.632,11.632,0,0,0,4.357-2.657L6.932,13.277a9.611,9.611,0,0,1-3.974,2.317,10.4,10.4,0,0,1-.921-3.575l4.755-1.394a15.234,15.234,0,0,0,3.423-1.59l7.911,7.7A14.1,14.1,0,0,1,13.608,21.985Z"/></g></svg>

            </a>
        </li>
        @if (addon_is_activated('pos_system') && authUser()->user_type != 'seller')
            <li>
                <a href="{{ route('admin.pos.system') }}" target="_blank" class="nav-link nav-link-lg icon"
                    data-toggle="tooltip" data-original-title="{{ __('POS') }}"><i class="bx bx-printer"></i></a>
            </li>
        @endif
        @if (addon_is_activated('pos_system') &&
                settingHelper('is_pos_activated_for_seller') &&
                authUser()->user_type == 'seller')
            <li>
                <a href="{{ route('seller.pos.system') }}" target="_blank" class="nav-link nav-link-lg icon"
                    data-toggle="tooltip" data-original-title="{{ __('POS') }}"><i class="bx bx-printer"></i></a>
            </li>
        @endif
        @if (!config('app.mobile_mode') || is_dir('resources/views/frontend'))
            <li class="icon-visible">
                <a href="{{ Sentinel::getUser()->user_type == 'seller' ? url('/') . '/shop/' . Sentinel::getUser()->sellerProfile->slug : url('/') }}"
                    target="_blank" class="nav-link nav-link-lg icon" data-toggle="tooltip"
                    data-original-title="{{ __('Visit Store') }}"><i class="bx bx-globe"></i></a>
            </li>
        @endif

        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg icon {{ $notificationCount > 0 ? 'beep' : '' }} "><i
                    class="bx bx-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">{{ __('Notifications') }}
                    <div class="float-right">
                        <a href="{{ route('mark.notification.seen') }}">{{ __('Mark All As Read') }}</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    @php
                        $user_type = authUser()->user_type != 'customer' ? authUser()->user_type : '';
                    @endphp
                    @foreach ($notifications as $notification)
                        <a href="{{ $notification->url != '' || $notification->url != null ? url($user_type . '/' . $notification->url) : 'javascript:void(0)' }}"
                            class="dropdown-item dropdown-item-unread notification-status"
                            data-notification="{{ json_encode($notification) }}">
                            <div
                                class="dropdown-item-icon {{ $notification->status == 'seen' ? 'bg-info' : 'bg-primary' }} text-white">
                                @if ($notification->status == 'seen')
                                    <i class="bx bx-check"></i>
                                @else
                                    <i class="bx bx-x"></i>
                                @endif
                            </div>
                            <div class="dropdown-item-desc">
                                {{ $notification->title }}
                                <div class="time {{ $notification->status == 'seen' ? '' : 'text-primary' }}">
                                    {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</div>
                            </div>
                        </a>
                        <input type="hidden" id="path" value="{{ request()->path() }}" />
                    @endforeach
                </div>
                <div class="dropdown-footer text-center">
                    <a href="{{ route('notification.all') }}">{{ __('View All') }} <i
                            class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        @if (!addon_is_activated('ishopet') || (addon_is_activated('ishopet') && authUser()->user_type != 'seller'))
            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-flag">
                    {{--                $curr = authId() == 1 ? settingHelper('default_currency') : authUser()->currency_id; --}}

                    @php
                        $curr_id = 1;
                        $curr_name = 'US Dollar';
                        $curr_code = 'USD';
                        $curr_symbol = '$';
                        $currencies = App\Utility\AppSettingUtility::currencies()->where('status', 1);
                        $curr = settingHelper('default_currency');
                        $curr = $currencies->where('id', $curr)->first();
                        if ($curr) {
                            $curr_id = $curr->id;
                            $curr_name = $curr->name;
                            $curr_code = $curr->code;
                            $curr_symbol = $curr->symbol;
                        }
                    @endphp
                    <div class="d-sm-none d-lg-inline-block">{{ $curr_name }}</div>
                    <div class="d-inline-block">({{ $curr_symbol }})</div>
                </a>
                <input type="hidden" value="{{ $curr_code }}" id="active_currency">
                <div class="dropdown-menu dropdown-menu-right">
                    @foreach ($currencies as $active_curr)
                        <a rel="alternate"
                            class="dropdown-item has-icon {{ $curr_id == $active_curr->id ? 'active' : '' }}"
                            href="{{ route('admin.change.currency', $active_curr->id) }}">
                            {{ $active_curr->name }} ({{ $active_curr->symbol }})
                        </a>
                    @endforeach
                </div>
            </li>
        @endif
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-flag">
                @php
                    $lang = $active_languages->where('locale', app()->getLocale())->first();
                @endphp
                <img alt="image" src="{{ static_asset($lang->flag) }}" class="h-24 ">
                <div class="d-sm-none d-lg-inline-block">{{ $lang->name }}</div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                @foreach ($active_languages as $active_lang)
                    <a rel="alternate" hreflang="{{ $active_lang->locale }}"
                        class="dropdown-item has-icon {{ App::getLocale() == $active_lang->locale ? 'active' : '' }}"
                        href="{{ LaravelLocalization::getLocalizedURL($active_lang->locale, null, [], true) }}">
                        <img alt="{{ $active_lang->name }}" src="{{ static_asset($active_lang->flag) }}"
                            class="language-flag">
                        {{ $active_lang->name }}
                    </a>
                @endforeach
            </div>
        </li>

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                @if (Sentinel::getUser()->images &&
                        array_key_exists('image_40x40', Sentinel::getUser()->images) &&
                        @is_file_exists(Sentinel::getUser()->images['image_40x40']))
                    <img alt="{{ Sentinel::getUser()->first_name }}"
                        src="{{ static_asset(Sentinel::getUser()->images['image_40x40']) }}"
                        class="rounded-circle ">
                @else
                    <img alt="{{ Sentinel::getUser()->first_name }}"
                        src="{{ static_asset('images/default/user32x32.jpg') }}" class="rounded-circle ">
                @endif
                <div class="d-sm-none d-lg-inline-block">{{ Sentinel::getUser()->first_name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @if (@Sentinel::getUser()->lastLogin())
                    <div class="dropdown-title">
                        {{ __('Logged in :minutes', ['minutes' => \Carbon\Carbon::parse(Sentinel::getUser()->lastLogin())->diffForHumans()]) }}
                    </div>
                @endif
                <a href="{{ Sentinel::getUser()->user_type == 'seller' ? route('seller.profile') : route('admin.profile') }}"
                    class="dropdown-item has-icon">
                    <i class="bx bx-user"></i> {{ __('Profile') }}
                </a>
                <a href="{{ Sentinel::getUser()->user_type == 'seller' ? route('seller.login.activity') : route('admin.login.activity') }}"
                    class="dropdown-item has-icon">
                    <i class='bx bx-file'></i>{{ __('Login Activities') }}
                </a>
                <!-- <div class="dropdown-divider"></div> -->
                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="bx bx-log-out"></i> {{ __('Logout') }}
                </a>
            </div>
        </li>
    </ul>
</nav>
