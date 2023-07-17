<?php
	session_start();
	session_destroy();
	$_SESSION["Username"] = null;
	echo "<script>window.open('index.php','_self',null,true)</script>";
?>
