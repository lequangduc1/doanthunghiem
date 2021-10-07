@extends('admin_layout')
@section('admin_data')
<form action="{{URL::to('/save-data-sanpham')}}" method="post">
        {{csrf_field()}}<!-- bảo mật form -->
  <div class="d-flex p-2" style="background-color:#333; color:#fff;">==> Thêm sản phẩm</div></br>
    @if(count($errors)>0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $err)
              {{$err}}</br>
            @endforeach
          </div>
    @endif

    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
    @if(session('thongbaokhongthanhcong'))
        <div class="alert alert-danger">
            {{session('thongbaokhongthanhcong')}}
        </div>
    @endif
<!-- list  -------------------------------------------------------->

<table class="table">
  <div class="d-flex p-2" style="background-color:#333; color:#fff;">
    <form class="row g-3" action="{{URL::to('/timkiemsp_admin')}}"  method="get">
      <div class="col-md-12" >
        <div class="col-md-4" style="float:left;">
          <p>==> Tất cả sản phẩm</p>
        </div>
        <div class="col-md-4" style="float:left;">
          <div class="form-outline">
            <input type="text" class="form-control" id="validationDefault01" placeholder="Tìm Kiếm" name="timkiem" />
          </div>
        </div>
        <div class="col-md-4" style="float:left;">
          <button class="btn btn-primary" type="submit" style="height:38px; width:40px; margin:0;"><i class="fa fa-search"></i></button>
        </div>
      </div>
    </form>
  </div>

  <thead>
    <tr>
      <th scope="col">Tên Hãng xe</th>
      <th scope="col">Tổng sản phẩm</th>
      <th scope="col">Tổng xe</th>
    </tr>
  </thead>
  <tbody>
    @foreach($hangxe as $hx)
    <tr>
      <td>{{$hx->HangXe}}</td>
        <td><?php
            $tongsp =0;
            foreach($sanpham as $sp){
                if($sp->HangXe == $hx->HangXe)
                    $tongsp = $tongsp + $sp->SoLuong;
            }
            echo $tongsp;
        ?></td>
        <td><?php
            $tongsp =0;
            foreach($sanpham as $sp){   
                if($sp->HangXe == $hx->HangXe)
                    /* echo $sp->HangXe; */
                    $tongsp = $tongsp + 1;
            }
            echo $tongsp;
        ?></td>
      <!-- <td>{{$hx->TenSP}}</td> -->
    </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
@endsection