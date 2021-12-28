<?php
    $sql_listed = "SELECT * FROM HangHoa,HinhHangHoa WHERE HangHoa.MSHH = HinhHangHoa.MSHH ORDER BY HangHoa.MSHH DESC";
    $query_listed = mysqli_query($my_sqli,$sql_listed);      
?>
<div class="col l-10 m-12 c-12"> 
    <div class="home-product "> 
        <div class="home-filter">                     
            <button class="home-filter__btn btn btn--primary">Thêm Sản Phẩm</button>
        </div>
        <div class="auth-form">
            <div class="auth-form__container">
                <form method="POST" action="module/quanlisanpham/process.php">
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="Tensp" placeholder="Tên sản phẩm">
                        </div> 
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="quycach" placeholder="Quy Cách">
                        </div>
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="gia" placeholder="Giá Sản Phẩm">
                        </div>
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="soluonghang" placeholder="Số Lượng Hàng">
                        </div>
                        <div class="auth-form__group">
                            <input type="file" class="auth-form__input" name="tenhinhhh" placeholder="Hình ảnh">
                        </div>

                        <div class="auth-form__group">
                            <select name="danhmuc" class="auth-form__input">
                                <?php
                                    $sql_cate = "SELECT * FROM LoaiHangHoa ORDER BY MaLoaiHang DESC";
                                    $query_cate = mysqli_query($my_sqli,$sql_cate);
                                    while($row_cate = mysqli_fetch_array($query_cate)){
                                    ?>
                                    <option value="<?php echo $row_cate['MaLoaiHang'] ?>"><?php echo $row_cate['TenLoaiHang'] ?></option>
                                <?php
                                } 
                                ?>
                            </select>
                        </div>


                    </div>
                    <div class="auth-form__controls">
                        <input type="submit" class="btn btn--primary" name="themsanpham" value="Thêm">
                    </div>
                    <br>
                </form>
            </div>
        </div>
        <br>
        <div class="home-filter ">                     
            <button class="home-filter__btn btn btn--primary">Danh Sách Sản Phẩm</button>
        </div>
        <br>
        <table style ="width:100%;" >
            <tr>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Quy Cách</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Hình Ảnh</th>
                <th>Quản Lí</th>
            </tr>
            <?php
            $i = 0;
            while($row = mysqli_fetch_array($query_listed)){ 
                $i++;           
            ?>
            <tr> 
                <td style="text-align: center"><?php echo $i ?></td>
                <td style="text-align: center"><?php echo $row['TenHH'] ?></td>
                <td style="text-align: center"><?php echo $row['QuyCach'] ?></td>
                <td style="text-align: center"><?php echo $row['Gia'] ?></td>
                <td style="text-align: center"><?php echo $row['SoLuongHang'] ?></td>
                <td style="text-align: center"><img src="module/quanlisanpham/uploads/<?php echo $row['TenHinh'] ?>" width="150px"></td>
                <td style="text-align: center">
                    <a style="text-decoration: none" href="module/quanlisanpham/process.php?iddanhmuc= <?php echo $row['MSHH'] ?>">
                        <button style ="background-color: red;"class=" btn_table"> 
                            <i  class="fas fa-trash-alt"></i> 
                        </button>                       
                    </a>   
                    <a style="text-decoration: none" href="?action=quanlysanpham&query=edit&iddanhmuc= <?php echo $row['MSHH'] ?>">
                        <button style ="background-color: rgb(64, 99, 14);"class="btn_table">
                            <i class="fas fa-pencil-alt"></i>
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