<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/navbar.php');
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');

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
            /*padding: 20px;*/
        }

         .seven{
            text-align: center;
            margin-bottom: 20px;
            margin-top: 60px;
            font-size:30px; font-weight:400;letter-spacing:1px;
            text-transform: uppercase;
            display: grid;
            grid-template-columns: 1fr max-content 1fr;
            grid-template-rows: 27px 0;
            grid-gap: 20px;
            align-items: center;
            color: white;
          background: linear-gradient(to right, #00FF92, #3887F7, #BC45A6, #FC3667, #F67A39, #00FF92, #3887F7, #BC45A6, #FC3667, #F67A39);
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
          font-family: 'Raleway', sans-serif !important;
          background-size: 300% 300%;
          animation: gradient 12s ease infinite;
    }
    
    .seven:after,.seven:before {
        content: " ";
        display: block;
        border-bottom: 1px solid #c50000;
        border-top: 1px solid #c50000;
        height: 5px;
        background: -webkit-linear-gradient(#eee, #333);
    }
    @keyframes gradient {
  0%, 100% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
}

     table {
             width: 100%;
            border-collapse: collapse;
            margin: 20px auto; /* Center the table horizontally and add top margin */
            overflow-x: auto; 
        }

        table, th, td {
            border: 0;
        }

        th{
            color:gray;
            font-size:20px;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #1b5261;
        }
        tr{
            height:60px;
        }
        tr:hover {
            background-color: #336b7c;
        }
    </style>
</head>
<body>
    
    <h1 class="seven">Rescue Agencies</h1>

    <?php


    // SQL query to fetch data from RescueAgency table
    $sql = "SELECT * FROM RescueAgency";

    $result = $Conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table>";
        echo "<tr><th>ID</th><th>Name of the Agency</th><th>Phone Number</th><th>Email Address</th><th>Availability</th><th>Emergency Contact</th><th>Verification Status</th><th>Specializations</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["agencyName"] . "</td>";
            echo "<td>" . $row["phoneNumber"] . "</td>";
            echo "<td>" . $row["emailAddress"] . "</td>";
            

            echo "<td>" . $row["availability"] . "</td>";
            echo "<td>" . $row["emergencyContact"] . "</td>";
            echo "<td>" . $row["verificationStatus"] . "</td>";
            echo "<td>" . $row["specializations"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No data found.";
    }

    // Close the database connection
    $Conn->close();
    ?>

</body>
</html>
