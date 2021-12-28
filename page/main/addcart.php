<?php
    session_start(); 
    include('../../admin/config/connect.php'); 
    //them so luong
    if(isset($_GET['cong'])){
        $id=$_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                $prod [] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                'soluong'=>$cart_item['soluong'],'Gia'=>$cart_item['Gia']);
                $_SESSION['cart'] = $prod;
            }
            else{
                $tangsoluong = $cart_item['soluong'] + 1;
                $proquan = mysqli_query($my_sqli,"SELECT * FROM HangHoa WHERE MSHH = '".$id."'");
                $row = mysqli_fetch_array($proquan);
                if($cart_item['soluong'] < $row['SoLuongHang'] ){
                    $prod [] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                    'soluong'=>$tangsoluong,'Gia'=>$cart_item['Gia']);
                }
                else{
                    $prod [] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                    'soluong'=>$cart_item['soluong'],'Gia'=>$cart_item['Gia']);
                }
                $_SESSION['cart'] = $prod;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
    //tru so luong
    if(isset($_GET['tru'])){
        $id=$_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                $prod [] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                'soluong'=>$cart_item['soluong'],'Gia'=>$cart_item['Gia']);
                $_SESSION['cart'] = $prod;
            }
            else{
                $tangsoluong = $cart_item['soluong'] - 1;
                if($cart_item['soluong'] > 1){
                    $prod [] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                    'soluong'=>$tangsoluong,'Gia'=>$cart_item['Gia']);
                }
                else{
                    $prod [] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                    'soluong'=>$cart_item['soluong'],'Gia'=>$cart_item['Gia']);
                }
                $_SESSION['cart'] = $prod;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
    //xoa san pham
    if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                $prod [] = array('tensanpham'=>$cart_item['tensanpham'],
                'id'=>$cart_item['id'],
                'soluong'=>$cart_item['soluong'],
                'Gia'=>$cart_item['Gia']);
            }
            $_SESSION['cart'] = $prod;
            header('Location:../../index.php?quanly=giohang');

        }
    }
    //xoa tat ca
    if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){
        unset($_SESSION['cart']);
        header('Location:../../index.php?quanly=giohang');

    } 
    //them san pham vao gio hang
    if(isset($_POST['themgiohang'])){
        $id = $_GET['idsanpham'];
        $soluong = 1; 
        $sql = "SELECT * FROM HangHoa WHERE MSHH = '".$id."' LIMIT 1";
        $query = mysqli_query($my_sqli,$sql);
        $row = mysqli_fetch_array($query);
        if($row){
            $new_prod = array(array('tensanpham'=>$row['TenHH'],'id'=>$id,'soluong'=>$soluong,'Gia'=>$row['Gia']));
            //kiem tra gio hang ton tai
            if(isset($_SESSION['cart'])){
                $found = false;
                foreach($_SESSION['cart'] as $cart_item){
                    //du lieu trung                    
                    if($cart_item['id'] == $id){
                        $prod[]= array('tensanpham'=>$cart_item['tensanpham'],
                        'id'=>$cart_item['id'],'soluong'=>$soluong + 1,'Gia'=>$cart_item['Gia']);
                        $found = true;
                    }
                    else{
                        //du lieu khong trung
                        $prod[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],
                        'soluong'=>$soluong,'Gia'=>$cart_item['Gia']);
                    }
                }
                if($found == false){
                    $_SESSION['cart'] = array_merge($prod,$new_prod);
                }
                else{
                    $_SESSION['cart'] = $prod;
                }
            }
            else{
                $_SESSION['cart'] = $new_prod;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
?>