<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a style="background-color: black" class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-3">Team5Shop</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Trang chủ</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span>
        </a>
        <div id="collapseTable" class="collapse show" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Quản lý</h6>
            <a class="collapse-item" href="index.php?ctrl=view&action=oder">Đơn hàng</a>
            <a class="collapse-item" href="index.php?ctrl=product&action=product">Sản Phẩm</a>
            <!-- <a class="collapse-item" href="index.php?ctrl=view&action=comment">Bình luận</a> -->
            <?php 
              if($_SESSION['admin']=='admin')
              echo '
            <a class="collapse-item" href="index.php?ctrl=view&action=catalog">Danh Mục</a>
              <a class="collapse-item" href="index.php?ctrl=view&action=user">Khách hàng</a>
              <a class="collapse-item" href="index.php?ctrl=view&action=thongke">Thống Kê</a>
              '
            ?>
           

          </div>
        </div>
      </li>
    </ul>
    <!-- Sidebar -->