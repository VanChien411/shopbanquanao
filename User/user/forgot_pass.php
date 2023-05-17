<form action="" method="post" style="width:30%; margin:auto;" class="col-5 m-auto bg-secondary p-2 text-white">
    <div class="form-group">
    <label for="email">Nhập email</label>
    <input class="form-control" name="email" type="email">
    </div>
    <div class="form-group">
    <button type="submit" name="btn1" class="btn btn-primary">Gửi yêu cầu</button>
    </div>
</form>
<?php
if (isset($_POST['btn1'])) {
    $thongbao = "";
    $email = trim(strip_tags($_POST['email']));
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $thongbao .= "email không đúng";
    }else{
        $pass_moi = substr(md5(random_int(0, 9999)), 0, 8);
        $sql = "UPDATE khachhang SET matKhau = '$pass_moi' WHERE email='$email'";
        pdo_execute($sql);
        $thongbao .= "Cập nhập thành công<br>";
    }
    // gưi mail
    require_once "PHPMailer-master/src/PHPMailer.php";
    require_once "PHPMailer-master/src/Exception.php";
    require_once "PHPMailer-master/src/OAuth.php";
    require_once "PHPMailer-master/src/SMTP.php";
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    try {
        $mail->SMTPDebug = 0; //chế độ full debug, khi mọi thứ ok thì chỉnh lại 0
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Server gửi thư
        $mail->SMTPAuth = true;
        $mail->Username = 'khoanpdps15992@fpt.edu.vn'; // ví dụ: abc@gmail.com
        $mail->Password = '0356402462a';
        $mail->SMTPSecure = 'ssl'; //TLS hoặc `ssl`
        $mail->Port = 465; // 587 hoặc 465
        $mail->CharSet = "UTF-8";
        $mail->smtpConnect(
            [
                "ssl" => [
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                ]
            ]
        );
        //Khai báo người gửi và người nhận mail
        $mail->setFrom('khoanpdps15992@fpt.edu.vn', 'Ban quản trị website');
        $mail->addAddress("{$email}", 'Quý khách');
        $mail->isHTML(true); // nội dung của email có mã HTML
        $mail->Subject = 'Cấp lại mật khẩu mới';
        $mail->Body = "Đây là mật khẩu mới của bạn <b> {$pass_moi} </b>";
        $mail->send();
        $thongbao .= "Đã gửi mail thành công<br>";
    } catch (Exception $e) {
        $thongbao .= "Lỗi khi gửi thư: " . $mail->ErrorInfo;
    }
    header("location:./index.php?action=trangchu");
    exit; }
?>