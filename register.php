<?php
include_once 'functions.php';

    if (isset($_POST['register'])) {
        $password = $_POST['password'];
        $email = $_POST['email'];
        $budget = $_POST['budget'];
        
        $success = registerUser($companyName, $password, $email, $budget);
        if ($success) {
            header("Location: invest_current.php");
        } else {
            echo "Register unseccessful!";
        }
    }
?>

<!DOCTYPE>
<html>
    <head>
        <link rel="stylesheet" href="css/stylesheet.css" type="text/css" />
    </head>
    <body>
        <header id="banner" class="body">
            <nav><ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="exhibitions.php">Exhibitions</a></li>
                <li><a href="technology.php">Technology</a></li>
                <li><a href="venues.php">Venue</a></li>
                <li><a href="invest.php">Invest</a></li>
                <li><a href="invest_current.php">Invest New</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="register.php">Register</a></li>
            </ul></nav>
        </header>
        
        <section id="logins" class="body">
            <div id="login" align="center">
                <div id="backing" align="center" style="width:400px;background-color:rgba(117,117,117,0.90);">
                    <h3>Register as Investor</h3>
                    <form method="POST">
                        <input style="text-align:center; width:50%; height:30px;" type="text" name="comp_name" placeholder="Company Name">
                        <input style="text-align:center; width:50%; height:30px;" type="text" name="password" placeholder="Create Password">
                        <input style="text-align:center; width:50%; height:30px;" type="text" name="email" placeholder="Email">
                        <input style="text-align:center; width:50%; height:30px;" type="text" name="budget" placeholder="Budget (ZAR)">
                        <input type="submit" name="register" value="REGISTER">
                    </form>
                </div>
            </div>
        </section>
        
    </body>
</html>