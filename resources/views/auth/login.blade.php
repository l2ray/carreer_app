<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>QGROUP ONLINE APPLICATIONS SYSTEM - ADMIN</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Favicon -->
        <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

        <!-- Switchery css -->
        <link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />
        
        <!-- Bootstrap CSS -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        
        <!-- Font Awesome CSS -->
        <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        
        <!-- Custom CSS -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />    
        <style type="text/css">
            html, body {
                min-height: 100vh !important;
                background-image: linear-gradient(to top, orange, orangered);
                /*background-image: linear-gradient(to bottom, red, #f06d06);*/
            }
            .card {
                width: 45%;
                background-color: rgba(43, 61, 81, 0.74)  !important;

            }
        </style>
                
</head>

<body  class="d-flex justify-content-center align-items-center">


<!-- <div class="container"> -->
    <!-- <div class="row"> -->
        <!-- <div class="col-md-8"> -->
            <div class="card text-white bg-dark shadow-lg p-3 rounded">
                <div class="card-header text-center text-white text-bold"><h3>QGroup Online Application System: Admin Platform</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a id = "password" class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->
</body>
</html>


