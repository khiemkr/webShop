<?php
	$code = $_GET['iddh'];
	$sql_listed_order = "SELECT * FROM ChiTietDatHang,HangHoa WHERE ChiTietDatHang.MSHH=HangHoa.MSHH AND ChiTietDatHang.SoDonDH='".$code."' ORDER BY ChiTietDatHang.SoDonDH DESC";
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
                <th>Mã đơn hàng</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        <?php
        $i = 0;
        $tongtien = 0;
        while($row = mysqli_fetch_array($query_listed_order)){
            $i++;
            $thanhtien = $row['GiaDatHang']*$row['SoLuong'];
            $tongtien += $thanhtien ;
        ?>
        <tr>
            <td style="text-align: center" ><?php echo $row['SoDonDH'] ?></td>
            <td style="text-align: center" ><?php echo $row['TenHH'] ?></td>
            <td style="text-align: center" ><?php echo $row['SoLuong'] ?></td>
            <td style="text-align: center" ><?php echo number_format($row['Gia'],0,',','.').'vnđ' ?></td>
            <td style="text-align: center" ><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>      
        </tr>
        <?php
        } 
        ?>
        <tr>
            <td colspan="6">
                <p>Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
            </td>   
        </tr>
        </table>
        <br>
        <div style="margin-left:510px;" >
            <a  style="text-decoration: none" href="module/quanlidathang/processoeder.php?iddh=<?php echo $code ?>">
                <button class="btn btn--primary">Duyệt Đơn Hàng</button>
            </a>
        </div>
    </div>
</div>