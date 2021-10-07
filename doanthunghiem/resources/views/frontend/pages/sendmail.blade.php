<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gửi mail</title>
</head>
<body>

    <table class="table" border="1">
        <thead>
            <tr>
                <th scope="col">người nhận</th>
                <th scope="col">địa chỉ</th>
                <th scope="col">SDT người nhận</th>
                <th scope="col">Email người đặt</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">giờ đặt hàng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$donhang->TenNguoiNhan}}</td>
                <td>{{$donhang->DiaChiNguoiNhan}}</td>
                <td>{{$donhang->SDTNguoiNhan}}</td>
                <td>{{$donhang->EmailNguoiDat}}</td>
                <td>{{$donhang->TongTien}}</td>
                <td>{{$donhang->NgayGioDatHang}}</td>
            </tr>
            
        </tbody>
    </table>
</body>
</html>