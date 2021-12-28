<?php
    session_start();
    include('../../admin/config/connect.php');
    $id_KH = $_SESSION['idKH'];
    $today = date("Y/m/d");
    $GH = date ( 'Y-m-j' , strtotime ( '+20 day' , strtotime ( $today ) ) );
    $insert_order = "INSERT INTO DatHang(MSKH,NgayDH,NgayGH,TrangThaiDH) VALUE ('".$id_KH."','".$today."','".$GH."','1')";
    $order_query = mysqli_query($my_sqli,$insert_order);
    if($order_query){
    //    them chi tiet don hang
        $_SESSION['idHD'] = mysqli_insert_id($my_sqli); 
        $tongtien = 0;
        foreach($_SESSION['cart'] as $key => $value){
            $id_HD = $_SESSION['idHD'];
            $id_sp = $value['id'];
            $sl = $value['soluong'];
            $total = $value['soluong']*$value['Gia'];
            $tongtien += $total;
            $insert_order_detail = "INSERT INTO ChiTietDatHang(SoDonDH,MSHH,SoLuong,GiaDatHang) VALUE ('".$id_HD."','".$id_sp."','".$sl."','".$value['Gia']."')";
            mysqli_query($my_sqli,$insert_order_detail);
            $update_quan = "UPDATE HangHoa SET SoLuongHang = SoluongHang - '".$sl."' WHERE MSHH = '".$id_sp."'";
            mysqli_query($my_sqli,$update_quan);
        }

    }
    unset($_SESSION['cart']);
    header('Location:../../index.php?quanly=confirm');
?>