<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order</title>
  <link rel="stylesheet" href="css/main.css">
  <script src="js/main.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <?php
		$Username = null;
		if(!empty($_SESSION["Username"]))
		{
			$Username = $_SESSION["Username"];
		}
	?>
</head>

<body>
  <nav>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="shop.php">Shop</a></li>
      <li><a href="#"><span id="darkModeButton" onclick="toggleDarkMode()">Change Theme</span></a></li>
      <?php if($Username == null){echo '<li><a href="register.php?actiontype=register">Register</a></li>';} ?>
      <?php if($Username == null){echo '<li><a href="login.php?r=5921b8e471bdd8a0b4348dfecd31620b">Login</a></li>';} else {echo '<li><a href="logout.php">Logout</a></li>';} ?>
    </ul>
    <script>
    var isDarkModeEnabled = localStorage.getItem("darkModeEnabled");
    if (isDarkModeEnabled === "true") {
      document.body.classList.add("dark-mode");
    }else {
      document.body.classList.remove("dark-mode");
    }
    </script>
    <div class="burger-menu">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </nav>

  <hr>
  <script>
    const burgerMenu = document.querySelector('.burger-menu');
    const navLinks = document.querySelector('.nav-links');
    burgerMenu.addEventListener('click', () => {
      burgerMenu.classList.toggle('active');
      navLinks.classList.toggle('nav-active');
    });
  </script>
  <?php
    require 'connection.php';
    $UN = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
    $PASS = isset($_SESSION['Password']) ? $_SESSION['Password'] : '';
    $ProductID = isset($_GET['productID']) ? $_GET['productID'] : '';

    if (empty($UN)) {
        echo '<script>window.open("login.php?r=5921b8e471bdd8a0b4348dfecd31620b","_self",null,true);</script>';
    }

    $sql = "SELECT * FROM `tbl_customers` WHERE `Username` = '".$UN."' and `Password` = '".$PASS."' and `r` = '5921b8e471bdd8a0b4348dfecd31620b'";
    $res = mysqli_query($Conn, $sql);
    while ($Rows = mysqli_fetch_array($res)) {
        $CustomerID = $Rows[0];
    }
?>
  <div class="lg-con">
  <div class="log-con">
    <h2>Order</h2>
    <form role="form" action="orderaction.php?productID=<?php echo $ProductID; ?>&customerID=<?php echo $CustomerID; ?>" method="POST">
    <input type="text" id="ProductID" name="ProductID" value="<?php echo $ProductID; ?>" disabled hidden>
    <input type="text" id="CustomerID" name="CustomerID" value="<?php echo $CustomerID; ?>" disabled hidden>
    <label for="ProductColor">Product Color:</label>
    <input type="text" id="ProductColor" name="ProductColor" required pattern="[A-Za-z]{1,50}">
    <label for="ProductSize">Product Size:</label>
    <input type="text" id="ProductSize" name="ProductSize"  required pattern="^\d+$">
    <button type="submit">Order</button>
  </form>
  </div>
  </div>
  <footer>Designed and built by Aayan Tiwari</footer>
</body>

</html>
