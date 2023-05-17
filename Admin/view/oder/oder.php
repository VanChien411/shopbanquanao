<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel='shortcut icon' href="img/logo/logoteam.jpg" />
  <title>RuangAdmin - Simple Tables</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
   <?php
    include 'view/home/sideBar.php';
   ?>
    <!-- Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php
      include 'view/home/nav.php';
      ?>
        <!-- TopBar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Đơn hàng</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active" aria-current="page">Đơn hàng</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary  ">Đơn hàng </h6>
                </div>
                
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th></th>
                        <th>Mã Đơn Hàng</th>
                        <th>Tên Khách Hàng</th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng Mua</th>
                        <th>Tổng cộng</th>
                        <th>Trạng thái</th>
                        <?php
                        
                        $link = new PDO('mysql:host=localhost;dbname=duan1','root','');

                        $giang="SELECT b.maDH,b.tenKH,a.email ,b.diaChi ,b.SDT,b.ghiChu,b.trangThai ,b.hinhAnh ,c.donGia ,c.soLuongMua ,d.tenSP, b.ngayDH
                        from khachhang a JOIN donhang b on a.maKH = b.maKH JOIN 
                        chitietdonhang c ON b.maDH = c.maDH JOIN 
                        sanpham d ON c.maSP = d.maSP order by b.maDH desc";
                           
                           $sql = "SELECT * FROM khachhang WHERE tenDN = :tenDN";
                           $stmt = $link->prepare($sql);
                           $stmt->execute(['tenDN' => $_SESSION['admin']]);
                           $user = $stmt->fetch(PDO::FETCH_ASSOC);
                         
                           if($user['vaiTro'] >= 1)
                       
                        echo ' <th>Cập nhập</th>';
                    
                        ?>
                  
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        


                        $result=$link->query($giang);
                   
                            foreach($result as $rows){
                              $stt = set_status($rows['trangThai']);
                              $sum =  $rows['donGia'] * $rows['soLuongMua'] ;
                              echo '
                                <tr class="tr">
                                    <td><a href="index.php?ctrl=view&action=deleteDH&maDH='.$rows['maDH'].'">Delete</a></td>
                                    <td class="th">'.$rows['maDH'].'</td>
                                    <td class="th">'.$rows['tenKH'].'</td>
                                    <td class="th">'.$rows['donGia'].'</td>
                                    <td class="th">'.$rows['soLuongMua'].'</td>
                                    <td class="th">'.$sum.' </td>
                                    <td class="th">'.$stt.'</td>
                                    '.
                                      (($user['vaiTro'] >= 1) ? '  <td class="th"><a href="index.php?ctrl=view&action=updateDH&maDH='.$rows['maDH'].'">Cập nhật</a></td>' : '').
                                       '
                                  
                                    

                                                      
                                </tr>
                              ';
                            }
                      ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.php" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>

</body>

</html>