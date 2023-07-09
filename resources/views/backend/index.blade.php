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
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <style>
        .custom-range {
            width: 100%;
        }

        .percentage-red {
            color: red;
        }

        .percentage-orange {
            color: orange;
        }

        .percentage-green {
            color: green;
        }
    </style>

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
        document.querySelectorAll('.difficult input[type="radio"]').forEach(function(input) {
            input.addEventListener('change', function() {
                if (this.value === '5') {
                    document.querySelector('.difficult input.star5').checked = true;
                }
            });
        });
    </script>

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
    <script>
        // Fungsi untuk menampilkan gambar-gambar yang akan diunggah
        function previewImages(event) {
            var files = event.target.files;
            var imagePreview = document.getElementById('image-preview');
            imagePreview.innerHTML = '';

            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var previewImage = document.createElement('img');
                    previewImage.className = 'img-thumbnail';
                    previewImage.style.width = '150px'; // Ubah lebar gambar menjadi 50 piksel
                    previewImage.style.height = '150px'; // Ubah tinggi gambar menjadi 50 piksel
                    previewImage.src = e.target.result;
                    imagePreview.appendChild(previewImage);
                }
                reader.readAsDataURL(files[i]);
            }
        }

        // Mengambil elemen input file
        var inputImage = document.querySelector('input[name="image[]"]');
        // Menambahkan event listener untuk mengaktifkan preview saat ada perubahan pada input file
        inputImage.addEventListener('change', previewImages);
    </script>

    <script>
        const name = document.querySelector('#name')
        const slug = document.querySelector('#slug')

        name.addEventListener('change', function() {
            fetch('/dashboard/project/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
    <script>
        var rangeInput = document.getElementById('customRange2');
        var percentageDisplay = document.getElementById('percentage');

        rangeInput.addEventListener('input', function() {
            var percentage = rangeInput.value;
            percentageDisplay.textContent = percentage + '%';

            // Menghapus kelas warna sebelumnya
            percentageDisplay.classList.remove('percentage-red', 'percentage-orange', 'percentage-green');

            // Menambahkan kelas warna sesuai dengan presentase
            if (percentage < 30) {
                percentageDisplay.classList.add('percentage-green');
            } else if (percentage < 70) {
                percentageDisplay.classList.add('percentage-orange');
            } else {
                percentageDisplay.classList.add('percentage-red');
            }
        });
    </script>
</body>

</html>
