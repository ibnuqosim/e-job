<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Login e_job</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Validify Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="{{ asset ('/vlogin/css/style.css') }}" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="{{ asset ('/vlogin/css/fontawesome-all.css') }}" >
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- web-fonts -->
	{{-- <link href="//fonts.googleapis.com/css?family=Nova+Round" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet"> --}}
	<!-- //web-fonts -->
</head>

<body>
	<!-- title -->
	<h1>
		<span>L</span>ogin
		<span>F</span>orm
		<span>E</span>_job
	</h1>
	<!-- //title -->
	<!-- content -->
	<div class="sub-main-w3">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group-2">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-default btn-osx btn-lg">
                            Login
                        </button>

                        <a class="alert alert-success hidden" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
	</div>
	<!-- //content -->

	<!-- copyright -->
	<div class="footer">
		<p>&copy; 2018 E_Job. All rights reserved | Design by 
			<a href="www.krakatau-it.co.id">Krakatau Information Technology</a>
		</p>
	</div>
	<!-- //copyright -->

	<!-- Jquery -->
	<script src="{{ asset ('/vlogin/js/jquery-2.2.3.min.js') }}"></script>
	<!-- //Jquery -->
	<!-- validify plugin -->
	<script src="{{ asset ('/vlogin/js/validify.js') }}"></script>
	<script>
		$("#demo").validify({
			onSubmit: function (e, $this) {
				$this.find('.alert').removeClass('hidden')
			},
			onFormSuccess: function (form) {
				console.log("Form is valid now!")
			},
			onFormFail: function (form) {
				console.log("Form is not valid :(")
			}
		});
		$("#demo").validify({
			errorStyle: "validifyError",
			successStyle: "validifySuccess",
			emailFieldName: "email",
			emailCheck: true,
			requiredAttr: "required",
		});
	</script>
	<!-- //validify plugin -->

</body>

</html>