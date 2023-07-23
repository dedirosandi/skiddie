<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light navbar-skiddie fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img width="100" src="{{ asset('assets-backend/src/images/skiddie.png') }}" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @if (!Request::is('detail-project/*'))
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="#team">Our Team</a>
                        <a class="nav-link" href="#project">Our Project</a>
                        <a class="nav-link" href="#service">Our Service</a>
                    </div>
                </div>
            @endif
        </div>
    </nav>
</div>
