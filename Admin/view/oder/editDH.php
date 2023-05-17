<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/add.css">
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <?php
        $id = $_GET['maDH'];
        $link = new PDO('mysql:host=localhost;dbname=duan1','root','');
        $giang = "select * from donhang where maDH = $id";
        $result=$link->query($giang);
        $rows = $result->fetch(PDO::FETCH_ASSOC);
        extract($rows);
        
    ?>
    <div class="login-box">
        <h2>Sửa Danh Mục</h2>
        <form action="index.php?ctrl=view&action=updataDH" method="post" id="fomr_add_product" enctype="multipart/form-data">
            
            <div class="user-box">
                <label for="ID">Mã Đơn Hàng</label>
                <input type="text" name="maDH" value="<?php echo $rows['maDH']?>">        
            </div>
            <div style="width: 100%; padding: 10px 0;font-size: 16px;color: #fff;margin-bottom: 30px;border: none;border-bottom: 1px solid #ffff;outline: none;background-color: transparent;">
                <label for="ID">Trạng thái</label> <br>
                <input type="radio" name="trangThai" value="0" <?=$trangThai==0?'checked':''?>> Đơn hàng mới tạo
                <input type="radio" name="trangThai" value="1" <?=$trangThai==1?'checked':''?>> Đã xử lý
                <input type="radio" name="trangThai" value="2" <?=$trangThai==2?'checked':''?>> Đang vận chuyển
                <input type="radio" name="trangThai" value="3" <?=$trangThai==3?'checked':''?>> Đã hoàn tất
            </div>
            
            <a href="javascript:$('#fomr_add_product').submit();" name="add_new_catalog" >
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Submit
            </a>
           
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</body>
</html>

