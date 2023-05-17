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
        $id = $_GET['maSP'];
        $link = new PDO('mysql:host=localhost;dbname=duan1','root','');
        $giang = "select * from sanpham where maSP = $id";
        $result=$link->query($giang);
        $rows = $result->fetch(PDO::FETCH_ASSOC);
        // echo'$id';
    ?>
    <div class="login-box">
        <h2>UPDATE</h2>
        <form action="index.php?ctrl=product&action=updata" method="post" id="fomr_add_product" enctype="multipart/form-data">
            <div class="user-box">
                <label for="id">Mã Sản Phẩm</label>
                <input type="text" name="maSP" value="<?php echo $rows['maSP'] ?>">
            </div>
            <div class="user-box">
                <label for="name">Tên Sản Phẩm</label>
                <input type="text" name="tenSP" value="<?php echo $rows['tenSP'] ?>">
            </div>
            <div class="user-box">
                <label for="ID">Đơn Giá</label>
                <input type="text" name="donGia" value="<?php echo $rows['donGia'] ?>">        
            </div>
            <div class="user-box">
                <label for="date">Giảm Giá</label>
                <input type="text" name="giamGia" value="<?php echo $rows['giamGia'] ?>">
            </div>
            <section class="form-group" style="color: #fff" >
                <label>Mã danh mục</label> <br>
                <select name="maDM" class="form-control" style="width: 100%; padding: 10px 0;font-size: 16px;color: #fff;margin-bottom: 30px;border: none;border-bottom: 1px solid #ffff;outline: none;background-color: transparent;" required>
                    <?php
                        $link = new PDO('mysql:host=localhost;dbname=duan1','root','');
                        $giang = "select * from danhmuc";
                        $result=$link->query($giang);
                    ?><?php foreach($result as $item): extract($item); ?>
                   <?php
                        if($maDM == $rows['maDM']) $check ="selected"; else $check ="";
                    ?>
                    <option style="color: black" value="<?= $maDM?>" <?= $check?>><?=$tenDM?></option>
                    <?php endforeach;?>
                </select>
            </section>
            <div class="user-box">
                <label for="ta">Số Lượng</label> 
                <input type="text" name="soLuong" value="<?php echo $rows['soLuong'] ?>">
            </div>
            <div class="user-box">
                <label for="gia">Mô Tả</label>
                <textarea name="moTa" cols="72" rows="10" style="font-family: arial; font-weight: 150%;" id="moTa"><?php echo $rows['moTa']?></textarea>
            </div>
            
            <div class="user-box">
                <label for="date" >Hình Ảnh</label>
                <input type="file" value="" name="image" >
                
            </div>
            
            <a href="javascript:$('#fomr_add_product').submit();" name="update" >
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

