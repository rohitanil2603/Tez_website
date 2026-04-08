<?php
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');
session_start();
$agency_id_of_inventory= $_SESSION['USER_ID'];


$sql = "select * from `equipment_inventory` where `agency_id_of_inventory`= $agency_id_of_inventory;";

$result= mysqli_query($Conn,$sql);

    if(mysqli_num_rows($result)>0){
        header("location: /Tez_website/forms/Inventory_update_form.php");
    }
    else{
          header("location: /Tez_website/forms/Inventory.php");
    }







?>