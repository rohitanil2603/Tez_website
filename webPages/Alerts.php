<?php
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/navbar.php');

$AGENCY_ID= $_SESSION['USER_ID'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
               background-color: #14404D; 
               margin-top:60px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .alert {
            
            border: 1px solid #ccc;
            padding: 30px;
            margin: 10px 0;
            background-color:#FF5C5C;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alerts</h1>
        <?php


        // Check connection
        if ($Conn->connect_error) {
            die("Connection failed: " . $Conn->connect_error);
        }

        // Retrieve alerts from the database
        $sql = "SELECT * FROM alert_data where id_of_alert_sent_to= $AGENCY_ID";
        $result = $Conn->query($sql);

        if ($result->num_rows > 0) {
         
         
            while ($row = $result->fetch_assoc()) {
                $userLocation = $row["user_location"];
                $medicalSupplies = $row["medical_supplies"];
                $logistics = $row["logistics"];
                $timestamp = $row["timestamp"];
                
                //  user who sent alert location coordinates
                    $googleMapsLink ="https://maps.google.com/maps?q=$userLocation";

                // Display alert data
                echo "<div class='alert'>";
                echo "<p><strong>User Location:<a href='" . $googleMapsLink . "' target='_blank'>Open location</a>";
                echo "<p><strong>Medical Supplies:</strong> $medicalSupplies</p>";
                echo "<p><strong>Logistics:</strong> $logistics</p>";
                echo "<p><strong>Time:</strong> $timestamp</p>";
                echo "</div>";
            }
        } else {
            echo "No alerts found.";
        }

        // Close database connection
        $Conn->close();
        ?>
    </div>
</body>
</html>
