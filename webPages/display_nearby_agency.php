<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/navbar.php');


  
// Function to calculate the distance between two sets of coordinates using the Haversine formula
function calculateDistance($lat1, $lon1, $lat2, $lon2) {
    $R = 6371; // Radius of the Earth in kilometers
    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);
    $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $distance = $R * $c;
    return $distance;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rescue Agencies</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:  #14404D;
            color:white;
            margin-top:90px;
            /*padding: 20px;*/
        }

      

     table {
  
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow-x: auto; /* Enable horizontal scrolling on small screens */
        }

        table, th, td {
            border: 0;
        }

        th, td {
            padding: 5px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #1b5261;
        }

        tr:hover {
            background-color: #336b7c;
        }
    </style>
</head>
<body>
    
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $range = $_POST["range"];
        $userLocation = $_POST["userLocation"];
        
        if(isset($_POST["medicalSupplies"])){
        $medicalSupplies_from_user= $_POST["medicalSupplies"];
        }
        
        if(isset($_POST['logistics'])){
        $logistics_from_user= $_POST['logistics'];
        }
        
         $userlocationArray = explode(",",  $userLocation);
            // Get agency location coordinates
            if (count($userlocationArray ) == 2) {
    $userLatitude = trim($userlocationArray [0]); // Trim to remove leading/trailing spaces
   $userLongitude= trim($userlocationArray [1]); // Trim to remove leading/trailing spaces
            }
    
    // Query the database with LIKE and case-insensitive comparison
    $sql_009 = "SELECT * FROM equipment_inventory";
    $result = mysqli_query($Conn, $sql_009);

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Agency Id</th>";
    echo "<th>Agency Name</th>";
    echo "<th>Contact No.</th>";
    echo "<th>Contact Email</th>";
    echo "<th>Distance (km)</th>";
    echo "</tr>";

$sql_999= "select * from RescueAgency";
$result_999= mysqli_query($Conn,$sql_999);

    if ($result_999) {
        // Loop through the result set
        while ($row = mysqli_fetch_assoc($result_999)) {
            
            $locationArray = explode(",", $row['locationInfo']);
            // Get agency location coordinates
            if (count($locationArray) == 2) {
     $agencyLatitude = trim($locationArray[0]); // Trim to remove leading/trailing spaces
   $agencyLongitude= trim($locationArray[1]); // Trim to remove leading/trailing spaces
            }

            // Calculate the distance between user and agency
            $distance = calculateDistance($userLatitude, $userLongitude, $agencyLatitude, $agencyLongitude);

            // Check if the agency is within the specified range
            if ($distance <= $range) {
                echo "<tr>";
                echo "<td>" . $row['agency_id_of_agency'] . "</td>";
                echo "<td>" . $row['agencyName'] . "</td>";
                echo "<td>" . $row['phoneNumber'] . "</td>";
                echo "<td>" . $row['emailAddress'] . "</td>";
                echo "<td>" . number_format($distance, 2) . "</td>";
                
            echo '<td><a href="/Tez_website/php/send_alert.php?id=' . $row['agency_id_of_agency'] . '&userLocation=' . urlencode("$userLatitude,$userLongitude");
                
                if(isset($_POST['medicalSupplies'])) {
                    echo '&medicalSupplies=' . urlencode(implode(',', $medicalSupplies_from_user));
                }
                
                if(isset($_POST['logistics'])) {
                    echo '&logistics=' . urlencode(implode(',', $logistics_from_user));
                }
                
                echo '">Send Alert</a></td>';


                echo "</tr>";
            }
        }
    } else {
        echo "No results found.";
    }
} else {
    echo "Error: " . mysqli_error($Conn); // Print MySQL error message
}

echo "</table>";
?>

</body>
</html>
