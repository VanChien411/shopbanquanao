<?php   
  
    include "../global.php";
    include "../DAO/pdo.php";
    include "../DAO/connetion_user.php";
    include "../DAO/khachhang.php";
    include "../DAO/sanpham.php";
    include "../DAO/danhmuc.php";
    include "../DAO/binhluan.php";
    include "../DAO/donhang.php";
    $dm=loadall_brand();
    include "header.php";
    if(!isset($_SESSION['cart'])) $_SESSION['cart'] =[];
?>
<?php 
    $listsp1=loadall_product_home1();
    $listsp2=loadall_product_home2();
    $listsp3=loadall_product_home3();
    $listsp4=loadall_product_home4();
    $listsp5=loadall_product_home5();
    $listsp6=loadall_product_home6();
    $top=loadtop_product_home();
    if(isset($_GET['act'])){
        $act =  $_GET['act'];
        switch($act){
            case 'trangchu':
                include "banner.php";
                include "../User/brand/all_brand.php";
                include "../User/product/all_product.php";
                include "banner_footer.php";
                include "../User/product/top_product.php";
                break;
            case 'admin':
                header("Location:../Admin/index.php");
                break;
            // controller sanpham    
            case 'detail_product':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $detail=loadone_product_home($_GET['id']);
                    $maDM=$detail['maDM'];
                    $related=loadRelated_product_home($maDM);
                    views($_GET['id']);
                    // $number = load_specifications($_GET['id']);
                    $number = '';
                    include "../User/product/detail_product.php";
                    include "../User/product/related_product.php";
                }else{
                    $top=loadtop_product_home();
                    include "../User/product/top_product.php";
                }
                break;
            case "timkiem":
                if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                    $kyw = $_POST['kyw'];
                }else{
                    $kyw ="";
                }
                if(isset($_GET['maDM'])&&($_GET['maDM']>0)){
                    $maDM = $_GET['maDM'];
                } else{
                    $maDM = 0;
                }
                $dssp = loadall_product($kyw,$maDM);
                include "../User/product/search_product.php";
                break;
            // controller giohang
            case 'cart':
                include "../User/cart/viewcart.php";
                break;
            case 'addtocart':
                if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
                    $maSP=$_POST['maSP'];
                    $tenSP=$_POST['tenSP'];
                    $hinhAnh=$_POST['hinhAnh'];
                    $donGia=$_POST['donGia'];
                    $soLuong=1;
                    $ttien= $soLuong * $donGia;
                    $spadd=[$maSP,$tenSP,$hinhAnh,$donGia,$soLuong,$ttien];
                    array_push($_SESSION['cart'],$spadd);
                }
                include "../User/cart/viewcart.php";
                break;
            case 'delcart':
                if(isset($_GET['idcart'])){
                    array_splice($_SESSION['cart'],$_GET['idcart'],1);
                }else{
                    $_SESSION['cart']=[];
                }
                header("Location:index.php?act=cart");
                break;
            case 'bill':
                $result = load_bill();
                include "../User/cart/bill.php";
                break; 
            case 'billsuccess':
                if(isset($_POST['dathang'])&&($_POST['dathang'])){
                    $name =$_POST['name'];
                    $email =$_POST['email'];
                    $diaChi =$_POST['diaChi'];
                    $SDT =$_POST['SDT'];
                    $notes =$_POST['notes'];
                    $ngayDH = date("h:i:sa d/m/Y");
                    // $tongdonhang= tongdonhang();
                    $tongdonhang= 1;

                    $ttien = tongtien();
                    $maTT=$_POST['maTT'];
                    $maDH=$_POST['maDH'];
                
                    foreach ($_SESSION['cart'] as $cart) {
                     
                        $idbill=add_bill($_SESSION['user']['maKH'],$maTT,$_SESSION['user']['tenKH'],$cart[2],$diaChi,$SDT,$notes,$ngayDH);
                        add_bill_details($idbill,$cart[0],$cart[3],$tongdonhang);
                            echo"<script>alert('Bạn đã đặt hàng thành công!!!');
                                location='index.php?act=trangchu';</script>";
                    }
                $_SESSION['cart'] =[];
                }
                break;
            case 'mybill':
                $result=loadall_cart($_SESSION['user']['maKH']);
                include "../User/cart/mybill.php";
                break;
            // controller User
            case 'account':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $result=load_user($_GET['id']);
                }
                include "../User/user/account.php";
                break;
            case 'login':
                if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])!=""){
                    $username = $_POST['username'];
                    $password=($_POST['password']);
                    $checkuser=login_user($username,$password);
                    if(is_array($checkuser)){
                        $_SESSION['user']=$checkuser;
                        echo"<script>alert('Đăng nhập thành công!!!');
                                location='index.php?act=trangchu';</script>";
                    }else{
                        echo"<script>alert('Sai mật khẩu hoặc tài khoản mời đăng nhập lại!!!');
                                location='index.php?act=account';</script>";
                    }
                }
                
                
                break;
            case 'register':
                if(isset($_POST['dangky'])&&($_POST['dangky'])){
                    $username = $_POST['username'];
                    $query="select * from khachhang where tenDN = '$username'";
                    if(mysqli_num_rows($conn->query($query))!=0){
                        echo"<script>alert('Tên tài khoản đã tồn tại!!!');
                                    location='index.php?act=account';</script>";
                    }else{
                        $password=$_POST['password'];
                        $name=$_POST['name'];
                        $sdt=$_POST['sdt'];
                        $diachi=$_POST['diachi'];
                        $email=$_POST['email'];
                        $store="/../Admin/upload/";
                        $imageName=$_FILES['image']['name'];
                        // Vị trí ảnh
                        $imageTemp=$_FILES['image']['tmp_name'];
                        // Đuôi của ảnh
                        $exp3=substr($imageName, strlen($imageName)-3);
                        # substr gọi tên ảnh ra rồi sau đó lấy tên từ vị trí (strlen sẽ loại bỏ tất cả các kí tự trước chỉ để lại 3 chữ cuối) abc.jpg
                        $exp4=substr($imageName, strlen($imageName)-4);
                        # substr gọi tên ảnh ra rồi sau đó lấy tên từ vị trí (strlen sẽ loại bỏ tất cả các kí tự trước chỉ để lại 4 chữ cuối) abc.jfif , ...
                        if($exp3=='jpg'||$exp3=='JPG'||$exp3=='png'||$exp3=='PNG'||$exp3=='bmp'||$exp3=='BMP'||$exp3=='gif'||$exp3=='GIF'||$exp4=='jfif'||$exp4=='JFIF'||$exp4=='JFIF'||$exp4=='webp'||$exp4=='WEBP'||$exp4=='jpeg'||$exp4=='JPEG'){
                            $imageName=time().'_'.$imageName;
                            // Độ lệch về thời gian đăng ảnh
                            move_uploaded_file($imageTemp,$store.$imageName);
                            // Chuyền thành tên miền với số lượng
                            $password= trim(strip_tags($password));
                            if(strlen($password)<6){
                                echo"<script>alert('Mật khẩu ngắn quá!!!');
                                    location='index.php?act=account';</script>";
                            }else{
                                register_user($username,$password,$name,$imageName,$email,$diachi,$sdt);
                                echo"<script>alert('Đăng ký thành công!!!');
                                    location='index.php?act=trangchu';</script>";
                            }
                            
                        }else{
                            echo"<script>alert('File của bạn không phải file ảnh mời chọn lại!!!');
                                    location='index.php?act=account';</script>";
                        }
                        echo"<script>alert('Đăng ký không thành công!!!');
                                    location='index.php?act=account';</script>";
                    }
                }
                break;
            case 'logout':
                unset($_SESSION['user']);
                header("Location:./index.php");
                break;
            case 'cpass':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])!=""){
                    $maKH=$_POST['maKH'];
                    $pass_old = $_POST['pass_old'];
                    $pass_new1 = $_POST['pass_new1'];
                    $pass_new2 = $_POST['pass_new2'];
                    $pass_old= trim(strip_tags($pass_old));
                    $pass_new1= trim(strip_tags($pass_new1));
                    $pass_new2= trim(strip_tags($pass_new2));
                    if(strlen($pass_new1)<6){
                        $thongbao = "Mật khẩu mới ngắn quá!";
                    }else if($pass_new1!=$pass_new2){
                        $thongbao ="Hai mật khẩu không giống nhau!";
                    }else {
                        $result=check_password($pass_old);
                        if(is_array($result)==0){
                            $thongbao="Mật khẩu củ của bạn không đúng!!!";
                        }else{
                            $thongbao="Đổi mật khẩu thành công!!!";
                            upload_password_home($pass_new1,$maKH);
                        }
                    }
                    $result=load_user($_POST['maKH']);
                }
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $result=load_user($_GET['id']);
                }
                include "../User/user/cpass.php";
                break;
            case 'forgot_pass':
                include '../User/user/forgot_pass.php';
                break;
            case 'update_user':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $name=$_POST['name'];
                    $sdt=$_POST['sdt'];
                    $diachi=$_POST['diachi'];
                    $email=$_POST['email'];
                    $maKH=$_POST['maKH'];
                    $store="/../Admin/upload/";
                    $imageName=$_FILES['image']['name'];
                    // Vị trí ảnh
                    $imageTemp=$_FILES['image']['tmp_name'];
                    // Đuôi của ảnh
                    $exp3=substr($imageName, strlen($imageName)-3);
                    # substr gọi tên ảnh ra rồi sau đó lấy tên từ vị trí (strlen sẽ loại bỏ tất cả các kí tự trước chỉ để lại 3 chữ cuối) abc.jpg
                    $exp4=substr($imageName, strlen($imageName)-4);
                    # substr gọi tên ảnh ra rồi sau đó lấy tên từ vị trí (strlen sẽ loại bỏ tất cả các kí tự trước chỉ để lại 4 chữ cuối) abc.jfif , ...
                    if($exp3=='jpg'||$exp3=='JPG'||$exp3=='png'||$exp3=='PNG'||$exp3=='bmp'||$exp3=='BMP'||$exp3=='gif'||$exp3=='GIF'||$exp4=='jfif'||$exp4=='JFIF'||$exp4=='JFIF'||$exp4=='webp'||$exp4=='WEBP'||$exp4=='jpeg'||$exp4=='JPEG'){
                        $imageName=time().'_'.$imageName;
                        // Độ lệch về thời gian đăng ảnh
                        move_uploaded_file($imageTemp,$store.$imageName);
                        // Chuyền thành tên miền với số lượng
                    }else{
                        echo"<script>alert('Cập nhật không thành công!!!');
                                location='index.php?act=account';</script>";
                    }
                    upload_user_home($name,$imageName,$email,$diachi,$sdt,$maKH);
                    echo"<script>alert('Cập nhật thành công!!!');
                                location='index.php?act=account&id=$maKH';</script>";
                    // header("Location:./index.php?act=account&id=$maKH");
                }
                break;    
            case 'cmt':
                if(isset($_POST['cmt'])&&($_POST['cmt'])){
                    $comment = $_POST['comment'];
                    $maKH = $_SESSION['user']['maKH'];
                    $maSP = $_POST['maSP'];
                    $ngayBL = date("h:i:sa d/m/Y");
                    add_Comment($comment,$maSP,$maKH,$ngayBL);
                    header("Location:./index.php?act=detail_product&id=$maSP");
                }
                break;
            default :
                include "error.php";    
        }
    }else{
        include "banner.php";
        include "../User/brand/all_brand.php";
        include "../User/product/all_product.php";
        include "banner_footer.php";
        include "../User/product/top_product.php";
    }
?>
<?php
    include "footer.php";
?>