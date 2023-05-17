<section id="aa-product-category">
    <div class="container">
      <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="">
                    <option value="1" selected="Default">Default</option>
                    <option value="2">Name</option>
                    <option value="3">Price</option>
                    <option value="4">Date</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">

            <?php
      foreach ($dssp as $item):
          extract($item);
          $img = $hinhAnh;
              if($img!=''){
                  $img = "<img width=100% heightr=100% src='../Admin/upload/".$img."'>";
              }else{
                  $img = "Không có ảnh!";
              }
  ?>
              <ul class="aa-product-catg">
                  
                <!-- start single product item -->
                <li>
                          <figure>
                            <a class="aa-product-img" style="width:250px; height:300px;" href="index.php?act=detail_product&id=<?= $maSP ?>"><?=$img?></a>
                            <a class="aa-add-card-btn"href="index.php?act=detail_product&id=<?= $maSP ?>">
                              <form action="index.php?act=addtocart" method="post">
                                <input type="hidden" name="maSP" value="<?= $maSP ?>">
                                <input type="hidden" name="tenSP" value="<?= $tenSP ?>">
                                <input type="hidden" name="hinhAnh" value="<?= $hinhAnh ?>">
                                <input type="hidden" name="donGia" value="<?= ((100-$giamGia)/100)*$donGia?>">
                                <input style="background: #000 none repeat scroll 0 0; font-weight: bold; border: none; font-size:25px; font-family: 'Lato', sans-serif;" type="submit" name="addtocart" class="fa fa-shopping-cart" value="Thêm vào giỏ">
                              </form>
                              </a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="index.php?act=detail_product&id=<?= $maSP ?>"><?=$tenSP?></a></h4>
                              <span class="aa-product-price"><?= number_format((((100-$giamGia)/100)*$donGia),0,',','.')?> đ</span><span style="color:grey" class="aa-product-price"><del><?= number_format($donGia,0,',','.')?> đ</del></span>
                            </figcaption>
                          </figure>                        
                          <!-- product badge -->
                          <span class="aa-badge aa-sale" href="#"><?=$giamGia ?>%</span>
                        </li>     
                
              </ul>
              <?php endforeach; ?>

              
            </div>
           
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Danh mục sản phẩm</h3>
              <ul class="aa-catg-nav">
              <?php
              foreach ($dm as $item):
                extract($item);
              ?>                                             
              <li><a href="index.php?act=timkiem&maDM=<?=$maDM?>"><?=$tenDM;?></a></li>
              <?php endforeach; ?>
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Sản phẩm hot</h3>
              <div class="aa-recently-views">
<?php
  foreach ($top as $item):
      extract($item);
?>
                <ul>
                  <li>
                    <a href="index.php?act=detail_product&id=<?= $maSP ?>" class="aa-cartbox-img"><img alt="img" src="../Admin/upload/<?=$hinhAnh;?>"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="index.php?act=detail_product&id=<?= $maSP ?>"><?=$tenSP?></a></h4>
                      <p><?= number_format((((100-$giamGia)/100)*$donGia),0,',','.')?> đ</p>
                    </div>                    
                  </li>
                  <?php endforeach; ?>
                </ul>
              </div>                            
            </div>
          </aside>
        </div>