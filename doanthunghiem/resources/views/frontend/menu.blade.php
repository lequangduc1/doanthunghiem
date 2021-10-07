<header id="header"><!--header-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
						
				<div class="row">
				<div class="companyinfo col-sm-4" style="height:34px;margin:0px">
							<h2 style="padding:0px;margin:0px"><span>L&Đ</span>-shop</h2>
						</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<li><a href="/doanthunghiem/admin"><i class="fa fa-crosshairs"></i> Admin</a></li>
								<li><a href="/doanthunghiem/giohang"><i class="fa fa-shopping-cart"></i> Giỏ Hàng||  sản phẩm</a></li>
								<li><a href="/doanthunghiem/login"><i class="fa fa-lock" ></i> Đăng Nhập</a></li>
								<button type="button" id="btn-dangnhap">đăng nhập</button>
								
									
								<!-- <li><a href="/doanthunghiem/login"><i class="fa fa-lock"></i> Đăng Nhập</a></li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="/doanthunghiem/trang_chu" class="active">Trang Chủ</a></li>
								<li><a href="/doanthunghiem/trang_tintuc">Tin Tức</a></li>
								<li><a href="/doanthunghiem/trang_tintuc">Bảo Hành</a></li>
								<li><a href="/doanthunghiem/viewtuvan">Tư Vấn</a></li>
								<!-- <li><a href="contact-us.html">Contact</a></li> -->
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<form action="{{URL::to('/timkiemsp')}}"  method="get" >
							<div class="search_box pull-right">
								<input type="text" placeholder="Search" name="timkiem" />
								<button class="fa fa-search" type="submit" id="timkiemsubmit" style="width:60px;height:35px;background-color:#F0F0E9;text-align: center;line-height: 35px;margin-top: -10px; border:none"></button>
								<!-- <a href="/doanthunghiem/timkiemsp"><i class="fa fa-search" style="width:30px;height:35px;background-color:#F0F0E9;text-align: center;line-height: 35px"></i></a> -->
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

