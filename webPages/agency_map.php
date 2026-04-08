<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/navbar.php');
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');

$sql = "SELECT * FROM RescueAgency";
$result = $Conn->query($sql);

$coordinates = array(); // Initialize an array to store coordinates

while ($row = $result->fetch_assoc()) {
    $locationArray = explode(",", $row['locationInfo']);
    
    // Get agency location coordinates
    if (count($locationArray) == 2) {
        $lat = trim($locationArray[0]); // Trim to remove leading/trailing spaces
        $lon = trim($locationArray[1]); // Trim to remove leading/trailing spaces
        $label = $row['agencyName'];
        
        // Create a JavaScript object for each coordinate
        $coordinate = [
            'lat' => $lat,
            'lon' => $lon,
            'label' => $label
        ];
        
        // Push the coordinate object to the coordinates array
        $coordinates[] = $coordinate;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>TEZ Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
 
        body{
            margin-top:2em;
        }
        /* Define the map's container */
        #map {
            height: 100vh; /* 100% of the viewport height */
            width: 100%;
        }
          
             .navbar-inner {
             margin:0;
             position:fixed;
             top:0;
            background: #0f2a33;
            }
    </style>
</head>
<body>
    <div id="map"></div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Initialize the map and set the center to India
        var map = L.map('map').setView([20.5937, 78.9629], 4.8); // Centered on India with a zoom level of 5
        
        // Use OpenStreetMap as the tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        
        // PHP-generated coordinates array
        var coordinates = <?php echo json_encode($coordinates); ?>;
        
        // Add markers to the map and open popups
        coordinates.forEach(function(coord) {
            var marker = L.marker([coord.lat, coord.lon]).addTo(map);
            
            // Create a link to Google Maps with the coordinates and label
            var googleMapsLink = '<a href="https://maps.google.com/maps?q=' + coord.lat + ',' + coord.lon + '" target="_blank">' +
                                 '<span>' + coord.label + '</span>' +
                                 '</a>';
            
            // Bind a popup with the link
            marker.bindPopup(googleMapsLink).openPopup();
        });
    </script>
</body>
</html>
