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
    <link href="./styles/services.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/functions.js"></script>
</head>

<body>
    <div id="wrapper">
        <header>
            <?php include 'header.php';?>
            <nav>
                <?php include 'nav.php';?>
            </nav>
            <script>
                document.getElementById("servicesOption").className = "landmark";
            </script>
        </header>
        <div id="content">
            <h2>Submit a service request</h2>
            <p class="content">Cost-effective, accurate results and a successful outcome all start with how you submit your casework. Make the submission process easier by following these simple steps and you’ll have your analysis in no time.</p>

            <div class="item">
                <img src="images/family.jpg" alt="Family image" style="width:100%; height: auto;">
                <div class="description">
                    <button type="button" onclick="addTest(1)">ORDER TEST</button>
                    <h3>At-Home DNA Test</h3>
                    <p> PRICE: $210</p>
                    <br />
                    <ul>
                        <li>Includes alleged father, child and mother (if available)</li>
                        <li>$70 per additional alleged father and/or child tested at the same time
                        </li>
                        <li>Includes two-way express delivery of sample collection kit</li>
                    </ul>
                </div>
            </div>

            <div class="item">
                <img src="images/legal.jpg" alt="Legal image" style="width:100%; height: auto;">
                <div class="description">
                    <button type="button" onclick="addTest(2)">ORDER TEST</button>
                    <h3>Legal DNA Test</h3>
                    <p> PRICE: $450</p>
                    <br />
                    <ul>
                        <li>Includes alleged father, child and mother (if available); inquire for additional parties</li>
                        <li>Collection fee included when collected at one of our nationwide collection sites
                        </li>
                        <li>Notarized and court-admissible results</li>
                    </ul>
                </div>
            </div>

            <div class="item">
                <img src="images/immigration.jpg" alt="Immigration image" style="width:100%; height: auto;">
                <div class="description">
                    <button type="button" onclick="addTest(3)">ORDER TEST</button>
                    <h3>Immigration/Surrogacy DNA Test</h3>
                    <p> PRICE: $550</p>
                    <br />
                    <ul>
                        <li>2-party testing; inquire for additional parties</li>
                        <li>AABB accredited DNA testing</li>
                        <li>International shipments included in pricing</li>
                    </ul>
                </div>
            </div>

            <div class="item">
                <img src="images/prenatal.jpg" alt="Prenatal image" style="width:100%; height: auto;">
                <div class="description">
                    <button type="button" onclick="addTest(4)">ORDER TEST</button>
                    <h3>Prenatal DNA Test</h3>
                    <p> PRICE: $630</p>
                    <br />
                    <ul>
                        <li>Includes mother, amnio/CVS sample (child; collected by mother's doctor) and alleged father</li>
                    </ul>
                </div>
            </div>

        </div>
        <footer id="page">
            <?php include 'footer.php';?>
        </footer>
    </div>
</body>

</html>