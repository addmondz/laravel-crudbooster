<!doctype html>
<html lang="en">

<head>
	<title>Login: Welcome Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="login_resources/login_page.css">
</head>

<body class="img js-fullheight bg-background">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h1 class="heading-section">Welcome</h1>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-4 text-center">Have an account?</h3>
						<form action="#" class="signin-form">
							<div class="form-group">
								<input type="text" class="form-control user-email" placeholder="Username" required>
							</div>
							<div class="form-group">
								<input id="password-field" type="password" class="form-control user-password" placeholder="Password" required>
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary submit px-3 btn-action btn-login-action">Sign In</button>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Remember Me
										<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
							</div>
						</form>
						<p class="w-100 text-center">&mdash; Or &mdash;</p>
						<div class="social d-flex text-center">
							<a href="#" class="px-2 py-2 ml-md-1 rounded btn-action"><span class="ion-logo-twitter mr-2"></span>Register Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	@include('guard')

	<script>
		$(document).ready(function() {

			$('.btn-login-action').on("click", function(e) {
				e.preventDefault();

				var data = {
					email: $('.user-email').val(),
					password: $('.user-password').val(),
				};

				var response = loginAuth('{{ route("api.login") }}', data);
			});
		});
	</script>

</body>

</html>