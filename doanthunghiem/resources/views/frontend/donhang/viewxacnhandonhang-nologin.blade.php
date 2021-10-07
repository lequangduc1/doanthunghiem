@extends('login')
@section('content')
	<div class="row">
        <div class="col-sm-4">
            <div class="signup-form"><!--sign up form-->
                <h2>Xác nhận đơn hàng</h2>
                
                
                <form action="{{URL::to('/post_xacnhandonhang')}}" method="post">

                     {{csrf_field()}}<!-- bảo mật form -->

                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}</br>
                        @endforeach
                        </div>
                    @endif
                    
                    @if(session('thongbaokhongthanhcong'))
                        <div class="alert alert-danger">
                            {{session('thongbaokhongthanhcong')}}
                        </div>
                    @endif
                    <lable> Họ tên người nhận</lable><input type="text" name="tennguoinhan" value=""/>
                    <lable> Địa Chỉ người nhận</lable><input type="text" name="diachinguoinhan" value=""/>
                    <lable> Số Điện Thoại người nhận</lable><input type="text" name="sdtnguoinhan" value=""/>
					<lable> Ngày giao hàng</lable><input type="date" name="ngaygiao" value='<?php echo date('Y-m-d');?>'/>
                    <button type="submit" class="btn btn-default" >Xác nhận đơn hàng</button>
                </form>
            </div><!--/sign up form-->
        </div>
    </div>
@endsection