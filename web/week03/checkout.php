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

<body onload="enableSubmit(false)">
    <div id="wrapper">
        <header>
            <?php include 'header.php';?>
        </header>
        <div id="content">
            <form action="review_order.php" id="checkout_form" method="post">
                <label>First Name *</label><span id="firstNameError">Requiered</span>
                <input type="text" name="firstName" id="firstNameInput" onchange="firstNameValidation(this.id);">
                <label>Last Name *</label><span id="lastNameError">Requiered</span>
                <input type="text" name="lastName" id="lastNameInput" onchange="lastNameValidation(this.id);">
                <label>Address *</label><span id="address_line1Error">Requiered</span>
                <input type="text" name="address_line1" id="address_line1Input" onchange="address_line1Validation(this.id);">
                <label>Address 2</label>
                <input type="text" name="address_line2">
                <label>City *</label><span id="cityError">City State</span>
                <input type="text" name="city" id="cityInput" onchange="cityValidation(this.id);">
                <label>CP *</label><span id="cpError">Invalid CP</span>
                <input type="text" name="cp" id="cpInput" onchange="cpValidation(this.id);">
                <label>State *</label><span id="stateError">Invalid State</span>
                <input type="text" name="state" id="stateInput" onchange="stateValidation(this.id);">
                <label>Email *</label><span id="emailError">Invalid Email</span>
                <input type="text" name="email" id="emailInput" onchange="emailValidation(this.id);">
                <label>Phone *</label><span id="phoneError">Invalid Phone</span>
                <input type="text" name="phone" id="phoneInput" onchange="phoneValidation(this.id);">
                <label>Credit card type *</label><span id="creditCardTypeError">Select a type</span>
                <select name="creditCardType" id="creditCardTypeInput" onchange="creditCardTypeValidation(this.id);">
                    <option value="0">Select...</option>
                    <option value="1">VISA/MASTERCARD</option>
                    <option value="2">AMERICAN EXPRESS</option>
                </select>
                <label>Credit card number *</label><span id="creditCardNumberError">Invalid credit card number</span>
                <input type="text" name="creditCardNumber" id="creditCardNumberInput" onchange="creditCardNumberValidation(this.id);">
                <label>Expiration Month *</label><span id="expMonthError">Selecet a month</span>
                <select name="expMonth" id="expMonthInput" onchange="expMonthValidation(this.id);">
                    <option value="0">Select...</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <label>Expiration Year *</label><span id="expYearError">Invalid year format</span>
                <input type="text" name="expYear" id="expYearInput" onchange="expYearValidation(this.id);">
                <input class="enabledButton" type="button" onclick="resetForm()" value="Reset form">
                <input class="disabledButton" id="submit_form" type="submit" value="Submit">
                <br />
                <br />
                <br />
                <label>(*) requiered</label>
            </form>
        </div>
        <footer id="page">
            <?php include 'footer.php';?>
        </footer>
    </div>
</body>

</html>