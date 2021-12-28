<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(isset($_POST['Diachi'])){
        $dc = $_POST['diachi'];
        $iddh = $_SESSION['idHD'];
        //update
        $sql_updateDH = "UPDATE DatHang SET DiaChiGH='".$dc."' WHERE SoDonDH='".$iddh."'";
        mysqli_query($my_sqli,$sql_updateDH); 
    }
?>
<!-- chuyển trang -->
<?php
    if(isset($_POST['diachi'])){
?>
<script>
    location.href = 'http://localhost:8080/myweb/index.php';
</script>
<?php
    }
?>

<div class="col l-10 m-12 c-12">
	<div class="home-product ">
    <div class="auth-form">
            <div class="auth-form__container">
                <form method="POST" action="">
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name="diachi" placeholder="Nhập địa chỉ giao hàng">
                        </div>
                    </div>
                    <div class="auth-form__controls">
                        <input type="submit" class="btn btn--primary" name="Diachi" value="Xác Nhận">
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
