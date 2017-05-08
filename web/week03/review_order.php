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
    <style>
        input[type=submit] {
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            padding: 10px;
            font-size: 16px;
            float: right;
            margin-left: 10px;
        }
        
        input[type=submit]#confirm {
            background-color: mediumturquoise;
        }
    </style>
</head>

<body onload="displayOrderReview()">
    <div id="wrapper">
        <header>
            <?php include 'header.php';?>
        </header>
        <div id="content">
            <h2>Purchase review</h2>
            <h3>Your info:</h3>
            <p>
                <?php echo $_POST["firstName"] . " " . $_POST["lastName"]; ?>
            </p>
            <p>
                <?php echo $_POST["address_line1"]; ?>
            </p>
            <p>
                <?php echo $_POST["address_line2"]; ?>
            </p>
            <p>
                <?php echo $_POST["city"] . " " . $_POST["state"] . " " . $_POST["cp"]; ?>
            </p>
            <p>Phone:
                <?php echo $_POST["phone"]; ?>
            </p>
            <p>E-mail:
                <?php echo $_POST["email"]; ?>
            </p>
            <h3>Your payment:</h3>
            <p>Credit card type:
                <?php 
        $type = $_POST["creditCardType"];
        switch($type) {
          case "1":
            echo "VISA/MASTERCARD";
            break;
          case "2":
            echo "AMERICAN EXPRESS";
            break;
          default:
            break;
        }
        ?>
            </p>
            <p>Credit card number:
                <?php echo $_POST["creditCardNumber"]; ?>
            </p>
            <p>Expiration:
                <?php 
        $month = $_POST["expMonth"];
        $year = $_POST["expYear"];
        switch($month) {
          case "1":
            echo "January" . " " . $year;
            break;
          case "2":
            echo "February" . " " . $year;
            break;
          case "3":
            echo "March" . " " . $year;
            break;
          case "4":
            echo "April" . " " . $year;
            break;
          case "5":
            echo "May" . " " . $year;
            break;
          case "6":
            echo "June" . " " . $year;
            break;
          case "7":
            echo "July" . " " . $year;
            break;
          case "8":
            echo "August" . " " . $year;
            break;
          case "9":
            echo "September" . " " . $year;
            break;
          case "10":
            echo "October" . " " . $year;
            break;
          case "11":
            echo "November" . " " . $year;
            break;
          case "12":
            echo "December" . " " . $year;
            break;
          default:
            break;
        }
        ?>
            </p>
            <h3>Your items:</h3>
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
            <br />
            <form action="confirmation.php" id="confirmation_form" method="post">
                <?php
          // add client info as hidden fields
          foreach ($_POST as $a => $b) {
            echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
          }
          // add items from cookies as hidden fields
          foreach ($_COOKIE as $a => $b) {
            echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
          }
        ?>
                    <input type="submit" name="confirm" alt="Confirm" value="Confirm" id="confirm" />
                    <input type="submit" name="cancel" alt="Cancel" value="Cancel" /> </form>
        </div>
        <footer id="page">
            <?php include 'footer.php';?>
        </footer>
    </div>
</body>

</html>