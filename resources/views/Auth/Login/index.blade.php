<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Skiddie</title>
    <link rel="stylesheet" href="{{ asset('assets-auth/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-auth/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets-auth/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets-auth/images/logo/favicon.png') }}" type="image/png">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{ asset('assets-auth/images/skiddie.png') }}" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    @if (session()->has('success'))
                        {{ session('success') }}
                    @endif
                    @if (session()->has('LoginErrors'))
                        {{ session('LoginErrors') }}
                    @endif
                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <input type="text" name="username"
                                class="form-control form-control-xl @error('username')
                            is-invalid
                        @enderror "
                                placeholder="Username" required value="{{ old('username') }}">
                            @error('username')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" name="password" class="form-control form-control-xl"
                                placeholder="Password" required>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Login Now</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>
