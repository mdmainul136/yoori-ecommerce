<div class="drag-brop-menu content-{{ $content_count }}">
    <div class="menu-item card" data-id="{{ $content_count }}">
        <div class="card-header d-flex justify-content-between border-0">
            <a href="javaScript:void(0)" class="d-flex"><i class="bx bx-menu move"></i>
                <h4>{{ __('today_special_deals') }}</h4>
            </a>

            <button type="button" onclick="$(this).parent().parent().remove()" class="btn remove-menu-row">
                <i class="bx bx-trash"></i></button>
        </div>
        <div class="card-body campaign-{{ $content_count }}">
            <input type="hidden" name="content_numbers[]" value="{{ $content_count }}">
            <input type="hidden" name="contents[]" class="section_name" value="offer_ending_soon">
            <input type="hidden" name="offer_ending_soon_{{ $content_count }}[]" value="{{ $content_count }}">
            <div class="banner-item mb-2">
                <div class="item row">
                    <div class="col-md-10">
                        <div class="form-group">

                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <div class="selected-media-box">
                                        <div class="mt-2 gallery gallery-md d-flex">
                                            @php
                                                $thumb = '';
                                                if (isset($contents['offer_ending_soon']['banner'])):
                                                    $thumb = \App\Models\Media::find(
                                                        $contents['offer_ending_soon']['banner'],
                                                    );
                                                endif;
                                            @endphp
                                            @if ($thumb)
                                                <div class="selected-media mr-2 mb-2 mt-3 ml-0"
                                                    data-id="{{ $thumb->id }}">
                                                    @if (@is_file_exists($thumb->image_variants['image_72x72'], $thumb->image_variants['storage']))
                                                        <img src="{{ get_media($thumb->image_variants['image_72x72'], $thumb->image_variants['storage']) }}"
                                                            alt="img-thumbnail" class="img-thumbnail logo-profile">
                                                    @else
                                                        <img src="{{ static_asset('images/default/default-image-72x72.png') }}"
                                                            alt="img-thumbnail" class="img-thumbnail logo-profile">
                                                    @endif
                                                    <div class="image-remove image-remove-offer-ending">
                                                        <a href="javascript:void(0)" class="remove"><i
                                                                class="bx bx-x"></i></a>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="selected-media mr-2 mb-2 mt-3 ml-0">
                                                    <img src="{{ static_asset('images/default/default-image-72x72.png') }}"
                                                        data-default="{{ static_asset('images/default/default-image-72x72.png') }}"
                                                        alt="brand-logo" class="img-thumbnail logo-profile">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <label for="banner">{{ __('Banner') }} (516X375)</label>
                                    <div class="input-group gallery-modal" id="btnSubmit" data-for="image"
                                        data-selection="single" data-target="#galleryModal" data-dismiss="modal" data-group-id="banner_111">
                                        <input type="hidden" name="offer_ending_soon_{{ $content_count }}_banner"
                                            id="banner" class="image-selected"
                                            value="{{ @$contents ? @$contents['offer_ending_soon']['banner'] : '' }}">
                                        <span class="form-control"><span class="counter">
                                                {{ @$contents['offer_ending_soon']['banner'] != '' ? substr_count($contents['offer_ending_soon']['banner'], ',') + 1 : 0 }}
                                            </span> {{ __('file chosen') }}</span>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                {{ __('Choose File') }}
                                            </div>
                                        </div>
                                    </div>
                                    <label for="banner_url" class="mt-2">{{ __('Banner URL') }}</label>
                                    <input type="text" class="form-control mr-sm-2 menu-url-input" id="banner_url"
                                        name="offer_ending_soon_{{ $content_count }}_banner_url"
                                        value="{{ @$contents ? @$contents['offer_ending_soon']['banner_url'] : '/' }}"
                                        placeholder="{{ __('Link/Slug') }}">
                                </div>
                            </div>

                        </div>
                        {{-- image  2 --}}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="selected-media-box">
                                        <div class="mt-2 gallery gallery-md d-flex">
                                            @php
                                                $thumb2 = '';
                                                if (isset($contents['offer_ending_soon']['banner_2'])):
                                                    $thumb2 = \App\Models\Media::find(
                                                        $contents['offer_ending_soon']['banner_2'],
                                                    );
                                                endif;
                                            @endphp
                                            @if ($thumb2)
                                                <div class="selected-media mr-2 mb-2 mt-3 ml-0"
                                                    data-id="{{ $thumb2->id }}">
                                                    @if (@is_file_exists($thumb2->image_variants['image_72x72'], $thumb2->image_variants['storage']))
                                                        <img src="{{ get_media($thumb2->image_variants['image_72x72'], $thumb2->image_variants['storage']) }}"
                                                            alt="img-thumbnail" class="img-thumbnail logo-profile">
                                                    @else
                                                        <img src="{{ static_asset('images/default/default-image-72x72.png') }}"
                                                            alt="img-thumbnail" class="img-thumbnail logo-profile">
                                                    @endif
                                                    <div class="image-remove image-remove-offer-ending">
                                                        <a href="javascript:void(0)" class="remove"><i
                                                                class="bx bx-x"></i></a>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="selected-media mr-2 mb-2 mt-3 ml-0">
                                                    <img src="{{ static_asset('images/default/default-image-72x72.png') }}"
                                                        data-default="{{ static_asset('images/default/default-image-72x72.png') }}"
                                                        alt="brand-logo" class="img-thumbnail logo-profile">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <label id="banner_{{ $content_count }}_2">{{ __('Banner') }} (516X375)</label>
                                    <div class="input-group gallery-modal" id="btnSubmit" data-for="image"
                                        data-selection="single" data-target="#galleryModal" data-dismiss="modal" data-group-id="banner_222">
                                        <input type="hidden" name="offer_ending_soon_{{ $content_count }}_banner_2"
                                            id="banner_{{ $content_count }}_2" class="image-selected"
                                            value="{{ @$contents ? @$contents['offer_ending_soon']['banner_2'] : '' }}">
                                        <span class="form-control"><span class="counter">
                                                {{ @$contents['offer_ending_soon']['banner_2'] != '' ? substr_count($contents['offer_ending_soon']['banner_2'], ',') + 1 : 0 }}
                                            </span> {{ __('file chosen') }}</span>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                {{ __('Choose File') }}
                                            </div>
                                        </div>
                                    </div>


                                    <label for="banner_url_2" class="mt-2">{{ __('Banner URL') }}</label>
                                    <input type="text" class="form-control mr-sm-2 menu-url-input"
                                        id="banner_url_2" name="offer_ending_soon_{{ $content_count }}_banner_url_2"
                                        value="{{ @$contents ? @$contents['offer_ending_soon']['banner_url_2'] : '/' }}"
                                        placeholder="{{ __('Link/Slug') }}">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- offer ending soon --}}
