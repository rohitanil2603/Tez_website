<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');


function createHashedPassword($password) {
    $options = [
        'cost' => 12, // You can adjust the cost factor as needed
    ];

    return password_hash($password, PASSWORD_BCRYPT, $options);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $USERNAME = $_POST['username'];
        $PLAIN_PASSWORD = $_POST['password'];

        // Perform data validation here (e.g., check username and password length, format)

        $HASHED_Password = createHashedPassword($PLAIN_PASSWORD);

        // Use prepared statements with parameter binding to prevent SQL injection
        $SQL_1 = "SELECT * FROM `agencies` WHERE `email`= ?";
        $stmt1 = mysqli_prepare($Conn, $SQL_1);

        if (!$stmt1) {
            die('Statement 1 preparation failed: ' . mysqli_error($Conn));
        }

        mysqli_stmt_bind_param($stmt1, "s", $USERNAME);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_store_result($stmt1);

        if (mysqli_stmt_num_rows($stmt1) > 0) {
            // Set the error message
            $error_message = "You already have an account with this email.";

            // Redirect to the login form page with the error parameter in the URL
            $query_params = http_build_query(array('error' => $error_message));
            header("Location: /Tez_website/forms/Sign_Up_from.php?$query_params");
            exit;
        } else {
            $SQL_2 = "INSERT INTO `agencies` (`email`, `password`, `Date_Time`) VALUES (?, ?, NOW())";
            $stmt2 = mysqli_prepare($Conn, $SQL_2);

            if (!$stmt2) {
                die('Statement 2 preparation failed: ' . mysqli_error($Conn));
            }

            mysqli_stmt_bind_param($stmt2, "ss", $USERNAME, $HASHED_Password);
            
            if (mysqli_stmt_execute($stmt2)) {
                $user_id = mysqli_insert_id($Conn); // Get the last inserted user_id
                mysqli_stmt_close($stmt2);

                // Set session variables and redirect
                session_start();
                $_SESSION['userName'] = $USERNAME;
                $_SESSION['loggedIN'] = 'yes';
                $_SESSION['USER_ID'] = $user_id; // Use the user_id obtained from the last inserted row
                   header('location: /Tez_website/webPages/find_agency.php');
                exit;
            } else {
                echo "Query not executed";
            }
        }
    }
}
?>
