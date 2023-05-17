<?php
    session_Start();
    $maSP = $_REQUEST['maSP'];
    include "../../DAO/pdo.php";
    include "../../DAO/binhluan.php";
    $dsbl = loadall_Comment($maSP);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./duan1/Tool/css/font-awesome.css" rel="stylesheet">
    <link href="./duan1/Tool/css/bootstrap.css" rel="stylesheet">   
    <link id="switcher" href="./duan1/Tool/css/theme-color/default-theme.css" rel="stylesheet">
    <link href="./duan1/Tool/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">
    <link href="./duan1/Tool/css/style.css" rel="stylesheet">    
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="aa-product-review-area">
                   <h4>Danh sách bình luận</h4>
<?php
  foreach($dsbl as $bl):
    extract($bl);
?>
                   <ul class="aa-review-nav">
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <!-- <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image"> -->
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong><?=$tenKH?></strong> - <span><?=  $ngayBL?>  </span></h4>
                            <p><?=$noiDung?></p>
                          </div>
                        </div>
                      </li>
                   </ul>
<?php endforeach; ?>

</body>
</html> 