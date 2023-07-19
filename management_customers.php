<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Customers</title>
  <link rel="stylesheet" href="css/main.css">
  <script src="js/main.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <?php
		$Username = null;
		if(!empty($_SESSION["Username"]))
		{$Username = $_SESSION["Username"];}
		if(empty($_SESSION['Admin'])){echo '<script>window.open("index.php","_self",null,true);</script>';}
	?>
	<style>
		table {
      border-collapse: collapse;
      width: 100%;
      text-align: center;
    }

    th, td {
      padding: 8px;
      border-bottom: 1px solid #ddd;
    }

    th {
      font-weight: bold;
    }
    @media (max-width: 768px) {
  th, td {
    padding: 6px;
  }}
	</style>
</head>

<body>
  <nav>
    <ul class="nav-links">
					<li><a href="management_orders.php">Orders</a></li>
					<li><a href="management_products.php?productaction=add">Products</a></li>
					<li><a href="management_productslist.php">Product List</a></li>
          <li><a href="management_customers.php">Customers</a></li>
          <li><a href="#"><span id="darkModeButton" onclick="toggleDarkMode()">Change Theme</span></a></li>
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
    <td>Customer ID</td>
	<td>UserName</td>
	<td>Firstname</td>
	<td>Middlename</td>
	<td>Lastname</td>
	<td>Address</td>
	<td>Email Address</td>
	<td>Action</td>
  <?php 
								require 'connection.php';
								$sql = "select CustomerID,Username,Password,Firstname,Middlename,Lastname,Address,EmailAddress from tbl_customers where r = '5921b8e471bdd8a0b4348dfecd31620b'";
								$Resulta = mysqli_query($Conn,$sql);
								while($Rows = mysqli_fetch_array($Resulta)):; 
								?>
							<tr>
								<td><?php $cid = $Rows[0]; echo $cid; ?></td>
								<td><?php echo $Rows[1]; ?></td>
								<td><?php echo $Rows[3]; ?></td>
								<td><?php echo $Rows[4]; ?></td>
								<td><?php echo $Rows[5]; ?></td>
								<td><?php echo $Rows[6]; ?></td>
								<td><?php echo $Rows[7]; ?></td>
								<td>
								<a href="#" onclick="actionOnclick('edit',<?php echo $cid; ?>)">Edit</a> | 
								<a href="#" onclick="actionOnclick('delete',<?php echo $cid; ?>)">Delete</a>
								</td>
								<?php endwhile; ?>
							</tr>   
  </table>
  </div>
  </section>
  <footer>Designed and built by Aayan Tiwari</footer>
</body>
</html>
