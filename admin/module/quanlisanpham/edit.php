<?php
    $sql_edit = "SELECT * FROM HangHoa WHERE MSHH ='$_GET[iddanhmuc]'LIMIT 1";
    $query_edit = mysqli_query($my_sqli,$sql_edit);  
        
?>
<div class="col l-10 m-12 c-12">
    <div class="home-product ">
    <div class="home-filter">                     
        <button class="home-filter__btn btn btn--primary">EDIT PRODUCT</button>
    </div>
        <div class="auth-form">
                    <div class="auth-form__container">
                        <form method="POST" action="module/quanlisanpham/process.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
                        <?php
                            while($dong = mysqli_fetch_array($query_edit)){    
                        ?>
                            <div class="auth-form__form">
                                <div class="auth-form__group">
                                    <input type="text" class="auth-form__input" name="Tensp" value=<?php echo $dong['TenHH'] ?>>
                                </div>
                                <div class="auth-form__group">
                                    <input type="text" class="auth-form__input" name="quycach" value=<?php echo $dong['QuyCach'] ?>>
                                </div>
                                <div class="auth-form__group">
                                    <input type="text" class="auth-form__input" name="gia" value=<?php echo $dong['Gia'] ?>>
                                </div>
                                <div class="auth-form__group">
                                    <input type="text" class="auth-form__input" name="soluonghang" value=<?php echo $dong['SoLuongHang'] ?>>
                                </div>
                                <div class="auth-form__group">
                                    <input type="text" class="auth-form__input" name="maloaihang" value=<?php echo $dong['MaLoaiHang'] ?>>
                                </div>
                            </div>
                                <div class="auth-form__controls">
                                    <input type="submit" class="btn btn--primary" name="suasanpham" value="Sua San Pham">
                                </div>
                            <br>
                            <?php
                                }
                            ?>
                        </form>
                    </div>
                </div>
    </div>
</div>