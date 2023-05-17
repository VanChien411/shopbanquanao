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
        $id = $_GET['maDM'];
        $link = new PDO('mysql:host=localhost;dbname=duan1','root','');
        $giang = "select * from danhmuc where maDM = $id";
        $result=$link->query($giang);
        $rows = $result->fetch(PDO::FETCH_ASSOC);
        
    ?>
    <div class="login-box">
        <h2>Sửa Danh Mục</h2>
        <form action="index.php?ctrl=view&action=updata" method="post" id="fomr_add_product" enctype="multipart/form-data">
        <div class="user-box">
                <input type="hidden" name="maDM" value="<?php echo $rows['maDM'] ?>">        
            </div>
            <div class="user-box">
                <label for="ID">Tên Danh Mục</label>
                <input type="text" name="tenDM" value="<?php echo $rows['tenDM'] ?>">        
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

