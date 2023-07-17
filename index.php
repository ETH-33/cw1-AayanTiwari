<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Store</title>
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
			<?php if($Username == null){echo '<li><a href="login.php?r=5921b8e471bdd8a0b4348dfecd31620b">Login</a></li>';} else {echo '<li><a href="Logout.php">Logout</a></li>';} ?>
    </ul>
    <div class="burger-menu">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </nav>
  <script>
    var isDarkModeEnabled = localStorage.getItem("darkModeEnabled");
    if (isDarkModeEnabled === "true") {
      document.body.classList.add("dark-mode");
    }else {
      document.body.classList.remove("dark-mode");
    }
    </script>
  <script>
    const burgerMenu = document.querySelector('.burger-menu');
    const navLinks = document.querySelector('.nav-links');
    burgerMenu.addEventListener('click', () => {
      burgerMenu.classList.toggle('active');
      navLinks.classList.toggle('nav-active');
    });
  </script>
  <hr>
  <section class="section1">
    <div class="col1">
      <img src="img/logo-white.png" alt="Logo">
    </div>
    <div class="col2">
      <div class="best-sale">
        <h2>Best Seller</h2>
        <?php 
			$conn = mysqli_connect("localhost","root","","shoe");
			$sql = "SELECT * FROM `tbl_products` Limit 1";
			$Resulta = mysqli_query($conn,$sql);
		?>
		<?php while($Rows = mysqli_fetch_array($Resulta)){
		echo '
          <div class="product">
          <img style="border-radius:10px;" src="data:image;base64,'.$Rows[8].'" alt="Nike Shoes"><br>
          <div class="details">
          <h3>'.$Rows[1].'</h3>
          <p>'.$Rows[9].'</p>
					<p>Size Available: '.$Rows[3].'</p>
					<p>Colors Available: '.$Rows[4].'</p>
					<p>Rs '.$Rows[5].'.00</p>
          <button class="shbtn" onclick="addToCartOnclick('.$Rows[0].');" href="#">Add to Cart</button>
          </div>
        </div>
        ';
		}?>
      </div>
  </section>
  <div class="info">
  <h1>Find the perfect fit</h1>
  <div class="apparel">
    <img src="img/apparel1.jpg" alt="Apparel1">
    <img src="img/apparel2.jpg" alt="Apparel2">
    <img src="img/apparel3.jpg" alt="Apparel3">
  </div>
  <a href="shop.php"><button class="shbtn">Go To Store</button></a>
  </div>
  <section class="section2">
    <div class="col1">
    <h2>About Us</h2>
    <p>
    Welcome to Online Store, your premier online shopping destination.
    We offer a seamless and convenient shopping experience for your needs.
    Discover a wide range of apparel from various brands, all available at your fingertips. <br>
    Experience the joy of online shopping with Online Store. Shop now and discover a world of convenience, quality, and endless possibilities.</p>
    </div>
    <div class="col2">
    <img src="img/building.jpg" alt="Building">
    </div>
  </section>
  <div class="contact">
  <h2>Contact</h2>
    Email: <a href="mailto:store@aayan.com">store@aayan.com</a><br>
    Phone: +97798******** <br>
    Address: Kathmandu, Nepal<br>
  </div>
  <footer>Designed and built by Aayan Tiwari</footer>
    </body>
</html>
