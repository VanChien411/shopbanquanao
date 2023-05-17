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
                        <th>Mã đơn hàng</th>
                        <th>Tên người nhận</th>
                        <th>Email người nhận</th>
                        <th>Địa chỉ nhận</th>
                        <th>SDT người nhận</th>
                        <th>Ghi chú</th>
                        <th>Ngày tạo đơn</th>
                        <th>Trạng Thái</th>
                      </tr>
                    </thead>
                    <tbody>
    <?php 
            foreach($result as $result):
                extract($result);
                  $stt = set_status($trangThai);
    ?>
                      <tr>
                        <td>T5S - <?=$maDH?></td>
                        <td><?=$tenKH?></td>
                        <td><?=$email?></td>
                        <td><?=$diaChi?></td>
                        <td>0<?=$SDT?></td>
                        <td><?=$ghiChu?></td>
                        <td><?=$ngayDH?></td>
                        <td><?=$stt?></td>
                      </tr>
    <?php endforeach; ?>
                      </tbody>
                  </table>
                </div>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->