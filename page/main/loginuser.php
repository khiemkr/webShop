<?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $sql_login = mysqli_query($my_sqli,"SELECT * FROM KhachHang WHERE HoTenKH = '".$username."' AND pass = '".$pass."' LIMIT 1");
        $row = $sql_login; 
        $count = mysqli_num_rows($row);
        if($count > 0){
            $row_data = mysqli_fetch_array($row);
            $_SESSION['regis'] = $row_data['HoTenKH'];
            $_SESSION['idKH'] = $row_data['MSKH'];             
        }
        else{
            ?>
            <script>
                alert('tai khoan hoạc mat khau khong chinh xac');
                location.href = 'http://localhost:8080/myweb/index.php?quanly=login';
            </script>
            <?php
        }
    }
?>
<?php
    if(isset($_POST['login']) && $row_data['HoTenKH'] =='admin'){
        
?>
    <script>
        location.href = 'http://localhost:8080/myweb/admin/index.php?action=dashboard&query=add';
        
    </script>
<?php
    }
    if(isset($_POST['login'])){
?>
    <script>
        location.href = 'http://localhost:8080/myweb/index.php';
    </script>
<?php
    }
?>

<div class="col l-10 m-12 c-12">
    <div class="home-filter">                     
        <button class="home-filter__btn btn btn--primary">ĐĂNG NHẬP</button>
    </div>
    <br>
	<div class="home-product ">
        <form action="" method = "POST">
            <div class="auth-form">
                <div class="auth-form__container">
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="text" class="auth-form__input" name ="username" placeholder="Nhập tên của bạn">
                        </div>
                        <div class="auth-form__group">
                            <input type="password" class="auth-form__input" name = "pass" placeholder="Nhập mật khẩu của bạn">
                        </div>
                    </div>
                    <div class="auth-form__controls">
                        <input type="submit" class="btn btn--primary" name="login" value="Đăng Nhập">
                    </div>
                    <br>
                </div>
            </div>  
        </form>
    </div>
</div>
