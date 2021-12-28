<div class="app__container">
    <div class="grid wide">
        <div class="row app__content">
                <?php
                include("menu.php");
                ?>
                <?php
                if(isset($_GET['action'])&& $_GET['query']){
                    $tam = $_GET['action'];
                    $query = $_GET['query'];
                } 
                else{ 
                    $tam = '';
                    $query = '';
                }
                if($tam =='quanlysanpham' && $query =='add'){
                    include("module/quanlisanpham/add.php");
                }
                else if($tam =='quanlyloaisanpham' && $query =='add'){
                    include("module/quanliloaisp/addCate.php");
                }
                else if($tam =='quanlysanpham' && $query =='edit'){
                    include("module/quanlisanpham/edit.php");
                }
                else if($tam =='quanlykhachhang' && $query =='view'){
                    include("module/quanlikhachhang/listedKH.php");
                }
                else if($tam =='quanlynhanvien' && $query =='adddeploy'){
                    include("module/quanlinhanvien/adddstaff.php");
                }
                else if($tam =='quanlydathang' && $query =='listed'){
                    include("module/quanlidathang/listedorder.php");
                }
                else if($tam =='donhang' && $query =='xemdonhang'){
                    include("module/quanlidathang/vieworder.php");
                }
                else if($tam =='dashboard' && $query =='add'){
                    include("module/dashboard.php");
                }
                else{
                    include("module/dashboard.php");
                }
                ?>                       
        </div>
    </div>
</div>