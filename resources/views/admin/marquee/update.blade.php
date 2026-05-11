@extends('admin.partials.master')
@php
    @endphp
@section('title')
    {{ __('Marquee Edit') }}
@endsection

@section('store_front_active')
active
@endsection

@section('marquee_active')
    active
@endsection

@section('main-content')
    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{ __('Edit Marquee') }}</h2>
                </div>
                @if(hasPermission('brand_read'))
                    <div class="buttons add-button">
                        <a href="{{ old('r') ? old('r') : (@$r ? $r : url()->previous() )}}" class="btn btn-icon icon-left btn-outline-primary"><i
                                class="bx bx-arrow-back"></i>{{ __('Back') }}</a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-7 middle">
                    <div class="card">
                        <div class="card-body card-body-paddding">
                            <div class="card-header input-title pl-0">
                                <h4>{{ __('Brand') }}</h4>
                            </div>
                            <form class="" id="lang">
                                <div class="form-group">
                                    <label for="name">{{ __('Language') }}</label>
                                    <input type="hidden" value="{{ old('r') ? old('r') : (@$r ? $r : url()->previous() )}}" name="r">
                                    <select class="form-control selectric lang" name="lang">
                                        <option value="">{{ __('Select Language') }}</option>
                                        @foreach($languages as $language)
                                            <option
                                                value="{{ $language->locale }}" {{($lang != '' ? ($language->locale == $lang ? 'selected' : '') : ($language->locale == 'en' ? 'selected' : '')) }}>{{ $language->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('lang'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('lang') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </form>

                            <form action="{{ route('marquees.update') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="title">{{ __('Title') }} *</label>
                                    <input type="hidden"value="{{ $marquee_language->translation_null == 'not-found' ? '' : $marquee_language->id }}"
                                           name="marquee_lang_id">
                                    <input type="hidden" value="{{ $marquee_language->marquee->id }}" name="marquee_id">
                                    <input type="hidden" value="{{ $lang }}" name="lang">
                                    <input type="hidden" value="{{ old('r') ? old('r') : (@$r ? $r : url()->previous() )}}" name="r">
                                    <input type="text" name="title" id="title"
                                           value="{{ old('title') ? old('title') : $marquee_language->title }}"
                                           class="form-control" >
                                    @if ($errors->has('title'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('title') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="link">{{ __('link') }}</label>
                                    <input type="text" name="link" id="link" value="{{ old('link') ? old('link') : $marquee_language->marquee->link }}"
                                        class="form-control">
                                    @if ($errors->has('link'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('link') }}</p>
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

@section('style')
    <link rel="stylesheet" href="{{ static_asset('admin/css/dropzone.css') }}">
@endsection
@push('script')
    <script type="text/javascript" src="{{ static_asset('admin/js/dropzone.min.js') }}"></script>
@endpush


