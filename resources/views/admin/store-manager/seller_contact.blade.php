@extends('admin.partials.master')
@section('store_manager')
    active
@endsection
@section('seller_contacts')
    active
@endsection
@section('title')
    {{ __('Store Manager Seller Contact') }}
@endsection
@section('main-content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">{{ __('Store Manager Seller Contact') }}</h2>
            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md col-12 mt-3 middle">
                                    <form action="{{ route('admin.store-manager.setting.update') }}" method="post">
                                        @csrf
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{ __('Sent Order Notification') }}
                                                </td>
                                                <td width="300">
                                                    @if (settingHelper('maintenance_mode') == 0 || settingHelper('maintenance_mode') == '')
                                                        <label class="custom-switch mt-2 modal-menu" data-toggle="modal"
                                                            title="" data-original-title="Maintenance Mode"
                                                            data-url="{{ route('edit-info', ['page_name' => 'maintenance-mode']) }}"
                                                            data-target="#common-modal">
                                                            <input type="checkbox" name="custom-switch-checkbox"
                                                                class="custom-switch-input"
                                                                {{ settingHelper('maintenance_mode') == 1 ? 'checked' : '' }} />
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    @else
                                                        <label class="custom-switch mt-2">
                                                            <input type="checkbox" name="custom-switch-checkbox"
                                                                value="setting-status-change/{{ 'maintenance_mode' }}"
                                                                class="custom-switch-input status-change"
                                                                {{ settingHelper('maintenance_mode') == 1 ? 'checked' : '' }} />
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="2">
                                                    <input type="text" name="config_email" value="{{ old('config_email') }}" class="form-control" placeholder="{{ __('Config Destination Email') }}">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    {{ __('Global Seller Notification') }}
                                                </td>
                                                <td width="300">
                                                    @if (settingHelper('maintenance_mode') == 0 || settingHelper('maintenance_mode') == '')
                                                        <label class="custom-switch mt-2 modal-menu" data-toggle="modal"
                                                            title="" data-original-title="Maintenance Mode"
                                                            data-url="{{ route('edit-info', ['page_name' => 'maintenance-mode']) }}"
                                                            data-target="#common-modal">
                                                            <input type="checkbox" name="custom-switch-checkbox"
                                                                class="custom-switch-input"
                                                                {{ settingHelper('maintenance_mode') == 1 ? 'checked' : '' }} />
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    @else
                                                        <label class="custom-switch mt-2">
                                                            <input type="checkbox" name="custom-switch-checkbox"
                                                                value="setting-status-change/{{ 'maintenance_mode' }}"
                                                                class="custom-switch-input status-change"
                                                                {{ settingHelper('maintenance_mode') == 1 ? 'checked' : '' }} />
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    @endif
                                                </td>
                                            </tr>




                                            <tr class="text-center">
                                               <td colspan="2">
                                                <button type="submit" class="btn btn-outline-primary" tabindex="4">
                                                    {{ __('Update') }}
                                                </button>

                                               </td>
                                            </tr>

                                        </tbody>


                                    </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
