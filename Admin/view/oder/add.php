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
    <div class="login-box">
        <h2>Thêm Mới Danh Mục</h2>
        <form action="index.php?ctrl=view&action=insert" method="post" id="fomr_add_product" enctype="multipart/form-data">
            <!-- <div class="user-box">
                <label for="id">Mã Sản Phẩm</label>
                <input type="text" name="maSP">
            </div> -->
            <!-- <div class="user-box">
                <label for="name">Mã Danh Mục</label>
                <input type="text" name="maDM">
            </div> -->
            <div class="user-box">
                <label for="ID">Tên Danh Mục</label>
                <input type="text" name="tenDM">        
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

