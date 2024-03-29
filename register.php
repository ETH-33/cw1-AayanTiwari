<?php 
  session_start(); 
	$ActionType = $_GET['actiontype'];
	if($ActionType == "edit"){
		$ID = $_GET['ID'];
		$Loc = $_GET['loc'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/main.css">
  <script src="js/main.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if($ActionType == "register"){echo "Register an Accout";}else echo "Edit Account Information"; ?></title>
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
  <div class="rg-con">
  <div class="reg-con">
  <h2><?php if($ActionType == "register"){echo "Register";}else echo "Edit Account Information"; ?></h2>
<form role="form" action="registeraction.php?actiontype=<?php echo $ActionType; if($ActionType == "edit"){ echo "&loc=" . $Loc . "&ID=" .$ID;} ?>" method="POST">
<label for="Username">Username</label>
<input type="text" id="Username" name="Username" placeholder="Enter your username" pattern="[a-zA-Z0-9_]{3,20}" title="Username must contain only letters, numbers, or underscores (3-20 characters)" required>

<label for="Firstname">First Name</label>
<input type="text" id="Firstname" name="Firstname" placeholder="Enter your first name" pattern="[A-Za-z]{1,50}" title="First name must contain only letters (1-50 characters)" required>

<label for="Middlename">Middle Name</label>
<input type="text" id="Middlename" name="Middlename" placeholder="Enter your middle name" pattern="[a-zA-Z0-9_]{3,20}" title="Middle name must contain only letters (1-50 characters)">

<label for="Lastname">Last Name</label>
<input type="text" id="Lastname" name="Lastname" placeholder="Enter your last name" pattern="[A-Za-z]{1,50}" title="Last name must contain only letters (1-50 characters)" required>

<label for="Address">Address</label>
<input type="text" id="Address" name="Address" placeholder="Enter your address" pattern="[a-zA-Z0-9_]{3,20}" required>

<label for="EmailAddress">Email</label>
<input type="email" id="EmailAddress" name="EmailAddress" placeholder="Enter your email address" required>

<label for="Password">Password</label>
<input type="password" id="Password" name="Password" placeholder="Enter your password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" title="Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit" required>
<button type="submit">Register</button>
    </form>
  </div>
  </div>
  <footer>Designed and built by Aayan Tiwari</footer>
</body>
</html>
