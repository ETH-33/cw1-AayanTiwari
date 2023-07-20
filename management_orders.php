<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders</title>
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
  }
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
								<tr>
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
  </section>
  <footer>Designed and built by Aayan Tiwari</footer>
</body>

</html>
