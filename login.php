<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
<?php
		$Username = null;
		$Role = $_GET["r"];
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
  <div class="lg-con">
  <div class="log-con">
    <h2>Login</h2>
    <form role="form" action="logindestination.php?r=<?php echo $Role; ?>" method="POST">
      <label for="Username">Username</label>
      <input type="text" id="Username" name="Username" placeholder="Enter your username" pattern="[a-zA-Z0-9_]{3,20}" required>
      <label for="Password">Password</label>
      <input type="password" id="Password" name="Password" placeholder="Enter your password" required>
      <button type="submit">Login</button>
    </form>
  </div>
  </div>
  <footer>Designed and built by Aayan Tiwari</footer>
</body>
</html>
