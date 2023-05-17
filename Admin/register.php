<!DOCTYPE html>
<html lang="en">

<head>
  <title>Đăng Nhập</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->

  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

  <!--===============================================================================================-->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!--===============================================================================================-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
  <!--===============================================================================================-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
  <style>  
  .hidden{
    display: none;
  }
</style>
</head>

<body onload="time()">
  <?php
  session_start();
  $DBH = new PDO('mysql:host=localhost;dbname=duan1', 'root', '', array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  )
  );
  if (!$DBH) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
  }
  
  if (isset($_POST['btnDangKy'])) {

    $user = $_POST['username'];
    $pass = $_POST['current-password'];
    $cPass = $_POST['confirm-password'];
    if($pass == $cPass)
    {
      $stmt = $DBH->prepare("INSERT INTO khachhang (maKH,tenDN,  matKhau, tenKH,hinhAnh ,email, diaChi, trangThai, vaiTro, SDT) VALUES (NULL,:tenDN,  :matKhau, :tenKH,:hinhAnh ,:email, :diaChi, :trangThai, :vaiTro, :SDT)");

      // Thiết lập các giá trị tham số của truy vấn
      $tenDN = $user;
      $tenKH = $user;
      $hinhAnh = '#';
      $diaChi = 'DK';
      $trangThai = 0;
      $vaiTro = 0;
      $email = "nguyenvana@example.com";
      $matKhau = $pass;
      $SDT = "0123456789";

      $stmt->bindParam(':tenDN', $tenDN);
      $stmt->bindParam(':tenKH', $tenKH);
      $stmt->bindParam(':hinhAnh', $hinhAnh);
      $stmt->bindParam(':diaChi', $diaChi);
      $stmt->bindParam(':trangThai', $trangThai);
      $stmt->bindParam(':vaiTro', $vaiTro);
       $stmt->bindParam(':email', $email);
      $stmt->bindParam(':matKhau', $matKhau);
       $stmt->bindParam(':SDT', $SDT);
    
      // Thực thi truy vấn và kiểm tra kết quả
      if ($stmt->execute()) {
        echo "Thêm dữ liệu thành công!";
      } else {
        echo "Thêm dữ liệu thất bại!";
      }

    }
    
  }

  ?>
  <div id="clock"></div>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="img/man.png" alt="IMG">
        </div>

        <form method="post" action="" onsubmit="return validate()">
          <span class="login100-form-title">
            ĐĂNG KÝ TÀI KHOẢN WEBSITE
          </span>

          <div class="wrap-input100 validate-input" data-validate="Bạn cần nhập đúng thông tin như: ex@fe.edu.vn">
            <input class="input100" type="text" placeholder="Tài Khoản" name="username" id="username" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password không được bỏ trống!">
            <input class="input100" type="password" placeholder="Mật Khẩu" name="current-password" id="password-field" required onchange="checkPasswordMatch()" >
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
        

          <div class="wrap-input100 validate-input" data-validate="Password không được bỏ trống!">
            <input class="input100" type="password" placeholder="Nhập Lại Mật Khẩu" name="confirm-password" id="confirm-password" required onchange="checkPasswordMatch()">
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          <span id="password-match" class="hidden" style="color: red;">Mật khẩu không khớp</span>
          
          <div class="container-login100-form-btn">
            <input type="submit" value="Đăng Ký" name="btnDangKy" id="register-btn"/>
          </div>
          <br>
          <a href="login.php" style='color:blue'>Chuyển đến đăng nhập</a>
        </form>
        <div class="text-center p-t-12">
          <span class="txt1">
            Bạn quên mật khẩu?
          </span>
          <a class="txt2" href="/tim-lai-mat-khau.html">
            Tài khoản / mật khẩu?
          </a>
        </div>
        <div class="text-center p-t-135">
          <a class="txt2" href="#">
            2020 <i class="fa fa-copyright" aria-hidden="true"></i> PHP1 | Design by
          </a>
        </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    function checkPasswordMatch() {
  var password = document.getElementById("password-field");
  var confirm_password = document.getElementById("confirm-password");
  var password_match = document.getElementById("password-match");
  var register_btn = document.getElementById("register-btn");
  console.log(password.value)
  console.log(confirm_password.value)

  if (password.value != confirm_password.value) {
    password_match.classList.remove("hidden");
    register_btn.disabled = true;
  } else {
    password_match.classList.add("hidden");
    register_btn.disabled = false;
  }
}
</script>
  <!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/tilt/tilt.jquery.min.js"></script>
  <script>
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
  <script src="/js/main.js"></script>
  <script type="text/javascript">
    // function validate() {
    //     var username = document.getElementById("username").value;
    //     var password = document.getElementById("password-field").value;

    //     //Nếu không nhập gì mà nhấn đăng nhập thì sẽ báo lỗi
    //     if (username == "" && password == "") {
    //         swal("Bạn Chưa Nhập Thông Tin!", "Vui Lòng Kiểm Tra Lại", "warning");
    //         return false;
    //     }
    //     //Nếu không nhập tài khoản sẽ báo lỗi
    //     if (username == null || username == "") {
    //         swal("Bạn Chưa Nhập Tài Khoản", "Vui Lòng Kiểm Tra Tài Khoản", "error");
    //         return false;
    //     }
    //     //Nếu không nhập mật khẩu sẽ báo lỗi
    //     if (password == null || password == "") {
    //         swal("Bạn Chưa Nhập Mật Khẩu", "Vui Lòng Kiểm Tra Mật Khẩu", "error");
    //         return false;
    //     }
    //     //Nếu mật khẩu dưới 8 ký tự
    //     if (password.length < 9) {
    //         swal("Bạn Nhập Chưa Đủ Mật Khẩu", "Mật Khẩu Phải Đủ 9 Ký Tự Bao Gồm Chữ Và Số", "error");
    //         return false;
    //     }
    //     //Nếu mật khẩu trên 8 ký tự thì sẽ báo lỗi
    //     if (password.length > 10) {
    //         swal("Bạn Nhập Dư Mật Khẩu", "Vui Lòng Kiểm Tra Lại Mật Khẩu", "error");
    //         return false;
    //     }
    //     //swal("Thông Tin Bạn Nhập Không Tồn Tại", "Vui Lòng Kiểm Tra Hoặc Nhấn Quên Mật Khẩu", "error");
    // }

    //show/hide pass
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
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
      if (dd < 10) { dd = '0' + dd } if (mm < 10) { mm = '0' + mm } today = day + ', ' + dd + '/' + mm + '/' + yyyy;
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
</body>

</html>
<!--THANK FOR WATCHING <3-->