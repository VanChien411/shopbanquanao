<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/add.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/product.css">
   <style>
    .detail{
        margin-left: 20px;
        width:900px;
        text-align: left;
        display: inline-block;
    }
    body{
    background-color: white;
}
h1{
    display: inline-block;
}
th{
    width:200px;
}
td{
    padding-left:30px;
}
   </style>
   

</head>
<body class="container mt-5">

    
    <?php
        $id = $_GET['maSP'];
        $link = new PDO('mysql:host=localhost;dbname=duan1','root','');
        $giang = "select * from sanpham where maSP = $id";
        $result=$link->query($giang);
        $rows = $result->fetch(PDO::FETCH_ASSOC);
       echo '<h1 style="" class="mb-5"> '.$rows['tenSP'].' </h1><br> ';
        // echo'$id';

    ?>
    <div class="row">
        <div class="col-3">
            <?php 
   echo '<img src="upload/'.$rows['hinhAnh'].'" width="150px" height="150px" ">'

            ?>
        </div>
        <div class="col">
        <table class='detail'>
        </div>

    </div>
    <form action="index.php?ctrl=view&action=insertDHAndCTDH&tenDN=<?php echo $_SESSION['admin'] ?>" method="post" id="fomr_add_catelog" enctype="multipart/form-data">
   
   
    
		<tr>
			<th>Tên sản phẩm</th>
            
			<td>
                <?php
                
                echo $rows['tenSP'];
                ?>
            </td>
		</tr>
		<tr>
			<th>Giá</th>
			<td>
            <?php
                echo $rows['donGia'];
                ?>
            </td>
		</tr>
		<tr>
			<th>Số lượng còn</th>
			<td>
            <?php
                echo $rows['soLuong'];
                ?>
            </td>
		</tr>
        <tr>
			<th>Mô tả</th>
			<td>
            <?php
                echo $rows['moTa'];
                ?>
            </td>
		</tr>
		<tr>
			<th>Số lượng mua</th>
			<td>
            <input type='hidden' name='maSP1' value =<?php echo $rows['maSP'] ?>></input>
            <input type='hidden' name='donGia' value =<?php echo $rows['donGia'] ?>></input>

            <input type='number' name='soLuong' min="1" value="1" max= <?php
            
                echo $rows['soLuong'];
                ?> />
            </td>
		</tr>

	</table>
    
      <hr>
     <a href="javascript:$('#fomr_add_catelog').submit();" name="insertDHAndCTDH" class="btn btn-success" style="margin-left: 20px" > Mua</a>
    
           
        </form>
    
 





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</body>
</html>

