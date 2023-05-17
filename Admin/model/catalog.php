<?php
include_once('database.php');
function getAllCatalog(){
    $sql="SELECT * from danhmuc order by maDM";
    return query($sql);
}
function addNewCatalog($name)
{
    $sql="insert into danhmuc (tenDM) values('$name')";
    execute($sql);
}
    function getCatalogByID($id)
{
    $sql="SELECT *from danhmuc where maDM='$id'";
    return queryOne($sql);
}
function updateCatalog($id,$name)
{
    $sql="update danhmuc set tenDM='$name' where maDM='$id'";
    execute($sql);
}
function deleteCatalog($id)
{
    $sql="delete from danhmuc where maDM='$id'";
    execute($sql);
}
function deleteComment($id)
{
    $sql="delete from binhluan where maBL='$id'";
    execute($sql);
}
function getAllUser(){
    $sql="SELECT * from khachhang order by maKH";
    return query($sql);
}
function deleteUser($id)
{
    $sql="delete from khachhang where maKH='$id'";
    execute($sql);
}
function deleteOder($id)
{
    $a = "delete from chitietdonhang  where maDH='$id' ";
    execute($a);
    $sql="delete from donhang where maDH='$id'";
    execute($sql);
}
function updateDH($maDH,$trangThai)
{
    echo $maDH;
    echo $trangThai;
    $sql="update donhang set trangThai = '$trangThai' where maDH=".$maDH;
    execute($sql);
}
?>