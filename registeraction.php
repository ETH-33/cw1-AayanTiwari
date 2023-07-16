<?php
    require 'connection.php';

    $ActionType = isset($_GET['actiontype']) ? $_GET['actiontype'] : '';
    $Location = isset($_GET['loc']) ? $_GET['loc'] : '';
    $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $Password = isset($_POST['Password']) ? password_hash($_POST['Password'],PASSWORD_BCRYPT) : '';
    $Firstname = isset($_POST['Firstname']) ? $_POST['Firstname'] : '';
    $Middlename = isset($_POST['Middlename']) ? $_POST['Middlename'] : '';
    $Lastname = isset($_POST['Lastname']) ? $_POST['Lastname'] : '';
    $Address = isset($_POST['Address']) ? $_POST['Address'] : '';
    $EmailAddress = isset($_POST['EmailAddress']) ? $_POST['EmailAddress'] : '';

    if (empty($Username) || empty($Password) || empty($Firstname) || empty($Lastname) || empty($Address) || empty($EmailAddress)) {
        echo '<script>window.alert("Cannot leave the page blank"); window.open("register.php","_self",null,true);</script>';
    } else {
        if ($ActionType == "register") {
            $Username = mysqli_real_escape_string($Conn, $Username);
            $Password = mysqli_real_escape_string($Conn, $Password);
            $Firstname = mysqli_real_escape_string($Conn, $Firstname);
            $Middlename = mysqli_real_escape_string($Conn, $Middlename);
            $Lastname = mysqli_real_escape_string($Conn, $Lastname);
            $Address = mysqli_real_escape_string($Conn, $Address);
            $EmailAddress = mysqli_real_escape_string($Conn, $EmailAddress);

            $checkQuery = "SELECT * FROM `tbl_customers` WHERE `Username` = '$Username'";
            $checkResult = mysqli_query($Conn, $checkQuery);

            if (mysqli_num_rows($checkResult) > 0) {
                echo '<script>window.alert("Username already exists. Please choose a different username."); window.open("register.php?actiontype=register","_self",null,true);</script>';
            } else {
                $insertQuery = "INSERT INTO `tbl_customers`(`Username`,`Password`,`r`,`Firstname`, `Middlename`, `Lastname`, `Address`, `EmailAddress`)" .
                    " VALUES ('$Username','$Password','5921b8e471bdd8a0b4348dfecd31620b','$Firstname','$Middlename','$Lastname','$Address','$EmailAddress')";
                $insertResult = mysqli_query($Conn, $insertQuery);

                if (!$insertResult) {
                    echo "Failed " . mysqli_connect_error();
                } else {
                    echo '<script>window.alert("Registration Completed! Please Login"); window.open("login.php?r=5921b8e471bdd8a0b4348dfecd31620b","_self",null,true);</script>';
                }
            }
        } else {
            $ID = isset($_GET['ID']) ? $_GET['ID'] : '';

            if (!empty($ID)) {
                $ID = mysqli_real_escape_string($Conn, $ID);
                $Username = mysqli_real_escape_string($Conn, $Username);
                $Password = mysqli_real_escape_string($Conn, $Password);
                $Firstname = mysqli_real_escape_string($Conn, $Firstname);
                $Middlename = mysqli_real_escape_string($Conn, $Middlename);
                $Lastname = mysqli_real_escape_string($Conn, $Lastname);
                $Address = mysqli_real_escape_string($Conn, $Address);
                $EmailAddress = mysqli_real_escape_string($Conn, $EmailAddress);

                $sqlI = "UPDATE `tbl_customers` SET `Username`='$Username',`Password`='$Password',`Firstname`='$Firstname'," .
                "`Middlename`='$Middlename',`Lastname`='$Lastname',`Address`='$Address',`EmailAddress`='$EmailAddress' WHERE CustomerID = $ID";
                $res = mysqli_query($Conn, $sqlI);
                if (!$res) {
                    echo "Failed " . mysqli_connect_error();
                } else {
                    if ($Location == "MA") {
                        echo '<script>window.open("manageaccount.php","_self",null,true);</script>';
                    } else if ($Location == "MC") {
                        echo '<script>window.open("management_customers.php","_self",null,true);</script>';
                    }
                }
            }
        }
    }
?>
