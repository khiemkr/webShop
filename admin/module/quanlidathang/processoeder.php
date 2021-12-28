<?php
	include('../../config/connect.php');
	if(isset($_GET['iddh'])){
        $code_cart = $_GET['iddh'];
		$sql_update ="UPDATE DatHang SET TrangThaiDH='0' WHERE SoDonDH='".$code_cart."'";
		$query = mysqli_query($my_sqli,$sql_update);
		header('Location:../../index.php?action=quanlydathang&query=listed'); 
	} 
?>