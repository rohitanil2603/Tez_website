<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');
session_start();
$id_of_alert_sent_to = $_SESSION['USER_ID'];
$email_id_of_alert_sent_to = $_SESSION['userName'];

// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "Missing 'id' parameter in the URL";
    exit; // Exit if 'id' is missing
}

// Check if other parameters are set in the URL
if (isset($_GET['userLocation'])) {
    $userLocation = $_GET['userLocation'];
} else {
    echo "Missing 'userLocation' parameter in the URL";
    exit; // Exit if 'userLocation' is missing
}

if (isset($_GET['medicalSupplies'])) {
    $medicalSupplies = $_GET['medicalSupplies'];
} 

if (isset($_GET['logistics'])) {
    $logistics = $_GET['logistics'];
} 

// Sanitize and validate user input here if needed

$googleMapsLink = "https://maps.google.com/maps?q=$userLocation";

    // Prepare Email
    $to = $email_id_of_alert_sent_to;
    $subject = 'Alert from Tez';
    $message = "<html><body>";
    $message .= "<h2>Alert Details:</h2>";
    $message .= "<p><strong>ID:</strong> $id</p>";
    $message .= "<a href='" . $googleMapsLink . "' target='_blank'>Open location</a>";
    if(isset($medicalSupplies)){
         $message .= "<p><strong>Medical Supplies:</strong>";  if(isset($medicalSupplies)){echo $medicalSupplies."</p>";}
    }
    if(isset($logistics)){
         $message .= "<p><strong>Logistics:</strong>";  if(isset( $logistics)){echo  $logistics."</p>";}
    }
$message .= "</body></html>";

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: alert@Tez.com' . "\r\n" .
        'Reply-To: alert@Tez.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

// Store alert data in the database
$sql_to_store_alert_in_Db = "INSERT INTO alert_data (user_location, medical_supplies, logistics, id_of_alert_sent_to)
                            VALUES ('$userLocation', " . (isset($medicalSupplies) ? "'" . $medicalSupplies . "'" : "NULL") . ", " . (isset($logistics) ? "'" . $logistics . "'" : "NULL") . ", $id);";

                            
        
        $result_of_sql_to_store_alert_in_Db= mysqli_query($Conn,$sql_to_store_alert_in_Db);
        
        if($result_of_sql_to_store_alert_in_Db){
            
             if (mail($to, $subject, $message, $headers)) {
                    echo '<script>alert("Alert sent successfully "); window.location.href = "/Tez_website/webPages/find_agency.php";</script>';
                    } else {
                        echo '<script>alert("Failed to send Alert "); window.location.href = "/Tez_website/webPages/find_agency.php";</script>';
                    }
    }
    else {
        echo "Error: " . mysqli_error($Conn); // Print MySQL error message
    }
    
    
?>


