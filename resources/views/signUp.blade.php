<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
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
				<form class="signupForm" action="accSignup" method="POST">
                    @csrf
					<span class="loginFormTitle p-b-43">
						Sign Up
					</span>

                    @if (session()->has('failed'))
                        <div class="text-danger">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="inputWrap col m-1">
                            <input class="inpt" type="text" name="fname" placeholder="First Name" required>
                            <span class="inputFocus"></span>
                        </div>

                        @error('fname')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror

                        <div class="inputWrap col m-1">
                            <input class="inpt" type="text" name="lname" placeholder="Last Name" required>
                            <span class="inputFocus"></span>
                        </div>
                        @error('lname')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>


					<div class="inputWrap">
						<input class="inpt" type="text" name="address" placeholder="Address" required>
						<span class="inputFocus"></span>
					</div>
                    @error('address')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror

                    <div class="row">
                        <div class="inputWrap col">
                            <input class="inpt" type="text" name="age" placeholder="Age" required>
                            <span class="inputFocus"></span>
                        </div>
                        @error('age')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror

                        <div class="form-group col-md-5">
                            <select id="inputState" class="form-control" placeholder="Gender" name="gender" required>
                              <option>Male</option>
                              <option>Female</option>
                              <option>Other</option>
                            </select>
                        </div>
                    </div>


					<div class="inputWrap">
						<input class="inpt" type="text" name="email" placeholder="Email" required>
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

                    @error('password')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="txt1">
							<input type="checkbox" name="TaC" id="TaC" required>
                            I accept to the terms and condition
						</div>
					</div>


					<div class="loginFormBtnContain">
						<button class="loginFormBtn">
							Sign Up
						</button>
					</div>

                    <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
                            <a href="{{ route('login') }}">
                                Have An Account? Login
                            </a>
						</span>
					</div>
				</form>

				<div class="loginM" style="background-image: url('images/loginBack.jpg');">
				</div>
			</div>
		</div>
	</div>
</body>

<script src="{{ asset("js/bootstrap.min.js") }}"></script>

</html>
