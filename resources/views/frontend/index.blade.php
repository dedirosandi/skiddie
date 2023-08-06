<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets-backend/src/images/skiddie.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets-backend/src/images/skiddie.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets-backend/src/images/skiddie.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets-frontend/vendor/bootstrap-5/css/bootstrap.css') }}">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9332769907105662"
        crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="{{ asset('assets-frontend/vendor/jquery/jquery.js') }}"></script>
    <style>
        .zoom {
            transition: transform .2s;
            /* Animation */

            margin: 0 auto;
        }

        .zoom:hover {
            transform: scale(1.1);
            /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    </style>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets-frontend/src/css/style.css') }}">
    <meta name="keywords"
        content="pengembangan aplikasi, desain aplikasi, solusi teknologi, layanan pengembangan web, pengembangan aplikasi mobile, aplikasi kustom, inovasi teknologi, keamanan aplikasi, UI/UX desain, pengalaman pengguna, manajemen proyek teknologi, integrasi sistem, optimalisasi kinerja aplikasi, pemeliharaan aplikasi, analisis kebutuhan aplikasi">

    <meta name="robots" content="index,follow">
    <meta property="og:image" content="{{ asset('storage/' . $abouts->thumbnail) }}">

    <link rel="canonical" href="https://skiddie.id">
    <meta name="description" content="{!! strip_tags($abouts->description) !!}">
    <meta name="author" content="@foreach ($teams as $team){{ $team->name }}, @endforeach">

    <title>Skiddie ID - Dev Apps</title>
</head>

<body>
    <main>
        @include('frontend.layouts.navbar')

        <section class="section-header-skiddie p-2">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6 mt-3 mt-lg-4 order-2 order-lg-1">
                        <div class="text-header-header text-center text-lg-start text-center text-lg-start mt-4 ">
                            @php
                                $titleParts = explode(' ', $abouts->title);
                            @endphp
                            <h3 class="h1" data-aos="fade-right" data-aos-duration="2000">
                                {{ $titleParts[0] }} <span class="text-primary" data-aos="fade-right"
                                    data-aos-duration="2000">{{ $titleParts[1] }}</span>
                            </h3>
                            <h3 class="h1 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="2000">
                                {{ $titleParts[2] }} {{ $titleParts[3] }}</h3>

                            <p class="mt-3" data-aos="fade-right" data-aos-duration="2000">
                                {!! $abouts->description !!}
                            </p>
                        </div>
                        <div class="d-flex justify-content-center justify-content-lg-start" data-aos="fade-right"
                            data-aos-duration="2000">
                            <a class="btn btn-skiddie py-2 px-4 my-3" href="#contact-us">Contact
                                Us</a>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3 mt-lg-1 order-1 order-lg-2">
                        <img src="{{ asset('storage/' . $abouts->thumbnail) }}" alt="header" class="w-100"
                            data-aos="fade-down" data-aos-duration="2000">
                    </div>
                </div>
            </div>
        </section>

        <div class="title-our-team" id="team">
            <div class="container">
                <div class="row">
                    <h2>Our Team</h2>
                </div>
            </div>
        </div>

        <section class="section-our-team p-4" id="team">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach ($teams as $index => $team)
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="{{ $index }}"
                                        class="{{ $index == 0 ? 'active' : '' }}"
                                        aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                                        aria-label="Slide {{ $index + 1 }}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach ($teams as $index => $team)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }} mb-5">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-4">
                                                <img src="{{ asset('storage/' . $team->profile_picture) }}"
                                                    class="d-block w-100" alt="{{ $team->name }}">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="text-header mt-3 mt-lg-0">
                                                    <a href="{{ $team->username }}"
                                                        style="text-decoration: none; color: #ffffff;">{{ $team->name }}</a>
                                                </div>
                                                <div class="underlined-custom"></div>
                                                <div class="text-slug">
                                                    {{ $team->as }}
                                                </div>
                                                <div class="text-content">
                                                    {{ $team->description }}
                                                    <div class="mt-3">
                                                        <a style="text-decoration: none;color: #ffffff;"
                                                            href="{{ $team->linkedin }}" target="_blank">
                                                            <i class="fab fa-linkedin fa-2x"></i>
                                                        </a>
                                                        <a style="text-decoration: none; color: #ffffff;"
                                                            href="mailto:{{ $team->email }}">
                                                            <i class="fas fa-envelope fa-2x"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            </div>

        </section>

        <section class="section-artikel justify-content-center" id="service">
            <div class="title text-center">
                <h3>Our Services</h3>
            </div>

            <div class="artikel">
                <div class="container">
                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-sm-6 col-lg-4 mt-5">
                                <div class="card-custom-article">
                                    <div class="img-artikel-card">
                                        <img src="{{ asset('storage/' . $service->thumbnail) }}" alt="artikel"
                                            class="img-fluid rounded-4 zoom">
                                    </div>
                                    <div class="title-artikel mt-3">
                                        <h3>{{ $service->title }}</h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </section>


        <section class="section-our-project" id="project">
            <div class="header-text-project">
                <h3 class="h2 text-center">Our Project</h3>
            </div>
            <div class="container">
                <div class="row justify-content-center">
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
                    @foreach ($projects as $project)
                        <div class="col-sm-12 col-lg-4">
                            <div class="card-custom">
                                <div class="card-heading">
                                    Project Team
                                </div>
                                <div class="team mb-3">
                                    @foreach ($project->users as $user)
                                        <div class="img-team-card">

                                            <img class="img-fluid"
                                                src="{{ asset('storage/' . $user->profile_picture) }}"
                                                alt="{{ $user->name }}"
                                                style="max-width: 100%; height: auto; display: block; margin: 0 auto;">
                                        </div>
                                    @endforeach
                                </div>
                                @foreach ($project->project_images as $index => $image)
                                    @if ($index == 0)
                                        <div class="image-project mb-2">
                                            <img src="{{ asset('storage/' . $image->image) }}"
                                                class="img-fluid rounded-4 zoom">
                                        </div>
                                    @endif
                                @endforeach
                                <div class="title mt-4">
                                    <h3> {{ $project->name }} </h3>
                                </div>



                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="difficulty mt-2">
                                            Difficult Project
                                        </div>
                                        <div class="rating">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped {{ getProgressBarColor($project->difficult) }}"
                                                    role="progressbar" style="width: {{ $project->difficult }}%"
                                                    aria-valuenow="{{ $project->difficult }}" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="d-flex justify-content-end mt-4 mb-3">
                                    <a href="/detail-project/{{ $project->slug }}"
                                        class="btn btn-sm btn-project">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <section class="section-artikel justify-content-center">
            <div class="title text-center">
                <h3>Article</h3>
            </div>

            <div class="artikel">
                <div class="container">
                    <div class="row">
                        @foreach ($articles as $article)
                            <div class="col-sm-6 col-lg-4 mt-5">
                                <div class="card-custom-article">
                                    <div class="category"> {{ $article->category }} </div>
                                    <div class="img-artikel-card">
                                        <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="artikel"
                                            class="img-fluid rounded-4">
                                    </div>
                                    <div class="author my-3">
                                        <span>{{ $article->user->name }},
                                            {{ $article->created_at->isoFormat('D MMMM YYYY') }}</span>
                                    </div>
                                    <div class="title-artikel">
                                        <a href="detail-article/{{ $article->slug }}"
                                            style="text-decoration: none; color: inherit;">
                                            <h3>{{ $article->title }}</h3>
                                        </a>
                                    </div>
                                    <div class="content-highlight mt-3">
                                        <p class="text-muted">{!! Str::limit(html_entity_decode(strip_tags($article->body)), 150) !!}...</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </section>
        <hr class="my-4">
        <section class="section-contact" id="contact-us">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Contact Us</h2>
                        <p>Contact us for cooperation.</p>
                        @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                        @elseif (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <form action="/contact/send" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Your Email" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="whatsapp">Whatsapp</label>
                                        <input type="number" name="whatsapp" id="whatsapp" class="form-control"
                                            placeholder="Your Whatsapp" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" name="message" class="form-control" rows="5" placeholder="Your Message" required></textarea>
                            </div>
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LdUAXEnAAAAAGEY2LkCyNK58r8kDOMLqK4ebkaN">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h2>Our Location</h2>
                        <p>Tangerang Selatan, Indonesia</p>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63447.48875029023!2d106.69789218959866!3d-6.3333591668200295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ef9a6f1af8f5%3A0xb6ca921381564bdc!2sPamulang%2C%20South%20Tangerang%20City%2C%20Banten!5e0!3m2!1sen!2sid!4v1686948471213!5m2!1sen!2sid"
                            width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section>


    </main>
    <footer class="section-footer p-3 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <p>&copy; 2023 Skiddie Official. All rights reserved.</p>
                </div>

            </div>
        </div>
    </footer>

    <!-- script -->
    <script src="{{ asset('assets-frontend/vendor/bootstrap-5/js/bootstrap.bundle.js') }}"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var myCarousel = document.getElementById("carouselExampleIndicators");
            var carousel = new bootstrap.Carousel(myCarousel, {
                interval: 3000, // Waktu tampilan per slide (ms)
                pause: "hover", // Jeda ketika di hover (true/false)
                wrap: true // Putar ulang secara otomatis setelah mencapai slide terakhir (true/false)
            });
        });
    </script>

</body>

</html>
