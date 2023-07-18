<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register an account</title>
  <link rel="stylesheet" href="css/main.css">
  <script src="js/main.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <?php
		require 'connection.php';
		$Username = null;
		if(!empty($_SESSION["Username"]))
		{
			$Username = $_SESSION["Username"];
		}
		$sql = "select * from tbl_customers where Username = '".$Username."' and Password = '".$_SESSION['Password']."'";
		$Res = mysqli_query($Conn,$sql);
		while($Rows = mysqli_fetch_array($Res))
		{
			$C_ID = $Rows[0];
			$C_Username = $Rows[1];
			$C_Password = $Rows[2];
			$C_Firstname = $Rows[4];
			$C_Middlename = $Rows[5];
			$C_Lastname = $Rows[6];
			$C_Address = $Rows[7];
			$C_Email = $Rows[8];
		}
	?>
</head>

<body>
  <nav>
    <ul class="nav-links">
    <li><a href="index.php">Home</a></li>
					<li><a href="management_orders.php">Orders</a></li>
					<li><a href="management_products.php?productaction=add">Products</a></li>
					<li><a href="management_productslist.php">Product List</a></li>
          <li><a href="management_customers.php">Customers</a></li>
          <li><a href="#"><span id="darkModeButton" onclick="toggleDarkMode()">Change Theme</span></a></li>
		  <?php if($Username == null){echo '<li><a href="register.php?actiontype=register">Register</a></li>';} ?>
		  <?php if($Username == null){echo '<li><a href="login.php?r=5921b8e471bdd8a0b4348dfecd31620b">Login</a></li>';} else {echo '<li><a href="logout.php">Logout</a></li>';} ?>
          <li><a href="logout.php">Logout</a></li>
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
  <div style="overflow-x:auto;">
  <table>
    <tr>
      <th>Order ID</th>
      <th>Customer ID</th>
      <th>Product Name</th>
      <th>Product Brand</th>
      <th>Product Size</th>
      <th>Product Color</th>
      <th>Product Price</th>
      <th>Date Ordered</th>
      <th>Action</th>
    </tr>
    <?php 
								require 'connection.php';
								$sqlI = "SELECT tbl_orders.OrderID, tbl_orders.CustomerID, tbl_products.Productname, tbl_products.ProductBrand, tbl_orders.Size, " .
								" tbl_orders.Color, tbl_products.ProductPrice, tbl_orders.DateOrdered FROM tbl_products RIGHT JOIN " .
								" tbl_orders on tbl_orders.ProductID = tbl_products.ProductID ORDER BY tbl_orders.OrderID";
								$Resulta = mysqli_query($Conn,$sqlI);
								while($Rows = mysqli_fetch_array($Resulta)):; 
								?>
								<tr style="color: black">
								<td><?php echo $Rows[0]; ?></td>
								<td><?php echo $Rows[1]; ?></td>
								<td><?php echo $Rows[2]; ?></td>
								<td><?php echo $Rows[3]; ?></td>
								<td><?php echo $Rows[4]; ?></td>
								<td><?php echo $Rows[5]; ?></td>
								<td><?php echo $Rows[6]; ?></td>
								<td><?php echo $Rows[7]; ?></td>
								<td>
								<a href="#" onclick="CancelOrderOnclick(<?php echo $Rows[0]; ?>);">Delete</a>
								</td>
								<?php endwhile; ?>
								</tr>
  </table>
  </div>
  <form role="form" action="register.php?actiontype=edit&loc=MA&ID=<?php echo $C_ID; ?>" method="POST">
    <h4 style="text-align: center">Account Information</h4>
	<label for="username">Username:</label>
	<input type="text" name="Username" id="Username" value="<?php echo $C_Username; ?>" disabled>							
	<label for="Password">Password:</label>
	<input type="Password" name="Password"  id="Password" value="<?php echo $C_Password; ?>" disabled>
	<label for="Firstname">Firstname:</label>
	<input type="text" name="Firstname" id="Firstname" value="<?php echo $C_Firstname; ?>" disabled>							
	<label for="Middlename">Middlename:</label>
	<input type="text" name="Middlename" id="Middlename" value="<?php echo $C_Middlename; ?>" disabled>							
	<label for="Lastname">Lastname:</label>
	<input type="text" name="Lastname" id="Lastname" value="<?php echo $C_Lastname; ?>" disabled>
	<label for="Address">Address:</label>
	<input type="text" name="Address"  id="Address" value="<?php echo $C_Address; ?>" disabled>							
	<label for="EmailAddress">Email Address:</label>
	<input type="email" name="EmailAddress" id="EmailAddress" value="<?php echo $C_Email; ?>" disabled>							
	<button type="submit">Edit Info</button>
	</form>
    <table style="overflow-x:auto;">
								<tr style="text-align: center; color: Black; font-weight: bold;">
									<td>Order ID</td>
									<td>Product Name</td>
									<td>Product Brand</td>
									<td>Product Size</td>
									<td>Product Color</td>
									<td>Product Price</td>
									<td>Date Ordered</td>
									<td>Action</td>
								</tr>
								
								<?php 
								$sqlI = "SELECT tbl_orders.OrderID, tbl_products.Productname, tbl_products.ProductBrand, tbl_orders.Size, " .
								" tbl_orders.Color, tbl_products.ProductPrice, tbl_orders.DateOrdered FROM tbl_products RIGHT JOIN " .
								" tbl_orders on tbl_orders.ProductID = tbl_products.ProductID WHERE tbl_orders.CustomerID = $C_ID ORDER BY tbl_orders.OrderID";
								$Resulta = mysqli_query($Conn,$sqlI);
								while($Rows = mysqli_fetch_array($Resulta)):; 
								?>
								<tr style="color: black">
								<td><?php echo $Rows[0]; ?></td>
								<td><?php echo $Rows[1]; ?></td>
								<td><?php echo $Rows[2]; ?></td>
								<td><?php echo $Rows[3]; ?></td>
								<td><?php echo $Rows[4]; ?></td>
								<td><?php echo $Rows[5]; ?></td>
								<td><?php echo $Rows[6]; ?></td>
								<td>
								<a href="#" onclick="OrderOnclick(<?php echo $Rows[0]; ?>);">Cancel</a>
								</td>
								<?php endwhile; ?>
								</tr>
							</table>
  </section>
  <footer>Designed and built by Aayan Tiwari</footer>
</body>

</html>
