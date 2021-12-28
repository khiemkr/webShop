<?php
    $sql_listed = "SELECT * FROM KhachHang,DiaChiKH WHERE KhachHang.MSKH=DiaChiKH.MSKH ORDER BY KhachHang.MSKH DESC";

    $query_listed = mysqli_query($my_sqli,$sql_listed);  
        
?>
<div class="col l-10 m-12 c-12">
    <div class="home-product ">
    <div class="home-filter">                     
        <button class="home-filter__btn btn btn--primary">Danh Sách Khách Hàng</button>
    </div>
    <br>

        <table style ="width:100%;">
            <tr>
                <th>STT</th>
                <th>Tên Khách Hàng</th>
                <th>Tên Công Ty</th>
                <th>SĐT</th>
                <th>Số Fax</th>
                <th>Địa Chỉ</th>

            </tr>
            <?php
            $i = 0;
            while($row = mysqli_fetch_array($query_listed)){
                $i++;      
            ?>
            <tr>
                <td style="text-align: center"><?php echo $i ?></td>
                <td style="text-align: center"><?php echo $row['HoTenKH'] ?></td>
                <td style="text-align: center"><?php echo $row['TenCongTy'] ?></td>
                <td style="text-align: center"><?php echo $row['SoDienThoai'] ?></td>
                <td style="text-align: center"><?php echo $row['SoFax'] ?></td>
                <td style="text-align: center"><?php echo $row['DiaChi'] ?></td>
            </tr>
                <?php
                    }
                ?>
        </table>
    </div>
</div>