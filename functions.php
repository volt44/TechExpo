<?php

# Set timzeone
date_default_timezone_set("Africa/Johannesburg");

# Return the database connection
function dbConnection() {
    $connection = mysqli_connect("localhost", "root", "p03S3rs44", "TechApp");
    return $connection;
}

# Return results from SQL query
function dbResultFromQuery($query) {
    $connection = dbConnection();
    if (!$connection) die("MySQL Connection failed : " . mysqli_connect_error());

    $result = 0;
    if (!empty($query)) $result = mysqli_query($connection, $query)or die("<p>".mysqli_error($connection)."</p>");
    mysqli_close($connection);
    return $result;
}

function investorForID($invID) {
    $result = dbResultFromQuery("SELECT comp_name FROM Investor WHERE inv_id=$invID LIMIT 1");
    $investorName = "";
    while ($row = $result->fetch_assoc()) {
        $investorName = $row["comp_name"];
    }
    return $investorName;
}

function getTechNameForID($techID) {
    $result = dbResultFromQuery("SELECT name FROM Technology WHERE tec_id=$techID LIMIT 1");
    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row['name'];
    } else {
        return 0;
    }
}

function getVenueNameForID($venID) {
    $result = dbResultFromQuery("SELECT name FROM Venue WHERE ven_id=$venID LIMIT 1");
    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row['name'];
    } else {
        return 0;
    }
}

function getBudgetForInvID($invID) {
    $result = dbResultFromQuery("SELECT budget FROM Investor WHERE inv_id=$invID LIMIT 1");
    $budget = 0;
    $numOfResults = $result->num_rows;
    if ($numOfResults > 0) {
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $budget = $row['budget'];
        }
    }
    return $budget;
}

function getAmountForInvID($invID) {
    $result = dbResultFromQuery("SELECT amount FROM Technology WHERE inv_id=$invID");
    $amount = 0;
    $numOfResults = $result->num_rows;
    if ($numOfResults > 0) {
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $amount = $row['amount'] + $amount;
        }
    }
    return $amount;
}

function getTechnologyForInvID($invID) {
    $result = dbResultFromQuery("SELECT amount, name FROM Technology WHERE inv_id=$invID");
    $techArray = [];
    $numOfResults = $result->num_rows;
    
    for ($i = 0; $i < $numOfResults; $i++) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $technology['name'] = $row['name'];
        $technology['amount'] = $row['amount'];
        $techArray[$i] = $technology;
    }
    return $techArray;
}

function getUnfundedTechnoloy() {
    $result = dbResultFromQuery("SELECT amount, name, tec_id FROM Technology WHERE inv_id=0");
    $techArray = [];
    $numOfResults = $result->num_rows;
    
    for ($i = 0; $i < $numOfResults; $i++) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $technology['name'] = $row['name'];
        $technology['amount'] = $row['amount'];
        $technology['tec_id'] = $row['tec_id'];
        $techArray[$i] = $technology;
    }
    return $techArray;
}

function checkBudgetForInvID($invID) {
    $budget = getBudgetForInvID($invID);
    $amount = getAmountForInvID($invID);
    $newBudget = $budget - $amount;
    return $newBudget;
}

function getEntrepreneursForTecId($tecId){
    $result = dbResultFromQuery("SELECT name FROM Entrepreneurs WHERE tec_id=$tecId");
    $numOfResults = $result->num_rows;
    $names = "";
    for ($i = 0; $i < $numOfResults; $i++) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($i === 0) {
            $names = $row['name'];
        } else {
            $names .= ", " . $row['name'];
        }
    }
    return $names;
}

function registerInvestor($companyName, $password, $email, $budget) {
    $result = dbResultFromQuery("INSERT INTO Investor (comp_name, password, email, budget) VALUES ('$companyName',' $password', '$email', '$budget')");
    return $result;
}

function loginInvestor($email, $password) {
    $result = dbResultFromQuery("SELECT inv_id FROM Investor WHERE (password='$password' AND email='$email') LIMIT 1");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $invID = $row['inv_id'];
        return $invID;
    }
    return $result;
}

function addInvestor($companyName, $password, $email, $budget) {
    $result = dbResultFromQuery("INSERT INTO Investor (comp_name, password, email, budget) VALUES ('$companyName',' $password', '$email', '$budget')");
    return $result;
}

function updateInvestment($tec_id, $amount, $invID) {
    $result = dbResultFromQuery("UPDATE Technology SET amount=$amount, inv_id=$invID WHERE tec_id=$tec_id");
    return $result;
}

function availableExhibitions() {
    $technologies = dbResultFromQuery("SELECT tec_id FROM Technology");
    $tecArray = [];
    while ($row = $technologies->fetch_array(MYSQLI_ASSOC)) {
        $tecArray[] = $row['tec_id'];
    }

    $exhibits = dbResultFromQuery("SELECT tec_id FROM Exhibit");
    $exhArray = [];
    while ($row = $exhibits->fetch_array(MYSQLI_ASSOC)) {
        $exhArray[] = $row['tec_id'];
    }
    
    $result = array_values(array_diff($tecArray, $exhArray));
    return $result;
}

function sanitise($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getExhibitForVenueID($venID) {
    $result = dbResultFromQuery("SELECT * FROM Exhibit WHERE ven_id=$venID");
    
    $exhibitArray = [];
    $numOfResults = $result->num_rows;
    
    for ($i = 0; $i < $numOfResults; $i++) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $exhibit['date'] = $row['date'];
        $exhibit['techName'] = getTechNameForID($row['tec_id']);
        $exhibitArray[$i] = $exhibit;
    }
    return $exhibitArray;
}

?>