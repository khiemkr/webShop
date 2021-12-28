<div class="app__container">
    <div class="grid wide">
        <div class="row app__content">
                <?php
                include("page/sidebar/sidebarindex.php");
                ?>
                <?php     
                    $sql_listedcate = "SELECT * FROM LoaiHangHoa";
                    $query_listedcate = mysqli_query($my_sqli,$sql_listedcate);              
                    if(isset($_GET['quanly'])){
                        $tam = $_GET['quanly'];
                    }
                    else{
                        $tam = '';
                    }
                    while($row = mysqli_fetch_array($query_listedcate)){          
                        if($tam == ($row['MaLoaiHang'])){
                            include('main/procate.php');
                        }
                    }
                    if($tam =='aonu'){
                        include("main/categoryaonu.php");
                    }
                    else if($tam=='aonam'){
                        include("main/categoryaonam.php");
                    }
                    else if($tam=='vaynu'){
                        include("main/categoryvaynu.php");
                    }
                    else if($tam == 'giohang'){
                        include('main/cart.php');
                    }
                    else if($tam =='sanpham'){
                        include('main/detailpro.php');
                    }
                    else if($tam =='regis'){
                        include('main/registe.php');
                    }
                    else if($tam =='login'){
                        include('main/loginuser.php');
                    }
                    else if($tam =='pay'){
                        include('main/pay.php');
                    }
                    else if($tam =='confirm'){
                        include('main/confirm.php');
                    }
                    else if($tam =='search'){
                        include('main/search.php');
                    }
                    else if($tam == ''){
                        include("main/index.php");
                    }
                ?>                       
        </div>
    </div>
</div>