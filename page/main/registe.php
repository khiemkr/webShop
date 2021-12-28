<?php
    if(!isset($_SESSION))  
    { 
        session_start(); 
    }
    if(isset($_POST['regis'])){
        $ten = $_POST['hoten'];
        $sodienthoai = $_POST['sdt'];
        $mk = $_POST['pass'];
        $dc = $_POST['Diachi'];
        $cty = $_POST['tencty'];
        $sofax = $_POST['sofax'];
        $sql_regis = mysqli_query($my_sqli,"INSERT INTO KhachHang(HoTenKH,TenCongTy,SoDienThoai,SoFax,pass) VALUE ('".$ten."','".$cty."','".$sodienthoai."','".$sofax."','".$mk."')");
        if($sql_regis){
            $_SESSION['regis'] = $ten;
            $_SESSION['idKH'] = mysqli_insert_id($my_sqli);
            $idkh = $_SESSION['idKH'];
            $sql_regis_dc = mysqli_query($my_sqli,"INSERT INTO DiaChiKH(DiaChi,MSKH) VALUE ('".$dc."','".$idkh."')");
            header('Location: index.php?quanly=giohang'); 
        }
    }
?> 
<?php
    if(isset($_POST['regis'])){
?>
<script>
    location.href = 'http://localhost:8080/myweb/index.php';
</script>
<?php
    }
?>
<div class="col l-10 m-12 c-12">
    <div class="home-filter">                     
        <button class="home-filter__btn btn btn--primary">ĐĂNG KÍ</button>
    </div>
    <br>
	<div class="home-product ">
        <div class="auth-form">
            <div class="auth-form__container">
                <form action="" method="POST">
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="hoten" placeholder="Họ và tên">
                        </div>
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="sdt" placeholder="Số điện thoại">
                        </div>
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="Diachi" placeholder="Địa chỉ">
                        </div>
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="tencty" placeholder="Nơi công tác">
                        </div>
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="sofax" placeholder="Sofaxn">
                        </div>
                        <div class="auth-form__group">
                            <input type="password" class="auth-form__input" name="pass" placeholder="Mật Khẩu">
                        </div>
                    </div>
                    <div class="auth-form__controls">
                        <input type="submit" class="btn btn--primary" name="regis" value="ĐĂNG KÍ">
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>