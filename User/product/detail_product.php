<?php
    if(is_array($detail)){
        extract($detail);
    }
    if(is_array($number)){
      extract($number);
      
    }
    $img = $hinhAnh;
    if($img!=''){
        $img = "<img width=100% heightr=100% src='../Admin/upload/".$img."'>";
    }else{
        $img = "Không có ảnh!";
    }
?>

<section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
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
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3><?=$tenSP?></h3>
                    <div class="aa-price-block">
                      <span style="color:red; font-size:22px;" class="aa-product-view-price"><?= number_format((((100-$giamGia)/100)*$donGia),0,',','.')?> đ</span><span style="color:grey" class="aa-product-price"><del><?= number_format($donGia,0,',','.')?> đ</del></span>
                      <p class="aa-product-avilability">Trạng thái: <span><?=$trangThai==0?'Còn hàng':'Hết hàng'?></span></p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="#"><form action="index.php?act=addtocart" method="post">
                                <input type="hidden" name="maSP" value="<?= $maSP ?>">
                                
                                <input type="hidden" name="tenSP" value="<?= $tenSP ?>">
                                <input type="hidden" name="hinhAnh" value="<?= $hinhAnh ?>">
                                <input type="hidden" name="donGia" value="<?= ((100-$giamGia)/100)*$donGia?>">
                                <input style="font-weight: bold; border: none; font-size:25px; font-family: 'Lato', sans-serif;" type="submit" name="addtocart" class="fa fa-shopping-cart" value="Thêm vào giỏ">
                              </form></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Mô tả và Bình luận</a></li>
              </ul>
    
              <!-- Tab panes -->
              <div class="tab-content">
                <div style="display: flex;" class="tab-pane fade in active" id="description">
                  <div style="text-align: justify; margin-right: 15px">
                  <?=$moTa?>
                  <div>
                  <iframe src="../User/cmt/cmt.php?maSP=<?=$maSP?>" frameborder="0" width="100%" height="100%"></iframe>
                      <!-- review form -->
                      <form action="index.php?act=cmt"method="post" class="aa-review-form">
                      
                        <input type="hidden" name="maSP" value="<?=$maSP?>" />
                      <div class="form-group">
                        <label for="message">Bình luận của bạn</label>
                        <textarea name="comment" class="form-control" rows="3" id="message"></textarea>
                      </div>
                      <?php if(isset($_SESSION['user'])): ?>
                      <input type="submit" name="cmt" class="btn btn-default aa-review-submit" value="Submit">
                      <?php endif; ?>
                   </form>
                  </div>
                  </div>
                  
                  <!-- <div style=" width: 150%">
                  <h4 style="text-align: center; color: red; font-weight: bold;">Thông số kỹ thuật</h4>
                    <table style="font: size 12px;" class="table">
                      <tbody>
                        <tr>
                          <th>Camera sau</th>
                          <td><?=$cameraSau?></td>
                        </tr>
                        <tr>
                          <th>Camera trước</th>
                          <td><?=$cameraTruoc?></td>
                        </tr>
                        <tr>
                          <th>Phiên bản</th>
                          <td><?=$phienBan?></td>
                        </tr>
                        <tr>
                          <th>CPU</th>
                          <td><?=$CPU?></td>
                        </tr>
                        <tr>
                          <th>Số nhân CPU</th>
                          <td><?=$soNhanCPU?></td>
                        </tr>
                        <tr>
                          <th>Tốc độ tối đa</th>
                          <td><?=$tocDoToiDa?></td>
                        </tr>
                        <tr>
                          <th>64Bits</th>
                          <td><?=$number['64Bits']?"có":"không"?></td>
                        </tr>
                        <tr>
                          <th>Công nghệ màn hình</th>
                          <td><?=$congNgheManHinh?></td>
                        </tr>
                        <tr>
                          <th>Kích thước</th>
                          <td><?=$kichThuoc?></td>
                        </tr>
                        <tr>
                          <th>Chuẩn màn hình</th>
                          <td><?=$chuanManHinh?></td>
                        </tr>
                        <tr>
                          <th>Độ phân giải</th>
                          <td><?=$doPhanGiai?></td>
                        </tr>
                        <tr>
                          <th>Chất liệu màn hình</th>
                          <td><?=$chatLieuManHinh?></td>
                        </tr>
                        <tr>
                          <th>GPU</th>
                          <td><?=$GPU?></td>
                        </tr>
                        <tr>
                          <th>RAM</th>
                          <td><?=$RAM?></td>
                        </tr>
                        <tr>
                          <th>Bộ nhớ trong</th>
                          <td><?=$boNhoTrong?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div> -->
                </div>
                  
                </div>            
              </div>
            </div>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>