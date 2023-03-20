
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="{{ url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css") }}" rel="stylesheet">

	<link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
	<link href="{{ asset("css/style.css") }}" rel="stylesheet">
	<link href="{{ asset("css/util.css") }}" rel="stylesheet">
</head>

<body style="background-color: #666666;">

	<div class="wrapper">
		<div class="loginContainer">
			<div class="loginWrap">
				<form class="loginForm" action="accLogin" method="post">
                    @csrf
					<span class="loginFormTitle p-b-43">
						Login Page
					</span>
                    <p class="text-center">
                        Please Enter You Email and Password Provided by the Organization.
                    </p>

					<div class="inputWrap">
						<input class="inpt" type="text" name="email" value="{{ old('email') }}" placeholder="Email" required>
						<span class="inputFocus"></span>
					</div>

                    @error('email')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror

					<div class="inputWrap">
						<input class="inpt" type="password" name="password" placeholder="Password" required>
						<span class="inputFocus"></span>
					</div>

                    @if (session()->has('status'))
                        <div class="text-danger">
                            {{ session('status') }}
                        </div>
                    @endif

                    @error('password')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror

					<div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div>

                        </div>
						<div>
							<a href="{{ route('reset') }}" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>


                    <div class="loginFormBtnContain">
                        <button class="loginFormBtn" type="submit">Login</button>
                    </div>

					{{-- <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
                            <a href="{{ route('signup') }}">
                                Don't Have Account? Sign Up
                            </a>
						</span>
					</div> --}}
				</form>

				<div class="loginM" style="background-image: url('images/loginBack.jpg');">
				</div>
			</div>
		</div>
	</div>
</body>

<script src="{{ asset("js/bootstrap.min.js") }}"></script>

</html>
