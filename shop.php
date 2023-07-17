<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/main.css">
  <script src="js/main.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buy Shoes Online</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <style>
  .shop-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin: 0 auto;
    
  }
  .caption{
    font-size: 12px;
  }
  .shop {
    width: 250px;
    margin: 5px;
    padding: 20px;
    border: 1px solid #ccc;
    text-align: center;
    background-color: black;
    color: white;
    border-radius: 10px;
  }
  .dark-mode .shop{
    color: black;
    background-color: #ffffff;
  }
  .shop img{
    width: 100px;
    height: auto;
    object-fit: cover;
  }
  .s-info{
    font-weight: bold;
  }
  </style>
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
  <div class="shop-container">
	<?php 
		$conn = mysqli_connect("localhost","root","","shoe");
		$sql = "SELECT * FROM `tbl_products` order by ProductPrice";
		$Resulta = mysqli_query($conn,$sql);
	?>	
	<?php while($Rows = mysqli_fetch_array($Resulta)){
	echo '	
        <div class="shop">
	<h4 style="text-align: center;">'.$Rows[2].'</h4>
        <img style="border: 2px solid gray; border-radius: 10px;" src="data:image;base64,'.$Rows[8].'" alt="">
        <div class="caption">
	<p><span class="s-info">Product Name</span>: '.$Rows[1].'</p>
	<p><span class="s-info">Size Available</span>: '.$Rows[3].'</p>
	<p><span class="s-info">Colors Available</span>: '.$Rows[4].'</p>
	<p><span class="s-info">Price</span>: Rs '.$Rows[5].'.00</p>
        </div>
	<center><a onclick="addToCartOnclick('.$Rows[0].');" href="#"  style="margin-bottom: 5px;" class="shbtn">Add to Cart</a></center>
        </div>
	';
	}?>
</div>
  <footer>Designed and built by Aayan Tiwari</footer>
</body>

</html>
