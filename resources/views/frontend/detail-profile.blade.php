<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Fots -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/' . $username->profile_picture) }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/' . $username->profile_picture) }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/' . $username->profile_picture) }}" />
    <!-- Remixicon Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Remixicon Icon -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Main CSS -->
    <link href="{{ asset('assets-profile/css/main.css') }}" rel="stylesheet">

    <meta name="robots" content="index,follow">
    <meta property="og:image" content="{{ asset('storage/' . $username->profile_picture) }}">
    <link rel="canonical" href="https://skiddie.id/{{ $username->username }}">
    <meta name="description" content="{!! strip_tags($username->description) !!}">
    <meta name="author" content="{{ $username->name }}">
    <title>{{ $username->name }} </title>
</head>

<body>

    <!-- header -->
    <header class="ds-header" id="site-header">
        <div class="container">
            <div class="ds-header-inner">
                <!-- logo -->
                <a href="{{ $username->username }}" class="ds-logo">
                    <span>{{ substr($username->name, 0, 1) }}</span>{{ $username->name }}
                </a>
                <!-- logo -->
                <!-- social -->
                <ul class="ds-social">
                    <li><a href="{{ $username->linkedin }}" target="_blank"><i class="ri-linkedin-fill"></i></a></li>
                </ul>
                <!-- social -->
            </div>
        </div>
    </header>
    <!-- header -->
    <!-- banner -->
    <div class="ds-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                    <figure>
                        <img class="rounded-circle" src="{{ asset('storage/' . $username->profile_picture) }}">
                    </figure>
                </div>
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
                    <section>
                        <h1>
                            <span>HI THERE</span>
                            I’m {{ $username->name }} <br> As a {{ $username->as }} at Skiddie ID, based in Indonesia.
                        </h1>
                        {{-- <ul class="ds-numbervalulist">
                            <li>
                                <strong>6+</strong>
                                <span>Experience</span>
                            </li>
                            <li>
                                <strong>89</strong>
                                <span>Projects</span>
                            </li>
                            <li>
                                <strong>52</strong>
                                <span>Happy Clients</span>
                            </li>
                        </ul> --}}
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- banner -->

    <!-- about -->
    <div class="ds-about-section mt-5">
        <div class="container">
            <section>
                <h2 class="ds-heading">About Me</h2>
                <p>{{ $username->description }}</p>
                {{-- <div class="ds-button-sec text-center">
                    <a href="#" class="ds-button">Download Resume</a>
                </div> --}}
            </section>
        </div>
    </div>
    <!-- about -->

    <!--  Skills -->
    {{-- <div class="ds-skills-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <h2 class="ds-heading">Core Skills</h2>
                    <ul class="ds-skills-list">
                        <li>JavaScript</li>
                        <li>Node.js</li>
                        <li>Express.js</li>
                        <li>MongoDB</li>
                        <li>Vue.js</li>
                        <li>React</li>
                        <li>Sequelize</li>
                        <li>Github</li>
                        <li>HTML</li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <h2 class="ds-heading">Other Skills</h2>
                    <ul class="ds-skills-list">
                        <li>Storyblok</li>
                        <li>PWAs</li>
                        <li>Responsive Web Design</li>
                        <li>React</li>
                        <li>Vuetify</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
    <!--  Skills -->

    <!-- Experience -->
    {{-- <div class="ds-experience-section">
        <div class="container">
            <h2 class="ds-heading">Work Experience</h2>
            <div class="row ds-experience-list">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <section>
                        <span class="ds-year">2019 - Present</span>
                        <h3 class="ds-officename">Matrix Media Inc</h3>
                        <span class="ds-department">Full Stack developer</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis sem maximus, ornare metus
                            ut, congue enim. Sed fermentum.</p>
                        <ul>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis sem maximus, ornare
                                metus ut.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        </ul>
                    </section>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <section>
                        <span class="ds-year">2018 - 2019</span>
                        <h3 class="ds-officename">Lexind</h3>
                        <span class="ds-department">Senior app developer</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis sem maximus, ornare metus
                            ut, congue enim. Sed fermentum.</p>
                        <ul>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis sem maximus, ornare
                                metus ut.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis sem maximus, ornare
                                metus ut.</li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Experience -->

    <!--  Work -->
    <div class="ds-work-section">
        <div class="container">
            <h2 class="ds-heading">Latest works</h2>
            <div class="ds-work-list-section">
                @foreach ($projects as $project)
                    <div class="ds-work-list">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
                                <section>
                                    <h3 class="ds-work-tilte"> {{ $project->name }} </h3>
                                    <p>{!! substr($project->body, 0, 300) !!}...</p>
                                    <a href="detail-project/{{ $project->slug }}" class="ds-button">Details</a>
                                </section>
                            </div>
                            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                                @foreach ($project->project_images as $index => $image)
                                    @if ($index == 0)
                                        <figure><img src="{{ asset('storage/' . $image->image) }}"></figure>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--  Work -->

    <!--  footer -->
    <footer class="ds-footer text-center">
        <div class="container">
            <section>
                <span>Stay in touch</span>
                <h4>Ready to talk?</h4>
                <p>Feel free to contact us</p>
                <a href="mailto:{{ $username->email }}" class="ds-button">Lets Talk</a>
            </section>
            {{-- <span class="ds-copyright">© 2022 All rights reserved. Free minimal bootstrap template by <a
                    href="https://designstub.com/" target="_blank">Designstub</a>.</span> --}}
        </div>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
    <script src="{{ asset('assets-profile/js/main.js') }}"></script>
</body>

</html>
