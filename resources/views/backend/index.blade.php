<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Skiddie ID')</title>

    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets-backend/vendors/images/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets-backend/vendors/images/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets-backend/vendors/images/favicon-16x16.png') }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-backend/vendors/styles/core.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-backend/vendors/styles/icon-font.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets-backend/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets-backend/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-backend/vendors/styles/style.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets-backend/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets-backend/src/plugins/switchery/switchery.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets-backend/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets-backend/src/plugins/jquery-steps/jquery.steps.css') }}" />
    <!-- Slick Slider css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-backend/src/plugins/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets-backend/src/plugins/dropzone/src/dropzone.css') }}" />

</head>

<body>
    {{-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo">
				<img width="200" src="{{ asset('assets-backend/src/images/skiddie.png') }}" alt="" />
			</div>
			<div class="loader-progress" id="progress_div">
				<div class="bar" id="bar1"></div>
			</div>
			<div class="percent" id="percent1">0%</div>
			<div class="loading-text">Loading...</div>
		</div>
	</div> --}}

    @include('backend.layouts.header')
    @include('backend.layouts.left-sidebar')

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            @yield('container')
        </div>
    </div>


    <!-- js -->
    <script src="{{ asset('assets-backend/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('assets-backend/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('assets-backend/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('assets-backend/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('assets-backend/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets-backend/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets-backend/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets-backend/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets-backend/vendors/scripts/dashboard3.js') }}"></script>
    <script src="{{ asset('assets-backend/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('assets-backend/vendors/scripts/advanced-components.js') }}"></script>
    <script src="{{ asset('assets-backend/src/plugins/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('assets-backend/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('assets-backend/src/plugins/jquery-steps/jquery.steps.js') }}"></script>
    <script src="{{ asset('assets-beckend/vendors/scripts/steps-setting.js') }}"></script>
    <script src="{{ asset('assets-backend/src/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets-backend/src/plugins/dropzone/src/dropzone.js') }}"></script>


    <script>
        jQuery(document).ready(function() {
            jQuery(".product-slider").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                infinite: true,
                speed: 1000,
                fade: true,
                asNavFor: ".product-slider-nav",
            });
            jQuery(".product-slider-nav").slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: ".product-slider",
                dots: false,
                infinite: true,
                arrows: false,
                speed: 1000,
                centerMode: true,
                focusOnSelect: true,
            });
        });
    </script>
</body>

</html>
