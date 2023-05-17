<?php
    function register_user($username,$password,$name,$imageName,$email,$diachi,$sdt){
        $sql = "INSERT INTO khachhang (tenDN,matKhau,tenKH,hinhAnh,email,diaChi,SDT) Values ( '$username', '$password', '$name', '$imageName', '$email', '$diachi', '$sdt')";
        pdo_execute($sql);
    }
    function login_user($username,$password){
        $sql = "SELECT * from khachhang where tenDN ='".$username."' and matKhau = '".$password."'";
        $checkuser=pdo_query_one($sql);
        return $checkuser;
    }
    function load_user($id){
        $sql = "SELECT * FROM khachhang WHERE maKH = ".$id;
        $result=pdo_query_one($sql);
        return $result;
    }
    function loadall_user(){
        $sql ="SELECT * FROM khachhang order by maKH desc";
        $results = pdo_query($sql);
        return $results;
    }
    function upload_user_home($name,$imageName,$email,$diachi,$sdt,$maKH){
        if($imageName !=""){
            $sql = "UPDATE khachhang SET tenKH = '".$name."', hinhAnh = '".$imageName."', email = '".$email."', diaChi = '".$diachi."', SDT = '".$sdt."' WHERE maKH = ".$maKH;
        }else{
            $sql = "UPDATE khachhang SET tenKH = '".$name."', email = '".$email."', diaChi = '".$diachi."', SDT = '".$sdt."' WHERE maKH = ".$maKH; 
        }
        pdo_execute($sql);
    }
    function update_user($username,$password,$name,$imageName,$email,$diachi,$sdt){
        if($imageName !=""){
            $sql = "UPDATE khachhang set tenDN='".$tenDN."', matKhau= '".$matKhau."', tenKH = '".$tenKH."' , hinhAnh = '".$imageName."' , email='".$email."' , diaChi='".$diaChi."' , SDT='".$SDT."' , vaiTro='".$vaiTro."' , trangThai='".$trangThai."' , vaiTro='".$vaiTro."' where maKH=".$maKH;
        }else{
            $sql = "UPDATE khachhang set tenDN='".$tenDN."', matKhau= '".$matKhau."', tenKH= '".$tenKH."' , email='".$email."' , diaChi='".$diaChi."' , SDT='".$SDT."' , vaiTro='".$vaiTro."' , trangThai='".$trangThai."' , vaiTro='".$vaiTro."' where maKH=".$maKH;
        }
        pdo_execute($sql);
    }
    function check_password($pass_old){
        $sql = "SELECT * FROM khachhang WHERE matKhau = ".$pass_old;
        $result=pdo_query_one($sql);
        return $result;
    }
    function upload_password_home($pass_new1,$maKH){
        $sql ="UPDATE khachhang SET matKhau = '".$pass_new1."'WHERE maKH = ".$maKH;
        pdo_execute($sql);
    }
    function add_user($tenDN,$matKhau,$tenKH,$imageName,$email,$diaChi,$SDT,$vaiTro){
        $sql = "INSERT INTO khachhang (tenDN,matKhau,tenKH,hinh,email,diaChi,SDT,vaiTro) Values ( '$tenDN', '$matKhau', '$tenKH', '$imageName', '$email', '$diaChi', '$SDT', '$vaiTro')";
        pdo_execute($sql);
    }
    function delete_user($maKH){
        $sql = "DELETE FROM khachhang where maKH=".$maKH;
        pdo_execute($sql);
    }
?>