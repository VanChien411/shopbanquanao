             <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
      <div class="col-md-18">
      <?php 
        
        if(isset($_SESSION['user'])):    
          if(is_array($result)){
            extract($result);
          }
          $img = $hinhAnh;
          if($img!=''){
              $img = "<img width=100% heightr=100% src='./duan1/Upload/".$img."'>";
          }else{
              $img = "Không có ảnh!";
          }           
      ?>
                  <div class="col-md-5 col-sm-5 col-xs-12">                              
                    <div class="aa-product-view-slider">                                
                      <div id="demo-1" class="simpleLens-gallery-container">
                        <div class="simpleLens-container">
                          <div class="simpleLens-big-image-container">
                            <span class="simpleLens-big-image"> <?=$img?></span>
                          </div>
                        </div>
                        <div class="simpleLens-thumbnails-container"> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="aa-product-view-content">
                      <form action="index.php?act=update_user" enctype="multipart/form-data" method="post" class="aa-login-form">
                        <label for="">Họ tên<span>*</span></label>
                        <input type="text" name="name" value="<?php if (isset($tenKH)&&($tenKH!="")) echo $tenKH;?>" >

                        <label for="">SĐT<span>*</span></label>
                        <input type="text" name="sdt" value="0<?php if (isset($SDT)&&($SDT!="")) echo $SDT;?>" >

                        <label for="">Địa chỉ<span>*</span></label>
                        <input type="text" name="diachi" value="<?php if (isset($diaChi)&&($diaChi!="")) echo $diaChi;?>" >

                        <label for="">Email<span>*</span></label>
                        <input type="email" name="email" value="<?php if (isset($email)&&($email!="")) echo $email;?>"  class="form-control">
                        <input type="hidden" name="maKH" value="<?php if (isset($maKH)&&($maKH>0)) echo $maKH;?>"lass="form-control">
                        <label for="">Ảnh</label>
                        <input type="file" name="image" class="form-control">

                        <input style=" margin:2% " type="submit" name="capnhat" value="Cập nhật" class="aa-browse-btn">
                        <a style=" margin:2%; background-color:grey; " class="aa-browse-btn" href="index.php?act=cpass&id=<?=$maKH?>">Đổi mật khẩu</a>
                        <?php if($vaiTro==1): ?>
                        <a  class="aa-browse-btn" href="index.php?act=admin">Trang quản lý</a>
                        <?php endif; ?>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
                

                
            <?php else: ?>
        </div>
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Đăng nhập</h4>
                 <form action="index.php?act=login" method="post"  class="aa-login-form">
                  <label for="">Tên đăng nhập<span>*</span></label>
                   <input type="text" id="username" name="username" placeholder="Tên đăng nhập">
                   <label for="">Mật khẩu<span>*</span></label>
                    <input type="password" id="password" name="password" placeholder="Password">
                    <input type="submit" name="dangnhap" value="Đăng nhập" class="aa-browse-btn">
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Nhớ mật khẩu </label>
                    <p class="aa-lost-password"><a href="index.php?act=forgot_pass">Quên mật khẩu?</a></p>
                  </form>
                </div>

                <script src="./duan1/Tool/js/checkpass.js"></script>

              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Đăng ký</h4>
                 <form action="index.php?act=register" enctype="multipart/form-data" method="post" class="aa-login-form">
                    <label for="">Tên đăng nhập<span>*</span></label>
                    <input type="text" name="username" placeholder="Tên đăng nhập" required>
                    <label for="">Mật khẩu<span>*</span></label>
                    <input type="password" name="password" placeholder="Password" required>
                    <label for="">Họ tên<span>*</span></label>
                    <input type="text" name="name" required>
                    <label for="">SĐT<span>*</span></label>
                    <input type="text" name="sdt" required>
                    <label for="">Địa chỉ<span>*</span></label>
                    <input type="text" name="diachi" required>
                    <label for="">Email<span>*</span></label>
                    <input type="email" name="email"  class="form-control" required>
                    <label for="">Ảnh</label>
                    <input type="file" name="image" class="form-control" required>
                    <input type="submit" name="dangky" value="Đăng ký" class="aa-browse-btn">
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
        <?php endif; ?>