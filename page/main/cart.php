<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<div class="col l-10 m-12 c-12">
    <div class="home-filter">                     
        <button class="home-filter__btn btn btn--primary">Giỏ Hàng</button> 
    </div>
    <br>
	<div class="home-product "> 
		<div class="row">
            <table style = "width: 1121px ; margin-left:10px;margin-bottom:32px; text-align: center"  >
                <tr >
                    <th>ID</th>
                    <th>Mã Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th> Giá</th>
                    <th> Thành Tiền</th>
                    <th> Quản lí</th>
                </tr>
                <?php
                    if(isset($_SESSION['cart'])){
                        $i = 0;
                        $tongtien = 0;
                        foreach($_SESSION['cart'] as $cart_item){
                            $total = $cart_item['soluong']*$cart_item['Gia'];
                            $tongtien += $total;
                            $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $cart_item['id']; ?></td>
                    <td><?php echo $cart_item['tensanpham']; ?></td>
                    <td>
                        <a href="page/main/addcart.php?tru=<?php echo $cart_item['id'] ?>"><i class="fas fa-minus"></i></a>
                        <?php echo $cart_item['soluong']; ?>
                        <a href="page/main/addcart.php?cong=<?php echo $cart_item['id'] ?>"><i class="fas fa-plus"></i></a>
                    </td>
                    <td><?php echo $cart_item['Gia'] .'VND'; ?></td>
                    <td><?php echo $total .'VND'; ?></td>
                    <td>
                        <a style="text-decoration:none" href="page/main/addcart.php?xoa=<?php echo $cart_item['id'] ?>">
                            <button style ="background-color: red;"class="btn_table">
                                <i  class="fas fa-trash-alt"></i>
                            </button>
                        </a>
                    </td>            
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="7">
                        <p style="float: left; margin: 4px;">Tổng tiền: <?php echo $tongtien .'VND'; ?></p>
                        <p style="float: right;margin: 4px;">
                            <a style="text-decoration:none" href="page/main/addcart.php?xoatatca=1">
                                <button style ="background-color: red;" class="btn_table">
                                    <i  class="fas fa-trash-alt"></i>
                                </button>
                            </a>
                        </p> 
                    </td>                   
                </tr>
                <?php } else { ?>
                <tr>
                        <td colspan="7"><p>Giỏ Hàng Trống</p> </td>
                </tr>
                <?php } ?>
            </table>    
            
            <?php
                if(isset($_SESSION['regis']) || isset($_SESSION['login']) ){     
            ?>
            <div style="margin:auto" >
                <a  style="text-decoration: none" href="page/main/pay.php">
                    <button class="btn btn--primary">Đặt Hàng</button>
                </a>
            </div>
            <?php }else{ ?>
            <div style="margin:auto" >
                <a  style="text-decoration: none" href="index.php?quanly=regis">
                    <button class="btn btn--primary">Đăng Kí</button>
                </a>
                <a  style="text-decoration: none" href="index.php?quanly=login">
                    <button class="btn btn--primary">Đăng Nhập</button>
                </a>
            </div>
            <?php } ?>
        </div>
        <?php
            if(isset($_SESSION['regis']) || isset($_SESSION['login']) ){   
            $IDKH = $_SESSION['idKH'];
            $sql_listed_order = "SELECT * FROM DatHang,KhachHang WHERE DatHang.MSKH=KhachHang.MSKH AND KhachHang.MSKH ='".$IDKH."' ORDER BY DatHang.SoDonDH DESC";
            $query_listed_order = mysqli_query($my_sqli,$sql_listed_order);  
        ?>
        <br>
        <div class="home-filter">                     
            <button class="home-filter__btn btn btn--primary">Danh Sách Đặt Hàng</button>
        </div>
        <br>  
        <table style ="width:100%;">
                <tr >
                    <!-- <th>ID</th> -->
                    <th>Mã Đơn</th>
                    <th>Người Nhận Hàng</th>
                    <th>SĐT</th>
                    <th>Ngày Đặt Hàng</th>
                    <th>Dự Kiến Giao Hàng</th>
                    <th>Trạng Thái</th>
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
                    <td style="text-align: center">
                        <?php
                            if($row['TrangThaiDH'] == '1'){
                        ?>
                        <p>
                             Đang chờ xử lí                               
                        </p>
                        <?php
                            }else{
                        ?>
                        <p>
                             Đang giao hàng                                   
                        </p>
                        <?php
                            }
                        ?>
                    </td>
                </tr>
                <?php
                    }
                ?>
        </table>
        <?php } ?>
    </div>
 </div>