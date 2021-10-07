<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | E-Shopper</title>
	<link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/maincss.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="{{asset('public/frontend/images/ico/favicon.ico')}}">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" href="{{asset('public/frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head>
<!--/head-->
<style>
	.modal-1 li:first-child a {
		-moz-border-radius: 6px 0 0 6px;
		-webkit-border-radius: 6px;
		border-radius: 6px 0 0 6px;
	}

	.modal-1 li:last-child a {
		-moz-border-radius: 0 6px 6px 0;
		-webkit-border-radius: 0;
		border-radius: 0 6px 6px 0;
	}

	.modal-1 a {
		border-color: #ddd;
		color: #4285F4;
		background: #fff;
	}

	.modal-1 a:hover {
		background: #eee;
	}

	.modal-1 a.active,
	.modal-1 a:active {
		border-color: #4285F4;
		background: #4285F4;
		color: #fff;
	}
</style>
<style>
	body {
		padding: 50px;
	}

	* {
		margin: 0;
		padding: 0;
	}

	.form-dangnhap {
		width: 400px;
		border-radius: 10px;
		overflow: hidden;
		padding: 55px 55px 37px;
		background: #9152f8;
		background: -webkit-linear-gradient(top, #7579ff, #b224ef);
		background: -o-linear-gradient(top, #7579ff, #b224ef);
		background: -moz-linear-gradient(top, #7579ff, #b224ef);
		background: linear-gradient(top, #7579ff, #b224ef);
		text-align: center;
		position: absolute;
		top: 150px;
		left: 500px;
		opacity: 0;
	}

	.form-dangnhap h2 {
		font-size: 30px;
		color: #fff;
		line-height: 1.2;
		text-align: center;
		text-transform: uppercase;
		display: block;
		margin-bottom: 30px;
	}

	.form-dangnhap input[type=text],
	.form-dangnhap input[type=password] {
		font-family: Poppins-Regular;
		font-size: 16px;
		color: #fff;
		line-height: 1.2;
		display: block;
		width: calc(100% - 10px);
		height: 45px;
		background: 0 0;
		padding: 10px 0;
		border-bottom: 2px solid rgba(255, 255, 255, .24) !important;
		border: 0;
		outline: 0;
	}

	.form-dangnhap input[type=text]::focus,
	.form-dangnhap input[type=password]::focus {
		color: red;
	}

	.form-dangnhap input[type=password] {
		margin-bottom: 20px;
	}

	.form-dangnhap input::placeholder {
		color: #fff;
	}

	.checkbox {
		display: block;
	}

	.form-dangnhap input[type=submit] {
		font-size: 16px;
		color: #555;
		line-height: 1.2;
		padding: 0 20px;
		min-width: 120px;
		height: 50px;
		border-radius: 25px;
		background: #fff;
		position: relative;
		z-index: 1;
		border: 0;
		outline: 0;
		display: block;
		margin: 30px auto;
	}

	#checkbox {
		display: inline-block;
		margin-right: 10px;
	}

	.checkbox-text {
		color: #fff;
	}

	.psw-text {
		color: #fff;
	}
</style>

<body>

	<!-- header -->
	@include('frontend.menu')
	<!-- header -->

	@include('frontend.slider')


	<div class="form-dangnhap" id="form-dangnhap">
		<h2>Đăng nhập</h2>
		<form action="#" method="post" name="dang-nhap">

			<input type="text" name="username" placeholder="Nhập tên đăng ký" />
			<input type="password" name="password" placeholder="Nhập mật khẩu" />
			<input type="checkbox" id="checkbox" name="checkbox"><label class="checkbox-text">Nhớ đăng nhập lần sau</label>
			<input type="submit" name="submit" value="Đăng nhập"/>
			<label class="psw-text">Quên mật khẩu</label>
		</form>

	</div>
	<div class="form-dangnhap" id="form-dangki">
		<h2>Đăng ki</h2>
		<form action="#" method="post" name="dang-ky">

			<input type="text" name="username" placeholder="Nhập tên đăng ký" />
			<input type="password" name="password" placeholder="Nhập mật khẩu" />
			<input type="checkbox" id="checkbox" name="checkbox"><label class="checkbox-text">Nhớ đăng nhập lần sau</label>
			<input type="submit" name="submit" value="Đăng nhập" />
			<label class="psw-text">Quên mật khẩu</label>
		</form>

	</div>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh Mục Sản Phẩm</h2>
						<div class="panel-group category-products" id="accordian">
							<!--category-productsr-->
							@foreach($hangxe as $hx)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="/doanthunghiem/sanpham_loai/{{$hx->HangXe}}">{{$hx->HangXe}}</a></h4>
								</div>
							</div>
							@endforeach
						</div>
						<!--/category-products-->







					</div>
				</div>

				<div class="col-sm-9 padding-right">
					<!--kế thừa-->
					@yield('content')

					<!--kế thừa-->
				</div>


			</div>
		</div>
		</div>
	</section>

	<!-- footer -->
	@include('frontend.footer')
	<!-- footer -->



	<!-- JavaScript -->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

	<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('public/frontend/js/main.js')}}"></script>
	<script>
		function themvaogiohang(MaSP) {
			console.log(MaSP);
			$.ajax({
				url: 'themvaogiohang/' + MaSP,
				type: 'GET',
			}).done(function(response) {
				console.log(response);
				alertify.success('đã thêm sản phẩm vào giỏ hàng');
			});
		}
		$(document).ready(function(){
			$('#form-dangnhap').animate({marginleft:-300,opacity:0});
			$('#form-dangki').animate({marginleft:-300,opacity:0});
			$('#btn-dangnhap').click(function(){
				
				$('#form-dangnhap').animate({marginleft:0,opacity:1});
			})
		})
	</script>
</body>

</html>