<?php
include('../../config/connect.php');
    $tenloaisp = $_POST['tenloaihang'];
    if(isset($_POST['themloaisanpham'])){
        //add
        $sql_addcate = "INSERT INTO LoaiHangHoa(TenLoaiHang) 
                    VALUE('".$tenloaisp."')";
        mysqli_query($my_sqli,$sql_addcate); 
        //chuyen trang
        header('Location: ../../index.php?action=quanlyloaisanpham&query=add');
    }
    else{
        //delete
        $id = $_GET['iddanhmuc'];
        $sql_delete = "DELETE FROM LoaiHangHoa WHERE MaLoaiHang = '".$id."'";
        mysqli_query($my_sqli,$sql_delete);
        header('Location: ../../index.php?action=quanlyloaisanpham&query=add');

    }
?>