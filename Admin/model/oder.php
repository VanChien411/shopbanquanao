<?php
include_once('database.php');
function getAllOder()
{
    $sql = "SELECT * FROM khachhang 
          INNER JOIN donhang ON khachhang.MaKH = donhang.MaKH
          INNER JOIN chitietdonhang ON donhang.MaDH = chitietdonhang.MaDH
          INNER JOIN sanpham ON chitietdonhang.MaSP = sanpham.MaSP";
    return query($sql);
}
function update_user($tenDN, $matKhau, $tenKH, $imageName, $email, $diaChi, $SDT, $vaiTro, $trangThai, $maKH)
{
    echo $vaiTro;
    // if ($imageName != "") {
    //     $sql = "UPDATE khachhang set tenDN='" . $tenDN . "', matKhau= '" . $matKhau . "', tenKH = '" . $tenKH . "' , hinhAnh = '" . $imageName . "' , email='" . $email . "' , diaChi='" . $diaChi . "' , SDT='" . $SDT . "' , vaiTro='1' , trangThai='" . $trangThai . "' where maKH=" . $maKH;
    // } else {
    //     $sql = "UPDATE khachhang set tenDN='" . $tenDN . "', matKhau= '" . $matKhau . "', tenKH= '" . $tenKH . "' , email='" . $email . "' , diaChi='" . $diaChi . "' , SDT='" . $SDT . "' , vaiTro='" . 1 . "' , trangThai='" . $trangThai . "' where maKH=" . $maKH;
    // }
    // execute($sql);
    $sql = "UPDATE khachhang SET tenDN='$tenDN', matKhau='$matKhau', tenKH='$tenKH', hinhAnh='$imageName', email='$email', diaChi='$diaChi', trangThai='$trangThai', vaiTro='$vaiTro', SDT='$SDT' WHERE maKH='$maKH'";
  execute($sql);
}
function addDHAnhCTDH($tenDN)
{

    $soLuong = $_POST["soLuong"];
    $donGia = $_POST["donGia"];
    $maSP = $_POST["maSP1"];

    $pdo = new PDO('mysql:host=localhost;dbname=duan1', 'root', '');
    $sql = "SELECT * FROM khachhang WHERE tenDN = :tenDN";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['tenDN' => $tenDN]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $user['maKH'];

    $maKH = $user['maKH'];
    $maTT = 1;
    $tenKH = $user['tenKH'];
    $hinhAnh = '#';
    $diaChi = "Dako";
    $SDT = 0245642252626;
    $ghiChu = '';
    $trangThai = 1;

    $sql1 = "INSERT INTO donhang (maKH, maTT, tenKH, hinhAnh, diaChi, SDT, ghiChu, trangThai, ngayDH) 
    VALUES ('$maKH', '$maTT', '$tenKH', '$hinhAnh', '$diaChi', '$SDT', '$ghiChu', '$trangThai', CURRENT_TIMESTAMP)";
    execute($sql1);
    
    //Láy id vừa thêm 
    $sql3= "SELECT * FROM donhang ORDER BY maDH DESC LIMIT 1";
    $stmt = $pdo->prepare($sql3);
    $stmt->execute();
    $id = $stmt->fetch(PDO::FETCH_ASSOC);

    echo 'id'.$id['maDH'];
    $id = $id['maDH'];
    $sql2 = "INSERT INTO chitietdonhang (maSP, maDH, donGia, soLuongMua) 
    VALUES ('$maSP', '$id', '$donGia', '$soLuong')";
    execute($sql2);
}
function getAllComment()
{
    $sql = "SELECT * FROM binhluan
          INNER JOIN sanpham ON sanpham.maSP = binhluan.maBL
          INNER JOIN khachhang ON khachhang.maKH = binhluan.maKH";
    return query($sql);
}
function set_status($trangThai)
{
    switch ($trangThai) {
        case 1:
            $stt = "Đã xử lý";
            break;
        case 2:
            $stt = "Đang vận chuyển";
            break;
        case 3:
            $stt = "Đã hoàn tất";
            break;
        case 0:
            $stt = "Đơn hàng mới";
            break;
    }
    return $stt;
}
function listTK()
{
    $sql = "select sanpham.maDM, tenDM, count(sanpham.maSP) as countsp, min(sanpham.donGia) as minGia, max(sanpham.donGia) as maxGia
          from sanpham left join danhmuc on danhmuc.maDM=sanpham.maDM group by danhmuc.maDM order by danhmuc.maDM desc";
    return query($sql);
}
?>