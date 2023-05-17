<!-- Cart view section -->
<section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form action="index.php?act=billsuccess" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Shipping Address -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">\
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Shippping Address
                          </a>
                        </h4>
                      </div>
            <?php if(isset($_SESSION['user'])){
                $name = $_SESSION['user']['tenKH'];
                $Email = $_SESSION['user']['email'];
                $diaChi = $_SESSION['user']['diaChi'];
                $SDT = $_SESSION['user']['SDT'];
            }else{
                $name ="";
                $Email ="";
                $diaChi ="";
                $SDT ="";
            }
            ?>
                      <div id="collapseFour" class="panel-collapse collapse in" >
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="name" value="<?=$name ?>" placeholder="Company name">
                              </div>                             
                            </div>                            
                          </div>  
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" name="email" value="<?=$Email ?>" placeholder="Email Address">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" name="SDT" value="0<?=$SDT ?>" placeholder="Phone*">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" name="diaChi" placeholder="Address*" rows="3"><?=$diaChi ?></textarea>
                              </div>                             
                            </div>                            
                          </div>   
                           <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea name="notes" cols="8" rows="5" placeholder="Special Notes*"></textarea>
                              </div>                             
                            </div>                            
                          </div>              
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Ảnh</th>
                          <th>Sản phẩm</th>
                          <th>Giá</th>
                        </tr>
                      </thead>
                      <tbody>
    <?php 
        $tong=0;
        $i=0;
        foreach ($_SESSION['cart'] as $cart):
            $ttien= $cart[3] * $cart[4];
            $tong += $ttien;
    ?>  
                        <tr>
                          <td style="width: 100px;"><img width="50%" height="50%" src="../Admin/upload/<?=$cart[2]?>" alt=""></td>
                          <td><?=$cart[1]?> <strong> x  <?=$cart[4]?></strong></td>
                          <td><?=number_format($ttien,0,',','.')?>đ</td>
                        </tr>
    <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td style="font-weight: bold; font-size: 18px; color:red;" >Tổng tiền:</td>
                          <th></th>
                          <th><?=number_format($tong,0,',','.')?>đ</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
<?php 
    foreach ($result as $key):
        extract($key);
?>
                    <input type="hidden" name="maDH" value="<?=$maDH?>" />
<?php endforeach; ?>
                  <h4>Phương thức thanh toán:</h4>
                  <div class="aa-payment-method">                    
                    <label for=""><input type="radio" value="1" checked name="maTT"> Thanh toán khi nhận hàng</label>

                    <!-- <label for=""><input type="radio" value="2" name="maTT" > Thanh toán trực tiếp </label>
                    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">     -->
                    <?php if(isset($_SESSION['user'])):?>
                      <input type="submit" name="dathang" value="Đặt hàng" class="aa-browse-btn">  
                    <?php endif;?>      
                  </div>
                </div>
              </div>
            </div>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->