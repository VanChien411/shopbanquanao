<?php
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
<div class="aa-product-view-content">
    <section style="text-align:center; color: red; font-weight: bold;"><?php if(isset($thongbao)&&($thongbao!=""))echo $thongbao;?></section>
    <form action="index.php?act=cpass" style="width:30%; margin:auto;" enctype="multipart/form-data" method="post" class="aa-login-form">
        <div class="form-group">
            <label>Mật khẩu củ<span>*</span></label> 
            <input type="password" name="pass_old" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Mật khẩu mới<span>*</span></label> 
            <input type="password" name="pass_new1" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Nhập lại mật khẩu<span>*</span></label> 
            <input type="password" name="pass_new2" class="form-control" required/>
        </div>
    <input type="hidden" name="maKH" value="<?php if (isset($maKH)&&($maKH>0)) echo $maKH;?>"lass="form-control">

    <input style=" margin:2% " type="submit" name="capnhat" value="Cập nhật" class="aa-browse-btn">
    </form>
</div>