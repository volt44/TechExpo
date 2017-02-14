<?php
session_start();
include_once 'functions.php';

    if (isset($_POST['submit'])) {
        $tec_id = $_POST['tec_id'];
        $amount = $_POST['amount'];
        $invID = $_SESSION['inv_id'];
        
        $success = updateInvestment($tec_id, $amount, $invID);
        if (!$success) {
            echo "Update unseccessful!";
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
        <section id="content" class="body">
            <article class="hentry">
                <h3>Invest in a Technology</h3>
                <?php
                    echo "<h3>Max Budget R " . checkBudgetForInvID($_SESSION['inv_id']) . "</h3>";
                ?>
                <form method="post">
                    <table border="0">
                    <tr><td>Select Technology: <select name="tec_id">
                        <?php
                            $techArray = getUnfundedTechnoloy();

                                echo "<div class='unfunded'>";                        

                                for ($i = 0; $i < count($techArray); $i++) {
                                    echo "<option value='" .$techArray[$i]['tec_id']. "'>";
                                    echo $techArray[$i]['name'];
                                    echo "</option>";
                                }
                                echo "</div>";
                        ?>
                    <tr><td><input type="number" name="amount" placeholder="Amount to Invest" min="0" max="<?php echo checkBudgetForInvID($_SESSION['inv_id']); ?>"></td></tr>
                        </select></td></tr>
                    </table>
                    <input type="submit" name="submit" value="Add Investment">
                </form>
            </article>
        </section>
    </body>
</html>
