@extends('admin.partials.master')
@php
    $title = __('Banner Edit');
    $edit = $bannerLang->banner;
@endphp
@section('title')
    {{ $title }}
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body ">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{ $title }}</h2>
                </div>
                <div class="buttons add-button">
                    <a href="{{ old('r') ? old('r') : (@$r ? $r : url()->previous()) }}"
                        class="btn btn-icon icon-left btn-outline-primary"><i
                            class="bx bx-arrow-back"></i>{{ __('Back') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-xs-12 col-md-10 middle">
                    <div class="card">
                        <div class="card-header input-title">
                            <h4>{{ __('Edit Banner') }}</h4>
                        </div>
                        <div class="card-body card-body-paddding">

                            <form class="" id="lang">
                                <div class="form-group">
                                    <label for="name">{{ __('Language') }}</label>
                                    <input type="hidden"
                                        value="{{ old('r') ? old('r') : (@$r ? $r : url()->previous()) }}" name="r">
                                    <select class="form-control selectric lang" name="lang">
                                        <option value="">{{ __('Select Language') }}</option>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->locale }}"
                                                {{ $lang != '' ? ($language->locale == $lang ? 'selected' : '') : ($language->locale == 'en' ? 'selected' : '') }}>
                                                {{ $language->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('lang'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('lang') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </form>

                            <form method="POST" action="{{ route('banners.update', $edit->id) }}">
                                @csrf
                                @method('put')

                                <input type="hidden" value="{{ old('r') ? old('r') : (@$r ? $r : url()->previous()) }}"
                                    name="r">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{ __('Title') }} *</label>
                                            <input
                                                type="hidden"value="{{ $bannerLang->translation_null == 'not-found' ? '' : $bannerLang->id }}"
                                                name="banner_lang_id">
                                            <input type="hidden" value="{{ $edit->id }}" name="banner_id">
                                            <input type="hidden" value="{{ $lang }}" name="lang">
                                            <input type="hidden"
                                                value="{{ old('r') ? old('r') : (@$r ? $r : url()->previous()) }}"
                                                name="r">
                                            <input type="text" name="title" id="title"
                                                value="{{ old('title') ? old('title') : $edit->title }}"
                                                class="form-control">
                                            @if ($errors->has('title'))
                                                <div class="invalid-feedback">
                                                    <p>{{ $errors->first('title') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="sub_title">{{ __('Sub Title') }}</label>
                                            <input type="text" class="form-control" name="sub_title" id="sub_title"
                                                value="{{ old('sub_title') ? old('sub_title') : $edit->sub_title }}"
                                                placeholder="{{ __('Sub Title') }}">
                                            @if ($errors->has('sub_title'))
                                                <div class="invalid-feedback">
                                                    <p>{{ $errors->first('sub_title') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="btn_text">{{ __('Button Text') }}</label>
                                            <input type="text" class="form-control" name="btn_text" id="btn_text"
                                                value="{{ old('btn_text') ? old('btn_text') : $edit->btn_text }}"
                                                placeholder="{{ __('Button Text') }}">
                                            @if ($errors->has('btn_text'))
                                                <div class="invalid-feedback">
                                                    <p>{{ $errors->first('btn_text') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="order">{{ __('Order') }}</label>
                                            <input type="number" class="form-control" name="order" id="order"
                                                value="{{ isset($edit) ? $edit->order : old('order') }}"
                                                placeholder="{{ __('Order') }}">
                                            @if ($errors->has('order'))
                                                <div class="invalid-feedback">
                                                    <p>{{ $errors->first('order') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="link">{{ __('Link') }}</label>
                                            <input type="text" class="form-control" name="link" id="link"
                                                value="{{ isset($edit) ? $edit->link : old('link') }}"
                                                placeholder="{{ __('Link') }}">
                                            @if ($errors->has('link'))
                                                <div class="invalid-feedback">
                                                    <p>{{ $errors->first('link') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>


                                </div>

                                @php
                                    $size = addon_is_activated('ishopet') ? __('192X170') : '362X220';
                                @endphp
                                <div class="form-group">
                                    <label for="logo">{{ __('Image') }} ({{ $size }})</label>
                                    <div class="form-group">
                                        <div class="input-group gallery-modal" id="btnSubmit" data-for="image"
                                            data-selection="single" data-target="#galleryModal" data-dismiss="modal">
                                            <input type="hidden" name="image" value="{{ $edit->image_id }}"
                                                class="image-selected">
                                            <span class="form-control"><span class="counter">1</span>
                                                {{ __('file chosen') }}</span>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    {{ __('Choose File') }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="selected-media-box">
                                            <div class="mt-2 gallery gallery-md d-flex">
                                                <div class="selected-media mr-2 mb-2 mt-3 ml-0"
                                                    data-id="{{ $edit->image_id }}">
                                                    @if (
                                                        $edit->image_id &&
                                                            array_key_exists('image_72x72', $edit->image) &&
                                                            is_file_exists($edit->image['image_72x72'], $edit->image['storage']))
                                                        <img src="{{ get_media($edit->image['image_72x72'], $edit->image['storage']) }}"
                                                            alt="" class="img-thumbnail logo-profile">
                                                    @else
                                                        <img src="{{ static_asset('images/default/default-image-72x72.png') }}"
                                                            data-default="{{ static_asset('images/default/default-image-72x72.png') }}"
                                                            alt="category-banner" class="img-thumbnail logo-profile">
                                                    @endif
                                                    <div class="image-remove">
                                                        <a href="javascript:void(0)" class="remove"><i
                                                                class="bx bx-x"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('image'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('image') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-outline-primary" tabindex="4">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('admin.common.selector-modal')
@endsection
@include('admin.common.delete-ajax')

@section('style')
    <link rel="stylesheet" href="{{ static_asset('admin/css/dropzone.css') }}">
@endsection
@push('script')
    <script type="text/javascript" src="{{ static_asset('admin/js/dropzone.min.js') }}"></script>
@endpush

@push('script')
    <script>
        (function($) {
            'use strict'

            $(document).ready(function() {})
        })(jQuery)
    </script>
@endpush
