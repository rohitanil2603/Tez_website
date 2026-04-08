<?php
session_start();
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);


  $agency_id_of_msg_sender =  $_SESSION['USER_ID'];
$agency_id_of_msg_reciever = $_GET['agcy'];

if (!$agency_id_of_msg_reciever) {
    echo "<h1>Sorry! but currently our server is facing high traffic.</h1>";
    exit; // Exit the script to prevent further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (your existing head content) ... -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" >
<style>
  body {
    background-color:black;
    color: white;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  
  .chat-box-container {
    display: flex;
    flex-direction: column;
    height: 90vh; /* Set 90% of the viewport height */
    overflow-y: auto; /* Enable vertical scroll if content exceeds container height */
    margin-top: 1%; /* Set top margin to 1% */
  }
  .email{
      color:skyblue;
  }
  .chat-box {
      overflow:scroll;
    background-color:black;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
  }
  
  .message {
    margin-bottom: 15px;
    color:white;
  }
  .username001 {
    font-weight: bold;
    color: #3498db;
    margin-bottom: 5px;
  }

  .send-message {
    margin-top: 5px;
    display: flex;
    align-items: center;
  }
  
  #message-input {
    flex-grow: 1;
    width: 260px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  #send-button {
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 15px;
    margin-left: 10px;
    cursor: pointer;
  }
 
</style>
</head>
<body>
<div class="chat-box-container">
    <div class="chat-box" id="chat-box">
    </div>
    <div class="send-message">
      <form id="message-form">
    <input type="hidden" name="agcy" value="<?php echo htmlspecialchars($agency_id_of_msg_reciever); ?>">
    <input type="hidden" name="agency_id_of_msg_sender" value="<?php echo htmlspecialchars( $agency_id_of_msg_sender); ?>">
    <input type="text" id="message-input" placeholder="Type your message">
    <button id="send-button" type="submit" onclick="sendMessage()">
        <i class="fas fa-paper-plane"></i>
    </button>
</form>


<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
// function to scroll chat at bottom 
function scrollChatToBottom() {
    const chatBoxContainer = document.getElementById("chat-box");
    chatBoxContainer.scrollTop = chatBoxContainer.scrollHeight;
}

// to scroll chat to bottom when page load
window.onload = function() {
   scrollChatToBottom();
};

// function to send message

function sendMessage() {
  var message = $('#message-input').val();
  var agencyId = $('[name="agcy"]').val();
  var  agency_id_of_msg_sender = $('[name="agency_id_of_msg_sender"]').val();

    
    
    
    if(message != ''){
        console.log(message);
    $.ajax({
        type: 'POST',
        url: '/Tez_website/php/sendMsgScript.php',
        data: { message: message, agencyId: agencyId, agency_id_of_msg_sender:agency_id_of_msg_sender, },
        success: function(response) {
            console.log('Message sent successfully');
        },
        error: function(xhr, status, error) {
            console.error('Error sending message:', error);
        }
    });

    $('#message-input').val('');
}

$('#message-form').submit(function(event) {
    event.preventDefault();
    sendMessage();
});


}
// function to fetch and display message
function fetchMessages() {
    const agencyId = "<?php echo $agency_id_of_msg_reciever; ?>";

    $.ajax({
        type: 'GET',
        url: '/Tez_website/php/fetchMessages.php',
        data: { agencyId: agencyId },
        success: function(response) {
            // Display the fetched messages in the chat box
            $('#chat-box').html(response);
             scrollChatToBottom();
        },
        error: function(xhr, status, error) {
            console.error('Error fetching messages:', error);
        }
    });
}

// Call fetchMessages every second
setInterval(fetchMessages, 1000);
 scrollChatToBottom();
</script>

</body>
</html>
