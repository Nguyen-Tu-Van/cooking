@extends('Common.master')

@section('title')
<title>Đăng nhập</title>
@endsection

@section('js1')
<!-- <script src="global_assets/js/plugins/forms/validation/validate.min.js"></script> -->
@endsection

@section('js2')
<!-- <script src="global_assets/js/demo_pages/login_validation.js"></script> -->
@endsection

@section('content')
<div class="content-wrapper">

	<!-- Inner content -->
	<div class="content-inner">

		<!-- Content area -->
		<div class="content d-flex justify-content-center align-items-center">

			<!-- Login card -->
			<form class="login-form form-validate wmin-sm-400" action="{{route('login-post')}}" method="post">
				{{ csrf_field() }}
				@if(count($errors)>0)
				@foreach($errors->all() as $value)
				<div class="alert bg-danger text-white alert-dismissible">
					<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
					<span class="font-weight-semibold">{{$value}}</span>
				</div>
				@endforeach
				@endif
				@if(Session::has('error'))
				<div class="alert bg-danger text-white alert-dismissible">
					<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
					<span class="font-weight-semibold">{{Session('error')}}</span>
				</div>
				@endif
				@if(Session::has('success'))
				<div class="alert bg-success text-white alert-dismissible">
					<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
					<span class="font-weight-semibold">{{Session('success')}}</span>
				</div>
				@endif

				<div class="card mb-0">
					<div class="card-body">
						<div class="text-center mb-3">
							<i class="icon-reading icon-2x text-secondary border-secondary border-3 rounded-pill p-3 mb-3 mt-1"></i>
							<h5 class="mb-0">Login to your account</h5>
							<!-- <span class="d-block text-muted">Your credentials</span> -->
						</div>

						<div class="form-group form-group-feedback form-group-feedback-left">
							<input type="email" class="form-control" name="email" placeholder="Email" required @if(Cookie::has("email_cookie_user")) value="{{Cookie::get('email_cookie_user')}}" @endif>
							<div class="form-control-feedback">
								<i class="icon-user text-muted"></i>
							</div>
						</div>

						<div class="form-group form-group-feedback form-group-feedback-left input-group">
							<input type="password" class="form-control" name="password" id="password" @if(Cookie::has("password_cookie_user")) value="{{Cookie::get('password_cookie_user')}}" @endif placeholder="Password" required>
							<div class="form-control-feedback">
								<i class="icon-lock2 text-muted"></i>
							</div>
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="ti-key">
										<div id="password_eye" style="cursor: pointer;" onclick="show_pass('password')"><i class="icon-eye-blocked2"></i></div>
										<div id="password_eye_flash" style="display: none;cursor: pointer;" onclick="hidden_pass('password')"><i class="icon-eye2"></i></div>
									</span>
								</div>
							</div>

						</div>

						<!-- <div class="form-group d-flex align-items-center">
							<label class="custom-control custom-checkbox">
								<input type="checkbox" name="remember" id="remember" class="custom-control-input" @if(Cookie::has("email_cookie_user") && Cookie::has("password_cookie_user")) checked @endif>
								<span class="custom-control-label">Remember</span>
							</label>

							<a href="login_password_recover.html" class="ml-auto">Forgot password?</a>
						</div> -->

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
						</div>
<!-- 
						<div class="form-group text-center text-muted content-divider">
							<span class="px-2">Don't have an account?</span>
						</div> -->

						<!-- <span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span> -->
					</div>
				</div>
			</form>
			<!-- /login card -->

		</div>
		<!-- /content area -->


		<!-- Footer -->
		<!-- <div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
			<div class="text-center d-lg-none w-100">
				<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
					<i class="icon-unfold mr-2"></i>
					Footer
				</button>
			</div>

			<div class="navbar-collapse collapse" id="navbar-footer">
				<span class="navbar-text">
					&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="https://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
				</span>

				<ul class="navbar-nav ml-lg-auto">
					<li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
					<li class="nav-item"><a href="https://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
					<li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
				</ul>
			</div>
		</div> -->
		<!-- /footer -->

	</div>
	<!-- /inner content -->

</div>
@endsection