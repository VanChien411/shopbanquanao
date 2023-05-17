<section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                    <li class="active"><a href="#phobien" data-toggle="tab">Sản phẩm cùng loại</a></li>
                  </ul>
                  <!-- Tab panes -->
                    <div class="tab-content">
<?php
    foreach ($related as $item):
        extract($item);
        $img = $hinhAnh;
            if($img!=''){
                $img = "<img width=100% heightr=100% src='../Admin/upload/".$img."'>";
            }else{
                $img = "Không có ảnh!";
            }
?>
          <div class="tab-pane fade in active" id="phobien">
            <ul class="aa-product-catg" style="float: none;">
                        <li> 
                        <figure>
                            <a class="aa-product-img" style="width:250px; height:300px;" href="index.php?act=detail_product&id=<?= $maSP ?>"><?=$img?></a>
                            <a class="aa-add-card-btn"href="#"><form action="index.php?act=addtocart" method="post">
                                <input type="hidden" name="maSP" value="<?= $maSP ?>">
                                <input type="hidden" name="tenSP" value="<?= $tenSP ?>">
                                <input type="hidden" name="hinhAnh" value="<?= $hinhAnh ?>">
                                <input type="hidden" name="donGia" value="<?= ((100-$giamGia)/100)*$donGia?>">
                                <input style="background: #000 none repeat scroll 0 0; font-weight: bold; border: none; font-size:25px; font-family: 'Lato', sans-serif;" type="submit" name="addtocart" class="fa fa-shopping-cart" value="Thêm vào giỏ">
                              </form></a>
                            <figcaption>
                            <h4 class="aa-product-title"><a href="#"><?=$tenSP?></a></h4>
                            <span class="aa-product-price"><?= number_format((((100-$giamGia)/100)*$donGia),0,',','.')?> đ</span><span style="color:grey" class="aa-product-price"><del><?= number_format($donGia,0,',','.')?> đ</del></span>
                            </figcaption>
                        </figure>                        
                        <!-- product badge -->
                        <span class="aa-badge aa-sale" href="#"><?=$giamGia ?>%</span>
                        </li>
                    </ul>
                    <!-- / men product category -->
                    </div>
<?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>