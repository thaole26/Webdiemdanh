@extends('layout.base')

@section('title')
    Đăng nhập tài khoản
@endsection

@section('content')
<div class="m-3">
	<nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a class="link-underline link-underline-opacity-0" href="/">Trang chủ</a></li>
			<li class="breadcrumb-item active" aria-current="page">Đăng nhập tài khoản</li>
		</ol>
	</nav>
	<div class="row">
		<div class="col-4"></div>
		<div class="col-4">
			<div class="mb-5">
				<form action="{{route('login')}}" method="post">
					@csrf
					<div class="mb-3">
						<label for="InputUserName" class="form-label">Username:</label>
						<input
							type="text"
							class="form-control"
							id="InputUserName"
							placeholder="nguyenvana123"
							name="username"
						/>
						<input type="hidden" name="">
					</div>
					<div class="mb-3">
						<label for="InputPassword" class="form-label">Mật Khẩu:</label>
						<input type="password" class="form-control" id="InputPassword" name="password"/>
					</div>
					<div class="mb-3">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="showPassword" />
							<label class="form-check-label" for="showPassword"> Hiện mật khẩu </label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="remember" />
							<label class="form-check-label" for="remember"> Ghi nhớ mật khẩu </label>
						</div>
					</div>
					<button type="submit" class="btn btn-primary float-end">Đăng nhập</button>
				</form>
			</div>
			<div class="mb-3">
				<span>Quên tài khoản?</span>
				<a class="link-offset-2 link-underline link-underline-opacity-0" href="/"
					>Yêu cầu hỗ trợ</a
				>
			</div>
		</div>
		<div class="col-4"></div>
	</div>
</div>
@endsection

@section('js')
<script>
	document.getElementById('showPassword').addEventListener('click', function() {
		var passwordField = document.getElementById('InputPassword');
		if (passwordField.type === 'password') {
			passwordField.type = 'text';
		} else {
			passwordField.type = 'password';
		}
	});
</script>
@endsection