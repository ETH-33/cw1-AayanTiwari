function clrmode() {
    var element = document.body;
    element.classList.toggle("color-mode");
    }
function toggleDarkMode() {
    var body = document.body;
    body.classList.toggle("dark-mode");
    var isDarkModeEnabled = body.classList.contains("dark-mode");
    localStorage.setItem("darkModeEnabled", isDarkModeEnabled);
    }
    function CancelOrderOnclick(ID)
    {
        if(confirm("Are you sure you want to Delete this order?")==true)
        {
            window.open("management_orders_action.php?id="+ID,"_self",null,true);
        }
    }
    function ProductOnclick(action,pid)
    {
        if(action == "edit")
        {
            if(confirm("Are you sure you want to edit this product?")==true)
            {
                window.open("management_products.php?prodID="+pid+"&productaction="+action,"_self",null,true);
            }
        }else if(action == "delete")
        {
            if(confirm("Are you sure you want to Delete this product?")==true)
            {
                window.open("management_products_action.php?prodID="+pid+"&productaction="+action,"_self",null,true);
            }
        }
    }
    function addToCartOnclick(ProductID)
		{	
            if(confirm("Are you sure you want to add this product to your cart?") == true){
			window.open("order.php?productID="+ProductID,"_self",null,true);
			}
		}
    function actionOnclick(action,CustomerID){
		if(action == "edit")
		{
			if(confirm("Are you sure you want to edit this information?") == true)
			{
				window.open("register.php?actiontype=edit&loc=MC&ID="+CustomerID,"_self",null,true);
			}
		}
		else if(action == "delete")
		{
		if(confirm("Are you sure you want to Delete this information?") == true)
		{
			window.open("management_customers_action.php?ID="+CustomerID,"_self",null,true);
		}
			}
		}
