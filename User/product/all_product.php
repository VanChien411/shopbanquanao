<div class="tab-content">
<div class="tab-pane fade in active" id="iphone">
  <?php
      foreach ($listsp1 as $item1):
          extract($item1);
          $img = $hinhAnh;
              if($img!=''){
                  $img = "<img width=100% heightr=100% src='../Admin/upload/".$img."'>";
              }else{
                  $img = "Không có ảnh!";
              }
  ?>
           <ul class="aa-product-catg" style="float: none;">
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
                    <!-- / men product category -->
  <?php endforeach; ?>
  </div>
  <div class="tab-pane fade" id="oppo">
  <?php
        foreach ($listsp3 as $item3):
            extract($item3);
            $img = $hinhAnh;
                if($img!=''){
                    $img = "<img width=100% heightr=100% src='../Admin/upload/".$img."'>";
                }else{
                    $img = "Không có ảnh!";
                }
  ?>
                     
                        <ul class="aa-product-catg" style="float: none;">
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
                              </form></a>
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
  <div class="tab-pane fade" id="xiaomi">
  <?php
        foreach ($listsp2 as $item2):
            extract($item2);
            $img = $hinhAnh;
                if($img!=''){
                    $img = "<img width=100% heightr=100% src='../Admin/upload/".$img."'>";
                }else{
                    $img = "Không có ảnh!";
                }
  ?>
                        <ul class="aa-product-catg" style="float: none;">
                          <li>
                            <figure>
                              <a class="aa-product-img" style="width:250px; height:300px;" href="index.php?act=detail_product&id=<?= $maSP ?>"><?=$img?></a>
                              <a class="aa-add-card-btn"href="index.php?act=detail_product&id=<?= $maSP ?>"><form action="index.php?act=addtocart" method="post">
                                <input type="hidden" name="maSP" value="<?= $maSP ?>">
                                <input type="hidden" name="tenSP" value="<?= $tenSP ?>">
                                <input type="hidden" name="hinhAnh" value="<?= $hinhAnh ?>">
                                <input type="hidden" name="donGia" value="<?= ((100-$giamGia)/100)*$donGia?>">
                                <input style="background: #000 none repeat scroll 0 0; font-weight: bold; border: none; font-size:25px; font-family: 'Lato', sans-serif;" type="submit" name="addtocart" class="fa fa-shopping-cart" value="Thêm vào giỏ">
                              </form></a>
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
  <div class="tab-pane fade" id="samsung">
  <?php
        foreach ($listsp4 as $item4):
            extract($item4);
            $img = $hinhAnh;
                if($img!=''){
                    $img = "<img width=100% heightr=100% src='../Admin/upload/".$img."'>";
                }else{
                    $img = "Không có ảnh!";
                }
  ?>
                        <ul class="aa-product-catg" style="float: none;">
                          <li>
                            <figure>
                              <a class="aa-product-img" style="width:250px; height:300px;" href="index.php?act=detail_product&id=<?= $maSP ?>"><?=$img?></a>
                              <a class="aa-add-card-btn"href="index.php?act=detail_product&id=<?= $maSP ?>"><form action="index.php?act=addtocart" method="post">
                                <input type="hidden" name="maSP" value="<?= $maSP ?>">
                                <input type="hidden" name="tenSP" value="<?= $tenSP ?>">
                                <input type="hidden" name="hinhAnh" value="<?= $hinhAnh ?>">
                                <input type="hidden" name="donGia" value="<?= ((100-$giamGia)/100)*$donGia?>">
                                <input style="background: #000 none repeat scroll 0 0; font-weight: bold; border: none; font-size:25px; font-family: 'Lato', sans-serif;" type="submit" name="addtocart" class="fa fa-shopping-cart" value="Thêm vào giỏ">
                              </form></a>
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
  <div class="tab-pane fade" id="realme">
  <?php
        foreach ($listsp6 as $item6):
            extract($item6);
            $img = $hinhAnh;
                if($img!=''){
                    $img = "<img width=100% heightr=100% src='../Admin/upload/".$img."'>";
                }else{
                    $img = "Không có ảnh!";
                }
  ?>
                        <ul class="aa-product-catg" style="float: none;">
                          <li>
                            <figure>
                              <a class="aa-product-img" style="width:250px; height:300px;" href="index.php?act=detail_product&id=<?= $maSP ?>"><?=$img?></a>
                              <a class="aa-add-card-btn"href="index.php?act=detail_product&id=<?= $maSP ?>"><form action="index.php?act=addtocart" method="post">
                                <input type="hidden" name="maSP" value="<?= $maSP ?>">
                                <input type="hidden" name="tenSP" value="<?= $tenSP ?>">
                                <input type="hidden" name="hinhAnh" value="<?= $hinhAnh ?>">
                                <input type="hidden" name="donGia" value="<?= ((100-$giamGia)/100)*$donGia?>">
                                <input style="background: #000 none repeat scroll 0 0; font-weight: bold; border: none; font-size:25px; font-family: 'Lato', sans-serif;" type="submit" name="addtocart" class="fa fa-shopping-cart" value="Thêm vào giỏ">
                              </form></a>
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
  <div class="tab-pane fade" id="vivo">
  <?php
        foreach ($listsp5 as $item5):
            extract($item5);
            $img = $hinhAnh;
                if($img!=''){
                    $img = "<img width=100% heightr=100% src='../Admin/upload/".$img."'>";
                }else{
                    $img = "Không có ảnh!";
                }
  ?>
                        <ul class="aa-product-catg" style="float: none;">
                          <li>
                            <figure>
                              <a class="aa-product-img" style="width:250px; height:300px;" href="index.php?act=detail_product&id=<?= $maSP ?>"><?=$img?></a>
                              <a class="aa-add-card-btn"href="index.php?act=detail_product&id=<?= $maSP ?>"><form action="index.php?act=addtocart" method="post">
                                <input type="hidden" name="maSP" value="<?= $maSP ?>">
                                <input type="hidden" name="tenSP" value="<?= $tenSP ?>">
                                <input type="hidden" name="hinhAnh" value="<?= $hinhAnh ?>">
                                <input type="hidden" name="donGia" value="<?= ((100-$giamGia)/100)*$donGia?>">
                                <input style="background: #000 none repeat scroll 0 0; font-weight: bold; border: none; font-size:25px; font-family: 'Lato', sans-serif;" type="submit" name="addtocart" class="fa fa-shopping-cart" value="Thêm vào giỏ">
                              </form></a>
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
            </div>
          </div>
        </div>
    </div>
  </section>
  