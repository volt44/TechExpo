<?php
include_once 'functions.php';

if (isset($_POST['submit'])) {
    $venueID = $_POST['ven_id'];
    $venueDate = $_POST['date'];
    $techID = $_POST['tec_id'];
    
    $result = dbResultFromQuery("INSERT INTO Exhibit (ven_id, tec_id, date) VALUES ($venueID, $techID, '$venueDate')");    
}
?>

<!DOCTYPE>
<html>
    <head>
       <link rel="stylesheet" href="css/stylesheet.css" type="text/css" /> 
    </head>
    <body>
        <div align="middle">
            <?php
                if ($result) {
                    echo "Booking successful!";
                    echo '<script>setTimeout(function(){
                            self.close();
                        },2000);</script>';
                } else {
                    echo "Booking failed, please try again later.";
                }                
            ?>
        </div>
    </body>
</html>