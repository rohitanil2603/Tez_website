<?php
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Inventory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #14404D;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 60px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        fieldset {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        legend {
            font-weight: bold;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        button[type="submit"] {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Equipment Inventory</h1>
    <form id="equipmentForm" method="post" action="/Tez_website/php/add_equipment_to_inventory.php">
        <fieldset>
            <legend>Medical Supplies</legend>
            <label for="medicines">Medicines and Pharmaceuticals</label>
            <input type="checkbox" id="medicines" name="medicalSupplies[]" value="Medicines and Pharmaceuticals">

            <label for="firstAidKits">First Aid Kits</label>
            <input type="checkbox" id="firstAidKits" name="medicalSupplies[]" value="First Aid Kits">

            <label for="ppe">Personal Protective Equipment (PPE)</label>
            <input type="checkbox" id="ppe" name="medicalSupplies[]" value="Personal Protective Equipment (PPE)">
            <!-- Add more checkboxes for other medical supplies here -->
        </fieldset>

        <fieldset>
            <legend>Hospital Beds and Facilities</legend>
            <label for="hospitalBeds">Hospital Beds</label>
            <input type="checkbox" id="hospitalBeds" name="hospitalFacilities[]" value="Hospital Beds">

            <label for="icuBeds">ICU Beds</label>
            <input type="checkbox" id="icuBeds" name="hospitalFacilities[]" value="ICU Beds">

            <label for="isolationUnits">Isolation Units</label>
            <input type="checkbox" id="isolationUnits" name="hospitalFacilities[]" value="Isolation Units">
            <!-- Add more checkboxes for other hospital facilities here -->
        </fieldset>

        <fieldset>
            <legend>Manpower and Personnel</legend>
            <label for="doctors">Doctors and Nurses</label>
            <input type="checkbox" id="doctors" name="personnel[]" value="Doctors and Nurses">

            <label for="healthcareWorkers">Healthcare Workers</label>
            <input type="checkbox" id="healthcareWorkers" name="personnel[]" value="Healthcare Workers">

            <label for="emergencyResponders">Emergency Responders</label>
            <input type="checkbox" id="emergencyResponders" name="personnel[]" value="Emergency Responders">

            <label for="volunteers">Volunteers</label>
            <input type="checkbox" id="volunteers" name="personnel[]" value="Volunteers">
            <!-- Add more checkboxes for other personnel here -->
        </fieldset>

        <fieldset>
            <legend>Transportation</legend>
            <label for="ambulances">Ambulances</label>
            <input type="checkbox" id="ambulances" name="transportation[]" value="Ambulances">

            <label for="medicalTransport">Medical Transport Vehicles</label>
            <input type="checkbox" id="medicalTransport" name="transportation[]" value="Medical Transport Vehicles">

            <label for="evacuationHelicopters">Evacuation Helicopters (for certain situations)</label>
            <input type="checkbox" id="evacuationHelicopters" name="transportation[]" value="Evacuation Helicopters (for certain situations)">

            <label for="cargoTrucks">Cargo Trucks for Transporting Supplies</label>
            <input type="checkbox" id="cargoTrucks" name="transportation[]" value="Cargo Trucks for Transporting Supplies">
            <!-- Add more checkboxes for other transportation options here -->
        </fieldset>

        <fieldset>
            <legend>Communication and Information</legend>
            <label for="radios">Radios and Communication Devices</label>
            <input type="checkbox" id="radios" name="communication[]" value="Radios and Communication Devices">

            <label for="hotlines">Emergency Hotlines and Call Centers</label>
            <input type="checkbox" id="hotlines" name="communication[]" value="Emergency Hotlines and Call Centers">

            <label for="infoTools">Information Dissemination Tools</label>
            <input type="checkbox" id="infoTools" name="communication[]" value="Information Dissemination Tools">

            <label for="dataCollection">Data Collection and Reporting Systems</label>
            <input type="checkbox" id="dataCollection" name="communication[]" value="Data Collection and Reporting Systems">
            <!-- Add more checkboxes for other communication and information options here -->
        </fieldset>

        <fieldset>
            <legend>Logistics and Supplies</legend>
            <label for="foodWater">Food and Water Supplies</label>
            <input type="checkbox" id="foodWater" name="logistics[]" value="Food and Water Supplies">

            <label for="shelterTents">Shelter and Tents (for Displaced Populations)</label>
            <input type="checkbox" id="shelterTents" name="logistics[]" value="Shelter and Tents (for Displaced Populations)">

            <label for="generators">Generators and Power Sources</label>
            <input type="checkbox" id="generators" name="logistics[]" value="Generators and Power Sources">

            <label for="clothingBlankets">Clothing and Blankets</label>
            <input type="checkbox" id="clothingBlankets" name="logistics[]" value="Clothing and Blankets">

            <label for="hygieneKits">Hygiene Kits</label>
            <input type="checkbox" id="hygieneKits" name="logistics[]" value="Hygiene Kits">
            <!-- Add more checkboxes for other logistics and supplies options here -->
        </fieldset>

        <fieldset>
            <legend>Safety and Security</legend>
            <label for="policeSecurity">Police and Security Personnel</label>
            <input type="checkbox" id="policeSecurity" name="safetySecurity[]" value="Police and Security Personnel">

            <label for="barricades">Barricades and Crowd Control Equipment</label>
            <input type="checkbox" id="barricades" name="safetySecurity[]" value="Barricades and Crowd Control Equipment">

            <label for="searchRescue">Search and Rescue Teams</label>
            <input type="checkbox" id="searchRescue" name="safetySecurity[]" value="Search and Rescue Teams">

            <label for="firefighters">Firefighters and Equipment</label>
            <input type="checkbox" id="firefighters" name="safetySecurity[]" value="Firefighters and Equipment">
            <!-- Add more checkboxes for other safety and security options here -->
        </fieldset>

        <fieldset>
            <legend>Technical and Technology Resources</legend>
            <label for="computers">Computers and IT Equipment</label>
            <input type="checkbox" id="computers" name="technologyResources[]" value="Computers and IT Equipment">

            <label for="gis">GIS (Geographic Information System) for Mapping and Coordination</label>
            <input type="checkbox" id="gis" name="technologyResources[]" value="GIS (Geographic Information System) for Mapping and Coordination">

            <label for="drones">Drones and Aerial Surveillance (for Assessing and Monitoring Situations)</label>
            <input type="checkbox" id="drones" name="technologyResources[]" value="Drones and Aerial Surveillance (for Assessing and Monitoring Situations)">
            <!-- Add more checkboxes for other technical and technology resources here -->
        </fieldset>

        <!-- Add more fieldsets for other equipment categories here -->

        <button type="submit">Submit</button>
    </form>
</body>
</html>
