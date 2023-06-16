<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <title>Skiddie Official</title>
</head>

<body>
    <main>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent navbar-skiddie">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img width="150" src="{{ asset('assets-backend/src/images/skiddie.png') }}" alt="">
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                            <a class="nav-link" href="#">Team</a>
                            <a class="nav-link" href="#">Project</a>
                            <a class="nav-link" href="#">Article</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <section class="section-header-skiddie p-2">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6 mt-3 mt-lg-4 order-2 order-lg-1">
                        <div class="text-header-header text-center text-lg-start text-center text-lg-start mt-4 ">
                            <h3 class="h1" data-aos="fade-right" data-aos-duration="2000">Solution <span
                                    class="text-primary" data-aos="fade-right" data-aos-duration="2000">Project</span>
                            </h3>
                            <h3 class="h1 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="2000">Develop anything
                            </h3>
                            <p class="mt-3" data-aos="fade-right" data-aos-duration="2000">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam fugit soluta minus
                                mollitia
                                accusamus a consequuntur qui ipsa architecto necessitatibus?
                            </p>
                        </div>
                        <div class="d-flex justify-content-center justify-content-lg-start" data-aos="fade-right"
                            data-aos-duration="2000">
                            <button class="btn btn-skiddie py-2 px-4 my-3">
                                View All
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3 mt-lg-1 order-1 order-lg-2">
                        <img src="{{ asset('assets-frontend/images/header.svg') }}" alt="header" class="w-100"
                            data-aos="fade-down" data-aos-duration="2000">
                    </div>
                </div>
            </div>
        </section>

        <div class="title-our-team">
            <div class="container">
                <div class="row">
                    <h2>Our Team</h2>
                </div>
            </div>
        </div>

        <section class="section-our-team p-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active mb-5">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-4">
                                            <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                                class="d-block w-100" alt="dedi rosandi">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="text-header mt-3 mt-lg-0">
                                                Dedi Rosandi
                                            </div>
                                            <div class="underlined-custom"></div>
                                            <div class="text-slug">
                                                Back-End Web Developer
                                            </div>
                                            <div class="text-content">
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo eveniet
                                                velit incidunt mollitia
                                                error possimus repellat, temporibus minima eaque, neque harum
                                                consequuntur esse exercitationem
                                                corporis vitae atque in! Illum ratione est iusto assumenda eius
                                                laudantium ex magnam cupiditate
                                                facere itaque, minus sed omnis aliquid ut voluptatem libero, reiciendis
                                                nam in.
                                            </div>
                                            <div class="text-content">
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo eveniet
                                                velit incidunt mollitia
                                                error possimus repellat, temporibus minima eaque, neque harum
                                                consequuntur esse exercitationem
                                                corporis vitae atque in! Illum ratione est iusto assumenda eius
                                                laudantium ex magnam cupiditate
                                                facere itaque, minus sed omnis aliquid ut voluptatem libero, reiciendis
                                                nam in.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item mb-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                                class="d-block w-100" alt="dedi rosandi">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="text-header mt-3 mt-lg-0">
                                                Dedi Rosandi
                                            </div>
                                            <div class="underlined-custom"></div>
                                            <div class="text-slug">
                                                Back-End Web Developer
                                            </div>
                                            <div class="text-content">
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo eveniet
                                                velit incidunt mollitia
                                                error possimus repellat, temporibus minima eaque, neque harum
                                                consequuntur esse exercitationem
                                                corporis vitae atque in! Illum ratione est iusto assumenda eius
                                                laudantium ex magnam cupiditate
                                                facere itaque, minus sed omnis aliquid ut voluptatem libero, reiciendis
                                                nam in.
                                            </div>
                                            <div class="text-content">
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo eveniet
                                                velit incidunt mollitia
                                                error possimus repellat, temporibus minima eaque, neque harum
                                                consequuntur esse exercitationem
                                                corporis vitae atque in! Illum ratione est iusto assumenda eius
                                                laudantium ex magnam cupiditate
                                                facere itaque, minus sed omnis aliquid ut voluptatem libero, reiciendis
                                                nam in.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item mb-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                                class="d-block w-100" alt="dedi rosandi">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="text-header mt-3 mt-lg-0">
                                                Dedi Rosandi
                                            </div>
                                            <div class="underlined-custom"></div>
                                            <div class="text-slug">
                                                Back-End Web Developer
                                            </div>
                                            <div class="text-content">
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo eveniet
                                                velit incidunt mollitia
                                                error possimus repellat, temporibus minima eaque, neque harum
                                                consequuntur esse exercitationem
                                                corporis vitae atque in! Illum ratione est iusto assumenda eius
                                                laudantium ex magnam cupiditate
                                                facere itaque, minus sed omnis aliquid ut voluptatem libero, reiciendis
                                                nam in.
                                            </div>
                                            <div class="text-content">
                                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo eveniet
                                                velit incidunt mollitia
                                                error possimus repellat, temporibus minima eaque, neque harum
                                                consequuntur esse exercitationem
                                                corporis vitae atque in! Illum ratione est iusto assumenda eius
                                                laudantium ex magnam cupiditate
                                                facere itaque, minus sed omnis aliquid ut voluptatem libero, reiciendis
                                                nam in.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </section>

        <section class="section-our-project">
            <div class="header-text-project">
                <h3 class="h2 text-center">Our Project</h3>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-lg-4">
                        <div class="card-custom">
                            <div class="card-heading">
                                Project Team
                            </div>
                            <div class="team mb-3">
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                            </div>

                            <div class="image-project mb-2">
                                <img src="{{ asset('assets-frontend/images/banner.png') }}" alt="dedirosandi"
                                    class="img-fluid">
                            </div>

                            <div class="title mt-4">
                                <h3>Sistem Informasi Warga RT RW NET</h3>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="difficulty mt-2">
                                        Difficult Project
                                    </div>
                                    <div class="rating">
                                        <span>
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4 mb-3">
                                <a href="detail.html" class="btn btn-sm btn-project">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="card-custom">
                            <div class="card-heading">
                                Project Team
                            </div>
                            <div class="team mb-3">
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                            </div>

                            <div class="image-project mb-2">
                                <img src="{{ asset('assets-frontend/images/banner.png') }}" alt="dedirosandi"
                                    class="img-fluid">
                            </div>

                            <div class="title mt-4">
                                <h3>Sistem Informasi Warga RT RW NET</h3>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="difficulty mt-2">
                                        Difficult Project
                                    </div>
                                    <div class="rating">
                                        <span>
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4 mb-3">
                                <button class="btn btn-sm btn-project">Selengkapnya</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="card-custom">
                            <div class="card-heading">
                                Project Team
                            </div>
                            <div class="team mb-3">
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                            </div>

                            <div class="image-project mb-2">
                                <img src="{{ asset('assets-frontend/images/banner.png') }}" alt="dedirosandi"
                                    class="img-fluid">
                            </div>

                            <div class="title mt-4">
                                <h3>Sistem Informasi Warga RT RW NET</h3>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="difficulty mt-2">
                                        Difficult Project
                                    </div>
                                    <div class="rating">
                                        <span>
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4 mb-3">
                                <button class="btn btn-sm btn-project">Selengkapnya</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="card-custom">
                            <div class="card-heading">
                                Project Team
                            </div>
                            <div class="team mb-3">
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                            </div>

                            <div class="image-project mb-2">
                                <img src="{{ asset('assets-frontend/images/banner.png') }}" alt="dedirosandi"
                                    class="img-fluid">
                            </div>

                            <div class="title mt-4">
                                <h3>Sistem Informasi Warga RT RW NET</h3>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="difficulty mt-2">
                                        Difficult Project
                                    </div>
                                    <div class="rating">
                                        <span>
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4 mb-3">
                                <button class="btn btn-sm btn-project">Selengkapnya</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="card-custom">
                            <div class="card-heading">
                                Project Team
                            </div>
                            <div class="team mb-3">
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                            </div>

                            <div class="image-project mb-2">
                                <img src="{{ asset('assets-frontend/images/banner.png') }}" alt="dedirosandi"
                                    class="img-fluid">
                            </div>

                            <div class="title mt-4">
                                <h3>Sistem Informasi Warga RT RW NET</h3>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="difficulty mt-2">
                                        Difficult Project
                                    </div>
                                    <div class="rating">
                                        <span>
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4 mb-3">
                                <button class="btn btn-sm btn-project">Selengkapnya</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="card-custom">
                            <div class="card-heading">
                                Project Team
                            </div>
                            <div class="team mb-3">
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                                <div class="img-team-card">
                                    <img src="{{ asset('assets-frontend/images/dedirosandi.jpeg') }}"
                                        alt="dedirosandi" class="img-fluid">
                                </div>
                            </div>

                            <div class="image-project mb-2">
                                <img src="{{ asset('assets-frontend/images/banner.png') }}" alt="dedirosandi"
                                    class="img-fluid">
                            </div>

                            <div class="title mt-4">
                                <h3>Sistem Informasi Warga RT RW NET</h3>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="difficulty mt-2">
                                        Difficult Project
                                    </div>
                                    <div class="rating">
                                        <span>
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                            <img src="{{ asset('assets-frontend/images/star.png') }}" alt="rating"
                                                class="img-rating">
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4 mb-3">
                                <button class="btn btn-sm btn-project">Selengkapnya</button>
                            </div>
                        </div>
                    </div>
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

                        <div class="col-sm-6 col-lg-4 mt-5">
                            <div class="card-custom-article">
                                <div class="category">Kategori Artikel</div>
                                <div class="img-artikel-card">
                                    <img src="{{ asset('assets-frontend/images/artikel-1.png') }}" alt="artikel"
                                        class="img-fluid rounded-4">
                                </div>
                                <div class="author my-3">
                                    <span>Abyghails, 1 Februari 2023</span>
                                </div>
                                <div class="title-artikel">
                                    <h3>Cara menjadi Programmer mudah di era Digital</h3>
                                </div>
                                <div class="content-highlight mt-3">
                                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Tenetur
                                        officiis debitis
                                        inventore deleniti
                                        iste laborum quisquam, libero excepturi est officia?</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

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


        <footer class="section-footer p-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <p>&copy; 2023 Skiddie Official. All rights reserved.</p>
                    </div>

                </div>
            </div>
        </footer>
    </main>

    <!-- script -->
    <script src="{{ asset('assets-frontend/vendor/bootstrap-5/js/bootstrap.bundle.js') }}"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
