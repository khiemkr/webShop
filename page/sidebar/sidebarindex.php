<?php
    $sql_listedcate = "SELECT * FROM LoaiHangHoa";
    $query_listedcate = mysqli_query($my_sqli,$sql_listedcate);
?>


<div class="col l-2 m-0 c-0">
    <nav class="category">
        <h3 class="category__heading">
            <!-- <i class="category__heading-icon fas fa-list"></i> -->
            Danh mục
        </h3>
        <ul class="category-list"> 
            <li class="category-item ">
                <a href="index.php" class="category-item__link">Trang chủ</a>
            </li>
            <?php
                $i = 0;
                while($row = mysqli_fetch_array($query_listedcate)){
                    $i++;           
            ?>
            <li class="category-item ">
                <a href="index.php?quanly=<?php echo $row['MaLoaiHang']?>" class="category-item__link"><?php echo $row['TenLoaiHang']?></a>
            </li>
            <?php
                }
            ?>
        </ul>
        <!-- insert img -->
        <div  id = "Cateimg"class="home-product-item__img" style="background-image:url(https://cf.shopee.vn/file/4fec096d5d273e37e7fc7bb14d24173f);"></div>
        <div class="home-product-item__img" style="background-image:url(https://www.ontopvn.com/wp-content/uploads/2020/05/shop-ban-quan-ao-danh-cho-nam-o-da-nang.jpg);"></div>
    </nav>
</div> 
<script>
        var index =1;
        Changeimg = function(){
        var img = [
            "url(https://cf.shopee.vn/file/4fec096d5d273e37e7fc7bb14d24173f)",
            "url(https://cf.shopee.vn/file/1a77090297be46423aefa5a3fbb2a5d5)",
            "url(https://cf.shopee.vn/file/16e1b1a2cbcda21377d863c12fff77a2)",
            "url(https://cf.shopee.vn/file/084f0b00e40117b22383ff515048a838)"
            ];
        document.getElementById("Cateimg").style.backgroundImage = img[index];
        index++;
        if(index == img.length){
            index =0;
            }
        }
        setInterval(Changeimg,2000);
</script>