<?php
include_once 'functions.php';
?>

<!DOCTYPE>
<html>
    <head>
        <link rel="stylesheet" href="css/stylesheet.css" type="text/css" />
        <!-- Calendar -->
    <link rel='stylesheet' href='fullcalendar.css' />
    <script src='lib/jquery.min.js'></script>
    <script src='lib/moment.min.js'></script>
    <script src='fullcalendar.js'></script>
    <script>
        $(document).ready(function() {

            $('#calendar').fullCalendar({
                defaultDate: '2015-09-27',
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: [
                    {
                        title: 'North Hall',
                        start: '2015-09-18',
                        color: '#d9534f',
                        url: 'exhibit.php?ven_id=1&date=2015-09-18'
                    },
                    {
                        title: 'South Hall',
                        start: '2015-09-18',
                        color: '#d9534f',
                        url: 'exhibit.php?ven_id=2&date=2015-09-18'
                    },
                    {
                        title: 'East Hall',
                        start: '2015-09-18',
                        color: '#d9534f',
                        url: 'exhibit.php?ven_id=3&date=2015-09-18'
                    },
                    {
                        title: 'West Hall',
                        start: '2015-09-18',
                        color: '#5cb85c',
                        url: 'exhibit.php?ven_id=4&date=2015-09-18'
                    },
                    {
                        title: 'Plaza',
                        start: '2015-09-18',
                        color: '#5cb85c',
                        url: 'exhibit.php?ven_id=5&date=2015-09-18'
                    },
                    {
                        title: 'North Hall',
                        start: '2015-09-19',
                        color: '#d9534f',
                        url: 'exhibit.php?ven_id=1&date=2015-09-19'
                    },
                    {
                        title: 'South Hall',
                        start: '2015-09-19',
                        color: '#d9534f',
                        url: 'exhibit.php?ven_id=2&date=2015-09-19'
                    },
                    {
                        title: 'East Hall',
                        start: '2015-09-19',
                        color: '#d9534f',
                        url: 'exhibit.php?ven_id=3&date=2015-09-19'
                    },
                    {
                        title: 'West Hall',
                        start: '2015-09-19',
                        color: '#5cb85c',
                        url: 'exhibit.php?ven_id=4&date=2015-09-19'
                    },
                    {
                        title: 'Plaza',
                        start: '2015-09-19',
                        color: '#5cb85c',
                        url: 'exhibit.php?ven_id=5&date=2015-09-19'
                    },
                    {
                        title: 'North Hall',
                        start: '2015-09-20',
                        color: '#d9534f',
                        url: 'exhibit.php?ven_id=1&date=2015-09-20'
                    },
                    {
                        title: 'South Hall',
                        start: '2015-09-20',
                        color: '#d9534f',
                        url: 'exhibit.php?ven_id=2&date=2015-09-20'
                    },
                    {
                        title: 'East Hall',
                        start: '2015-09-20',
                        color: '#d9534f',
                        url: 'exhibit.php?ven_id=3&date=2015-09-20'
                    },
                    {
                        title: 'West Hall',
                        start: '2015-09-20',
                        color: '#5cb85c',
                        url: 'exhibit.php?ven_id=4&date=2015-09-20'
                    },
                    {
                        title: 'Plaza',
                        start: '2015-09-20',
                        color: '#5cb85c',
                        url: 'exhibit.php?ven_id=5&date=2015-09-20'
                    }
                ],
                eventClick: function(event) {
                    if (event.url) {
                        window.open(event.url, 'newwindow', config='height=260, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');
                        return false;
                    }
                }
            });
        });
    </script>
    <style>
        #calendar {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
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
                <br><p><div id='calendar'></div></p>

        <!--
                <?php
                    $result = dbResultFromQuery("SELECT * FROM Exhibit");
                    $numOfResults = $result->num_rows;
                    if ($numOfResults > 0) {
                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                            $date = $row['date'];
                            $ven_id = $row['ven_id'];
                            $tec_id = $row['tec_id'];

                            echo "<div class='technology'>";
                            echo "<h2>$date</h2>";
                            echo "<h3>$ven_id</h3>";
                            echo "<h3>$tec_id</h3>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No results found!</p>";
                    }
                ?>
        -->
            </article>
        </section>
    </body>
</html>
