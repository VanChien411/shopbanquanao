<?php
    function views($maSP){
        $sql= "UPDATE sanpham set luotXem = luotXem + 1 where maSP = ".$maSP;
        pdo_execute($sql);
    }
    function loadall_product_home1(){
        $sql="SELECT * FROM sanpham where maDM = 1 and trangThai =0 order by maSP desc limit 8";
        $results=pdo_query($sql);
        return $results;
    }
    function loadall_product_home2(){
        $sql="SELECT * FROM sanpham where maDM = 2 and trangThai =0 order by maSP desc limit 8";
        $results=pdo_query($sql);
        return $results;
    }
    function loadall_product_home3(){
        $sql="SELECT * FROM sanpham where maDM = 3 and trangThai =0 order by maSP desc limit 8";
        $results=pdo_query($sql);
        return $results;
    }
    function loadall_product_home4(){
        $sql="SELECT * FROM sanpham where maDM = 4 and trangThai =0 order by maSP desc limit 8";
        $results=pdo_query($sql);
        return $results;
    }
    function loadall_product_home5(){
        $sql="SELECT * FROM sanpham where maDM = 5 and trangThai =0 order by maSP desc limit 8";
        $results=pdo_query($sql);
        return $results;
    }
    function loadall_product_home6(){
        $sql="SELECT * FROM sanpham where maDM = 6 and trangThai =0 order by maSP desc limit 8";
        $results=pdo_query($sql);
        return $results;
    }
    function loadtop_product_home(){
        $sql="SELECT * FROM sanpham where trangThai =0 order by luotXem desc limit 4";
        $top=pdo_query($sql);
        return $top;
    }
    function loadRelated_product_home($maDM){
        $sql="SELECT * FROM sanpham where maDM = ".$maDM." and trangThai =0 order by luotXem desc limit 4";
        $top=pdo_query($sql);
        return $top;
    }
    function load_specifications($maSP){
        $sql="SELECT * FROM thongsokythuat where maSP =".$maSP;
        $number=pdo_query_one($sql);
        return $number;
    }
    function loadone_product_home($maSP){
        $sql = "SELECT * from sanpham where maSP = ".$maSP;
        $detail=pdo_query_one($sql);
        return $detail;
    }
    function loadall_product($kyw="",$maDM=0){
        $sql="SELECT * FROM sanpham where 1";
        if($kyw!=""){
            $sql.=" and tenSP like '%".$kyw."%'";
        }
        if($maDM>0){
            $sql.=" and maDM ='".$maDM."'";
        }
        $sql.=" order by maSP desc";
        $result=pdo_query($sql);
        return $result;
    }
    function load_ten_dm($maDM){
        if($maDM>0){
            $sql = "SELECT * FROM danhmuc WHERE maDM =".$maDM;
            $danhmuc = pdo_query_one($sql);
            extract($danhmuc);
            return $tenDM;
        } else{
            return "";
        }
    }
    
?>