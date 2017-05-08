<!DOCTYPE html>
<html lang="en">

<head>
    <title>DNA Labs Services</title>
    <meta http-equiv="Content-Language" content="en-us" />
    <meta charset="UTF-8">
    <meta name="description" content="03 Prove : Assignment - PHP Shopping Cart">
    <meta name="keywords" content="PHP">
    <meta name="author" content="Francisco Bernal">
    <link href="./styles/main.css" rel="stylesheet" type="text/css" />
    <link href="./styles/shopping_cart.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/functions.js"></script>
</head>

<body onload="displayShoppingCart()">
    <div id="wrapper">
        <header>
            <?php include 'header.php';?>
            <nav>
                <?php include 'nav.php';?>
            </nav>
            <script>
                document.getElementById("shoppingCartOption").className = "landmark";
            </script>
        </header>
        <div id="content">
            <a id="emptyCart" href="services.html">SHOPPING CART IS EMPTY. ADD ORDER TO YOUR CART!!!</a>
            <table id="shopping_cart_table">
                <tr>
                    <th>Amount</th>
                    <th>Test</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Total</th>
                    <th id="total_cell"></th>
                </tr>
            </table>
            
            <button id="checkout" type="button" onclick="openCheckout()">CHECKOUT</button>
            <button id="checkout" type="button" onclick="location.href='services.php';">Continue Shopping</button>

        </div>
        <footer id="page">
            <?php include 'footer.php';?>
        </footer>
    </div>
</body>

</html>