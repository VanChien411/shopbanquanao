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
        $id = $_GET['maKH'];
        $link = new PDO('mysql:host=localhost;dbname=duan1','root','');
        $giang = "select * from khachhang where maKH = $id";
        $result=$link->query($giang);
        $rows = $result->fetch(PDO::FETCH_ASSOC);
        extract($rows);
        
    ?>
    <div class="login-box">
        <h2>Sửa Khách hàng</h2>
        <form action="index.php?ctrl=view&action=updataKH" method="post" id="fomr_add_product" enctype="multipart/form-data">
            
            <div class="user-box">
                <label for="ID">Tên đăng nhập</label>
                <input type="text" name="tenDN" value="<?php echo $rows['tenDN'] ?>">        
            </div>
            <div class="user-box">
                <label for="ID">Mật Khẩu</label>
                <input type="text" name="matKhau" value="<?php echo $rows['matKhau'] ?>">        
            </div>
            <div class="user-box">
                <label for="ID">Tên Khách hàng</label>
                <input type="text" name="tenKH" value="<?php echo $rows['tenKH'] ?>">        
            </div>
            <div class="user-box">
                <label for="ID">Hình ảnh</label>
                <input type="file" name="hinhAnh" value="<?php echo $rows['hinhAnh'] ?>">        
            </div>
            <div class="user-box">
                <label for="ID">Email</label>
                <input type="email" name="email" value="<?php echo $rows['email'] ?>">        
            </div>
            <div class="user-box">
                <label for="ID">Địa chỉ</label>
                <input type="text" name="diaChi" value="<?php echo $rows['diaChi'] ?>">        
            </div>
            <div class="user-box">
                <label for="ID">SĐT</label>
                <input type="text" name="SDT" value="0<?php echo $rows['SDT'] ?>">        
            </div>
            <div style="width: 100%;padding: 10px 0;font-size: 16px;color: #fff;margin-bottom: 30px;border: none;border-bottom: 1px solid #ffff;outline: none;background-color: transparent;">
                <label for="ID">Vai trò</label> <br>
                <input type="radio" name="vaitro" value="0" <?=$vaiTro==0?'checked':''?>> khách hàng
                <input type="radio" name="vaitro" value="1" <?=$vaiTro==1?'checked':''?>> Admin  
                <input type="radio" name="vaitro" value="2" <?=$vaiTro==2?'checked':''?>> Quản lý  

            </div>
            <div style="width: 100%; padding: 10px 0;font-size: 16px;color: #fff;margin-bottom: 30px;border: none;border-bottom: 1px solid #ffff;outline: none;background-color: transparent;">
                <label for="ID">Trạng thái</label> <br>
                <input type="radio" name="trangThai" value="0" <?=$trangThai==0?'checked':''?>> Hoạt Động  
                <input type="radio" name="trangThai" value="1" <?=$trangThai==1?'checked':''?>> Dừng Hoạt Động
            </div>
            <div class="user-box">
                <input type="hidden" name="maKH" value="<?php echo $rows['maKH'] ?>">        
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

