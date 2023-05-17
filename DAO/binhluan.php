<?php
    function add_Comment($comment,$maSP,$maKH,$ngayBL){
      $sql="INSERT INTO binhluan (noiDung, maSP, maKH, ngayBL) values('$comment', '$maSP', '$maKH', '$ngayBL')";
      pdo_execute($sql);
    }
    function loadall_Comment($maSP){
      $sql = "SELECT * from khachhang a join binhluan b on a.maKH = b.maKH where b.maSP = ".$maSP." order by maBL desc";
      $result=pdo_query($sql);
      return $result;
    }
?>
