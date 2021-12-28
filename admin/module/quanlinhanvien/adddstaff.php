<div class="col l-10 m-12 c-12">
    <div class="home-product ">
    <div class="home-filter ">                     
        <button class="home-filter__btn btn btn--primary">THÊM NHÂN VIÊN</button>
    </div>
        <div class="auth-form">
            <div class="auth-form__container">
                <form method="POST" action="module/quanlinhanvien/processstaff.php">
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="Tennv" placeholder="Tên nhân viên">
                        </div>
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="chucvu" placeholder="Chức vụ nhân viên">
                        </div>
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="dc" placeholder="Địa chỉ nhân viên">
                        </div>
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="sdt" placeholder="SĐT nhân viên">
                        </div>
                    </div>
                        <div class="auth-form__controls">
                            <input type="submit" class="btn btn--primary" name="themnhanvien" value="Thêm">
                        </div>
                    <br>
                </form>
            </div>
        </div>
        <br>
    <div class="home-filter">                     
        <button class="home-filter__btn btn btn--primary">DANH SÁCH NHÂN VIÊN</button>
    </div>
    <?php
        $sql_listed = "SELECT * FROM NhanVien";
        $query_listed = mysqli_query($my_sqli,$sql_listed);      
    ?>
    <br>
    <table style ="width:100%;">
            <tr>
                <th>STT</th>
                <th>Tên Nhân Viên</th>
                <th>Chức Vụ </th>
                <th>Địa chỉ</th>
                <th>SĐT</th>
            </tr>
            <?php
            $i = 0;
            while($row = mysqli_fetch_array($query_listed)){
                $i++;
            
            
            ?>
            <tr>
                <td style="text-align: center"><?php echo $i ?></td>
                <td style="text-align: center"><?php echo $row['HoTenNV'] ?></td>
                <td style="text-align: center"><?php echo $row['ChucVu'] ?></td>
                <td style="text-align: center"><?php echo $row['DiaChi'] ?></td>
                <td style="text-align: center"><?php echo $row['SoDienThoai'] ?></td>
        
            </tr>
                <?php
                    }
                ?>
        </table>
    </div>
</div>