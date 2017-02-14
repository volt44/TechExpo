<?php
include_once 'functions.php';
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
        
                    <?php
                        if (isset($_POST['submit'])) {
                            echo "<p>Message sent!</p>";
                        }
                    ?>
                    <h3>Contact Us</h3>

                    <form method="POST" enctype="multipart/form-data">
                        <input type="text" name="name" placeholder="Name" style="text-align:center; width:50%; height:30px;">
                        <input type="text" name="subject" placeholder="Subject" style="text-align:center; width:50%; height:30px;">
                        <input type="text" name="emailAddress" placeholder="Email" style="text-align:center; width:50%; height:30px;">
                            <textarea rows="5" name="message" placeholder="Message" style="text-align:center; width:50%; height:30px;"></textarea>
                        <input type="submit" name="submit" value="SEND" style="height:35px;">
                    </form>
                </div>
            </div>
        </section>

    </body>
</html>