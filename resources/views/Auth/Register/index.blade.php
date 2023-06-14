<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regsiter - Skiddie</title>
    <link rel="stylesheet" href="assets-auth/css/main/app.css">
    <link rel="stylesheet" href="assets-auth/css/pages/auth.css">
    <link rel="shortcut icon" href="assets-auth/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets-auth/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="assets-auth/images/logo/logo.svg" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Register.</h1>
                    <form action="/register" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <input type="text" name="name"
                                class="form-control form-control-xl @error('name')
                                is-invalid
                            @enderror"
                                placeholder="Name" required value="{{ old('name') }}">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <input type="text" name="username"
                                class="form-control form-control-xl @error('username')
                            is-invalid
                        @enderror"
                                placeholder="Username" required value="{{ old('username') }}">
                            @error('username')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <input type="email" name="email"
                                class="form-control form-control-xl @error('email')
                            is-invalid
                        @enderror"
                                placeholder="E-mail" required value="{{ old('email') }}">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" name="password"
                                class="form-control form-control-xl @error('password')
                            is-invalid
                        @enderror"
                                placeholder="Password" required>
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <input type="text" name="as"
                                class="form-control form-control-xl @error('as')
                            is-invalid
                        @enderror"
                                placeholder="Web Developer" required>
                            @error('as')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <input type="text" name="description"
                                class="form-control form-control-xl @error('description')
                            is-invalid
                        @enderror"
                                placeholder="Description" required>
                            @error('description')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <input type="file" name="profile_picture"
                                class="form-control form-control-xl @error('profile_picture')
                            is-invalid
                        @enderror"
                                required>
                            @error('profile_picture')
                                {{ $message }}
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Regsiter Now</button>
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
