<?php
include_once 'functions.php';

class Country {
    public $name;
    public $category;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid =  true;
    $urlError = "";

    // GET DATA FROM FORM
    $post_technology = new Technology();
    $post_technology->name = sanitise($_POST["technology_name"]);
    $post_technology->type = sanitise($_POST["technology_type"]);
    $post_technology->entrepreneurs = sanitise($_POST["technology_team"]);

    // VALIDATE
    if (empty($post_technology->type)) {
        $valid = false;
        $urlError = "type required.";
    }

    // ADD TO DATABASE
    if ($valid) {
        mysqli_query("INSERT INTO Technology(name, category) VALUES ('$post_technology->name', '$post_technology->type'");
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
                <?php

                    $result = dbResultFromQuery("SELECT * FROM Technology");
                    $numOfResults = $result->num_rows;
                    if ($numOfResults > 0) {
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                            $invID = $row['inv_id'];
                            $tecID = $row['tec_id'];
                            $name = $row['name'];
                            $category = $row['category'];
                            $amount = $row['amount'];
                            $investor = "";
                            if ($amount > 0) $investor = " by " . investorForID($invID);

                            echo "<div class='technology'>";
                            echo "<h2>Name: $name</h2>";
                            echo "<h5>Entrepreneurs: " .getEntrepreneursForTecId($tecID). "</h5>";
                            echo "<h3>Category: $category</h3>";
                            echo "<h4>Amount invested R $amount" .$investor. "</h4>";
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
