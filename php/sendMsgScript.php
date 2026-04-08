<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include your database connection file
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');


// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the message, agency ID of the message receiver, and agency ID of the message sender from the POST data
    print_r($_POST);
    $Message = $_POST['message'];
    $id_of_msg_reciever = $_POST['agencyId']; // Make sure to match the key used in AJAX data
    $id_of_msg_sender = $_POST['agency_id_of_msg_sender']; // Make sure to match the key used in AJAX data


    // Prepare the SQL query
    $sql_88 = "INSERT INTO `chatData` (`message`, `agency_id_of_msg_reciever`, `agency_id_of_msg_sender`, `timestamp`)
               VALUES ('$Message', '$id_of_msg_reciever', ' $id_of_msg_sender', current_timestamp())";

   if (mysqli_query($Conn, $sql_88)) {
    // Insertion was successful
    echo "Message sent successfully!";
} else {
    // Insertion failed due to a foreign key constraint violation
    if (mysqli_errno($Conn) == 1452) {
        echo "Error: Foreign key constraint violation. The agency ID may not exist in the 'agencies' table.";
      
    } else {
        echo "Error: " . mysqli_error($Conn);
    }
}


    // Close the database connection
    mysqli_close($Conn);
} else {
    // Handle invalid request method (e.g., redirect or display an error message)
    echo "Invalid request method";
}
?>
