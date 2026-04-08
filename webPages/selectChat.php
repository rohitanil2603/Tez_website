<?php
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/navbar.php');
// current loggen in id
$AGENCY_ID= $_SESSION['USER_ID'];

$sql_876= "select * from `RescueAgency` where agency_id_of_agency != $AGENCY_ID ";

$result_sql_876= mysqli_query($Conn,$sql_876);



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Course Selection</title>

<style>
body {
  font-family: Arial, sans-serif;
  background-color:gray;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.course-list {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.course-item {
  background-color:#333333; /* Changed color to dark gray */
  color:white;
  width:400px;
  text-align:center;
  padding: 10px 60px; /* Doubled the width */
  margin: 10px;
  border-radius: 5px;
  text-decoration: none;
  transition: background-color 0.3s ease;
}

.course-item:hover {
  background-color: #f0f0f0; /* Darker color on hover */
  color:gray;
}
    
</style>

</head>
<body>
    
  <div class="course-list">
       <h1>Select Agency you want to chat with.</h1>
      
      <?php
        while($row= mysqli_fetch_assoc($result_sql_876)){
            
            echo' <a href="chatBox.php?agcy='.$row["agency_id_of_agency"].'" class="course-item">'.$row["agencyName"].'</a>';
        }
      
      
      ?>

  </div>
</body>
</html>
