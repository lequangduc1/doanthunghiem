<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\sanpham;
use App\khachhang;
use App\admin;
use App\nhanvien;
use App\donhang;
use App\chitietdonhang;

class danhmucgiaodien extends Controller
{
    public function quanlygiaodiennguoidung(){
        $data = Session::get('tendangnhap');
        $admin = admin::where('tendangnhap',$data)->first();
        $nhanvien = nhanvien::where('TenDangNhap',$data)->first();

        if($admin){
            $donhang = donhang::all();
            $chitietdonhang = chitietdonhang::all();
            return view('admin/giaodiennguoidung/viewgiaodiennguoidung',['donhang'=>$donhang],['chitietdonhang'=>$chitietdonhang]);
        }
        if($nhanvien){
            if($nhanvien->MaBP =='8'){ //sua
                $donhang = donhang::all();
                $chitietdonhang = chitietdonhang::all();
                return view('admin/giaodiennguoidung/viewgiaodiennguoidung',['donhang'=>$donhang],['chitietdonhang'=>$chitietdonhang]);
            }
            else{
                return redirect('admin_layout');
            }
        }
        return redirect('admin');
    }
}
