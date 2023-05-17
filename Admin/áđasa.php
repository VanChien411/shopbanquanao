<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login" onload="time()">
<?php
        session_start();
        $DBH = new PDO('mysql:host=localhost;dbname=team5shop','root','', array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        if (!$DBH) {
            die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        }             
        if(isset($_POST['btnDangNhap'])){

            $user = $_POST['username'];
            $pass = $_POST['current-password'];


            $sql = "select * from admin where user='$user' and pass='$pass'";
            $result = $DBH->query($sql);
            
            $num = $result->rowCount();

            if($num > 0){
                $_SESSION['admin'] = $user;
                header('location:index.php');
            }
            else{
                echo'
                swal("Thông Tin Bạn Nhập Không Tồn Tại", "Vui Lòng Kiểm Tra Hoặc Nhấn Quên Mật Khẩu", "error");
                ';
            }
        }

    ?>  
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <a href="view/home/index.php" class="btn btn-primary btn-block">Login</a>
                      <div class="container-login100-form-btn">
                        <input type="submit" value="Đăng Nhập" name="btnDangNhap"/>
                    </div>
                    </div>
                    <hr>
                    <a href="index.html" class="btn btn-google btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="register.html">Create an Account!</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>
<script type="text/javascript">
    function validate() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password-field").value;

        //Nếu không nhập gì mà nhấn đăng nhập thì sẽ báo lỗi
        if (username == "" && password == "") {
            swal("Bạn Chưa Nhập Thông Tin!", "Vui Lòng Kiểm Tra Lại", "warning");
            return false;
        }
        //Nếu không nhập tài khoản sẽ báo lỗi
        if (username == null || username == "") {
            swal("Bạn Chưa Nhập Tài Khoản", "Vui Lòng Kiểm Tra Tài Khoản", "error");
            return false;
        }
        //Nếu không nhập mật khẩu sẽ báo lỗi
        if (password == null || password == "") {
            swal("Bạn Chưa Nhập Mật Khẩu", "Vui Lòng Kiểm Tra Mật Khẩu", "error");
            return false;
        }
        //Nếu mật khẩu dưới 8 ký tự
        if (password.length < 9) {
            swal("Bạn Nhập Chưa Đủ Mật Khẩu", "Mật Khẩu Phải Đủ 9 Ký Tự Bao Gồm Chữ Và Số", "error");
            return false;
        }
        //Nếu mật khẩu trên 8 ký tự thì sẽ báo lỗi
        if (password.length > 10) {
            swal("Bạn Nhập Dư Mật Khẩu", "Vui Lòng Kiểm Tra Lại Mật Khẩu", "error");
            return false;
        }
        //swal("Thông Tin Bạn Nhập Không Tồn Tại", "Vui Lòng Kiểm Tra Hoặc Nhấn Quên Mật Khẩu", "error");
    }

    //show/hide pass
    function myFunction(){
        var x = document.getElementById("myInput");
        if (x.type === "password"){
            x.type = "text"
        } else {
            x.type = "password";
        }
    }
    $(".toggle-password").click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    function time() {
        var today = new Date();
        var weekday = new Array(7);
        weekday[0] = "Chủ Nhật";
        weekday[1] = "Thứ Hai";
        weekday[2] = "Thứ Ba";
        weekday[3] = "Thứ Tư";
        weekday[4] = "Thứ Năm";
        weekday[5] = "Thứ Sáu";
        weekday[6] = "Thứ Bảy";
        var day = weekday[today.getDay()];
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        nowTime = h + ":" + m + ":" + s;
        if (dd < 10) { dd = '0' + dd} if (mm < 10) { mm = '0' + mm} today = day + ', ' + dd + '/' + mm + '/' + yyyy;
        tmp = '<i class="fa fa-clock-o" aria-hidden="true"></i> <span class="date">' + today + ' | ' + nowTime + '</span>';
        document.getElementById("clock").innerHTML = tmp;
        clocktime = setTimeout("time()", "1000", "Javascript");
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
    }
   </script>
</html>