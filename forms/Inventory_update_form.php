<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/navbar.php');

$agency_id_of_inventory = $_SESSION['USER_ID'];

// Initialize empty arrays to store the selected options
$selectedMedicalSupplies = [];
$selectedHospitalFacilities = [];
$selectedPersonnel = [];
$selectedTransportation = [];
$selectedCommunication = [];
$selectedLogistics = [];
$selectedSafetySecurity = [];
$selectedTechnologyResources = [];

// Fetch data from the database
$sql = "SELECT * FROM equipment_inventory WHERE agency_id_of_inventory = $agency_id_of_inventory";
$result = mysqli_query($Conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    // Split the comma-separated values into arrays
    $selectedMedicalSupplies = explode(', ', $row['medical_supplies']);
    $selectedHospitalFacilities = explode(', ', $row['hospital_facilities']);
    $selectedPersonnel = explode(', ', $row['personnel']);
    $selectedTransportation = explode(', ', $row['transportation']);
    $selectedCommunication = explode(', ', $row['communication']);
    $selectedLogistics = explode(', ', $row['logistics']);
    $selectedSafetySecurity = explode(', ', $row['safety_security']);
    $selectedTechnologyResources = explode(', ', $row['technology_resources']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if each category is set in the form data and add selected options to the respective arrays
    if (isset($_POST["medicalSupplies"])) {
        $selectedMedicalSupplies = $_POST["medicalSupplies"];
    }
    if (isset($_POST["hospitalFacilities"])) {
        $selectedHospitalFacilities = $_POST["hospitalFacilities"];
    }
    if (isset($_POST["personnel"])) {
        $selectedPersonnel = $_POST["personnel"];
    }
    if (isset($_POST["transportation"])) {
        $selectedTransportation = $_POST["transportation"];
    }
    if (isset($_POST["communication"])) {
        $selectedCommunication = $_POST["communication"];
    }
    if (isset($_POST["logistics"])) {
        $selectedLogistics = $_POST["logistics"];
    }
    if (isset($_POST["safetySecurity"])) {
        $selectedSafetySecurity = $_POST["safetySecurity"];
    }
    if (isset($_POST["technologyResources"])) {
        $selectedTechnologyResources = $_POST["technologyResources"];
    }
}
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
    <form id="equipmentForm" method="post" action="/Tez_website/php/process_Inventory_update_form.php">
        <fieldset>
            <legend>Medical Supplies</legend>
            <label for="medicines">Medicines and Pharmaceuticals</label>
            <input type="checkbox" id="medicines" name="medicalSupplies[]" value="Medicines and Pharmaceuticals"<?php if (in_array("Medicines and Pharmaceuticals", $selectedMedicalSupplies)) echo ' checked'; ?>>

            <label for="firstAidKits">First Aid Kits</label>
            <input type="checkbox" id="firstAidKits" name="medicalSupplies[]" value="First Aid Kits"<?php if (in_array("First Aid Kits", $selectedMedicalSupplies)) echo ' checked'; ?>>

            <label for="ppe">Personal Protective Equipment (PPE)</label>
            <input type="checkbox" id="ppe" name="medicalSupplies[]" value="Personal Protective Equipment (PPE)"<?php if (in_array("Personal Protective Equipment (PPE)", $selectedMedicalSupplies)) echo ' checked'; ?>>
            <!-- Add more checkboxes for other medical supplies here -->
        </fieldset>
        
        
        <fieldset>
            <legend>Hospital Beds and Facilities</legend>
            <label for="hospitalBeds">Hospital Beds</label>
            <input type="checkbox" id="hospitalBeds" name="hospitalFacilities[]" value="Hospital Beds" <?php if (in_array("Hospital Beds",  $selectedHospitalFacilities)) echo ' checked'; ?>>

            <label for="icuBeds">ICU Beds</label>
            <input type="checkbox" id="icuBeds" name="hospitalFacilities[]" value="ICU Beds"  <?php if (in_array("ICU Beds",  $selectedHospitalFacilities)) echo ' checked'; ?>>

            <label for="isolationUnits">Isolation Units</label>
            <input type="checkbox" id="isolationUnits" name="hospitalFacilities[]" value="Isolation Units"  <?php if (in_array("Isolation Units",  $selectedHospitalFacilities)) echo ' checked'; ?>>
            <!-- Add more checkboxes for other hospital facilities here -->
        </fieldset>

        <fieldset>
            <legend>Manpower and Personnel</legend>
            <label for="doctors">Doctors and Nurses</label>
            <input type="checkbox" id="doctors" name="personnel[]" value="Doctors and Nurses"   <?php if (in_array("Doctors and Nurses",   $selectedPersonnel)) echo ' checked'; ?>>

            <label for="healthcareWorkers">Healthcare Workers</label>
            <input type="checkbox" id="healthcareWorkers" name="personnel[]" value="Healthcare Workers"  <?php if (in_array("Healthcare Worker",   $selectedPersonnel)) echo ' checked'; ?>>

            <label for="emergencyResponders">Emergency Responders</label>
            <input type="checkbox" id="emergencyResponders" name="personnel[]" value="Emergency Responders"  <?php if (in_array("Emergency Responders",   $selectedPersonnel)) echo ' checked'; ?>>

            <label for="volunteers">Volunteers</label>
            <input type="checkbox" id="volunteers" name="personnel[]" value="Volunteers"  <?php if (in_array("Volunteers",   $selectedPersonnel)) echo ' checked'; ?>>

            <!-- Add more checkboxes for other personnel here -->
        </fieldset>

        <fieldset>
            <legend>Transportation</legend>
            <label for="ambulances">Ambulances</label>
            <input type="checkbox" id="ambulances" name="transportation[]" value="Ambulances" <?php if (in_array("Ambulances",   $selectedTransportation)) echo ' checked'; ?>>

            <label for="medicalTransport">Medical Transport Vehicles</label>
            <input type="checkbox" id="medicalTransport" name="transportation[]" value="Medical Transport Vehicles" <?php if (in_array("Medical Transport Vehicles",   $selectedTransportation)) echo ' checked'; ?>>

            <label for="evacuationHelicopters">Evacuation Helicopters (for certain situations)</label>
            <input type="checkbox" id="evacuationHelicopters" name="transportation[]" value="Evacuation Helicopters (for certain situations)" <?php if (in_array("Evacuation Helicopters (for certain situations)",   $selectedTransportation)) echo ' checked'; ?>>


            <label for="cargoTrucks">Cargo Trucks for Transporting Supplies</label>
            <input type="checkbox" id="cargoTrucks" name="transportation[]" value="Cargo Trucks for Transporting Supplies" <?php if (in_array("Cargo Trucks for Transporting Supplies)",   $selectedTransportation)) echo ' checked'; ?>>
            <!-- Add more checkboxes for other transportation options here -->
        </fieldset>

      <fieldset>
    <legend>Communication and Information</legend>
    <label for="radios">Radios and Communication Devices</label>
    <input type="checkbox" id="radios" name="communication[]" value="Radios and Communication Devices" <?php if (in_array("Radios and Communication Devices", $selectedCommunication)) echo ' checked'; ?>>

    <label for="hotlines">Emergency Hotlines and Call Centers</label>
    <input type="checkbox" id="hotlines" name="communication[]" value="Emergency Hotlines and Call Centers" <?php if (in_array("Emergency Hotlines and Call Centers", $selectedCommunication)) echo ' checked'; ?>>

    <label for="infoTools">Information Dissemination Tools</label>
    <input type="checkbox" id="infoTools" name="communication[]" value="Information Dissemination Tools" <?php if (in_array("Information Dissemination Tools", $selectedCommunication)) echo ' checked'; ?>>

    <label for="dataCollection">Data Collection and Reporting Systems</label>
    <input type="checkbox" id="dataCollection" name="communication[]" value="Data Collection and Reporting Systems" <?php if (in_array("Data Collection and Reporting Systems", $selectedCommunication)) echo ' checked'; ?>>
    <!-- Add more checkboxes for other communication and information options here -->
</fieldset>

<fieldset>
    <legend>Logistics and Supplies</legend>
    <label for="foodWater">Food and Water Supplies</label>
    <input type="checkbox" id="foodWater" name="logistics[]" value="Food and Water Supplies" <?php if (in_array("Food and Water Supplies", $selectedLogistics)) echo ' checked'; ?>>

    <label for="shelterTents">Shelter and Tents (for Displaced Populations)</label>
    <input type="checkbox" id="shelterTents" name="logistics[]" value="Shelter and Tents (for Displaced Populations)" <?php if (in_array("Shelter and Tents (for Displaced Populations)", $selectedLogistics)) echo ' checked'; ?>>

    <label for="generators">Generators and Power Sources</label>
    <input type="checkbox" id="generators" name="logistics[]" value="Generators and Power Sources" <?php if (in_array("Generators and Power Sources", $selectedLogistics)) echo ' checked'; ?>>

    <label for="clothingBlankets">Clothing and Blankets</label>
    <input type="checkbox" id="clothingBlankets" name="logistics[]" value="Clothing and Blankets" <?php if (in_array("Clothing and Blankets", $selectedLogistics)) echo ' checked'; ?>>

    <label for="hygieneKits">Hygiene Kits</label>
    <input type="checkbox" id="hygieneKits" name="logistics[]" value="Hygiene Kits" <?php if (in_array("Hygiene Kits", $selectedLogistics)) echo ' checked'; ?>>
    <!-- Add more checkboxes for other logistics and supplies options here -->
</fieldset>

<fieldset>
    <legend>Safety and Security</legend>
    <label for="policeSecurity">Police and Security Personnel</label>
    <input type="checkbox" id="policeSecurity" name="safetySecurity[]" value="Police and Security Personnel" <?php if (in_array("Police and Security Personnel", $selectedSafetySecurity)) echo ' checked'; ?>>

    <label for="barricades">Barricades and Crowd Control Equipment</label>
    <input type="checkbox" id="barricades" name="safetySecurity[]" value="Barricades and Crowd Control Equipment" <?php if (in_array("Barricades and Crowd Control Equipment", $selectedSafetySecurity)) echo ' checked'; ?>>

    <label for="searchRescue">Search and Rescue Teams</label>
    <input type="checkbox" id="searchRescue" name="safetySecurity[]" value="Search and Rescue Teams" <?php if (in_array("Search and Rescue Teams", $selectedSafetySecurity)) echo ' checked'; ?>>

    <label for="firefighters">Firefighters and Equipment</label>
    <input type="checkbox" id="firefighters" name="safetySecurity[]" value="Firefighters and Equipment" <?php if (in_array("Firefighters and Equipment", $selectedSafetySecurity)) echo ' checked'; ?>>
    <!-- Add more checkboxes for other safety and security options here -->
</fieldset>

<fieldset>
    <legend>Technical and Technology Resources</legend>
    <label for="computers">Computers and IT Equipment</label>
    <input type="checkbox" id="computers" name="technologyResources[]" value="Computers and IT Equipment" <?php if (in_array("Computers and IT Equipment", $selectedTechnologyResources)) echo ' checked'; ?>>

    <label for="gis">GIS (Geographic Information System) for Mapping and Coordination</label>
    <input type="checkbox" id="gis" name="technologyResources[]" value="GIS (Geographic Information System) for Mapping and Coordination" <?php if (in_array("GIS (Geographic Information System) for Mapping and Coordination", $selectedTechnologyResources)) echo ' checked'; ?>>

    <label for="drones">Drones and Aerial Surveillance (for Assessing and Monitoring Situations)</label>
    <input type="checkbox" id="drones" name="technologyResources[]" value="Drones and Aerial Surveillance (for Assessing and Monitoring Situations)" <?php if (in_array("Drones and Aerial Surveillance (for Assessing and Monitoring Situations)", $selectedTechnologyResources)) echo ' checked'; ?>>
    <!-- Add more checkboxes for other technical and technology resources here -->
</fieldset>


        <!-- Add more fieldsets for other equipment categories here -->

        <button type="submit">Submit</button>
    </form>
</body>
</html>
