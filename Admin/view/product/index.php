<!DOCTYPE.php>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel='shortcut icon' href="img/logo/logoteam.jpg" />
  <title>Team5shop</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="css/css.css" rel="stylesheet">

  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
      <?php
      include 'view/home/nav.php';
      ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sản phẩm</h1>
            <!-- <h2 class="h3 mb-0 text-gray-800">   <a class="collapse-item" href="../User">Đơn hàng</a></h2> -->

            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
                </div>
                
                <?php
                if($_SESSION['admin'] == 'admin')
                {              
                 echo ' <a style="background-color: black" href="index.php?ctrl=product&action=addNew" class="btn btn-sm btn-primary">Thêm Sản Phẩm</a>';
                echo '<div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                  <thead style="background-color: black; color:white" >
                    <tr>
                      <th ">Hình Ảnh</th>
                      <th>Mã</th>
                      <th>Tên</th>
                      <th>Giá</th>
                      <th>SL</th>
                      <th>Mô tả</th>
                      <th>Xửa</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Hình Ảnh</th>
                      <th>Mã Sản Phẩm</th>
                      <th>Tên Sản Phẩm</th>
                      <th>Đơn Giá</th>
                      <th>Số Lượng</th>
                      <th>Mô tả</th>
                      <th>Quản lý</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    
                  ';
                  foreach($products as $rows){
                    echo '
                      <tr class="tr">
                            <td class="th"><img src="upload/'.$rows['hinhAnh'].'" width="150px" height="150px"></td>
                          <td class="th"><a href = "">'.$rows['maSP'].'</td>
                          <td class="th">'.$rows['tenSP'].'</td>
                          <td class="th">'.$rows['donGia'].'</td>
                          <td class="th">'.$rows['soLuong'].'</td>
                            <td class="th"  style="width: 1000px; height: 50px; overflow: auto;" >'.$rows['moTa'].'</td>
  
                          <td class="th">
                          <a href="index.php?ctrl=product&action=delete&maSP='.$rows['maSP'].'">Xóa</a>|
                          <a href="index.php?ctrl=product&action=edit&maSP='.$rows['maSP'].'">Sửa</a>
                          </td>
                          
                      </tr>
                    ';
                  }
                  
                      
                   
                 echo '</tbody>';
                }
              else
              echo '<div class="table-responsive p-3">
              <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                <thead class="thead-light">
                  <tr>
                    <th>Hình Ảnh</th>
                    <th style="display: none;"></th>
                    <th>Tên Sản Phẩm</th>
                    <th>Đơn Giá</th>
                    <th>Số Lượng</th>
                    <th>Mô tả</th>
                    <th style="display: none;"></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Hình Ảnh</th>
                    <th style="display: none;"></th>
                    <th>Tên Sản Phẩm</th>
                    <th>Đơn Giá</th>
                    <th>Số Lượng</th>
                    <th>Mô tả</th>
                    <th style="display: none;"></th>
                  </tr>
                </tfoot>
                <tbody>
                  
                ';
                foreach($products as $rows){
                  echo '
                    <tr class="tr" onclick="window.location.href = \'index.php?ctrl=product&action=detail&maSP='.$rows['maSP'].'\'">
                    <td class="th"><img src="upload/'.$rows['hinhAnh'].'" width="150px" height="150px"></td>
                        <td class="th" style="display: none;"></td>
                        <td class="th">'.$rows['tenSP'].'</td>
                        <td class="th">'.$rows['donGia'].'</td>
                        <td class="th">'.$rows['soLuong'].'</td>
                          <td class="th">'.$rows['moTa'].'</td>

                        <td class="th"    style="display: none;">
                     
                        </td>
                        
                    </tr>
                  ';
                }
                
                    
                 
               echo '</tbody>';

                  ?>
                
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Documentation Link -->
          <div class="row">
            <div class="col-lg-12">
              <p></a></p>
            </div>
          </div>

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
       ....
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
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

</body>

  </html>