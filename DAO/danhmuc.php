<?php

    function loadall_brand(){
        $sql = "SELECT * FROM danhmuc order by maDM";
        $result=pdo_query($sql);
        return $result;
    }
    function loadone_brand($id){
        $sql = "SELECT * FROM danhmuc where maDM=".$id;
        $result=pdo_query_one($sql);
        return $result;
    }
    function add_brand($tenLoai){
        $sql = "INSERT INTO danhmuc (tenLoai) Values ('$tenLoai')";
        pdo_execute($sql);
    }
    function delete_brand($maDM){
        $sql = "DELETE FROM danhmuc where maDM=".$maDM;
        pdo_execute($sql);
    }
    function update_brand($tenLoai,$maDM){
        $sql = "UPDATE danhmuc set tenLoai='".$tenLoai."' where maDM=".$maDM;
        pdo_execute($sql);
    }
?>