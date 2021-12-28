<?php
    $sql_listed_order = "SELECT * FROM DatHang,KhachHang WHERE DatHang.MSKH=KhachHang.MSKH ORDER BY DatHang.SoDonDH DESC";
    $query_listed_order = mysqli_query($my_sqli,$sql_listed_order);  
        
?>
<div class="col l-10 m-12 c-12"> 
    <div class="home-product ">
    <div class="home-filter">                     
        <button class="home-filter__btn btn btn--primary">Quản Lí Đơn Hàng</button>
    </div>
    <br>
        <table style ="width:100%;">
            <tr>
                <th>Mã Đơn</th>
                <th>Tên Khách Hàng</th>
                <th>SĐT</th>
                <th>Ngày Đặt Hàng</th>
                <th>Dự Kiến Giao Hàng</th>
                <th>Địa Chỉ Giao Hàng</th>
                <th>Trạng Thái</th>
                <th>Quản Lí</th>
            </tr>
            <?php
            $i = 0;
            while($row = mysqli_fetch_array($query_listed_order)){
                $i++;          
            ?>
            <tr>
                <td style="text-align: center"><?php echo $row['SoDonDH'] ?></td>
                <td style="text-align: center"><?php echo $row['HoTenKH'] ?></td>
                <td style="text-align: center"><?php echo $row['SoDienThoai'] ?></td>
                <td style="text-align: center"><?php echo $row['NgayDH'] ?></td>
                <td style="text-align: center"><?php echo $row['NgayGH'] ?></td>
                <td style="text-align: center"><?php echo $row['DiaChiGH'] ?></td>
                <td style="text-align: center">

                <?php
                    if($row['TrangThaiDH']=='1'){
                ?>
                     Chờ xử lí            
                <?php
                    }else{
                ?>
                     Đã xử lí              

                </td>
                <?php
                    }
                ?>
                <td style="text-align: center">
                    <?php
                        if($row['TrangThaiDH']=='1'){
                    ?>
                    <a style="text-decoration: none" href="index.php?action=donhang&query=xemdonhang&iddh= <?php echo $row['SoDonDH'] ?>">
                        <button style ="background-color:rgb(64, 99, 14)"class="btn_table">
                            <i class="fas fa-arrow-right"></i>
                         </button>               
                    </a>
                    <?php
                    }else{
                    ?>
                        <button style ="background-color:green"class="btn_table">
                            <i class="fas fa-check"></i>
                        </button>
                    <?php
                        }
                    ?>
                </td>
        
            </tr>
                <?php
                    }
                ?>
        </table>
    </div>
</div>