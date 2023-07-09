<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets-backend/src/images/skiddie.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets-backend/src/images/skiddie.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets-backend/src/images/skiddie.png') }}" />
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets-frontend/vendor/bootstrap-5/css/bootstrap.css') }}">

    <!-- jquery -->
    <script src="{{ asset('assets-frontend/vendor/jquery/jquery.js') }}"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets-frontend/src/css/style.css') }}">

    <title>Skiddie ID - Dev Apps - {{ $project->name }} </title>
</head>

<body>
    <main>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light navbar-skiddie fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <img width="100" src="{{ asset('assets-backend/src/images/skiddie.png') }}" alt="">
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    @if (!Request::is('detail-project/*'))
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav ms-auto">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                                <a class="nav-link" href="#team">Team</a>
                                <a class="nav-link" href="#project">Project</a>
                                {{-- <a class="nav-link" href="#">Article</a> --}}
                            </div>
                        </div>
                    @endif
                </div>
            </nav>
        </div>



        <section class="section-detail-project">
            <div class="container">
                <h3 class="h4 text-bold"> {{ $project->name }} </h3>
                <div class="item-header mt-3">
                    @foreach ($project->users as $user)
                        <span class="icon-item">
                            <img class="rounded-circle" style="width: 25px"
                                src="{{ asset('storage/' . $user->profile_picture) }}" alt="developer"
                                class="img-fluid">
                            {{ $user->name }}
                        </span>
                    @endforeach
                </div>
            </div>

            <div class="container mt-5">
                <div class="header-detail">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-md-6">
                                    @php
                                        $firstImage = true;
                                    @endphp
                                    @foreach ($project->project_images as $index => $image)
                                        @if ($index == 0)
                                            <img id="main-image" src="{{ asset('storage/' . $image->image) }}"
                                                alt="" class="img-fluid rounded-5">
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        @foreach ($project->project_images as $image)
                                            @if ($firstImage)
                                                @php
                                                    $firstImage = false;
                                                @endphp
                                            @else
                                                <div class="col-sm-3 col-md-6">
                                                    <img src="{{ asset('storage/' . $image->image) }}" alt=""
                                                        class="img-fluid rounded-5 py-1 px-1"
                                                        onclick="changeMainImage('{{ asset('storage/' . $image->image) }}')">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-4">
                            <div class="card card-custom card-sale">
                                @php
                                    function getProgressBarColor($percentage)
                                    {
                                        if ($percentage < 40) {
                                            return 'bg-success'; // kelas warna merah untuk presentase di bawah 30%
                                        } elseif ($percentage < 70) {
                                            return 'bg-warning'; // kelas warna kuning untuk presentase di antara 30% dan 70%
                                        } else {
                                            return 'bg-danger'; // kelas warna hijau untuk presentase di atas 70%
                                        }
                                    }
                                @endphp
                                <div class="difficulty mt-2">
                                    Difficult Project
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped {{ getProgressBarColor($project->difficult) }}"
                                        role="progressbar" style="width: {{ $project->difficult }}%"
                                        aria-valuenow="{{ $project->difficult }}" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <div class="row">
                                    @php
                                        $tools = explode(',', $project->tools);
                                    @endphp
                                    <div class="col">
                                        <div class="icon-tools mt-4">

                                            @foreach ($tools as $item)
                                                @if (strcasecmp($item, 'LARAVEL') === 0)
                                                    <span> <img src="{{ asset('icon/laravel-icon.svg') }}"
                                                            alt="" class="mb-3"></span>
                                                @elseif (strcasecmp($item, 'LARAGON') === 0)
                                                    <span> <img src="{{ asset('icon/laragon.svg') }}" alt=""
                                                            class="mb-3"></span>
                                                @elseif (strcasecmp($item, 'CSS') === 0)
                                                    <span> <img src="{{ asset('icon/css-icon.svg') }}" alt=""
                                                            class="mb-3"></span>
                                                @elseif (strcasecmp($item, 'XAMPP') === 0)
                                                    <span> <img src="{{ asset('icon/xampp.svg') }}" alt=""
                                                            class="mb-3"></span>
                                                @elseif (strcasecmp($item, 'MYSQL') === 0 || strcasecmp($item, 'MYSQLI') === 0)
                                                    <span> <img src="{{ asset('icon/mysql-3.svg') }}" alt=""
                                                            class="mb-3"></span>
                                                @elseif (strcasecmp($item, 'PHP') === 0)
                                                    <span> <img
                                                            src="{{ asset('icon/php-programming-language-icon.svg') }}"
                                                            alt="" class="mb-3"></span>
                                                @elseif (strcasecmp($item, 'BOOTSRAP') === 0)
                                                    <span> <img src="{{ asset('icon/bootstrap-4-icon.svg') }}"
                                                            alt="" class="mb-3"></span>
                                                @elseif (strcasecmp($item, 'CODEIGNITER') === 0)
                                                    <span> <img src="{{ asset('icon/codeigniter-icon.svg') }}"
                                                            alt="" class="mb-3"></span>
                                                @elseif (strcasecmp($item, 'HTML') === 0)
                                                    <span> <img src="{{ asset('icon/html-icon.svg') }}"
                                                            alt="" class="mb-3"></span>
                                                @elseif (strcasecmp($item, 'JQUERY') === 0)
                                                    <span> <img src="{{ asset('icon/jquery.svg') }}" alt=""
                                                            class="mb-3"></span>
                                                @elseif (strcasecmp($item, 'KOTLIN') === 0)
                                                    <span> <img src="{{ asset('icon/kotlin-1.svg') }}" alt=""
                                                            class="mb-3"></span>
                                                @elseif (strcasecmp($item, 'JAVASCRIPT') === 0)
                                                    <span> <img src="{{ asset('icon/logo-javascript.svg') }}"
                                                            alt="" class="mb-3"></span>
                                                @elseif (strcasecmp($item, 'PYTHON') === 0)
                                                    <span> <img src="{{ asset('icon/python-4.svg') }}" alt=""
                                                            class="mb-3"></span>
                                                @elseif (strcasecmp($item, 'VUE') === 0)
                                                    <span> <img src="{{ asset('icon/vue-js-icon.svg') }}"
                                                            alt="" class="mb-3"></span>
                                                @else
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="sale"></div>
                                <div class="d-flex justify-content-between align-items-center my-4">
                                    <div class="text-danger fw-semibold fs-5">Special Offer</div>
                                    <div class="">⭐4.8 / 120 Reviewers</div>
                                </div> --}}
                                {{-- <div class="text-muted fw-semibold mb-3">Start From</div>
                                <div class="d-inline-block mb-5">
                                    <span class="fw-semibold fs-4">Rp.</span>
                                    @php
                                        $price = number_format($project->price, 0, ',', '.');
                                        $parts = explode(',', $price);
                                        $thousands = $parts[0];
                                        $lastThreeDigits = isset($parts[1]) ? substr($parts[1], 0, 3) : '';
                                    @endphp
                                    <span class="fw-semibold fs-2">{{ $thousands }}.</span>
                                    <span class="fw-semibold fs-4">{{ $lastThreeDigits }}</span>
                                </div> --}}


                                {{-- <button class="btn btn-order">Order Now</button> --}}
                                <a class="btn btn-order demo mb-3" target="_blank" href="{{ $project->demo_link }}">
                                    Demo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="header-tools">
                    <h3 class="h4 fw-semibold">Description</h3>
                </div>
                {{-- <div class="row">
                    @php
                        $tools = explode(',', $project->tools);
                    @endphp
                    <div class="col-4">
                        <div class="icon-tools mt-4">

                            @foreach ($tools as $item)
                                @if (strcasecmp($item, 'LARAVEL') === 0)
                                    <span> <img src="{{ asset('icon/laravel-icon.svg') }}" alt=""
                                            class="mb-3"></span>
                                @elseif (strcasecmp($item, 'LARAGON') === 0)
                                    <span> <img src="{{ asset('icon/laragon.svg') }}" alt=""
                                            class="mb-3"></span>
                                @elseif (strcasecmp($item, 'CSS') === 0)
                                    <span> <img src="{{ asset('icon/css-icon.svg') }}" alt=""
                                            class="mb-3"></span>
                                @elseif (strcasecmp($item, 'XAMPP') === 0)
                                    <span> <img src="{{ asset('icon/xampp.svg') }}" alt=""
                                            class="mb-3"></span>
                                @elseif (strcasecmp($item, 'MYSQL') === 0 || strcasecmp($item, 'MYSQLI') === 0)
                                    <span> <img src="{{ asset('icon/mysql-3.svg') }}" alt=""
                                            class="mb-3"></span>
                                @elseif (strcasecmp($item, 'PHP') === 0)
                                    <span> <img src="{{ asset('icon/php-programming-language-icon.svg') }}"
                                            alt="" class="mb-3"></span>
                                @elseif (strcasecmp($item, 'BOOTSRAP') === 0)
                                    <span> <img src="{{ asset('icon/bootstrap-4-icon.svg') }}" alt=""
                                            class="mb-3"></span>
                                @elseif (strcasecmp($item, 'CODEIGNITER') === 0)
                                    <span> <img src="{{ asset('icon/codeigniter-icon.svg') }}" alt=""
                                            class="mb-3"></span>
                                @elseif (strcasecmp($item, 'HTML') === 0)
                                    <span> <img src="{{ asset('icon/html-icon.svg') }}" alt=""
                                            class="mb-3"></span>
                                @elseif (strcasecmp($item, 'JQUERY') === 0)
                                    <span> <img src="{{ asset('icon/jquery.svg') }}" alt=""
                                            class="mb-3"></span>
                                @elseif (strcasecmp($item, 'KOTLIN') === 0)
                                    <span> <img src="{{ asset('icon/kotlin-1.svg') }}" alt=""
                                            class="mb-3"></span>
                                @elseif (strcasecmp($item, 'JAVASCRIPT') === 0)
                                    <span> <img src="{{ asset('icon/logo-javascript.svg') }}" alt=""
                                            class="mb-3"></span>
                                @elseif (strcasecmp($item, 'PYTHON') === 0)
                                    <span> <img src="{{ asset('icon/python-4.svg') }}" alt=""
                                            class="mb-3"></span>
                                @elseif (strcasecmp($item, 'VUE') === 0)
                                    <span> <img src="{{ asset('icon/vue-js-icon.svg') }}" alt=""
                                            class="mb-3"></span>
                                @else
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div> --}}



            </div>

            <div class="container mt-2 article mb-5">
                <div class="row">
                    <div class="col-8">
                        <hr>
                    </div>
                    <div class="col-8 mt-2">
                        <p>
                            {!! $project->body !!}
                        </p>
                    </div>
                </div>
            </div>

        </section>

    </main>
    @include('frontend.layouts.footer')
    <script>
        function changeMainImage(imageSrc) {
            document.getElementById('main-image').src = imageSrc;
        }
    </script>
    <!-- script -->
    <script src="{{ asset('assets-frontend/vendor/bootstrap-5/js/bootstrap.bundle.js') }}"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
