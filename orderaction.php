<?php
	session_start();
	require 'connection.php';
	$ProductID = $_GET['productID'];
	$CustomerID = $_GET['customerID'];
	$ProductSize = $_POST['ProductSize'];
	$ProductColor = $_POST['ProductColor'];
	$DateOrder = date("Y/m/d");
	
	if($_SESSION['Username'] == null || $_SESSION['Password'] == null)
	{
		echo "<script>window.open('login.php?r=5921b8e471bdd8a0b4348dfecd31620b','_self',null,true); window.alert('Please Login to Process your order');</script>";
	}
	
	$sql2 = "INSERT INTO `tbl_orders`(`ProductID`, `CustomerID`,`Size`, `Color`, `DateOrdered`) ".
			"VALUES ('$ProductID','$CustomerID','$ProductSize','$ProductColor','$DateOrder')";
	$res2 = mysqli_query($Conn,$sql2);
	if($res2){
		echo "<script>window.alert('Success'); window.open('index.php','_self',null,true);</script>";
	}
?>
