<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Product</title>
  <link rel="stylesheet" href="css/main.css">
  <script src="js/main.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
<style>
    form {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  border-radius: 5px;
}

form input[type="text"],
form textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
form input[type="submit"] {
  background-color: #4CAF50;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
form input[type="submit"]:hover {
  background-color: #45a049;
}
.product-image {
  max-width: 200px;
  max-height: 200px;
  margin-bottom: 10px;
}
</style>
<?php
		$Username = null;
		if(!empty($_SESSION["Username"]))
		{$Username = $_SESSION["Username"];}
		$ProductAction = $_GET["productaction"];
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
  <form role="form" action="management_products_action.php?productaction=<?php echo $ProductAction; if($ProductAction=="edit"){ echo "&prodID=" . $_GET['prodID'];} ?>" 
	method="POST" enctype = "multipart/form-data">
  <label for="product-name">Product Name:</label>
  <input type="text" id="product-name" name="product-name" required>
  <label for="product-brand">Product Brand:</label>
  <input type="text" id="product-brand" name="product-brand" required>
  <label for="product-price">Product Price:</label>
  <input type="text" id="product-price" name="product-price" required>
  <label for="product-size">Size Available:</label>
  <input type="text" id="product-size" name="product-size" required>
  <label for="product-color">Colors Available:</label>
  <input type="text" id="product-color" name="product-color" required>
  <label for="product-category">Category:</label>
  <input type="text" id="product-category" name="product-category" required>
  <label for="product-image">Product Image:</label>
  <div class="product-image-container">
  <input type="file" id="product-image" name="product-image" accept="image/*" required>
  <img class="product-image" id="preview-image" src="#" alt="Preview Image" />
  </div>
  <label for="product-description">Description:</label>
  <input type="text" id="product-description" name="product-description" required>
  <input type="submit" value="Submit">
</form>
  <script>
    const burgerMenu = document.querySelector('.burger-menu');
    const navLinks = document.querySelector('.nav-links');
    burgerMenu.addEventListener('click', () => {
      burgerMenu.classList.toggle('active');
      navLinks.classList.toggle('nav-active');
    });
  </script>
  <footer>Designed and built by Aayan Tiwari</footer>
</body>

</html>
