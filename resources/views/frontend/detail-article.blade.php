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
    <script id="dsq-count-scr" src="//skiddie-id.disqus.com/count.js" async></script>
    <meta name="keywords"
        content="pengembangan aplikasi, desain aplikasi, solusi teknologi, layanan pengembangan web, pengembangan aplikasi mobile, aplikasi kustom, inovasi teknologi, keamanan aplikasi, UI/UX desain, pengalaman pengguna, manajemen proyek teknologi, integrasi sistem, optimalisasi kinerja aplikasi, pemeliharaan aplikasi, analisis kebutuhan aplikasi">
    <meta name="robots" content="index,follow">
    <meta property="og:image" content="{{ asset('storage/' . $article->thumbnail) }}">
    <meta name="description" content="{!! strip_tags($article->body) !!}">
    <meta name="author" content="{{ $article->user->name }}">
    <title>Skiddie ID - Dev Apps - {{ $article->title }} </title>
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
                </div>
            </nav>
        </div>
        <section class="section-detail-project">
            <div class="container">
                <h3 class="h4 text-bold"> {{ $article->title }} </h3>
                <div class="item-header mt-2">
                    Category : <span class="icon-item badge bg-danger">
                        {{ $article->category }}
                    </span>
                </div>
            </div>

            <div class="container mt-2">
                <div class="header-detail">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-custom">
                                        <img id="main-image" src="{{ asset('storage/' . $article->thumbnail) }}"
                                            alt="" class="img-fluid rounded-5">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-3 d-none d-lg-block">
                            <div class="card card-custom card-sale">
                                <div class="difficulty mt-2 mb-3">
                                    Recent Post
                                </div>
                                @foreach ($all_article as $article)
                                    <a style="text-decoration: none;color:inherit"
                                        href="">{!! Str::limit(html_entity_decode(strip_tags($article->title)), 15) !!}...</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-2 article mb-5">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-8 mt-2">
                        <p>
                            {!! $article->body !!}
                        </p>
                        <div id="disqus_thread"></div>
                    </div>
                </div>

            </div>

        </section>

    </main>
    @include('frontend.layouts.footer')
    <!-- script -->
    <script src="{{ asset('assets-frontend/vendor/bootstrap-5/js/bootstrap.bundle.js') }}"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');
            s.src = 'https://skiddie-id.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
</body>

</html>
