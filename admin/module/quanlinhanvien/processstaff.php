<?php
include('../../config/connect.php');
    $tennv = $_POST['Tennv'];
    $chucvu = $_POST['chucvu'];
    $dc = $_POST['dc'];
    $sdt = $_POST['sdt'];
    if(isset($_POST['themnhanvien'])){
        //add
        $sql_add = "INSERT INTO NhanVien(HoTenNV,ChucVu,DiaChi,SoDienThoai) 
                    VALUE('".$tennv."','".$chucvu."','".$dc."','".$sdt."')";
        mysqli_query($my_sqli,$sql_add);  
        header('Location: ../../index.php?action=quanlynhanvien&query=adddeploy');
    }
?>