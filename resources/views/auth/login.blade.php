@extends ('layouts.master')

@section ('contents')
<div class="vertical-align-wrap">
	<div class="vertical-align-middle">
		<div class="auth-box ">
			<div class="left login-bg">
				<div class="content">
					<div class="header">
						<div class="logo text-center"><img height="100" src="assets/img/logo.jpg" alt="Klorofil Logo"></div>
						<p class="lead">Login Admin Account</p>
						
					</div>
					<form method="post" action="{{ route('login') }}" class="form-auth-small" action="index.php">
						@csrf
						@if ($errors->has('username'))
							<p style="color: red; border: none; text-align: left">{{ $errors->first('username') }}</p>
						@endif
						<div class="form-group {{ count($errors) ? "has-error" : "" }}">
							<label for="signin-username" class="control-label sr-only">Email</label>
							<input name="username" type="text" class="form-control" id="signin-username"  placeholder="Username" required="">
						</div>
						
						<div class="form-group {{ count($errors) ? "has-error" : "" }}">
							<label for="signin-password" class="control-label sr-only">Password</label>
							<input name="password" type="password" class="form-control" id="signin-password" placeholder="Password" required="">
						</div>
						<div class="form-group clearfix">
							<label class="fancy-checkbox element-left">
								<input type="checkbox">
								<span>Remember me</span>
							</label>
						</div>
						<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
						<div class="bottom">
							<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
						</div>
					</form>
				</div>
			</div>
			<div class="right">
				<div class="overlay overlay-login"></div>
				<div class="content text">
					<div class="logo text-center"><img height="100" src="assets/img/logo-png-light.png" alt="Mirieo Logo"></div>
					<h1 class="heading text-center">Mireio Restaurant Ordering & POS System</h1>
					<p class="text-center">Powered by: <b>Elohim</b></p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
@endsection

@include ('layouts.notification')