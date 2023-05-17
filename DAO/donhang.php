<?php
    function tongdonhang()
    {
        $tong=0;
        foreach ($_SESSION['cart'] as $cart){
            $ttien= $cart[3] * $cart[4];
            $tong ++;
        }
        return $tong;
    }
    function tongtien()
    {
        foreach ($_SESSION['cart'] as $cart){
            $ttien= $cart[3] * $cart[4];
        }
        return $ttien;
    }
    function add_bill($maKH,$maTT,$tenKH,$hinhAnh,$diaChi,$SDT,$ghiChu,$ngayDH){
        $sql="INSERT INTO donhang (maKH	, maTT , tenKH , hinhAnh , diaChi, SDT, ghiChu, ngayDH) values('$maKH', '$maTT', '$tenKH', '$hinhAnh' , '$diaChi', '$SDT', '$ghiChu', '$ngayDH')";
        return pdo_execute_return_lastInsertId($sql);
    }
    function add_bill_details($maDH,$maSP,$donGia,$soLuongMua){
        $sql="INSERT INTO chitietdonhang (maDH, maSP , donGia , soLuongMua) values('$maDH','$maSP', '$donGia', '$soLuongMua')";
        pdo_execute($sql);
    }
    function load_bill(){
        $sql = "SELECT * FROM donhang";
        $result=pdo_query($sql);
        return $result;
    }
    function loadall_cart_home($maDH){
        $sql = "SELECT b.maDH,b.tenKH,a.email ,b.diaChi ,b.SDT,b.ghiChu,b.trangThai ,b.hinhAnh ,c.donGia ,c.soLuongMua ,d.tenSP, b.ngayDH
        from khachhang a JOIN donhang b on a.maKH = b.maKH JOIN 
        chitietdonhang c ON b.maDH = c.maDH JOIN 
        sanpham d ON c.maSP = d.maSP WHERE b.maDH =".$maDH;
        $result=pdo_query($sql);
        return $result;
    }
    function loadall_cart($maKH){
        $sql = "SELECT b.maDH,b.tenKH,a.email ,b.diaChi ,b.SDT,b.ghiChu,b.trangThai ,b.hinhAnh ,c.donGia ,c.soLuongMua ,d.tenSP, b.ngayDH
        from khachhang a JOIN donhang b on a.maKH = b.maKH JOIN 
        chitietdonhang c ON b.maDH = c.maDH JOIN 
        sanpham d ON c.maSP = d.maSP WHERE a.maKH = '".$maKH."' order by b.maDH desc limit 10";
        $result=pdo_query($sql);
        return $result;
    }
    function set_status($trangThai){
        switch($trangThai){
            case '1':
                $stt="Đã xử lý";
                break;
            case '2':
                $stt="Đang vận chuyển";
                break;
            case '3':
                $stt="Đã hoàn tất";
                break;
            default:
                $stt="Đơn hàng mới";
                break;
        }
        return $stt;
    }
?>