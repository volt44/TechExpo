<?php
include_once 'functions.php';
?>

<!DOCTYPE>
<html>
    <head>
        <link rel="stylesheet" href="css/stylesheet.css" type="text/css" />
    </head>
    <body id="index" class="home">
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
                <?php
                    $result = dbResultFromQuery("SELECT * FROM Investor");
                    $numOfResults = $result->num_rows;
                    if ($numOfResults > 0) {
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                            $invID = $row['inv_id'];
                            $comp_name = $row['comp_name'];
                            $budget = $row['budget'];
                            $budgetSpent = getAmountForInvID($invID);
                            $budgetLeft = checkBudgetForInvID($invID);
                            $techArray = getTechnologyForInvID($invID);

                            echo "<div class='technology'>";
                            echo "<h2>$comp_name</h2>";
                            echo "<h3>R$budget</h3>";

                            echo "<table border='1'><th>Technology</th><th>Amount</th>";
                            for ($i = 0; $i < count($techArray); $i++) {
                                echo "<tr><td>" . $techArray[$i]['name'] . "</td>";
                                echo "<td>R" . $techArray[$i]['amount'] . "</td></tr>";

                            }
                            echo "<tr><td>Total</td>";
                            echo "<td>R $budgetSpent</td></tr>";

                            echo "</table>";

                            echo "<h3>Budget Left: R$budgetLeft</h3>";
                            echo "</div><hr>";
                        }
                    } else {
                        echo "<p>No results found!</p>";
                    }
                ?>
            </article>
        </section>
    </body>
</html>
