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
				<form class="loginForm">
					<span class="loginFormTitle p-b-43">
						Forgot Account?
					</span>
                    <span class="txt3">
                        Enter your email below. We will send password reset link on your mail.
                    </span>


					<div class="inputWrap">
						<input class="inpt" type="text" name="email">
						<span class="inputFocus"></span>
						<span class="inputLabel">Email</span>
					</div>


					<div class="loginFormBtnContain">
						<button class="loginFormBtn">
							Submit
						</button>
					</div>

					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
                            <a href="{{ route('login') }}">
                                Want To Try Logging In Again? Login In
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
<script src="{{ asset("js/main.js") }}"></script>

</html>
