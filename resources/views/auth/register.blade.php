@extends('templet.templetLogin')

@section('title', 'Home Page')

@section('content')
{{-- start Register --}}

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg mt-4">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-5">
                        <div class="p-2">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">Create an Account!</h1>
                            </div>


                            <form action="{{ route('cekregis') }}" class="user" method="POST">
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="name" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Name Full">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email_verified_at" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Verified">
                                </div>

                                <div class="form-group">
                                    <p>Please select your activity </p>
                                    <input type="radio" name="role_user" class="" id="html" value="member"
                                        placeholder="Email Verified">
                                        <label for="member">Member</label>

                                    <input type="radio" name="role_user" class="" id="driver" value="driver"
                                        placeholder="Email Verified">
                                        <label for="driver">Driver</label>

                                        @error('role_user')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="password" placeholder="Password" required autocomplete="new-password">
                                    </div>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="password_confirmation" required autocomplete="new-password">
                                    </div>

                                </div>

                                {{-- <a href="login.html" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </a> --}}
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Register') }}
                                </button>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>

                            <hr>
                            {{-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> --}}
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

{{-- start Register --}}

@endsection
