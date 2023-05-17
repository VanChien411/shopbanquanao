<?php
    include_once('database.php');
      function getAllProduct()
      {
          $sql="SELECT * from sanpham order by MaSP";
          return query($sql);
      }
      // function addProduct($catalogId,$name,$img)
      // {
      //   $sql="insert into products(catalog_id,name,image_link) values('$catalogId','$name','$img')";
      //   execute($sql);
      // }
      function deleteProduct($maSP)
      {
          $sql="delete from sanPham where maSP='$maSP'";
          execute($sql);
      }
      function addNewProduct($tenSP,$hinhAnh,$donGia,$giamGia,$maDM,$soLuong,$moTa)
      {
          $sql="insert into sanpham (
            tenSP,
            hinhAnh,
            donGia,
            giamGia,
            maDM,
            ngayNhap,
            soLuong,
            moTa) 
          values(
            '$tenSP',
            '$hinhAnh',
            '$donGia',
            '$giamGia',
            '$maDM',
            'now()',
            '$soLuong',
            '$moTa')";
          execute($sql);
      }
      function updateProduct($maSP,$tenSP,$hinhAnh,$donGia,$giamGia,$maDM,$soLuong,$moTa)
      {
       
        if($hinhAnh == '')
        {
          $link = new PDO('mysql:host=localhost;dbname=duan1','root','');
          $giang = "select * from sanpham where maSP = $maSP";
          $result=$link->query($giang);
          $rows = $result->fetch(PDO::FETCH_ASSOC);
          $hinhAnh = $rows['hinhAnh'];

        }

          $sql="update sanpham set 
              tenSP='$tenSP',
              hinhAnh='$hinhAnh',
              donGia='$donGia',
              giamGia='$giamGia',
              maDM='$maDM',
              ngayNhap='now()',
              soLuong='$soLuong',
              moTa='$moTa'
                where maSP='$maSP'";
              
        execute($sql);
      }
      function checkname($tenSP) {
        $sql = "SELECT * FROM sanpham where tenSP =".$tenSP;
        $number = queryOne($sql);
        return $number;
      }
?>
