<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');
session_start();
$agency_id_of_inventory= $_SESSION['USER_ID'];



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize empty arrays for each category
    $medicalSupplies = [];
    $hospitalFacilities = [];
    $personnel = [];
    $transportation = [];
    $communication = [];
    $logistics = [];
    $safetySecurity = [];
    $technologyResources = [];

    // Check if each category is set in the form data and add selected options to the respective arrays
    if (isset($_POST["medicalSupplies"])) {
        $medicalSupplies = $_POST["medicalSupplies"];
    }
    if (isset($_POST["hospitalFacilities"])) {
        $hospitalFacilities = $_POST["hospitalFacilities"];
    }
    if (isset($_POST["personnel"])) {
        $personnel = $_POST["personnel"];
    }
    if (isset($_POST["transportation"])) {
        $transportation = $_POST["transportation"];
    }
    if (isset($_POST["communication"])) {
        $communication = $_POST["communication"];
    }
    if (isset($_POST["logistics"])) {
        $logistics = $_POST["logistics"];
    }
    if (isset($_POST["safetySecurity"])) {
        $safetySecurity = $_POST["safetySecurity"];
    }
    if (isset($_POST["technologyResources"])) {
        $technologyResources = $_POST["technologyResources"];
    }

    // Convert arrays to comma-separated strings
    $medicalSuppliesStr = implode(', ', $medicalSupplies);
    $hospitalFacilitiesStr = implode(', ', $hospitalFacilities);
    $personnelStr = implode(', ', $personnel);
    $transportationStr = implode(', ', $transportation);
    $communicationStr = implode(', ', $communication);
    $logisticsStr = implode(', ', $logistics);
    $safetySecurityStr = implode(', ', $safetySecurity);
    $technologyResourcesStr = implode(', ', $technologyResources);

    // Sanitize and validate the data (not shown in this example).

//update the data
   $sql = "UPDATE equipment_inventory SET 
            medical_supplies = '$medicalSuppliesStr',
            hospital_facilities = '$hospitalFacilitiesStr',
            personnel = '$personnelStr',
            transportation = '$transportationStr',
            communication = '$communicationStr',
            logistics = '$logisticsStr',
            safety_security = '$safetySecurityStr',
            technology_resources = '$technologyResourcesStr'
        WHERE agency_id_of_inventory = $agency_id_of_inventory";


    if (mysqli_query($Conn, $sql)) {
        
        header('location: /Tez_website/webPages/find_agency.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($Conn);
}
?>
