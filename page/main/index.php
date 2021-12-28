<?php
    $sql_product = "SELECT * FROM HangHoa,HinhHangHoa WHERE HangHoa.MSHH = HinhHangHoa.MSHH ORDER BY HangHoa.MSHH DESC LIMIT 20";
    $query_product = mysqli_query($my_sqli,$sql_product);  
    
?>
<div class="col l-10 m-12 c-12">
    <div class="home-filter" id="slider" style="background-image:url(img/bg12.png); height:350px;"></div>
    <script>
        var index =1;
        Changeimg = function(){
        var img = ["url(img/bg11.png)","url(img/bg4.png)","url(img/bg12.png)","url(img/bg9.jpg)"];
        document.getElementById("slider").style.backgroundImage = img[index];
        index++;
        if(index == img.length){
            index =0;
            }
        }
        setInterval(Changeimg,3000);
    </script>
    <div class="home-product "> 
    <!-- grid->row->column -->
        <div class="row">
        <!-- product item -->
            <?php
                while($row = mysqli_fetch_array($query_product)){      
            ?>
            <div class="grid__column-2-4"> 
                <a class="home-product-item" href="index.php?quanly=sanpham&id=<?php echo $row['MSHH'] ?>">
                    <div class="home-product-item__img" style="background-image:url(admin/module/quanlisanpham/uploads/<?php echo $row['TenHinh'] ?>);"></div>
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
