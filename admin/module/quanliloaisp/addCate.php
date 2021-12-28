<?php
    $sql_listedcate = "SELECT * FROM LoaiHangHoa";
    $query_listedcate = mysqli_query($my_sqli,$sql_listedcate);       
?>
<div class="col l-10 m-12 c-12"> 
    <div class="home-product ">
        <div class="home-filter">                     
            <button class="home-filter__btn btn btn--primary">Thêm Loại Hàng</button>
        </div>
        <div class="auth-form">
            <div class="auth-form__container">
                <form method="POST" action="module/quanliloaisp/processcate.php">
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="tenloaihang" placeholder="Tên loại hàng">
                        </div>
                    </div>
                    <div class="auth-form__controls">
                        <input type="submit" class="btn btn--primary" name="themloaisanpham" value = "Thêm">
                    </div>
                    <br>
                </form>
            </div>
        </div>
        <br>
        <div class="home-filter">                     
            <button class="home-filter__btn btn btn--primary">Danh Sách Loại Hàng</button>
        </div>
        <br>
        <table style ="width:100%;">
            <tr>
                <th>STT</th>
                <th>Tên Loại Hàng</th>
                <th>Quản Lí</th>
            </tr>
            <?php 
                $i = 0;
                while($row = mysqli_fetch_array($query_listedcate)){
                    $i++;           
            ?>
            <tr>
                <td style="text-align: center"><?php echo $i ?></td>
                <td style="text-align: center"><?php echo $row['TenLoaiHang'] ?></td>
                <td style="text-align: center">
                    <a style="text-decoration: none" href="module/quanliloaisp/processcate.php?iddanhmuc= <?php echo $row['MaLoaiHang'] ?>">
                        <button style ="background-color: red;"class="btn_table"> 
                            <i  class="fas fa-trash-alt"></i>
                         </button>                       
                    </a>   
                </td>   
            </tr>
                <?php
                    }
                ?>
        </table>
    </div>
</div>