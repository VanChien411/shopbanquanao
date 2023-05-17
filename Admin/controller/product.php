<?php
include_once 'model/connetion_user.php';
include_once 'model/catalog.php';
include_once 'model/product.php';
$action = 'index';
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
switch ($action) {
  case 'product':
    $products = getAllProduct();
    include 'view/product/index.php';
    break;

  case 'addNew':
    include 'view/product/add.php';
    break;

  case 'insert':
    // $maSP = $_POST["maSP"];
    $tenSP = $_POST["tenSP"];
    $query = "select * from sanpham where tenSP = '$tenSP'";
    if (mysqli_num_rows($conn->query($query)) != 0) {
      echo '<script type="text/javascript">
                alert("Tên sản phẩm đã tồn tại");           
                myFunction();
                function myFunction() {
                location.href = "index.php?ctrl=product&action=addNew";
                }
              </script>';
    } else {

      $donGia = $_POST["donGia"];
      $giamGia = $_POST["giamGia"];
      $maDM = $_POST["maDM"];
      $soLuong = $_POST["soLuong"];
      $moTa = $_POST["moTa"];
      // $ = $_POST["hinhAnh"];

      $store = "upload/";
      $imageName = $_FILES['image']['name'];
      // Vị trí ảnh
      $imageTemp = $_FILES['image']['tmp_name'];
      // Đuôi của ảnh
      $exp3 = substr($imageName, strlen($imageName) - 3);
      # substr gọi tên ảnh ra rồi sau đó lấy tên từ vị trí (strlen sẽ loại bỏ tất cả các kí tự trước chỉ để lại 3 chữ cuối) abc.jpg
      $exp4 = substr($imageName, strlen($imageName) - 4);
      # substr gọi tên ảnh ra rồi sau đó lấy tên từ vị trí (strlen sẽ loại bỏ tất cả các kí tự trước chỉ để lại 4 chữ cuối) abc.jfif , ...
      if ($exp3 == 'jpg' || $exp3 == 'JPG' || $exp3 == 'png' || $exp3 == 'PNG' || $exp3 == 'bmp' || $exp3 == 'BMP' || $exp3 == 'gif' || $exp3 == 'GIF' || $exp4 == 'jfif' || $exp4 == 'JFIF' || $exp4 == 'JFIF' || $exp4 == 'webp' || $exp4 == 'WEBP') {
        $imageName = time() . '_' . $imageName;
        // Độ lệch về thời gian đăng ảnh
        move_uploaded_file($imageTemp, $store . $imageName);
        // updateProduct($productId,$productName,$productCode,$description,$price,$starRating,$subPath,$catalogId);
        // $thongbao="File đã chọn không phải file ảnh!!!";
        addNewProduct($tenSP, $imageName, $donGia, $giamGia, $maDM, $soLuong, $moTa);

        echo '<script type="text/javascript">
                alert("Bạn đã thêm thành công");           
                myFunction();
                function myFunction() {
                location.href = "index.php?ctrl=product&action=product";
                }
              </script>';
      } else {
        $thongbao = "File đã chọn không phải file ảnh!!!";
      }
    }
    break;

  case 'delete':
    $maSP = $_GET['maSP'];
    deleteProduct($maSP);
    echo '<script type="text/javascript">
        alert("Bạn đã xóa thành công");           
        myFunction();
        function myFunction() {
        location.href = "index.php?ctrl=product&action=product";
        }
      </script>';

  case 'edit':
    $maSP = $_GET['maSP'];
    include 'view/product/edit.php';
    break;

  case 'updata':
    $maSP = $_POST["maSP"];
    $tenSP = $_POST["tenSP"];
    $query = "select * from sanpham where maSP = '$maSP'";

    // if(mysqli_num_rows($conn->query($query))!=0){
    //     echo '<script type="text/javascript">
    //         alert("Tên sản phẩm đã tồn tại");           
    //         myFunction();
    //         function myFunction() {
    //         location.href = "index.php?ctrl=product&action=product";
    //         }
    //       </script>';
    // }else{


    $donGia = $_POST["donGia"];
    $giamGia = $_POST["giamGia"];
    $maDM = $_POST["maDM"];
    $soLuong = $_POST["soLuong"];
    $moTa = $_POST["moTa"];

    $store = "upload/";
    $imageName = $_FILES['image']['name'];
    // Vị trí ảnh
    $imageTemp = $_FILES['image']['tmp_name'];
    // Đuôi của ảnh
    $exp3 = substr($imageName, strlen($imageName) - 3);
    # substr gọi tên ảnh ra rồi sau đó lấy tên từ vị trí (strlen sẽ loại bỏ tất cả các kí tự trước chỉ để lại 3 chữ cuối) abc.jpg
    $exp4 = substr($imageName, strlen($imageName) - 4);
    # substr gọi tên ảnh ra rồi sau đó lấy tên từ vị trí (strlen sẽ loại bỏ tất cả các kí tự trước chỉ để lại 4 chữ cuối) abc.jfif , ...
    if ($exp3 == 'jpg' || $exp3 == 'JPG' || $exp3 == 'png' || $exp3 == 'PNG' || $exp3 == 'bmp' || $exp3 == 'BMP' || $exp3 == 'gif' || $exp3 == 'GIF' || $exp4 == 'jfif' || $exp4 == 'JFIF' || $exp4 == 'JFIF' || $exp4 == 'webp' || $exp4 == 'WEBP') {
      $imageName = time() . '_' . $imageName;
      // Độ lệch về thời gian đăng ảnh
      move_uploaded_file($imageTemp, $store . $imageName);
      // updateProduct($productId,$productName,$productCode,$description,$price,$starRating,$subPath,$catalogId);
      // $thongbao="File đã chọn không phải file ảnh!!!";
    }
    updateProduct($maSP, $tenSP, $imageName, $donGia, $giamGia, $maDM, $soLuong, $moTa);

    // truy vấn tên sản phẩm dựa trên mSP
    
   
      echo '<script type="text/javascript">
      alert("Bạn đã sữa thành công '.$exp3.'");           
      myFunction();
      function myFunction() {
      location.href = "index.php?ctrl=product&action=product";
      }
    </script>';

    break;
  case 'detail':
  $maSP = $_GET['maSP'];
  include 'view/product/detail.php';
  break;
  default:
    // code...
    break;
}
?>