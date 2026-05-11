@extends('admin.partials.master')
@section('title')
    {{ __('Slider Add') }}
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body ">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{ __('Slider Add') }}</h2>
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
                            <h4>{{ __('Add New Slider') }}</h4>
                        </div>
                        <div class="card-body card-body-paddding">
                            @php
                                $route = route('sliders.store');
                            @endphp

                            <form method="POST" action="{{ $route }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title">{{ __('Title') }}</label>
                                            <input type="text" class="form-control" name="title" id="title"
                                                value="{{ old('title') }}" placeholder="{{ __('Title') }}">
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
                                                value="{{ old('sub_title') }}" placeholder="{{ __('Sub Title') }}">
                                            @if ($errors->has('sub_title'))
                                                <div class="invalid-feedback">
                                                    <p>{{ $errors->first('sub_title') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="tag">{{ __('Tag') }}</label>
                                            <input type="text" class="form-control" name="tag" id="tag"
                                                value="{{ old('tag') }}" placeholder="{{ __('Tag') }}">
                                            @if ($errors->has('tag'))
                                                <div class="invalid-feedback">
                                                    <p>{{ $errors->first('tag') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="btn_text">{{ __('Button Text') }}</label>
                                            <input type="text" class="form-control" name="btn_text" id="btn_text"
                                                value="{{ old('btn_text') }}" placeholder="{{ __('Button Text') }}">
                                            @if ($errors->has('btn_text'))
                                                <div class="invalid-feedback">
                                                    <p>{{ $errors->first('btn_text') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="order">{{ __('Order') }}</label>
                                            <input type="number" class="form-control" name="order" id="order"
                                                value="{{ old('order') }}" placeholder="{{ __('Order') }}">
                                            @if ($errors->has('order'))
                                                <div class="invalid-feedback">
                                                    <p>{{ $errors->first('order') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="link">{{ __('Link') }}</label>
                                            <input type="text" class="form-control" name="link" id="link"
                                                value="{{ old('link') }}" placeholder="{{ __('Link') }}">
                                            @if ($errors->has('link'))
                                                <div class="invalid-feedback">
                                                    <p>{{ $errors->first('link') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $size = addon_is_activated('ishopet') ? __('726X350') : __('675X480');
                                @endphp
                                <div class="form-group">
                                    <label for="logo">{{ __('Background Image') }} ({{ $size }})</label>
                                    <div class="form-group">
                                        <div class="input-group gallery-modal" id="btnSubmit" data-for="image"
                                            data-selection="single" data-size="{{ $size }}"
                                            data-target="#galleryModal" data-dismiss="modal">
                                            <input type="hidden" name="bg_image" value="" class="image-selected">
                                            <span class="form-control"><span class="counter">0</span>
                                                {{ __('file chosen') }}</span>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    {{ __('Choose File') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="selected-media-box">
                                            <div class="mt-2 gallery gallery-md d-flex">
                                                <div class="selected-media mr-2 mb-2 mt-3 ml-0" data-id="">
                                                    <img src="{{ static_asset('images/default/default-image-72x72.png') }}"
                                                        data-default="{{ static_asset('images/default/default-image-72x72.png') }}"
                                                        alt="category-banner" class="img-thumbnail logo-profile">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('bg_image'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('bg_image') }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-outline-primary" tabindex="4">
                                        {{ __('Save') }}
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
