<!DOCTYPE html>
<!-- <html lang="{{ $active_language->locale ?? 'en' }}" dir="{{ $active_language->text_direction ?? 'ltr' }}"> -->
<html lang="{{ $active_language->locale ?? 'en' }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="{{ settingHelper('author_name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
    <meta name="base_url" content="{{ url('/') }}">
    <title>{{ $meta['title'] ?? settingHelper('system_name') }}</title>

    <!-- SEO Meta -->
    <meta name="title" content="{{ $meta['meta_title'] ?? '' }}">
    <meta name="description" content="{{ $meta['meta_description'] ?? '' }}">
    <meta name="keywords" content="{{ $meta['meta_keywords'] ?? '' }}">
    <meta property="article:published_time" content="{{ $meta['meta_published_time'] ?? '' }}">
    <meta property="article:section" content="{{ $meta['meta_section'] ?? '' }}">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $meta['meta_title'] ?? '' }}">
    <meta property="og:description" content="{{ $meta['meta_description'] ?? '' }}">
    <meta property="og:url" content="{{ $meta['meta_url'] ?? url('/') }}">
    <meta property="og:type" content="{{ $meta['meta_section'] ?? 'website' }}">
    <meta property="og:locale" content="{{ app()->getLocale() }}">
    <meta property="og:site_name" content="{{ settingHelper('system_name') }}">
    <meta property="og:image" content="{{ $meta['meta_image'] ?? asset('default-image.png') }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $meta['meta_title'] ?? '' }}">
    <meta name="twitter:site" content="{{ $meta['meta_url'] ?? url('/') }}">

    <!-- Favicon -->
    <!-- icons -->
    <link rel="icon" href="{{ $favicon['image_16x16'] }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ $favicon['image_144x144'] }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ $favicon['image_114x114'] }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ $favicon['image_72x72'] }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ $favicon['image_57x57'] }}">
    <!-- END icons -->

    <!-- Font -->
    <link href="{{fontURL()}}" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ static_asset('frontends/css/remixicon.css') }}">
    <link rel="stylesheet"
        href="{{ static_asset('frontends/css/materialdesignicons.min.css') }}?version={{ settingHelper('current_version') }}">
    <link rel="stylesheet" href="{{ static_asset('frontends/css/bootstrap.min.css') }}">


    <style>
        :root {
            --font-default: '{{primaryFont()}}', sans-serif;
            --font-montserrat: "Montserrat", sans-serif;
            --color-black: #000000;
            --color-black-rgb: 0, 0, 0;
            --color-white: #ffffff;
            --color-white-rgb: 255, 255, 255;
            --color-body: #ffffff;
            --color-primary: {{ settingHelper('primary_color')}};
            --color-primary-rgb: 254, 189, 13;
            --color-secondary: #F4F4F4;
            --color-coffee: #7A6760;
            --color-heading: #202124;

            --menu-active-color: {{ settingHelper('menu_active_color') }};
            --menu-background: {{ settingHelper('menu_background_color') }};


            --menu-text-color: {{ settingHelper('menu_text_color') }};


            --btn-bg-color: {{ settingHelper('button_background_color') }};
            --btn-txt-color: {{ settingHelper('button_text_color') }};
            --btn-bdr-color: {{ settingHelper('button_border_color') }};


            --color-heading-rgb: 32, 33, 36;
            --color-heading2: #5F6368;
            --color-heading-rgb: 95, 99, 104;
            --color-heading3: #333333;
            --color-content: #80868B;
            --color-content2: #666666;
            --color-content3: #9AA0A6;
            --color-border: #EEEEEE;
            --color-rating: #FB8F44;
            --color-green: #2DA44E;
            --color-blue: #0969DA;
            --color-yellow: #FEC800;
            --color-red: #FF3B30;
            --color-success: #2DA44E;
            --color-danger: #CF222E;
            --color-warning: #FEC800;
            --font-light: 300;
            --font-regular: 400;
            --font-medium: 500;
            --font-semibold: 600;
            --font-bold: 700;
            --font-extrabold: 800;
            --font-black: 900;
            --radius: 6px;
            --radius-8: 8px;
            --radius-10: 10px;
            --shadow: 0px 15px 35px 0px rgba(0, 0, 0, 0.1);
            --transition: all 300ms ease-in-out;



            /* :root {
              --font-default: "Figtree", sans-serif;
              --font-montserrat: "Montserrat", sans-serif;
              --color-black: #000000;
              --color-black-rgb: 0, 0, 0;
              --color-white: #ffffff;
              --color-white-rgb: 255, 255, 255;
              --color-body: #ffffff;
              --color-primary: #FEBD0D;
              --color-primary-rgb: 254, 189, 13;
              --color-secondary: #F4F4F4;
              --color-heading: #202124;
              --color-heading-rgb: 32, 33, 36;
              --color-heading2: #5F6368;
              --color-heading-rgb: 95, 99, 104;
              --color-heading3: #333333;
              --color-content: #80868B;
              --color-content2: #666666;
              --color-content3: #9AA0A6;
              --color-border: #EEEEEE;
              --color-rating: #FB8F44;
              --color-green: #2DA44E;
              --color-blue: #0969DA;
              --color-yellow: #FEC800;
              --color-red: #FF3B30;
              --color-success: #2DA44E;
              --color-danger: #CF222E;
              --color-warning: #FEC800;
              --font-light: 300;
              --font-regular: 400;
              --font-medium: 500;
              --font-semibold: 600;
              --font-bold: 700;
              --font-extrabold: 800;
              --font-black: 900;
              --radius: 6px;
              --radius-8: 8px;
              --radius-10: 10px;
              --shadow: 0px 15px 35px 0px rgba(0, 0, 0, 0.1);
              --transition: all 300ms ease-in-out;
            } */

            @if(settingHelper('full_width_menu_background') !='1' && settingHelper('header_theme') == 'header_theme1')
                   .header-menu.header_theme1 {
                background-color: transparent !important;
            }

            @endif

            @if(base64_decode(settingHelper('custom_css')))
                {{ base64_decode(settingHelper('custom_css')) }}
            @endif

            @if(settingHelper('is_tawk_messenger_activated') == 1)
            .fb_dialog_content iframe {
                margin-right: 90px !important;
            }
            @endif


        }
    </style>


<link rel="stylesheet" href="{{ static_asset('frontends/css/rtl.css') }}">
    <link rel="stylesheet" href="{{ static_asset('frontends/css/style.css') }}">
    <link rel="stylesheet" href="{{ static_asset('frontends/css/custom.css') }}">

    @if (request()->route()->getName() == 'product-details')
        <script type="application/ld+json">
        {!! $meta['itemprop'] ?? '{}' !!}
    </script>
    @endif

    @if (settingHelper('custom_header_script'))
        {!! base64_decode(settingHelper('custom_header_script')) !!}
    @endif


    @laravelPWA
    @if (settingHelper('is_google_analytics_activated') && settingHelper('tracking_code'))
        {!! base64_decode(settingHelper('tracking_code')) !!}
    @endif
    @if (settingHelper('is_facebook_pixel_activated') && settingHelper('facebook_pixel_id'))
        {!! base64_decode(settingHelper('facebook_pixel_id')) !!}
    @endif

    @vite('resources/js/app.js')


    @if (settingHelper('razorpay_key') && settingHelper('razorpay_secret'))
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    @endif

</head>

<body class="sg-active">


    <div id="37142846" class="sg-37142846"></div>

    <div id="app">
        <app-master :languages="{{ json_encode($languages) }}" :pages="{{ json_encode($pages) }}"
            :currencies="{{ json_encode($currencies) }}" :active_language="{{ json_encode($active_language) }}"
            :active_currency="{{ json_encode($active_currency) }}" :categories="{{ json_encode($categories) }}"
            :sliders="{{ json_encode($sliders) }}" :shop_follower="{{ json_encode($shop_follower) }}"
            :services="{{ json_encode($services) }}" :settings_data="{{ json_encode($settings) }}"
            :banners="{{ json_encode($banners) }}" :viewed_products="{{ json_encode($viewed_products) }}"
            :compare_list="{{ json_encode($compare_list) }}" :wishlists="{{ $wishlists }}"
            :user_wishlists="{{ json_encode($user_wishlists) }}"
            @if ($user) :user="{{ $user }}" @endif
            @if (count($carts) > 0) :carts="{{ json_encode($carts) }}" @endif
            :add_ons="{{ json_encode($addons) }}" :default_currency="{{ json_encode($default_currency) }}"
            :home_components="{{ json_encode($home_components) }}"
            :default_assets="{{ json_encode($default_assets) }}" :product_sold="{{ json_encode($product_sold) }}"></app-master>
    </div>

    <input type="hidden" id="token" value="{{ csrf_token() }}">
    <input type="hidden" id="base_url" value="{{ url('/') }}">
    <input type="hidden" id="app_path" value="{{ config('app.app_path', '/') }}">

    <input type="hidden" id="api_key" value="{{ settingHelper('api_key') }}">
    <input type="hidden" id="auth_domain" value="{{ settingHelper('auth_domain') }}">
    <input type="hidden" id="project_id" value="{{ settingHelper('project_id') }}">
    <input type="hidden" id="storage_bucket" value="{{ settingHelper('storage_bucket') }}">
    <input type="hidden" id="messaging_sender_id" value="{{ settingHelper('messaging_sender_id') }}">
    <input type="hidden" id="app_id" value="{{ settingHelper('app_id') }}">
    <input type="hidden" id="measurement_id" value="{{ settingHelper('measurement_id') }}">


    @if (settingHelper('is_pusher_notification_active') == 1 && Sentinel::check())
        <input type="hidden" value="{{ settingHelper('pusher_app_key') }}" id="f_pusher_app_key">
        <input type="hidden" value="{{ settingHelper('pusher_app_cluster') }}" id="f_pusher_app_cluster">
    @endif
    <script>
        let conversation_active = '{{ settingHelper('conversation') ?? '' }}';
        let fb_object = {!! json_encode([
            'status' => settingHelper('is_facebook_messenger_activated'),
            'color' => settingHelper('facebook_messenger_color'),
            'id' => settingHelper('facebook_page_id'),
        ]) !!};

        let tawk_object = {!! json_encode([
            'status' => settingHelper('is_tawk_messenger_activated'),
            'widget_id' => settingHelper('tawk_widget_id'),
            'property_id' => settingHelper('tawk_property_id'),
        ]) !!};

        //facebook chat
        @if (settingHelper('is_tawk_messenger_activated') == 1)
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src =
                    'https://embed.tawk.to/{{ settingHelper('
                                                                        tawk_property_id ') }}/{{ settingHelper('
                                                                        tawk_widget_id ') }}';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
                window.Tawk_API = window.Tawk_API || {};
                Tawk_API.customStyle = {
                    visibility: {
                        desktop: {
                            position: '{{ $settings['text_direction'] == 'rtl' ? 'bl' : 'br' }}',
                            xOffset: '25px',
                            yOffset: '{{ $settings['text_direction'] == 'rtl' ? '৪0px' : '20px' }}'
                        },
                        mobile: {
                            position: '{{ $settings['text_direction'] == 'rtl' ? 'bl' : 'br' }}',
                            xOffset: '25px',
                            yOffset: '{{ $settings['text_direction'] == 'rtl' ? '70px' : '70px' }}'
                        }
                    }
                };
            })();
        @endif
        // "vue-fb-customer-chat": "^0.2.1"
        //fb chat

        @if (settingHelper('is_facebook_messenger_activated') == 1)
            window.fbAsyncInit = function() {
                FB.init({
                    appId: 'facebook-developer-app-id',

                    autoLogAppEvents: true,
                    xfbml: true,
                    version: 'v3.3'
                });
            };
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        @endif


        window.captcha = '';
        window.myCallback = function(val) {
            window.captcha = val;
        };
    </script>



    <div class="fb-customerchat" attribution=setup_tool page_id="{{ (int) settingHelper('facebook_page_id') }}"
        theme_color="{{ settingHelper('facebook_messenger_color') }}">
    </div>

    @if (settingHelper('custom_footer_script'))
        {!! base64_decode(settingHelper('custom_footer_script')) !!}
    @endif


    @if (config('app.demo_mode'))
    <!-- Toolbar Start -->
		<div class="template__toolbar">
			<div class="toolbar__dropdown">
				<div class="toolbar__btn">
					<span class="toolbar__icon">
						<i class="ri-settings-4-line"></i>
					</span>
					<!-- <span class="toolbar__name">RELATED</span> -->
				</div>
			</div>
			<div class="toolbar__list">
				<!-- Related Color -->
				<span class="toolbar__related">Theme Options</span>
				<div class="color__boxed">
                    <div class="input-group">
                        <label class="toolbar__related text-capitalize">Primary Color</label>
                        <input type="color" value="{{ settingHelper('primary_color') }}" id="colorPicker-accent">
                    </div>
                    <div class="input-group">
                        <label class="toolbar__related text-capitalize">Menu BG Color</label>
                        <input type="color" value="{{ settingHelper('menu_background_color') }}" id="colorPicker-bg">
                    </div>
                    <div class="input-group">
                        <label class="toolbar__related text-capitalize">Menu Text Color</label>
                        <input type="color" value="{{ settingHelper('menu_text_color') }}" id="colorPicker-m-text">
                    </div>
				</div>
				<!-- Ltr Rtl -->
				<span class="toolbar__related">RTL Version</span>
				<div class="option__box">
					<button type="button" class="btn btn-outline active" data-direction="ltr">LTR Version</button>
					<button type="button" class="btn btn-outline" data-direction="rtl">RTL Version</button>
				</div>

                <div class="option__box mt-4 reset__settings">
                    <button type="button" class="btn btn-outline">Reset Setting</button>
                </div>


			</div>
		</div>
		<!-- Toolbar End -->

        <!-- Pricing Button -->
         <div class="sg-yoori-purchase-btn">
            <a href="https://1.envato.market/yoori" target="_blank" class="sg-yoori-purchase">
                <div class="sg-yoori-purchase-price"><span>$</span>
                    69
                </div>
                <div class="em-logo">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 16 16" xml:space="preserve">
                        <path
                            d="M12.869.088c-.572-.281-3.474.04-5.566 2.047-3.296 3.291-3.217 7.627-3.217 7.627s-.109.446-.573-.201c-1.016-1.295-.484-4.274-.424-4.689.084-.585-.289-.602-.444-.409-3.672 5.098-.356 9.272 1.815 10.597 2.542 1.551 7.556 1.55 9.553-2.85C16.501 6.731 13.586.439 12.869.088z"
                            fill="#ffffff"></path>
                    </svg>
                </div>
            </a>
        </div>
        <!-- Pricing End -->




        <script>
        /**********************************
        *  Toolbar JS
        **********************************/
            document.addEventListener("DOMContentLoaded", function () {
                const toolbarBtn = document.querySelector(".toolbar__btn");
                const toolbar = document.querySelector(".template__toolbar");

                // Toggle toolbar on button click
                toolbarBtn.addEventListener("click", function (event) {
                    event.preventDefault();
                    event.stopPropagation();
                    toolbar.classList.toggle("active");
                });

                // Remove toolbar on scroll
                window.addEventListener("scroll", function () {
                    toolbar.classList.remove("active");
                });

                // Close toolbar when clicking outside
                document.addEventListener("click", function (event) {
                    if (!toolbar.contains(event.target) && !toolbarBtn.contains(event.target)) {
                        toolbar.classList.remove("active");
                    }
                });
            });



            document.addEventListener('DOMContentLoaded', function () {
                const savedDirection = localStorage.getItem('direction') || 'ltr';
                document.documentElement.setAttribute('dir', savedDirection);

                const buttons = document.querySelectorAll('button[data-direction]');
                buttons.forEach(button => {
                    const dir = button.getAttribute('data-direction');


                    if (dir === savedDirection) {
                        button.classList.add('active');
                    } else {
                        button.classList.remove('active');
                    }

                    button.addEventListener('click', function () {
                        const selectedDir = this.getAttribute('data-direction');
                        if (selectedDir === document.documentElement.getAttribute('dir')) return;


                        document.documentElement.setAttribute('dir', selectedDir);
                        localStorage.setItem('direction', selectedDir);


                        buttons.forEach(btn => btn.classList.remove('active'));
                        this.classList.add('active');

                        location.reload();
                    });
                });
            });


            /* ============== color ================== */
            document.addEventListener('DOMContentLoaded', function () {
                const root = document.documentElement;

                // Input elements
                const colorAccent = document.getElementById('colorPicker-accent'); // Accent now maps to --color-primary
                const colorBg = document.getElementById('colorPicker-bg');
                const colorText = document.getElementById('colorPicker-m-text');

                // Load saved colors from localStorage (if any)
                const savedColors = {
                    accent: localStorage.getItem('color-primary'),
                    bg: localStorage.getItem('color-bg'),
                    text: localStorage.getItem('color-text')
                };

                if (savedColors.accent) {
                    colorAccent.value = savedColors.accent;
                    root.style.setProperty('--color-primary', savedColors.accent);
                }

                if (savedColors.bg) {
                    colorBg.value = savedColors.bg;
                    root.style.setProperty('--menu-background', savedColors.bg);
                }

                if (savedColors.text) {
                    colorText.value = savedColors.text;
                    root.style.setProperty('--menu-text-color', savedColors.text);
                }

                // On change: update CSS + LocalStorage
                colorAccent.addEventListener('input', function () {
                    const color = this.value;
                    root.style.setProperty('--color-primary', color);
                    localStorage.setItem('color-primary', color);
                });

                colorBg.addEventListener('input', function () {
                    const color = this.value;
                    root.style.setProperty('--menu-background', color);
                    localStorage.setItem('color-bg', color);
                });

                colorText.addEventListener('input', function () {
                    const color = this.value;
                    root.style.setProperty('--menu-text-color', color);
                    localStorage.setItem('color-text', color);
                });


                const resetButton = document.querySelector('.reset__settings');
                if(resetButton){
                    resetButton.addEventListener('click', function(){
                        // Reset colors to default
                        localStorage.removeItem('direction');
                        localStorage.removeItem('color-primary');
                        localStorage.removeItem('color-bg');
                        localStorage.removeItem('color-text');
                        location.reload();
                    });
                }


            });
        </script>
    @endif
</body>

</html>
