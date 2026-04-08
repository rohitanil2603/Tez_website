<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include your database connection file
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');
session_start();


// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get the agency ID from the GET request
    $agency_id_of_msg_receiver = $_GET['agencyId'];

    // Check if the user is authenticated (adjust this logic based on your authentication method)
    $user_Id = $_SESSION['USER_ID'];

    // Prepare the SQL query to fetch messages
    $sql = "SELECT chatData.*, receiver.email AS receiver_email, sender.email AS sender_email
            FROM chatData
            JOIN agencies AS receiver ON chatData.agency_id_of_msg_reciever = receiver.agency_id
            JOIN agencies AS sender ON chatData.agency_id_of_msg_sender = sender.agency_id
            WHERE (chatData.agency_id_of_msg_reciever = '$agency_id_of_msg_receiver'
              AND chatData.agency_id_of_msg_sender = '$user_Id')
              OR (chatData.agency_id_of_msg_reciever = '$user_Id'
              AND chatData.agency_id_of_msg_sender = '$agency_id_of_msg_receiver')
            ORDER BY chatData.timestamp ASC;
            ";

    // Perform the database query
    $result = mysqli_query($Conn, $sql);

    if ($result) {
        // Initialize an empty string to store the HTML for messages
        $messagesHtml = '';

        // Fetch and format messages
        while ($row = mysqli_fetch_assoc($result)) {
            $timestamp = $row['timestamp'];
            $message = $row['message'];
            $sender_email = $row['sender_email'];

            // Create HTML for each message
            $messageHtml = "<div class='message'>";
            // $messageHtml .= "<span class='timestamp'>$timestamp</span>";
            $messageHtml .= "<span class='email'>$sender_email</span>";
            $messageHtml .= "<p class='message-text'>$message</p>";
            $messageHtml .= "</div>";

            // Append the message HTML to the messagesHtml string
            $messagesHtml .= $messageHtml;
        }

        // Output the messages HTML
        echo $messagesHtml;
    } else {
        // Query execution failed
        echo "Error: " . mysqli_error($Conn);
    }

    // Close the database connection
    mysqli_close($Conn);
} else {
    // Handle invalid request method (e.g., redirect or display an error message)
    echo "Invalid request method";
}
?>
