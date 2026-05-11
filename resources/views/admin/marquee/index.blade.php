@extends('admin.partials.master')
@php
@endphp
@section('title')
    {{ __('Marquee List') }}
@endsection

@section('store_front_active')
active
@endsection

@section('marquee_active')
    active
@endsection

@php
    $q = isset($_GET['q']) ? $_GET['q'] : null;
@endphp
@section('main-content')
    <section class="section">
        <div class="section-body">
            <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="section-title">{{ __('All Marquee') }}</h2>
                    <p class="section-lead">
                        {{ __('You have total') . ' ' . $marquee->total() . ' ' . __('Marquee') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- <div class="{{ hasPermission('brand_create') ? 'col-sm-xs-12 col-md-7' : 'col-sm-xs-12 col-md-8 middle' }}"> --}}
            <div class="col-sm-xs-12 col-md-7">
                <div class="card">
                    <form action="" id="sorting">
                        <div class="card-header input-title">
                            <h4>{{ __('Brands') }}</h4>
                            <div class="card-header-form">
                                <form class="form-inline" id="sorting">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q"
                                            value="{{ @$q }}" placeholder="{{ __('Search') }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-outline-primary"><i class="bx bx-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </form>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Options') }}</th>

                                        {{-- @if (hasPermission('brand_update') || hasPermission('brand_delete'))
                                        @endif --}}
                                    </tr>
                                    @foreach ($marquee as $key => $item)
                                        @php
                                            $title = $item->getTranslation('title', app()->getLocale());
                                        @endphp
                                        <tr id="row_{{ $item->id }}" class="table-data-row">
                                            <input type="hidden" value="{{ $item->id }}" id="id">
                                            <td>{{ $marquee->firstItem() + $key }}</td>
                                            <td>{{ $title }}</td>
                                            <td>
                                                {{-- <label
                                                    class="custom-switch mt-2 {{ hasPermission('brand_update') ? '' : 'cursor-not-allowed' }}">
                                                    <input type="checkbox" name="custom-switch-checkbox"
                                                        value="brand-status-change/{{ $brand->id }}"
                                                        {{ $brand->status == 1 ? 'checked' : '' }}
                                                        {{ hasPermission('brand_update') ? '' : 'disabled' }}
                                                        class="{{ hasPermission('brand_update') ? 'status-change' : '' }} custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                </label> --}}

                                                <label class="custom-switch mt-2">
                                                    <input type="checkbox" name="custom-switch-checkbox"
                                                        value="marquee-status-change/{{ $item->id }}"
                                                        {{ $item->status == 1 ? 'checked' : '' }}
                                                        class="custom-switch-input status-change">
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <a href="{{ route('marquees.edit', $item->id) }}"
                                                    class="btn btn-outline-secondary btn-circle"
                                                    data-url=""data-toggle="tooltip" title=""
                                                    data-original-title="{{ __('Edit') }}">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <a href="javascript:void(0)"onclick="delete_row('delete/marquees/',{{ $item->id }})"
                                                    class="btn btn-outline-danger btn-circle" data-toggle="tooltip"
                                                    title=""data-original-title="{{ __('Delete') }}">
                                                    <i class='bx bx-trash'></i>
                                                </a>


                                                {{-- @if (hasPermission('brand_update'))
                                                    <a href="{{ route('brand.edit', $brand->id) }}"
                                                        class="btn btn-outline-secondary btn-circle"
                                                        data-url=""data-toggle="tooltip" title=""
                                                        data-original-title="{{ __('Edit') }}">
                                                        <i class="bx bx-edit"></i>
                                                    </a>
                                                @endif
                                                @if (hasPermission('brand_delete'))
                                                    <a href="javascript:void(0)"onclick="delete_row('delete/brands/',{{ $brand->id }})"
                                                        class="btn btn-outline-danger btn-circle" data-toggle="tooltip"
                                                        title=""data-original-title="{{ __('Delete') }}">
                                                        <i class='bx bx-trash'></i>
                                                    </a>
                                                @endif --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <nav class="d-inline-block">
                            {{ $marquee->appends(Request::except('page'))->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                </div>
            </div>


            {{-- @if (hasPermission('brand_create')) --}}
                <div class="col-sm-xs-12 col-md-5">
                    <div class="card">
                        <div class="card-header input-title">
                            <h4>{{ __('Add Marquee') }}</h4>
                        </div>
                        <div class="card-body card-body-paddding">
                            <form method="POST" action="{{ route('marquees.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="title">{{ __('Title') }} *</label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                                        class="form-control">
                                    @if ($errors->has('title'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('title') }}</p>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="link">{{ __('link') }}</label>
                                    <input type="text" name="link" id="link" value="{{ old('link') }}"
                                        class="form-control">
                                    @if ($errors->has('link'))
                                        <div class="invalid-feedback">
                                            <p>{{ $errors->first('link') }}</p>
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
            {{-- @endif --}}
        </div>
    </section>
    <!-- Modal -->
    @include('admin.common.selector-modal')
@endsection
@include('admin.common.delete-ajax')

@section('style')
    <link rel="stylesheet" href="{{ static_asset('admin/css/dropzone.css') }}">
@endsection
@push('script')
    <script type="text/javascript" src="{{ static_asset('admin/js/dropzone.min.js') }}"></script>
@endpush
