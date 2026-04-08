<?php
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');

function verifyPassword($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $USERNAME = $_POST['username'];
        $LOGIN_PASSWORD = $_POST['password'];

        // Use prepared statements with parameter binding to prevent SQL injection
        $SQL_1 = "SELECT * FROM `agencies` WHERE `email`= ?";
        $stmt1 = mysqli_prepare($Conn, $SQL_1);

        if (!$stmt1) {
            die('Statement 1 preparation failed: ' . mysqli_error($Conn));
        }

        mysqli_stmt_bind_param($stmt1, "s", $USERNAME);
        mysqli_stmt_execute($stmt1);
        $result = mysqli_stmt_get_result($stmt1);

        if (mysqli_num_rows($result) < 1) {
            // Set the error message
            $error_message = "No account detected with the entered email. Please register first";

            // Redirect to the login form page with the error parameter in the URL
            $query_params = http_build_query(array('error' => $error_message));
            header("Location: /Tez_website/forms/Login_from.php?$query_params");
            exit;
        } else {
            $row = mysqli_fetch_assoc($result);

            if (verifyPassword($LOGIN_PASSWORD, $row['password'])) {
                // Password is correct
                session_start();
                $_SESSION['userName'] = $USERNAME;
                $_SESSION['loggedIN'] = 'yes';
                $_SESSION['USER_ID'] = $row['agency_id'];


                  header('location: /Tez_website/webPages/find_agency.php');
                exit;
            } else {
                // Incorrect password
                // Set the error message
                $error_message = "Incorrect password.";

                // Redirect to the login form page with the error parameter in the URL
                $query_params = http_build_query(array('error' => $error_message));
                header("Location: /Tez_website/forms/Login_from.php?$query_params");
                exit;
            }
        }
    }
}
?>
