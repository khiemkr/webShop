<?php
    if(!isset($_SESSION)) 
    {  
        session_start(); 
    } 
?>
<?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['regis']);
        unset($_SESSION['login']);       
    }
?>
<header class="header">
    <div class="grid wide">
        <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item  header__navbar-item--separate">
                            <b style="font-family:'Courier New', Courier, monospace; font-size:30px;">KHIEMShop</b>
                        </li>
                    </ul> 
                    <?php
                        if(isset($_SESSION['regis'])){
                    ?>
                    <ul class="header__navbar-list">
                        <a style="text-decoration: none;" href="#">
                            <li class="header__navbar-item header__navbar-iterm--strong header__navbar-item--separate"><?php echo $_SESSION['regis'] ?></li>
                        </a>
                        <a style="text-decoration: none;" href="index.php?dangxuat=1">
                            <li class="header__navbar-item header__navbar-iterm--strong">Đăng Xuất</li>
                        </a>
                    </ul>
                    <?php
                        }elseif(isset($_SESSION['login'])){
                    ?>
                    <ul class="header__navbar-list">
                        <a style="text-decoration: none;" href="#">
                            <li class="header__navbar-item header__navbar-iterm--strong header__navbar-item--separate"><?php echo $_SESSION['regis'] ?></li>
                        </a>
                        <a style="text-decoration: none;" href="index.php?dangxuat=1">
                            <li class="header__navbar-item header__navbar-iterm--strong">Đăng Xuất</li>
                        </a>
                    </ul>
                    <?php
                        }else{
                    ?>
                    <ul class="header__navbar-list">
                        <a style="text-decoration: none;" href="index.php?quanly=regis">
                            <li class="header__navbar-item header__navbar-iterm--strong header__navbar-item--separate">Đăng Kí</li>
                        </a>
                        <a style="text-decoration: none;" href="index.php?quanly=login">
                            <li class="header__navbar-item header__navbar-iterm--strong">Đăng Nhập</li>
                        </a>
                    </ul>
                    <?php
                        }
                    ?>
        </nav>
        <!-- header with search -->
        <div class="header-with-search">
                    <form action="index.php?quanly=search" method="POST" class="header__search">
                        <div class="header__search-input-wrap">
                            <input type="text" class="header__search-input" placeholder="Nhập sản phẩm của bạn" name="tukhoa">
                        </div>
                        <button class="header__search-btn" name="timkiem" value="Tìm kiếm">
                            <i class="header__search-btn-icon fas fa-search"></i>
                        </button>
                    </form>
                    <!-- gio hang -->
                    <div class="header__cart ">
                        <div class="header__cart-wrap">
                            <a href="index.php?quanly=giohang"> 
                                <i class="header__cart-icon fas fa-shopping-cart"></i>
                            </a>
                        </div>                        
                    </div>
        </div>
    </div>
</header>
