<?php
    $sql_detail = "SELECT * FROM HangHoa,HinhHangHoa WHERE HangHoa.MSHH = HinhHangHoa.MSHH AND HangHoa.MSHH = '$_GET[id]' ORDER BY HangHoa.MSHH DESC LIMIT 1";
    $query_detail = mysqli_query($my_sqli,$sql_detail);
    while($row_detail = mysqli_fetch_array($query_detail)){
?>
<div class="col l-10 m-12 c-12">
    <div class="home-product ">                           
        <div class="row">                              
            <div class="detail">
                <div class="detail__img grid__column-2-5">
                    <div class="detail__img-iterm" style="background-image:url(admin/module/quanlisanpham/uploads/<?php echo $row_detail['TenHinh'] ?>)"></div>
                </div>
                <div class="detail__product grid__column-2-5">
                    <form action="page/main/addcart.php?idsanpham=<?php echo $row_detail['MSHH']?>" method = "POST" >
                        <div class="detail__header">
                            <?php echo $row_detail['TenHH']?>
                        </div>
                        <div class="detail__feedback">                                       
                            <i class="home-product-item__star--gold fas fa-star"></i>
                            <i class="home-product-item__star--gold fas fa-star"></i>
                            <i class="home-product-item__star--gold fas fa-star"></i>
                            <i class="home-product-item__star--gold fas fa-star"></i>
                            <i class=" fas fa-star"></i>
                        </div>
                        <div class="detail__product--price">
                            <div class="detail__price">
                                <span class="home-product-item__price-old">3.200.000đ</span>
                                <span class="home-product-item__price-current"><?php echo $row_detail['Gia']?>đ</span>                          
                            </div>                        
                        </div>
                        <?php
                            if($row_detail['SoLuongHang'] == 0 ){ ?>
                               <div class="detail_quantity">
                                    <p>Sản phẩm tạm hết hàng</p>
                                </div> 
                        <?php } else{?>
                        <div class="detail_quantity">
                            <p>Sản phẩm còn lại: <?php  echo $row_detail['SoLuongHang']?> sản phẩm</p>
                        </div>
                        <?php }?>
                        <div class="detail__buy">
                            <input type="submit" class="detail__buy--cart" name ="themgiohang" value = "Thêm giỏ hàng">
                        </div>
                    </form>
                </div>
            </div>      
        </div>
    </div>
</div>
<?php
    }
?>