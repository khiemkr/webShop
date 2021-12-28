<?php 
	$sql_procate = "SELECT * FROM LoaiHangHoa,HangHoa WHERE LoaiHangHoa.MaLoaiHang=HangHoa.MaLoaiHang AND LoaiHangHoa.MaLoaiHang = '$_GET[quanly]'";
	$query_procate = mysqli_query($my_sqli,$sql_procate);  

?>
<div class="col l-10 m-12 c-12">
    <div class="home-filter">                     
    <span class="home-filter__label"> <b>Một số sản phẩm liên quan:</b></span>
    </div>
    <div class="home-product ">
    <!-- grid->row->column -->
        <div class="row">
        <!-- product item -->
            <?php
                while($row = mysqli_fetch_array($query_procate)){     
                    $row_data = $row['MSHH'];
                    $sql_procateimg = "SELECT * FROM HangHoa,HinhHangHoa WHERE HangHoa.MSHH=HinhHangHoa.MSHH AND HinhHangHoa.MSHH = '".$row_data."' LIMIT 1";
                    $query_procateimg = mysqli_query($my_sqli,$sql_procateimg);
            ?>
            <div class="grid__column-2-4"> 
                <a class="home-product-item" href="index.php?quanly=sanpham&id=<?php echo $row['MSHH'] ?>">
                <?php
                while($rowimg = mysqli_fetch_array($query_procateimg)){     
                ?>
                    <div class="home-product-item__img" style="background-image:url(admin/module/quanlisanpham/uploads/<?php echo $rowimg['TenHinh'] ?>);"></div>
                <?php } ?>    
                    <h4 class="home-product-item__name"><?php echo $row['TenHH']; ?></h4> 
                    <div class="home-product-item__price">
                        <span class="home-product-item__price-old">1.200.000đ</span>
                        <span class="home-product-item__price-current"><?php echo $row['Gia']; ?>đ</span>
                    </div>
                    <div class="home-product-item__action">
                        <span class="home-product-item__like home-product-item__like--liked">
                            <i class="home-product-item__like-icon-empty far fa-heart"></i>
                            <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                        </span>
                        <div class="home-product-item__rating">
                            <i class="home-product-item__star--gold fas fa-star"></i>
                            <i class="home-product-item__star--gold fas fa-star"></i>
                            <i class="home-product-item__star--gold fas fa-star"></i>
                            <i class="home-product-item__star--gold fas fa-star"></i>
                            <i class=" fas fa-star"></i>
                        </div>
                        <span class="home-product-item__sold">99 Đã bán</span>
                    </div>
                    <div class="home-product-item__origin">
                        <span class="home-product-item__brand">Kkr</span>
                        <span class="home-product-item__origin-name">Viee</span>
                    </div>
                    <div class="home-product-item__sale-off">
                        <span class="home-product-item__sale-off-percent">10%</span>
                        <span class="home-product-item__sale-off-label">Giảm</span>
                    </div>
                </a>
            </div>
            <?php
                }
            ?>      
        </div>
    </div>
</div>
