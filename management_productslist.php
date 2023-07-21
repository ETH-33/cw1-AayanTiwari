<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products List</title>
  <link rel="stylesheet" href="css/main.css">
  <script src="js/main.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
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
    <?php
		$Username = null;
		if(!empty($_SESSION["Username"])){$Username = $_SESSION["Username"];}
		if(empty($_SESSION['Admin'])){echo '<script>window.open("index.php","_self",null,true);</script>';}
	?>
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
      <th>Image</th>
      <th>Product ID</th>
      <th>Product Name</th>
      <th>Product Brand</th>
      <th>Product Size</th>
      <th>Product Color</th>
      <th>Product Price</th>
      <th>Product Category</th>
      <th>Action</th>
    </tr>
    <?php 
									require 'connection.php';
									$sql = "select * from tbl_products";
									$Resulta = mysqli_query($Conn,$sql);
									while($Rows = mysqli_fetch_array($Resulta)):; 
								?>
								<tr>
									<td><img style="width: 50px; height: 50px;" src="data:image;base64,<?php echo $Rows[8];?>"></td>
									<td><?php $cid = $Rows[0]; echo $cid; ?></td>
									<td><?php echo $Rows[1]; ?></td>
									<td><?php echo $Rows[2]; ?></td>
									<td><?php echo $Rows[3]; ?></td>
									<td><?php echo $Rows[4]; ?></td>
									<td><?php echo $Rows[5]; ?></td>
									<td><?php echo $Rows[6]; ?></td>
									<td>
									<a href="#" onclick="ProductOnclick('edit',<?php echo $Rows[0]; ?>)">Edit</a> | 
									<a href="#" onclick="ProductOnclick('delete',<?php echo $Rows[0]; ?>)">Delete</a>
									</td>
									<?php endwhile; ?>
	</tr> 
  </table>
  </div>
  </section>
  <footer>Designed and built by Aayan Tiwari</footer>
</body>
</html>
