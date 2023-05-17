<?php
include_once 'model/connetion_user.php';
include_once 'model/catalog.php';
include_once 'model/database.php';
include_once 'model/oder.php';
include_once 'model/product.php';
$action='index'; //action to wiew
if(isset($_GET['action'])){
    $action = $_GET['action'];
}

switch ($action) {
    case 'index':
        $oder = getAllOder();
        include 'view/oder/oder.php';
        break;
    case 'oder':
        include 'view/oder/oder.php';
        break;
    case 'logout':
        unset($_SESSION['admin']);
        header("location:login.php");
        break;
    case 'comment':
        $cmt = getAllComment();
        include 'view/oder/comment.php';
        break;
    case 'catalog':
        include 'view/oder/catalog.php';
        break;
    case 'addnew':                       
        include 'view/oder/add.php';
            
        break;
    case 'insert':                       
        // $maDM = $_POST["maDM"];
        $tenDM = $_POST["tenDM"];
        $query="select * from danhmuc where tenDM = '$tenDM'";
        if(mysqli_num_rows($conn->query($query))!=0){
            echo '<script type="text/javascript">
                alert("Tên danh mục đã tồn tại");           
                myFunction();
                function myFunction() {
                location.href = "index.php?ctrl=view&action=addnew";
                }
              </script>';
        }else{
            addNewCatalog($tenDM);
            echo '<script type="text/javascript">
                alert("Bạn đã thêm danh mục thành công");           
                myFunction();
                function myFunction() {
                location.href = "index.php?ctrl=view&action=catalog";
                }
              </script>';
        }
        break;
    case 'edit':
            $id=$_GET['maDM'];
            include 'view/oder/edit.php';
            break;
    case 'updata':
            // $id=$_GET['maDM'];
            $maDM = $_POST["maDM"];
            $tenDM = $_POST["tenDM"];
            
            $query="select * from danhmuc where tenDM = '$tenDM'";
            if(mysqli_num_rows($conn->query($query))!=0){
                echo '<script type="text/javascript">
                    alert("Tên danh mục đã tồn tại");           
                    myFunction();
                    function myFunction() {
                    location.href = "index.php?ctrl=view&action=catalog";
                    }
                  </script>';
            }else{
                updateCatalog($maDM,$tenDM);
                echo '<script type="text/javascript">
                alert("Bạn đã sửa danh mục thành công");           
                myFunction();
                function myFunction() {
                location.href = "index.php?ctrl=view&action=catalog";
                }
                </script>';
            }
        break;
            
    case 'delete':
            $id=$_GET['maDM'];
            deleteCatalog($id);
                echo '<script type="text/javascript">
                    alert("Bạn đã xóa thành công");           
                      myFunction();
                      function myFunction() {
                        location.href = "index.php?ctrl=view&action=catalog";
                      }
                    </script>';    
                    break;
    case 'deleteBL':
        $id=$_GET['maBL'];
        deleteComment($id);
            echo '<script type="text/javascript">
                alert("Bạn đã xóa thành công");           
                    myFunction();
                    function myFunction() {
                    location.href = "index.php";
                    }
                </script>';    
                break;
    case 'thongke':
        $listThongKe = listTK();
        include 'view/thongke/thongke.php';
        break;
    case 'bieudo':
        $listThongKe = listTK();
        include 'view/thongke/bieudo.php';
        break;
    case 'user':
        $a = getAllUser();
        include 'view/oder/user.php';
        break;
    case 'deleteKH':
        $id=$_GET['maKH'];
        deleteUser($id);
            echo '<script type="text/javascript">
                alert("Bạn đã xóa thành công");           
                    myFunction();
                    function myFunction() {
                        location.href = "index.php?ctrl=view&action=user";
                    }
                </script>';    
                break;
    case 'editKH':
        $id=$_GET['maKH'];
        include 'view/oder/editKH.php';
        break;
    case 'updataKH':
        $maKH = $_POST['maKH'];
        $tenDN = $_POST['tenDN'];
       
                $matKhau = $_POST['matKhau'];
                $tenKH = $_POST['tenKH'];
                $SDT = $_POST['SDT'];
                $diaChi = $_POST['diaChi'];
                $email = $_POST['email'];
                $vaiTro = $_POST['vaitro'];
                $trangThai = $_POST['trangThai'];
                if(   isset($_FILES['image']['name']) )
                {
                $store="../upload/";
                $imageName=$_FILES['image']['name'];
                // Vị trí ảnh
                $imageTemp=$_FILES['image']['tmp_name'];
                // Đuôi của ảnh
                $exp3=substr($imageName, strlen($imageName)-3);
                # substr gọi tên ảnh ra rồi sau đó lấy tên từ vị trí (strlen sẽ loại bỏ tất cả các kí tự trước chỉ để lại 3 chữ cuối) abc.jpg
                $exp4=substr($imageName, strlen($imageName)-4);
                # substr gọi tên ảnh ra rồi sau đó lấy tên từ vị trí (strlen sẽ loại bỏ tất cả các kí tự trước chỉ để lại 4 chữ cuối) abc.jfif , ...
                if($exp3=='jpg'||$exp3=='JPG'||$exp3=='png'||$exp3=='PNG'||$exp3=='bmp'||$exp3=='BMP'||$exp3=='gif'||$exp3=='GIF'||$exp4=='jfif'||$exp4=='JFIF'||$exp4=='JFIF'||$exp4=='webp'||$exp4=='WEBP'){
                    $imageName=time().'_'.$imageName;
                    // Độ lệch về thời gian đăng ảnh
                    move_uploaded_file($imageTemp,$store.$imageName);
                    // Chuyền thành tên miền với số lượng
                }
            }
            else
            $imageName ='#';

           
            $link = new PDO('mysql:host=localhost;dbname=duan1','root','');
            $giang = "select * from khachhang where maKH = $maKH";
            $result=$link->query($giang);
            $rows = $result->fetch(PDO::FETCH_ASSOC);
            echo $vaiTro;

                update_user($tenDN,$matKhau,$tenKH,$imageName,$email,$diaChi,$SDT,$vaiTro,$trangThai,$maKH);
                echo '<script type="text/javascript">
                alert("Bạn đã sua thành công");           
                    myFunction();
                    function myFunction() {
                    location.href = "index.php?ctrl=view&action=user";
                    }
                </script>';
            
        break;
   
    case 'insertDHAndCTDH':
        
       
         $tenDN = $_GET["tenDN"];
         $soLuong = $_POST["soLuong"];
         $donGia = $_POST["donGia"];

        
         $query="select * from khachhang where tenDN = '$tenDN'";
         addDHAnhCTDH($tenDN);
          
             echo '<script type="text/javascript">
                 alert("Bạn đã thêm danh mục thành công");           
                 myFunction();
                 function myFunction() {
                 location.href = "index.php?ctrl=view&action=oder";
                 }
               </script>';
         
         break;
    case 'deleteDH':
        $id=$_GET['maDH'];
        deleteOder($id);
            echo '<script type="text/javascript">
                alert("Bạn đã xóa thành công");           
                    myFunction();
                    function myFunction() {
                    location.href = "index.php?ctrl=view&action=oder";
                    }
                </script>';
            break;
    case 'updateDH':
            $id=$_GET['maDH'];
            include 'view/oder/editDH.php';
            break;
    
    case 'updataDH':
            $maDH = $_POST["maDH"];
            $trangThai = $_POST["trangThai"];
            updateDH($maDH,$trangThai);

            echo '<script type="text/javascript">
                alert("Bạn đã sửa danh mục thành công");           
                myFunction();
                function myFunction() {
                location.href = "index.php?ctrl=view&action=oder";
                }
                </script>';
            break;
    }
?>