<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
	<link rel="icon" href="assets/img/logo.png" type="image/gif" sizes="16x16">
	<link rel="icon" href="assets/img/logo.png" type="image/gif" sizes="18x18">
	<link rel="icon" href="assets/img/logo.png" type="image/gif" sizes="20x20">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}">
    <style>
        .login-form-style3{
            background: aliceblue;
            padding: 20px;
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-4">
            <section class="login-form-style3 mt-5 text-center">
                <div class="login-form-style3-main">
                    <div class="login-form-style3-main_full">
                        <div class="login-register_style3-head mb-4">
                            <div class="lo-logo mb-20">
                                <a href="{{ URL::to('/') }}">
                                    <img src="https://i.ibb.co/yYqDwpb/logo-1.png" alt="img">
                                </a>
                            </div>
                            <h2>Login</h2>           
                        </div>
                        <div class="login-register3-form-middle">
                            <form method="POST" action="{{ route('login.custom') }}">
                                @csrf
                                <div class="single-field mb-3">
                                    <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                                                    
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>        
                            <div class="single-field">
                                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                                <div class="single-field mb-0">
                                    <button class="btn-primary mt-4" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!-- Js File -->

    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    </body>
  </html>