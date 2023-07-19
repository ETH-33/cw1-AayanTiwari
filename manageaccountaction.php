<?php
	require 'connection.php';
	$orderID = $_GET["oID"];
	
	$sql = "DELETE FROM `tbl_orders` WHERE OrderID = " . $orderID;
	$res = mysqli_query($Conn,$sql);
	if($res)
	{
		echo '<script>window.open("manageaccount.php","_self",null,true)</script>';
	}

?>
