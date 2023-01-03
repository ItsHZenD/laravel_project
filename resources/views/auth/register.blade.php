<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

<head>
    <meta charset="utf-8" />
    <title>Register | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="{{ asset('js/hyper-config.jss') }}"></script>

    <!-- App css -->
    <link href="{{ asset('css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg pb-0">

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="card-body d-flex flex-column h-100 gap-3">

                <!-- Logo -->
                <div class="auth-brand text-center text-lg-start">
                    <a href="index.html" class="logo-dark">
                        <span><img src="assets/images/logo-dark.png" alt="dark logo" height="22"></span>
                    </a>
                    <a href="index.html" class="logo-light">
                        <span><img src="assets/images/logo.png" alt="logo" height="22"></span>
                    </a>
                </div>

                <div class="my-auto">
                    <!-- title-->
                    <h4 class="mt-3">Free Sign Up</h4>
                    <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute
                    </p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- form -->
                    <form action="{{ route('registering') }}" method="post">
                        @csrf
                        @auth
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input class="form-control" type="text" disabled value="{{ Auth::user()->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input class="form-control" type="email" disabled value="{{ Auth::user()->email }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Avatar</label>
                                <img src="{{ Auth::user()->avatar }}" class="rounded-circle" width="64"
                                    style="border: 1px solid">
                            </div>
                        @endauth

                        @guest

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input class="form-control" type="text" id="name" placeholder="Enter your name"
                                    required name="name">
                            </div>
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" type="email" id="emailaddress" required
                                    placeholder="Enter your email" name="email">
                            </div>

                        @endguest
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" required id="password"
                                placeholder="Enter your password" name="password">
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input type="radio" id="applicant" name="role" class="form-check-input"
                                    value="1" checked>
                                <label class="form-check-label" for="applicant">Applicant</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="hr" name="role" class="form-check-input"
                                    value="2">
                                <label class="form-check-label" for="applicant">HR</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                <label class="form-check-label" for="checkbox-signup">I accept <a
                                        href="javascript: void(0);" class="text-muted">Terms and
                                        Conditions</a></label>
                            </div>
                        </div>
                        <div class="mb-0 d-grid text-center">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-account-circle"></i>
                                Sign Up </button>
                        </div>
                        <!-- social-->
                        <div class="text-center mt-4">
                            <p class="text-muted font-16">Sign up using</p>
                            <ul class="social-list list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="{{ route('auth.redirect', 'github') }}"
                                        class="social-list-item border-secondary text-secondary"><i
                                            class="mdi mdi-github"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);"
                                        class="social-list-item border-danger text-danger"><i
                                            class="mdi mdi-gitlab"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);"
                                        class="social-list-item border-primary text-primary"><i
                                            class="mdi mdi-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </form>
                    <!-- end form-->
                </div>

                <!-- Footer-->
                <footer class="footer footer-alt">
                    <p class="text-muted">Already have account? <a href="pages-login-2.html"
                            class="text-muted ms-1"><b>Log In</b></a></p>
                </footer>

            </div> <!-- end .card-body -->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
        <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3">I love the color!</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i> It's a elegent templete. I love it very
                    much! . <i class="mdi mdi-format-quote-close"></i>
                </p>
                <p>
                    - {{ config('app.name') }}
                </p>
            </div> <!-- end auth-user-testimonial-->
        </div>
        <!-- end Auth fluid right content -->
    </div>
    <!-- end auth-fluid-->
    <!-- Vendor js -->
    <script src="{{ asset('js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('js/app.min.js') }}"></script>

</body>

</html>
