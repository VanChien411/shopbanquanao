<?php 
session_start();
ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href="../Tool/images/logoteam.jpg" />
    <title>Team5Shop</title>
    <link href="../Tool/css/font-awesome.css" rel="stylesheet">
    <link href="../Tool/css/bootstrap.css" rel="stylesheet">   
    <link id="switcher" href="../Tool/css/theme-color/default-theme.css" rel="stylesheet">
    <link href="../Tool/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">
    <link href="../Tool/css/style.css" rel="stylesheet">    
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>0123456789</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <?php if(isset($_SESSION['user'])): extract($_SESSION['user']);?>
                    <li><a href="index.php?act=account&id=<?=$maKH?>">Tài khoản</a></li>
                  <?php else: ?>
                    <li><a href="index.php?act=account">Tài khoản</a></li>
                  <?php endif;?>
                  <li class="hidden-xs"><a href="index.php?act=cart">Giỏ hàng</a></li>
        <?php if(isset($_SESSION['user'])):             
        ?>         
        <li>
          <form action="index.php?act=login" method="post"><a href="index.php?act=logout">Đăng xuất</a></form>
        </li>
        <?php else: ?>     
                  <li><a href="#" data-toggle="modal" data-target="#login-modal">Đăng nhập</a></li>
        <?php endif; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Đăng nhập</h4>
          <form class="aa-login-form" action="index.php?act=login" method="post">
            <label for="">Tên đăng nhập<span>*</span></label>
            <input type="text" name="username" placeholder="Tên đăng nhập">
            <label for="">Mật khẩu<span>*</span></label>
            <input type="password" name="password" placeholder="Password">
            <button class="aa-browse-btn" name="dangnhap" value="Đăng nhập" style="padding-left:10px;background-image: linear-gradient(90deg,#f65e38 0,#f68a39 51%,#f65e38); border-color: rgba(246,116,57,.4);" type="submit">Đăng nhập</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Nhớ mật khẩu </label>
            <p class="aa-lost-password"><a href="index.php?act=forgot_pass">Quên mật khẩu?</a></p>
            <div class="aa-register-now">
              Chưa có tài khoản?<a href="index.php?act=account">Đăng ký tại đây!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.php?act=trangchu">
                  <span class="fa fa-shopping-cart"></span>
                  <p>Team5<strong>Shop</strong> <span>Shop điện thoại uy tín</span></p>
                </a>
                <!-- img based logo -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="index.php?act=cart">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">GIỎ HÀNG</span>
                  <span class="aa-cart-notify">!</span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
    <?php 
        $tong=0;
        $i=0;
        foreach ($_SESSION['cart'] as $cart):
            $ttien= $cart[3] * $cart[4];
            $tong += $ttien;
    ?>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="../Admin/upload/<?=$cart[2];?>" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><?=$cart[1];?></h4>
                        <p><?=$cart[4];?>x<?= number_format($cart[3],0,',','.')?>đ</p>
                      </div>
                      <a class="aa-remove-product" href="index.php?act=delcart&idcart=<?=$i?>"><span class="fa fa-times"></span></a>
                    </li>
  <?php endforeach; ?>
                    <li>
                      <span class="aa-cartbox-total-title">
                        Giá
                      </span>
                      <span class="aa-cartbox-total-price">
                      <?=number_format($tong,0,',','.')?>đ
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="index.php?act=bill">Thanh toán</a>
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="index.php?act=timkiem" method="post">
                  <input type="text" name="kyw" placeholder="Tìm kiếm">
                  <button type="submit" name="timkiem"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
    </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="index.php?act=trangchu">Trang chủ</a></li>
              <?php
              foreach ($dm as $item):
                extract($item);
              ?>                                             
              <li><a href="index.php?act=timkiem&maDM=<?=$maDM?>"><?=$tenDM;?></a></li>
              <?php endforeach; ?>
              <li>
                <?php if(isset($_SESSION['user'])): extract($_SESSION['user']); ?>
                <a href="index.php?act=mybill">Lịch sử đơn hàng</a>
                <?php endif; ?>
              </li>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->
 <!-- wpf loader Two -->
<div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two        -->
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->   