<?php
include_once 'functions.php';

if (isset($_GET['ven_id']) && isset($_GET['date'])) {
    $venueID = $_GET['ven_id'];
    $venueDate = $_GET['date'];

    $dayString = date('l', strtotime($venueDate));
    $day = date('d', strtotime($venueDate));
    $month = date('F', strtotime($venueDate));
    $year = date('Y', strtotime($venueDate));
    $dateString = $dayString. ", " .$day. " " .$month. " " .$year;
    
    $result = dbResultFromQuery("SELECT * FROM Exhibit WHERE (ven_id=$venueID AND date='$venueDate') LIMIT 1");    
}
?>

<!DOCTYPE>
<html>
    <head>
<!--        <link rel="stylesheet" href="css/stylesheet.css" type="text/css" />-->
    </head>
    <body>
        <div align="middle">
            <h2><?php echo $dateString; ?></h2>

            <table border="1">
                <th style='min-width:130px'>Venue</th><th style='min-width:130px'>Technology</th>
                <?php
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        $venueName = getVenueNameForID($row['ven_id']);
                        $techName = getTechNameForID($row['tec_id']);
                        echo "<tr><td>$venueName</td><td>$techName</td></tr>";

                    } else {
                        $openExhibitions = availableExhibitions();

                        echo '<tr><td align="middle">';
                        echo '<form action="booking.php" method="POST">';
                        echo '<input type="hidden" name="ven_id" value="' .$venueID. '">';
                        echo '<input type="hidden" name="date" value="' .$venueDate. '">';
                        echo '<input type="submit" name="submit" value="Book Now">';
                        echo '</td><td>';
                        echo '<select name="tec_id">';
                        for ($x = 0; $x < count($openExhibitions); $x++) {
                            $techID = $openExhibitions[$x];
                            $techName = getTechNameForID($techID);
                            echo '<option value="' .$techID. '">' .$techName. '</option>';
                        }
                        echo "</select>";
                        echo '</form>';                        
                        echo '</td></tr>';
                    }
                ?>
            </table>
        </div>
    </body>
</html>