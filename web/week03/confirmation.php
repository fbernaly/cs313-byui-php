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
    <link href="./styles/checkout.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/functions.js"></script>
</head>

<body>
    <div id="wrapper">
        <header>
            <?php include 'header.php';?>
        </header>
        <div id="content">
            <?php
        if (isset($_POST['confirm'])) {
          echo '<script type="text/javascript">',
               'deleteCookies();',
               '</script>';
          echo "<h2>Order Submitted Successfully!!!</h2>";
          echo "<p>One member of our staff will reach you to proceded with testing.</p>";
        } elseif (isset($_POST['cancel'])) {
          echo "<h2>Your order was canceled</h2>";
          echo "<p>Continue shopping...</p>";
        }
      ?>
                <br />
                <br /> <a href="./index.php">BACK TO HOME</a> </div>
        <footer id="page">
            <?php include 'footer.php';?>
        </footer>
    </div>
</body>

</html>