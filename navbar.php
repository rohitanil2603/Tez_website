<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');
session_start();

$user_ID = isset($_SESSION['USER_ID']) ? $_SESSION['USER_ID'] : null;
    
    if($user_ID){


$sql_007= "select * from `RescueAgency` where agency_id_of_agency= $user_ID";

$result_sql_007= mysqli_query($Conn,$sql_007);


$sql_to_check_user_loggedIn= "select * from `agencies` where agency_id = '$user_ID'";

$RESULT_of_check_user_loggedIn = mysqli_query($Conn,$sql_to_check_user_loggedIn);
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="/Tez_website/img/TEZ.png" type="icon">
 
    <link rel="stylesheet" href="/Tez_website/css/Main.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/577ad20906.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

     
     <style>
         .navbar001{
                margin-top: 0px;
             background-color:transparent;
            
            }
            a.nav-link{
            color: azure;
            }
            .navbar-inner {
            background:transparent;
            }
            .logo{
            width: 150px;
            font-size: 80px;
        }
        
           #offcanvasNavbar {
         background-color: #14404D; /* Change this color to your desired dark background color */
         
        }
        .navbar001{
            margin-top: 0px;
         background-color:transparent;
        
        }
        a.nav-link{
        color: azure;
        }
        .navbar-inner {
        background:transparent;
        }
        .logo001{
        width: 150px;
        font-size: 50px;
    }
.logo005{
    color: #b4e70cef;
    font-size: 50px;
}

     </style>
     
    </head>
    <body>
    
       
        <!-- Bootstrap Offcanvas Navbar -->
        <nav class="navbar navbar-inverse navbar-dark navbar-expand-lg fixed-top">
            <div class="container-fluid navbar-inner">
         <a class="navbar-brand logo001" href="#">
        
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="offcanvas offcanvas-end F" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
           <div class="offcanvas-header">
             <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
            <span class="logo005">Tez</span>
             </h5>
             <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
           </div>
           <div class="offcanvas-body">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             
                
                 <?php 
        // Check if 'loggedIN' is set in the session
        if(isset($_SESSION['loggedIN'])){
                    echo ' <li class="nav-item">
                             <a class="nav-link" href="/Tez_website/webPages/find_agency.php">Home</a>
                           </li>
                    <li class="nav-item">
                         <a class="nav-link" href="/Tez_website/php/inventory_form_decide.php">Inventory</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link" href="/Tez_website/webPages/Alerts.php">Alerts</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link" href="/Tez_website/webPages/agencies.php">All Agencies</a>
                       </li>
                        <li class="nav-item">
                         <a class="nav-link" href="   /Tez_website/webPages/agency_map.php">Agency Map</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link" href="/Tez_website/webPages/selectChat.php">Chat</a>
                       </li>
                     ';
                     // display add you agency when user has not submitted agency details
                       if(mysqli_num_rows($result_sql_007)==0){
                           echo'  <li class="nav-item">
                         <a class="nav-link" href="/Tez_website/forms/add_agency_form.php">Add Your Agency</a>
                       </li>';
                       }
                       
                       echo'    <li class="nav-item">
                         <a class="nav-link" href="/Tez_website/php/Log_out.php">Logout</a>
                       </li>';
                 
        }
        else{
            echo'<li class="nav-item">
                 <a class="nav-link" href="/Tez_website/Main.php">Home</a>
               </li>
              <li class="nav-item">
                 <a class="nav-link" href="   /Tez_website/webPages/agency_map.php">Agency Map</a>
               </li>
            <li class="nav-item">
                 <a class="nav-link" href="/Tez_website/forms/Login_from.php">Login/Sign up</a>
               </li>';
        }
        
        // Check if 'loggedIN' is set in the session
      
        
    ?>
    

             </ul>
           </div> <!-- Missing closing </div> tag -->
         </div>
        </div>
        </nav>
        
        
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
          <script>
        $(document).ready(function(){
    $(window).scroll(function(){
        // sticky navbar on scroll script
        if(this.scrollY > 20){
            $('.navbar').addClass("sticky");
        }
        else{
            $('.navbar').removeClass("sticky");
        }
        
        // scroll-up button show/hide script
        if(this.scrollY > 500){
            $('.scroll-up-btn').addClass("show");
        }else{
            $('.scroll-up-btn').removeClass("show");
        }
    });

    // slide-up script
    $('.scroll-up-btn').click(function(){
        $('html').animate({scrollTop: 0});
        // removing smooth scroll on slide-up button click
        $('html').css("scrollBehavior", "auto");
    });

    $('.navbar .menu li a').click(function(){
        // applying again smooth scroll on menu items click
        $('html').css("scrollBehavior", "smooth");
    });

    // toggle menu/navbar script
    $('.menu-btn').click(function(){
        $('.navbar .menu').toggleClass("active");
        $('.menu-btn i').toggleClass("active");
    });

    

});

// for navbar toogle button

$(document).ready(function (){
    $('.dropdown').hover(function (){
        $(this).addClass('show');
        $(this).find('.dropdown-menu').addClass('show');
    }, function () {
        $(this).removeClass('show');
        $(this).find('.dropdown-menu').removeClass('show');
    });
});
    </script>
    </body>
        
</html>
        
