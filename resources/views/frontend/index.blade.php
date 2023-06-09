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
                            <a class="btn btn-skiddie py-2 px-4 my-3" href="mailto:{{ $abouts->contact }}">Contact
                                Me</a>
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
                                                    {{ $team->name }} <a href=""><i
                                                            class="bi bi-envelope"></i></a>
                                                </div>
                                                <div class="underlined-custom"></div>
                                                <div class="text-slug">
                                                    {{ $team->as }}
                                                </div>
                                                <div class="text-content">
                                                    {{ $team->description }}
                                                </div>
                                                <!-- Tambahkan konten lain yang diinginkan -->
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
                                            <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                                alt="{{ $user->name }}" class="img-fluid">
                                        </div>
                                    @endforeach
                                </div>
                                @foreach ($project->project_images as $index => $image)
                                    @if ($index == 0)
                                        <div class="image-project mb-2">
                                            <img src="{{ asset('storage/' . $image->image) }}" alt="dedirosandi"
                                                class="img-fluid rounded-4">
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

        {{-- <section class="section-artikel justify-content-center">
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
                                        <h3>{{ $article->title }}</h3>
                                    </div>
                                    <div class="content-highlight mt-3">
                                        <p class="text-muted">{!! Str::limit(html_entity_decode(strip_tags($article->body)), 200) !!}...</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </section> --}}

        {{-- <section class="section-contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Contact Us</h2>
                        <p>Get in touch with us for any inquiries or feedback.</p>
                        <form>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" placeholder="Your Name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" placeholder="Your Email"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" class="form-control" rows="5" placeholder="Your Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h2>Our Location</h2>
                        <p>123 Street, City, Country</p>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63447.48875029023!2d106.69789218959866!3d-6.3333591668200295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ef9a6f1af8f5%3A0xb6ca921381564bdc!2sPamulang%2C%20South%20Tangerang%20City%2C%20Banten!5e0!3m2!1sen!2sid!4v1686948471213!5m2!1sen!2sid"
                            width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section> --}}


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
