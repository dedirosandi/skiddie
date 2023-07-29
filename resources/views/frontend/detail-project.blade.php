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
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9332769907105662"
        crossorigin="anonymous"></script>

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

                    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
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
@endif -->
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
                    <!--  -->
                    <div class="row">
                    <div class="col-lg-8" data-aos="zoom-in">
                        @php
                                $firstImage = true;
                            @endphp
                            @foreach ($project->project_images as $index => $image)
                                @if ($index == 0)
                            <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-100 main-image"
                                alt="" />
                                @else
                                 <div class="d-none">
                                        @php
                                            $firstImage = false;
                                        @endphp
                                    </div>
                                @endif
                            @endforeach
                       
                    </div>
                    <div class="col-lg-2">
                        <div class="row">
                            <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos"
                                :key="photo.id" data-aos="zoom-in" data-aos-delay="100">
                                <a href="#" @click="changeActive(index)">
                                    <img :src="photo.url" class="w-100 thumbnail-image"
                                        :class="{ active: index == activePhoto }" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                    <!--  -->
                    <div class="row">
                        <div class="col-lg-8">
                            @php
                                $firstImage = true;
                            @endphp
                            @foreach ($project->project_images as $index => $image)
                                @if ($index == 0)
                                    <div class="row">
                                        <div class="col-3 col-lg-12 mt-2 mt-lg-0">
                                            <img id="main-image" src="{{ asset('storage/' . $image->image) }}"
                                                alt="" class="img-fluid rounded-5">
                                        </div>
                                    </div>
                                @else
                                    <div class="d-none">
                                        @php
                                            $firstImage = false;
                                        @endphp
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-3 col-lg-12 mt-2 mt-lg-0">
                                    @foreach ($project->project_images as $image)
                                        <img src="{{ asset('storage/' . $image->image) }}" alt=""
                                            class="img-fluid rounded-5 py-1 px-1 w-100"
                                            onclick="changeMainImage('{{ asset('storage/' . $image->image) }}')"
                                            @if ($firstImage) id="main-image"
                                                        @php
                                                        $firstImage = false;
                                                         @endphp @endif>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="header-tools">
                    <h3 class="h4 fw-semibold">Description</h3>
                </div>
            </div>

            <div class="container mt-2 article mb-5">
                <div class="row">
                    <div class="col-8">
                        <hr>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-8 mt-2 mt-2">
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
