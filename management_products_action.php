<?php
	session_start();
	$ProductAction = $_GET["productaction"];
	require 'connection.php';
	if($ProductAction == "add")
	{
		$_ProductName = $_POST["product-name"];
		$_ProductBrand = $_POST["product-brand"];
		$_ProductSize = $_POST["product-size"];
		$_ProductColor = $_POST["product-color"];
		$_ProductCategory = $_POST["product-category"];
		$_ProductPrice = $_POST["product-price"];
		$_ProductDescription= $_POST["product-description"];
		
		$image = addslashes($_FILES['product-image']['tmp_name']);
		$name = addslashes($_FILES['product-image']['name']);
		$image = file_get_contents($image);
		$image = base64_encode($image);
		
		$sql = "INSERT INTO `tbl_products`(`Productname`, `ProductBrand`, `ProductSize`, `ProductColor`,`ProductPrice`, `ProductCategory`, `ProductImageName`, `ProductImage`, `Description`)" . 
		"VALUES ('$_ProductName','$_ProductBrand','$_ProductSize','$_ProductColor','$_ProductPrice','$_ProductCategory','$name','$image','$_ProductDescription')";
		$res = mysqli_query($Conn,$sql);
		if($res)
		{
			echo '<script>window.open("management_productslist.php","_self",null,true);</script>';
		}
		else
		{
			echo '<script>alert("FAILED!")</script>';
		}
	}else if($ProductAction == "edit")
	{
		$_ProductName = $_POST["product-name"];
		$_ProductBrand = $_POST["product-brand"];
		$_ProductSize = $_POST["product-size"];
		$_ProductColor = $_POST["product-color"];
		$_ProductCategory = $_POST["product-category"];
		$_ProductPrice = $_POST["product-price"];
		$_ProductDescription= $_POST["product-description"];

		$image = addslashes($_FILES['product-image']['tmp_name']);
		$name = addslashes($_FILES['product-image']['name']);
		$image = file_get_contents($image);
		$image = base64_encode($image);
		
		$_ProductID = $_GET["prodID"];
		if(empty($_FILES['product-image']['tmp_name'])){
			$sql = "UPDATE `tbl_products` SET `Productname`='$_ProductName',`ProductBrand`='$_ProductBrand',`ProductSize`='$_ProductSize'," .
				   "`ProductColor`='$_ProductColor',`ProductPrice`='$_ProductPrice',`ProductCategory`='$_ProductCategory', `Description`='$_ProductDescription' WHERE `ProductID` =  $_ProductID";
			$res = mysqli_query($Conn,$sql);
			if($res)
			{
				echo '<script>window.alert("Product has been successfully updated!"); window.open("management_productslist.php","_self",null,true)</script>';
			}
		}
		$sql = "UPDATE `tbl_products` SET `Productname`='$_ProductName',`ProductBrand`='$_ProductBrand',`ProductSize`='$_ProductSize'," .
			   "`ProductColor`='$_ProductColor',`ProductPrice`='$_ProductPrice',`ProductCategory`='$_ProductCategory'," .
			   "`ProductImageName`='$name',`ProductImage`='$image', `Description`='$_ProductDescription' WHERE `ProductID` = $_ProductID";
		$res = mysqli_query($Conn,$sql);
		if($res)
		{
			echo '<script>window.alert("Product has been successfully updated!"); window.open("management_productslist.php","_self",null,true)</script>';
		}
	}else if($ProductAction == "delete")
	{
		$_ProductID = $_GET["prodID"];
		$sql = "Delete from `tbl_products` where `ProductID` = $_ProductID";
		$res = mysqli_query($Conn,$sql);
		if($res)
		{
			echo '<script>window.alert("Product has been successfully Deleted!"); window.open("management_productslist.php","_self",null,true)</script>';
		}
	}
?>













