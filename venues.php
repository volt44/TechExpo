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
        
        <section id="content" class="body">
            <article class="hentry">
        
                <p><table border="1">
                    <th colspan="2">North Hall</th>
                        <?php 
                            $exhibitArray = getExhibitForVenueID(1);
                            for ($x = 0; $x < count($exhibitArray); $x++) {
                                echo '<tr><td style="width:50%;">';
                                echo $exhibitArray[$x]['techName']; 
                                echo '</td><td style="width:50%;">';
                                echo $exhibitArray[$x]['date'];
                                echo '</td></tr>';
                            }
                        ?>
                </table></p>

                <p><table border="1">
                    <th colspan="2">South Hall</th>
                        <?php 
                            $exhibitArray = getExhibitForVenueID(2);
                            for ($x = 0; $x < count($exhibitArray); $x++) {
                                echo '<tr><td style="width:50%;">';
                                echo $exhibitArray[$x]['techName']; 
                                echo '</td><td style="width:50%;">';
                                echo $exhibitArray[$x]['date'];
                                echo '</td></tr>';
                            }
                        ?>
                </table></p>

                <p><table border="1">
                    <th colspan="2">East Hall</th>
                        <?php 
                            $exhibitArray = getExhibitForVenueID(3);
                            for ($x = 0; $x < count($exhibitArray); $x++) {
                                echo '<tr><td style="width:50%;">';
                                echo $exhibitArray[$x]['techName']; 
                                echo '</td><td style="width:50%;">';
                                echo $exhibitArray[$x]['date'];
                                echo '</td></tr>';
                            }
                        ?>
                </table></p>

                <p><table border="1">
                    <th colspan="2">West Hall</th>
                        <?php 
                            $exhibitArray = getExhibitForVenueID(4);
                            for ($x = 0; $x < count($exhibitArray); $x++) {
                                echo '<tr><td style="width:50%;">';
                                echo $exhibitArray[$x]['techName']; 
                                echo '</td><td style="width:50%;">';
                                echo $exhibitArray[$x]['date'];
                                echo '</td></tr>';
                            }
                        ?>
                </table></p>

                <p><table border="1">
                    <th colspan="2">Plaza</th>
                        <?php 
                            $exhibitArray = getExhibitForVenueID(5);
                            for ($x = 0; $x < count($exhibitArray); $x++) {
                                echo '<tr><td style="width:50%;">';
                                echo $exhibitArray[$x]['techName']; 
                                echo '</td><td style="width:50%;">';
                                echo $exhibitArray[$x]['date'];
                                echo '</td></tr>';
                            }
                        ?>
                </table>
            </article>
        </section>
        
    </body>
</html>
