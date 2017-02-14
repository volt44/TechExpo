<?php
include_once 'functions.php';
    
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $success = loginInvestor($email, $password);
        if ($success) {
            session_start();
            $_SESSION['inv_id'] = $success;
            header("Location: invest_current.php");
        } else {
            echo "Login unsuccessful!";
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
                    <h3>Sign in</h3>
                    <form method="POST">
                        <input style="text-align:center; width:50%; height:30px;" type="text" name="email" placeholder="Username or Email Address" tabindex="2" required="required">
                        <input style="text-align:center; width:50%; height:30px;" type="password" name="password" placeholder="Password" tabindex="3" required="required">
                        <input type="submit" name="submit" value="LOGIN" style="height:35px;">
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>
