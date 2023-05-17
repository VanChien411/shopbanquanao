 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tiền</th>
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
                        <td><a class="remove" href="index.php?act=delcart&idcart=<?=$i?>"><fa class="fa fa-close"></fa></a></td>
                        <td><img src="../Admin/upload/<?=$cart[2];?>" alt="img"></td>
                        <td><a class="aa-cart-title" href="#"><?=$cart[1];?></a></td>
                        <td><?= number_format($cart[3],0,',','.')?>đ</td>
                        <td><?=$cart[4]?></td>
                        <td><?=number_format($ttien,0,',','.')?>đ</td>
                      </tr>
    <?php
        $i++;
        endforeach; 
        
    ?>
                      
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Hoá đơn</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Tổng tiền</th>
                     <td><?=number_format($tong,0,',','.')?>đ</td>
                   </tr>
                 </tbody>
               </table>
               <?php if($_SESSION['cart']!=[]):?>
               <a href="index.php?act=bill" class="aa-cart-view-btn">Thanh toán</a>
               <?php endif;?>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->