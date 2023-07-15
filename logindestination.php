<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "shoe");
if (!$conn) {
    die("Connection Failed" . mysqli_connect_error());
}

$_un = $_POST['Username'];
$_pass = $_POST['Password'];
$_Role = $_GET['r'];

$query = "SELECT * FROM `tbl_customers` WHERE `Username` = '" . $_un . "' and `r` = '" . $_Role . "'";
$res = mysqli_query($conn, $query);
if ($res === false) {
    die("Error" . mysqli_error($conn));
}
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
if ($row) {
    $storedHashedPassword = $row['Password'];
    if (isset($storedHashedPassword)) {
        // Verify the password
        if (password_verify($_pass, $storedHashedPassword)) {
            if ($_Role == "5921b8e471bdd8a0b4348dfecd31620b") {
                $_SESSION["Username"] = $_un;
                $_SESSION["Password"] = $storedHashedPassword;
                echo "<script>window.open('index.php','_self',null,true)</script>";
                die("Logged in");
            } else if ($_Role == "651375e142d4a3f738d608891bf21fd8") {
                $_SESSION['Admin'] = "Logged";
                echo "<script>window.open('management_orders.php','_self',null,true)</script>";
            }
        } else {
            die("Wrong username or password");
        }
    } else {
        die("Password column not found");
    }
} else {
    die("Wrong username or password");
}
?>
