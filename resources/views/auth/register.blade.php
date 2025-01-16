<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register - MyTani</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="{{ url('/') }}" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="">
                                    <span class="d-none d-lg-block">MyTani</span>
                                </a>
                            </div>

                            <div class="card mb-3">
                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create an account
                                        </p>
                                    </div>

                                    <!-- Form -->
                                    <form method="POST" action="{{ route('register') }}"
                                        class="row g-3 needs-validation">
                                        @csrf
                                        <div class="col-12">
                                            <label for="name" class="form-label">Your Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                value="{{ old('name') }}" required>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="email" class="form-label">Your Email</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                value="{{ old('email') }}" required>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                required>
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="password_confirmation" class="form-label">Confirm
                                                Password</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="password_confirmation" required>
                                            @error('password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a
                                                    href="{{ route('login') }}">Log in</a></p>
                                            <p class="small mb-0">Are you a seller? <a
                                                    href="{{ route('register.seller') }}">Register</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
