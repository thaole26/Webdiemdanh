@extends('layout.base')

@section('title')
    Đăng ký tài khoản
@endsection

@section('content')
<div class="m-3">
	<nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a class="link-underline link-underline-opacity-0" href="/">Trang chủ</a></li>
			<li class="breadcrumb-item active" aria-current="page">Đăng ký tài khoản</li>
		</ol>
	</nav>
	<div class="row">
		<div class="col-4"></div>
		<div class="col-4">
			<div class="mb-5">
				<form action="#" method="post">
					<div class="mb-3">
						<label for="InputUserName" class="form-label">Username:</label>
						<input
							type="text"
							class="form-control"
							id="InputUserName"
							placeholder="nguyenvana123"
						/>
					</div>
                    <div class="mb-3">
						<label for="InputFullName" class="form-label">Họ và tên:</label>
						<input
							type="text"
							class="form-control"
							id="InputFullName"
							placeholder="Nguyễn Văn A"
						/>
					</div>
                    <div class="mb-3">
						<label for="InputEmail" class="form-label">Email:</label>
						<input
							type="email"
							class="form-control"
							id="InputEmail"
							placeholder="example@domain.com"
						/>
					</div>
                    <div class="mb-3">
						<label for="InputNumberPhone" class="form-label">Số điện thoại:</label>
						<input
							type="tel"
							class="form-control"
							id="InputNumberPhone"
							placeholder="(+84) 0123.456.789"
						/>
					</div>
					<div class="mb-3">
						<label for="InputAddress" class="form-label">Địa chỉ:</label>
						<input
							type="text"
							class="form-control"
							id="InputAddress"
							placeholder="140 Lê Trọng Tấn, P.Tây Thạnh, Q.Tân Phú, TP.HCM"
						/>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Ngành học:</label>
						<select class="form-select" aria-label="Default select example">
							<option selected>Lựa chọn ngành</option>
							<option value="CNTT">Công nghệ Thông Tin</option>
							<option value="CNTP">Công Nghệ Thực Phẩm</option>
							<option value="NNA">Ngôn Ngữ Anh</option>
							<option value="NNT">Ngôn Ngữ Trung</option>
							<option value="QTKD">Quản Trị Kinh Doanh</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="InputPassword" class="form-label">Mật khẩu:</label>
						<input type="password" class="form-control" id="InputPassword" />
					</div>
                    <div class="mb-3">
						<label for="InputConfirmPassword" class="form-label">Nhập lại mật khẩu:</label>
						<input type="password" class="form-control" id="InputConfirmPassword" />
					</div>
					<button type="submit" class="btn btn-primary float-end">Đăng ký</button>
				</form>
			</div>
			<div class="mb-3">
				<span>Đã có tài khoản?</span>
				<a class="link-offset-2 link-underline link-underline-opacity-0" href="/auth/login/"
					>Đăng nhập</a
				>
			</div>
		</div>
		<div class="col-4"></div>
	</div>
</div>
@endsection