<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Chi tiết sản phẩm</title>
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
</head><!--/head-->

<body>
	<!-- header -->
	@include('frontend.menu')
	<!-- header -->	
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh Mục Sản Phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach($hangxe as $hx)
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="/doanthunghiem/sanpham_loai/{{$hx->HangXe}}">{{$hx->HangXe}}</a></h4>
									</div>
								</div>
							@endforeach
						</div><!--/category-products-->
					
						
						
						
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
                    <!--kế thừa-->
                        <div class="product-details"><!--product-details-->
                            @foreach($sanpham as $sp)
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="{!! asset('public/frontend/images/home/sanpham/'.$sp->HinhAnh) !!}" alt="" />
                                        <h3>{{$sp->HangXe}}</h3>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                            
                                <div class="product-information"><!--/product-information-->
                                    <img src="" class="newarrival" alt="" />
                                    <h2>{{$sp->TenSP}}</h2>
                                    <p>Mã sản phẩm: {{$sp->MaSP}}</p>
                                    <img src="images/product-details/rating.png" alt="" />
                                    <span>
                                        <span><?php echo number_format($sp->Gia, 0) . " VNĐ"?></span>
                                        
                                    </span>
                                    <span>
                                    <label>Số Lượng:</label>
                                        <input type="text" value="1" disabled/>
                                        <a href="/doanthunghiem/themvaogiohang/{{$sp->MaSP}}" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm vào giỏ hàng
											</a>
                                    </span>
                                    <p><b>Mô Tả Sản Phẩm:</b> {{$sp->NoiDungMoTa}}</p>
                                    <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                                </div><!--/product-information-->
                            </div>
                            @endforeach
                        </div><!--/product-details-->
					<!--kế thừa-->
                </div>
                    <!--category-tab-->
					
					
				</div>
			</div>
		</div>
	</section>
	
	<!-- footer -->
		@include('frontend.footer')
	<!-- footer -->
	

  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
</body>
</html>