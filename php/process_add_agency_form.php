<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['agencyName']) && isset($_POST['phoneNumber']) && isset($_POST['emailAddress']) && isset($_POST['userLocation']) && isset($_POST['servicesProvided']) && isset($_POST['capacity']) && isset($_POST['availability']) && isset($_POST['emergencyContact']) && isset($_POST['verificationStatus']) && isset($_POST['serviceArea']) && isset($_POST['specializations'])) {
        $agency_id_of_agency= $_POST['agency_id'];
        $AGENCY_NAME = $_POST['agencyName'];
        $PHONE_NUMBER = $_POST['phoneNumber'];
        $EMAIL_ADDRESS = $_POST['emailAddress'];
        $USER_LOCATION = $_POST['userLocation']; // Use the correct column name 'locationInfo'
        $SERVICES_PROVIDED = implode(", ", $_POST['servicesProvided']);
        $CAPACITY = $_POST['capacity'];
        $AVAILABILITY = $_POST['availability'];
        $EMERGENCY_CONTACT = $_POST['emergencyContact'];
        $VERIFICATION_STATUS = $_POST['verificationStatus'];
        $SERVICE_AREA = $_POST['serviceArea'];
        $SPECIALIZATIONS = implode(", ", $_POST['specializations']);

        // Use prepared statements with parameter binding to prevent SQL injection
        $SQL_INSERT = "INSERT INTO `RescueAgency` (`agencyName`, `phoneNumber`, `emailAddress`, `locationInfo`, `servicesProvided`, `capacity`, `availability`, `emergencyContact`, `verificationStatus`, `serviceArea`, `specializations`,`agency_id_of_agency`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = mysqli_prepare($Conn, $SQL_INSERT);

        if (!$stmt) {
            die('Statement preparation failed: ' . mysqli_error($Conn));
        }

        mysqli_stmt_bind_param($stmt, "ssssssssssss", $AGENCY_NAME, $PHONE_NUMBER, $EMAIL_ADDRESS, $USER_LOCATION, $SERVICES_PROVIDED, $CAPACITY, $AVAILABILITY, $EMERGENCY_CONTACT, $VERIFICATION_STATUS, $SERVICE_AREA, $SPECIALIZATIONS, $agency_id_of_agency);

        if (mysqli_stmt_execute($stmt)) {
            // Data inserted successfully
            mysqli_stmt_close($stmt);
            // Redirect or perform further actions as needed
            header("Location: /Tez_website/Main.php");
            exit;
        } else {
            echo "Query not executed";
        }
    }
}
?>
