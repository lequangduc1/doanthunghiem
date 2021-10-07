<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Mail;
use View;
use Session;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


use App\sanpham;
use App\hangxe;
use App\khachhang;
use App\giohang;
use App\chitietgiohang;
use App\donhang;
use App\chitietdonhang;
use App\tintuc;

class TrangChu_frontend extends Controller
{
    /* truyền biến về view */
        function __construct(){
            $hangxe =hangxe::all();
            $sanpham =sanpham::all();
            $khachhang =khachhang::all();
            $tongspgiohang = giohang::all()->count();
            view()->share('hangxe',$hangxe);
            view()->share('sanpham',$sanpham);
            view()->share('khachhang',$khachhang);
        }
    /* truyền biến về view */
    
    /* sand mail */
        public function sendmail(){
            //send mail
            $to_name = "khach hang";
            $to_email = "ducdiduc761311@gmail.com";//send to this email
    
            $data = array("name"=>"mail mua san pham","body"=>"don hang"); //body of mail.blade.php
        
            Mail::send('frontend.pages.sendmail',$data,function($message) use ($to_name,$to_email){
                $message->to($to_email)->subject('đơn hàng mỹ phẩm');//send this mail with subject
                $message->from($to_email,$to_name);//send from this mail
            });
            //--send mail

        }

    /* sand mail */

    /* trang tin tức */
        public function trangtintuc(){
            $tintuc = tintuc::paginate(3);
            /* $taikhoan = Session::get('Email');
            $khachhang = khachhang::where('Email',$taikhoan)->first();
            $tongspgiohang = giohang::where('MaKH',$khachhang->MaKH)->count();
            echo $tongspgiohang;
            echo $khachhang;
            echo $tongspgiohang;
            exit; */
            return view('frontend/pages/showtintuc',['tintuc'=>$tintuc]);
        }
    /* trang tin tức */
    
    /* đăng nhập - đăng kí - đổi mật khẩu */
        public function view_login(){
            return view('frontend/pages/login_dangnhap');
        }
        public function view_logindangki(){
            return view('frontend/pages/login_dangki');
        }

        public function view_postlogindangki(Request $request){
            $this-> validate($request, /* check đk */
            [
                'tenkh' => 'required', /* mảng lỗi */
                'diachi' => 'required',
                'email' => 'required',
                'sdt' => 'required',
                'matkhau' => 'required',
            ],
            [
                'tenkh.required' =>'Bạn chưa nhập tên khách hàng',
                'diachi.required' =>'Bạn chưa nhập địa chỉ khách hàng',
                'email.required' =>'Bạn chưa nhập email khách hàng',
                'sdt.required' =>'Bạn chưa nhập số điện thoại khách hàng',
                'matkhau.required' =>'Bạn chưa nhập mật khẩu', /* mảng thông báo */
            ]);
            /* $x =strlen($request->tenkh);
            echo $x;
            exit; */
            if(strlen($request->tenkh)<=3){
                return redirect('login_dangki') -> with('thongbaokhongthanhcong','ten đăng nhập không đủ kí tự');
            }
            $khachhang = new khachhang; 
            $khachhang->TenKH = $request->tenkh;
            $khachhang->DiaChi = $request->diachi;
            $khachhang->Email = $request->email;
            $khachhang->SDT = $request->sdt;
            $khachhang->MatKhau = MD5($request->matkhau);
            $khachhang->TrangThai = "1";
            $email = $khachhang->Email;

            $thongtin = khachhang::where('Email',$email)->first();
            if($thongtin)
            {
                return redirect('login_dangki') -> with('thongbaokhongthanhcong','email đã được đăng kí');
            }
            
            /* $sdt2=strlen($request->sdt);
            if($sdt2 != 10 || $sdt2 != 11)
            {
                return redirect('login_dangki') -> with('thongbaokhongthanhcong','sdt khong hop le');
            } */
            $khachhang->save();
            return redirect('login') -> with('thongbao','Thêm tài khoản thành công');
        }

        public function view_getlogindangnhap(Request $request){
            $this-> validate($request, /* check đk */
            [
                'email' => 'required', /* mảng lỗi */
                'matkhau' => 'required',
            ],
            [
                'email.required' =>'Bạn chưa nhập email khách hàng',
                'matkhau.required' =>'Bạn chưa nhập mật khẩu', /* mảng thông báo */
            ]);

            $email = $request->email;
            $matkhau = md5($request->matkhau);
            $result =DB::table('khachhang')-> where('Email',$email)-> where('MatKhau',$matkhau)->first();
            /* xét dk tài khoản có đúng hay ko và tiếp là xét dk tk có bị login hay ko */
            if(isset($result)){ 
                if($result->TrangThai == "1"){
                    Session::put('Email',$result->Email);
                    return redirect('trang_chu');
                }
                else{
                    return redirect('login') -> with('thongbaokhongthanhcong','Tài khoản đã bị khóa, xin liên hệ admin để biết thêm thông tin');
                }
            }
            else{ 
                return redirect('login') -> with('thongbaokhongthanhcong','Địa Chỉ email hoặc mật khẩu không đúng');
            }
        }

        public function view_getlogindangxuat(){
            Session::put('Email',null);
            return redirect('trang_chu');
        }

        public function viewdoimatkhau(){
            $taikhoan = Session::get('Email');
            if ($taikhoan) {
                return view('frontend/pages/doi_mat_khau'); /* return đến 1 view truyền bien sanpham vè trang đó */
            }
            else {
                return redirect('trang_chu') ;
            }
        }

        public function postdoimatkhau(Request $request){
            $taikhoan = Session::get('Email');
            $khachhang = khachhang::where('Email',$taikhoan)->first();
            $MaKH = $khachhang->MaKH;
            if($request->matkhaucu=="" || $request->matkhaumoi=="" || $request->matkhaumoi2==""){
                return redirect('doimatkhau') -> with('thongbaokhongthanhcong','không được để trống ô');
            }
            else
            {
                if(MD5($request->matkhaucu) != $khachhang->MatKhau)
                    return redirect('doimatkhau') -> with('thongbaokhongthanhcong','mật khẩu cũ không đúng');
                else{
                    if($request->matkhaumoi != $request->matkhaumoi2)
                        return redirect('doimatkhau') -> with('thongbaokhongthanhcong','Nhập lại mật khẩu mới không đúng');
                }
                

            }
            $update = DB::table('khachhang')->where('MaKH',$MaKH)->update([
                'MatKhau' => MD5($request->matkhaumoi),
            ]);
            return redirect('trang_chu');
        }
    /* đăng nhập - đăng kí - đổi mật khẩu */

    /* show sản phẩm */
        /* show sản phẩm theo loại */
            public function showsanphamid($hangxe){

                $sanpham = sanpham::where('hangxe',$hangxe)->paginate(6);
                return view('frontend/pages/showsanpham_loai',['sanpham'=>$sanpham]);
            }
        /* show sản phẩm theo loại */
        /* view trang chủ - show tất cả sản phẩm */
            public function trangchu(){
                $sanpham=sanpham::paginate(6);
                if(Session::get('Email'))
                {
                    $tongsp = chitietgiohang::where('MaGH',Session::get('Email'))->count();
                    return view('frontend/pages/showsanpham',['sanpham'=>$sanpham],['tongsp'=>$tongsp]);
                }
                $tongsp =0;
                return view('frontend/pages/showsanpham',['sanpham'=>$sanpham],['tongsp'=>$tongsp]);
            }
        /* view trang chủ - show tất cả sản phẩm */
    /* show sản phẩm */

    /* chi tiết sản phẩm */
        public function viewchitietsanpham($MaSP){
            $sanpham = sanpham::where('MaSP',$MaSP)->get();
            return view('frontend/pages/chitietsanpham',['sanpham'=>$sanpham]);
        }
    /* chi tiết sản phẩm */
    /* giỏ hàng */
        /* show giỏ hàng */
            public function viewgiohang(){
                $user_role = Session::get('Email');
                if($user_role){
                    $email = Session::get('Email');
                    $khachhang = khachhang::where('Email',$email)->first();
                    if($khachhang){
                        $giohang = giohang::where('MaKH',$khachhang->MaKH)->first();
                        $chitietgiohang = chitietgiohang::all()->where('MaGH',$giohang->MaGH);
                        $sanpham = sanpham::all();
                        return view('frontend/pages/giohang',['chitietgiohang'=>$chitietgiohang],['sanpham'=>$sanpham]);
                    }
                    else{
                        $giohang = giohang::where('MaGH',Session::get('Email'))->first();
                        $chitietgiohang = chitietgiohang::all()->where('MaGH',$giohang->MaGH);
                        $sanpham = sanpham::all();
                        return view('frontend/pages/giohang',['chitietgiohang'=>$chitietgiohang],['sanpham'=>$sanpham]);
                    }
                    
                }
                return redirect('trang_chu');
            }
        /* show giỏ hàng */
        /* thêm sp vào giỏ hàng */
            public function themvaogiohang($MaSP, Request $request){               
                $sanpham = sanpham::where('MaSP',$MaSP)->first();
                $email = Session::get('Email');              
                if($email==""){
                    $giohang = new giohang;
                    $giohang->MaKH =null;
                    $giohang->save();
                    $giohang = giohang::Orderby('MaGH','desc')->first();
                    Session::put('Email',$giohang->MaGH);
                    $chitietgiohang = chitietgiohang::where('MaSP',$MaSP)->where('MaGH',Session::get('Email'))->first();
                    if($chitietgiohang==""){
                        $chitietgiohang = new chitietgiohang;
                        $chitietgiohang->GiaBan = $sanpham->Gia;
                        $chitietgiohang->SoLuongMua = "1";
                        $chitietgiohang->MaGH = $giohang->MaGH;
                        $chitietgiohang->MaSP = $sanpham->MaSP;
                        $chitietgiohang->save();
                    }
                    else{
                        $update = DB::table('chitietgiohang')->where('MaSP',$MaSP)->where('MaGH',Session::get('Email'))->update([
                            'SoLuongMua' => $chitietgiohang->SoLuongMua + 1,
                        ]);
                    }
                    return redirect('trang_chu');
                }
                $khachhang = khachhang::where('Email',$email)->first();
                if($khachhang==""){
                    $chitietgiohang = chitietgiohang::where('MaSP',$MaSP)->where('MaGH',Session::get('Email'))->first();
                    if($chitietgiohang==""){
                        $chitietgiohang = new chitietgiohang;
                        $chitietgiohang->GiaBan = $sanpham->Gia;
                        $chitietgiohang->SoLuongMua = "1";
                        $chitietgiohang->MaGH = Session::get('Email');
                        $chitietgiohang->MaSP = $sanpham->MaSP;
                        $chitietgiohang->save();
                    }
                    else{
                        $update = DB::table('chitietgiohang')->where('MaSP',$MaSP)->where('MaGH',Session::get('Email'))->update([
                            'SoLuongMua' => $chitietgiohang->SoLuongMua + 1,
                        ]);
                    }
                    return redirect('trang_chu');
                }
                $makh = $khachhang->MaKH;
                $giohang = giohang::where('MaKH',$makh)->first();
                     
                if($giohang==""){
                    $giohang = new giohang;
                    $giohang->MaKH = $khachhang->MaKH;
                    $giohang->save();
                }

                $chitietgiohang = chitietgiohang::where('MaSP',$MaSP)->where('MaGH',$giohang->MaGH)->first();
                if($chitietgiohang==""){
                    $chitietgiohang = new chitietgiohang;
                    $chitietgiohang->GiaBan = $sanpham->Gia;
                    $chitietgiohang->SoLuongMua = "1";
                    $chitietgiohang->MaGH = $giohang->MaGH;
                    $chitietgiohang->MaSP = $sanpham->MaSP;
                    $chitietgiohang->save();
                }
                else{
                    $update = DB::table('chitietgiohang')->where('MaSP',$MaSP)->where('MaGH',$giohang->MaGH)->update([
                        'SoLuongMua' => $chitietgiohang->SoLuongMua + 1,
                    ]);
                }
                return redirect('trang_chu');
            }
        /* thêm sp vào giỏ hàng */
            /* tăng só lượng */
                public function tangsoluong($MaCTGH){
                    $chitietgiohang=chitietgiohang::where('MaCTGH',$MaCTGH)->first();
                    
                   /*  $update = DB::table(sanpham)->where('SoLuong',$SoLuong)->update
                    ([
                        if($chitietgiohang->SoLuongMua > $sanpham->SoLuong)
                    {
                        return redirect('giohang')->with('thongbaokhongthanhcong','don hang khong hop le');
                    }
                    ]); */
                    $update = DB::table('chitietgiohang')->where('MaCTGH',$MaCTGH)->update([
                        'SoLuongMua' => $chitietgiohang->SoLuongMua + 1,
                    ]);
                    return redirect('giohang');
                }    
            /* tăng só lượng */
            /* giảm só lượng */
                public function giamsoluong($MaCTGH){
                    $chitietgiohang=chitietgiohang::where('MaCTGH',$MaCTGH)->first();
                    /* echo $chitietgiohang->SoLuongMua;
                    exit; */
                    if($chitietgiohang->SoLuongMua==1){
                        $chitietgiohang=chitietgiohang::where('MaCTGH',$MaCTGH)->delete();
                        return redirect('giohang');
                    }
                    $update = DB::table('chitietgiohang')->where('MaCTGH',$MaCTGH)->update([
                        'SoLuongMua' => $chitietgiohang->SoLuongMua -1,
                    ]);
                    return redirect('giohang');
                }
            /* giảm só lượng */
            /* xóa */
                public function xoa($MaCTGH){
                    $chitietgiohang=chitietgiohang::where('MaCTGH',$MaCTGH)->delete();
                    /* $update = DB::table('chitietgiohang')->where('MaCTGH',$MaCTGH)->update([
                        'SoLuongMua' => $chitietgiohang->SoLuongMua ,
                    ]); */
                    return redirect('giohang');
                }
            /* xóa */
    /* giỏ hàng */

    /* tìm kiếm sản phẩm */
        public function timkiemsp(Request $request){
            $key = $request->timkiem;
            $sanpham = sanpham::where('TenSP','LIKE','%'.$key.'%')->orwhere('Gia',$key)->orwhere('NoiDungMoTa',$key)->paginate(6);
            return view('frontend/pages/showsanphamtimkiem',['sanpham'=>$sanpham],['key'=>$key],['NoiDungMoTa'=>$key]);
        }
    /* tìm kiếm sản phẩm */

    /* đơn hàng */
        public function viewdonhang(){
            $user_role = Session::get('Email');
            $khachhang = khachhang::where('Email',$user_role)->first();
            if($khachhang)
                return view('frontend/donhang/viewxacnhandonhang',['khachhang'=>$khachhang]);
            else
                return view('frontend/donhang/viewxacnhandonhang-nologin');
        }
        public function post_xacnhandonhang(Request $request){
            
            $test = date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y-m-d H:i:s', time());
            $user_role = Session::get('Email');
            $khachhang = khachhang::where('Email',$user_role)->first();
            /*  */
            $tongtien = 0;
            if($khachhang)
                $giohang = giohang::where('MaKH',$khachhang->MaKH)->first();
            else
                $giohang = giohang::where('MaGH',Session::get('Email'))->first();
            $chitietgiohang = chitietgiohang::where('MaGH',$giohang->MaGH)->get();
            foreach($chitietgiohang as $ctgh){
                $tongtien = $tongtien + $ctgh->GiaBan * $ctgh->SoLuongMua;
            }
            /*  */
            $donhang = new donhang;
            $donhang->TenNguoiNhan = $request ->tennguoinhan;
            $donhang->DiaChiNguoiNhan = $request ->diachinguoinhan;
            $donhang->SDTNguoiNhan = $request ->sdtnguoinhan;
            $donhang->NgayGiaoHang = $request ->ngaygiao;
            $donhang->TrangThaiDH = "0";
            $donhang->NgayGioDatHang = $date;
            $donhang->EmailNguoiDat = $user_role;
            $donhang->TongTien =$tongtien;
            
            $donhang->save();
            $donhang = donhang::where('NgayGioDatHang',$date)->where('EmailNguoiDat',$user_role)->first();
            if($khachhang)
                $giohang = giohang::where('MaKH',$khachhang->MaKH)->first();
            else
                $giohang = giohang::where('MaGH',Session::get('Email'))->first();
           /*  $giohang = giohang::where('MaGH',Session::get('Email'))->first(); */
            $chitietgiohang = chitietgiohang::where('MaGH',$giohang->MaGH)->get();
            foreach($chitietgiohang as $ctgh){
                $chitietdonhang = new chitietdonhang;
                $chitietdonhang ->MaDH = $donhang->MaDH;
                $chitietdonhang ->MaSP = $ctgh->MaSP;
                $chitietdonhang ->Gia = $ctgh->GiaBan;
                $chitietdonhang ->SoLuongMua = $ctgh ->SoLuongMua;
                $chitietdonhang->save();
                $chitietgiohang=chitietgiohang::where('MaGH',$ctgh->MaGH)->where('MaSP',$ctgh->MaSP)->delete();
            }
            
            View::share('donhang', $donhang);
            /* send mail */
            $to_name = "khach hang";
            $to_email = "ducdiduc761311@gmail.com";//send to this email
    
            $data = array("name"=>"mail mua san pham","body"=>"don hang"); //body of mail.blade.php
        
            Mail::send('frontend.pages.sendmail',$data,function($message) use ($to_name,$to_email){
                $message->to($to_email)->subject('đơn hàng mỹ phẩm');//send this mail with subject
                $message->from($to_email,$to_name);//send from this mail
            });
            /* send mail */
            return redirect('trang_chu');
        }
        
    /* đơn hàng */
    public function viewtuvan(){
        $user_role = Session::get('Email');
        $khachhang = khachhang::where('Email',$user_role)->first();
        return view('frontend/tuvan/tuVanSP');
    }
    /*test in
        echo"<pre>";
            print_r ($khachhang);
        echo"</pre>";
        exit; */
}
