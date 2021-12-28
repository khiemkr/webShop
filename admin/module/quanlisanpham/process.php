<?php
include('../../config/connect.php');
    $tensp = $_POST['Tensp'];
    $quycach = $_POST['quycach'];
    $giasp = $_POST['gia'];
    $SLhang = $_POST['soluonghang'];
    $hinhhh = $_POST['tenhinhhh'];
    $cate = $_POST['danhmuc'];
    if(isset($_POST['themsanpham'])){ 
        //add
        $sql_add = "INSERT INTO HangHoa(TenHH,QuyCach,Gia,SoLuongHang,MaLoaiHang) 
                    VALUE('".$tensp."','".$quycach."','".$giasp."','".$SLhang."','".$cate."')";
        mysqli_query($my_sqli,$sql_add);  
        //them hinh anh hang hoa
            $_SESSION['idhh'] = mysqli_insert_id($my_sqli);
            $IDHH = $_SESSION['idhh'];
            mysqli_query($my_sqli,"INSERT INTO HinhHangHoa(TenHinh,MSHH) VALUE ('".$hinhhh."','".$IDHH."')");       
        
        //chuyen trang
        header('Location: ../../index.php?action=quanlysanpham&query=add');
    }
    elseif (isset($_POST['suasanpham'])){
        //edit
        $sql_update = "UPDATE HangHoa SET TenHH = '".$tensp."' , QuyCach = '".$quycach."', Gia = '".$giasp."', SoLuongHang = '".$SLhang."'
                        WHERE MSHH = '$_GET[iddanhmuc]'";
        mysqli_query($my_sqli,$sql_update);  
        header('Location: ../../index.php?action=quanlysanpham&query=add');
    }
    else{ 
        //delete
        $id = $_GET['iddanhmuc'];
        $sql_deleteimg = "DELETE FROM HinhHangHoa WHERE MSHH = '".$id."'";
        mysqli_query($my_sqli,$sql_deleteimg);
        $sql_delete = "DELETE FROM HangHoa WHERE MSHH = '".$id."'";
        mysqli_query($my_sqli,$sql_delete);
        header('Location: ../../index.php?action=quanlysanpham&query=add');

    }

?>