<?php
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/navbar.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
 
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/Tez_website/css/Main.css">
   <!--<link rel="icon" href="/Tez_website/img/TEZ.png" type="icon">-->
    <title>TEZ</title>
    <style>


body {
    font-family: Arial, sans-serif;
  color: white;
  
}


.features {
    display: flex;
    justify-content: space-around;
    align-items: center;
    background-color: #14404D; 
    color: white;
    padding: 50px 0;
}

.feature {
    text-align: center;
    max-width: 300px;
    border: 6px solid;
    border-color:#14404D;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* You can adjust the shadow values as needed */
}


.feature i {
    font-size: 2rem;
    color: #3498db;
}

.feature h2 {
    margin-top: 10px;
    font-size: 1.5rem;
}

.cta {
    text-align: center;
    color:white;
    padding:30px;
}

.cta h2 {
    font-size: 2rem;
    color:white;
}



footer {
    min-height: 20vh;
    background-color: #0f2a33;
    color: #b4e70cef;
    padding: 40px 0;
    margin-top:0px;
    font-family: 'Ubuntu', sans-serif;
  }


/* Add a hover effect */
button:hover{
    background-color: lightblue; /* Change to a different shade on hover */
    /* Add other styles for the hover effect */
}
.about{
    color:rgb(7, 6, 6);
    opacity: 1;
    font-size: 13px;
    font-weight: bold;
    width:600px;
   padding-top: 20%;
}

</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
 <script src="https://kit.fontawesome.com/577ad20906.js" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

 <style>
   body {
 background-color: #14404D;
 overflow-x:hidden;
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


.committeeBanner-container1 {
    display: flex;
    align-items: center;
    justify-content: left;
    position: relative;
    z-index: 999;
}

.logo{
    width: 150px;
    font-size: 80px;
}
.logo001{
    width: 150px;
    font-size: 50px;
}

.committeeBanner-container1 h1 {
    color: white;
    font-size: 1.5rem;
}

.committeeBanner-container1 .line2 {
    margin: 20px;
    width: 4px;
    background-color: white;
    height: 50px;
}



.who-are-we {
    color: white;
    padding: 50px; /* Add padding for spacing */
    text-align: center; /* Center-align the content */
}

.who-are-we h2 {
    font-size: 2rem; /* Adjust the font size */
    color: #b4e70cef;
}

.who-are-we p {
    font-size: 1.2rem; /* Adjust the font size */
}


.logo005{
    color: #b4e70cef;
    font-size: 50px;
}

</style>


<style>
    .us-con{
    height: 140vh;
    width: 100vw;
  
    padding: 1%;
    
    
}
.un-con-head{
    height: 130vh;
    border-radius: 100px;
    padding: 3%;
    color:#A1CE13;
   background-color: #14404D;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.us-card-con{
    
    height: 100%;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    

}

.us-head{
    margin-bottom: 50px;
    font-size: 40px;
    width: 900px;
   
 
}
.bottomMenu {
    padding: 1%;
    border-radius: 20px;
    
background-color: white;
    bottom: 0;
    color: white;
    width: 30%;
    height: 45%;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    


    z-index: 1;
    transition: all 1s;
    transform-origin: left;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.hide {
    opacity:0;
    
}
.show {
    opacity:1;
  
}

.card-icon{
    display: flex;
    justify-content: center;
  
    color: black;
    height: 100px;
    width: 100%;
    background-position: center;
    object-fit: cover;
  
}
.card-heading{
    color: black;
    text-align: center;
    font-family: Verdana, sans-serif;
    font-size: 25px;
}
.card-sub-heading{
    font-family: Verdana, sans-serif;
    color:  black;
}
</style>

</head>
<body>

    <!-- contact section  -->
    <section class="home" id="home">
        <div class="max-width">
          <div class="home-content">
            <div class="committeeBanner-container1">
              <span class="logo">Tez</span>
              <div class="line2"></div>
              <h1>Resque Agency Ainder</h1>
            </div>
            <div class="text-2">Connect with <span> Us.</span> <br /></div>
            <div class="text-3">
              Questions/information about the MUN:
              <a href="#">support@Tez.in</a>
            </div>
          </div>
          <div class="colored-cover"></div>
        </div>
      </section>

      
<section class="who-are-we">
    <h2>Who Are We?</h2>
    <p>We are a dedicated team of professionals passionate about making a positive impact on our community. Our mission is to...</p>
    <p>At TEZ, we believe in...</p>
    <!-- Add more content as needed -->
</section>

      

    <section class="features">
        <div class="feature">
            <i class="fas fa-search"></i>
            <h2>Find Nearby Rescue Agencies</h2>
            <p>Quickly locate and connect with rescue agencies in your area.</p>
        </div>
        <div class="feature">
            <i class="fas fa-phone"></i>
            <h2>Emergency Contact</h2>
            <p>Get immediate assistance by contacting emergency services.</p>
        </div>
        <div class="feature">
            <i class="fas fa-hands-helping"></i>
            <h2>Assistance and Support</h2>
            <p>We're here to assist you and provide support during emergencies.</p>
        </div>
    </section>
    
    <!--hskdhakfhkshkhfs-->
  
    <div class="us-con">
        <div class="un-con-head">
            <h2 class="us-head">FUTURE INTEGRATIONS</h2>
            <div class="us-card-con">
                <div class="bottomMenu">
                    <div class="card-icon">
                        <img src="https://cdn-icons-png.flaticon.com/128/833/833602.png?ga=GA1.1.204779796.1694254544&track=ais" alt="Feature 1 Icon">
                    </div>
                    <h2 class="card-heading">Future Prediction</h2>
                    <div class="card-sub-heading">Utilize advanced algorithms and data analysis to forecast future trends and outcomes, empowering informed decision-making and strategic planning.</div>
                </div>
                <div class="bottomMenu">
                    <div class="card-icon">
                        <img src="https://cdn-icons-png.flaticon.com/128/3839/3839020.png?ga=GA1.1.204779796.1694254544&track=ais" alt="Feature 2 Icon">
                    </div>
                    <h2 class="card-heading">Filter Agency According to Requirement</h2>
                    <div class="card-sub-heading">Streamline your search by filtering agencies based on specific criteria, ensuring you find the perfect match for your needs.</div>
                </div>
                <div class="bottomMenu">
                    <div class="card-icon">
                        <img src="https://cdn-icons-png.flaticon.com/128/126/126341.png?ga=GA1.1.204779796.1694254544&track=ais" alt="Feature 3 Icon">
                    </div>
                    <h2 class="card-heading">Audio Message</h2>
                    <div class="card-sub-heading">Enhance communication with the convenience of sending and receiving voice messages, fostering more engaging and efficient conversations.</div>
                </div>
                <div class="bottomMenu">
                    <div class="card-icon">
                        <img src="https://cdn-icons-png.flaticon.com/128/1280/1280017.png?ga=GA1.1.204779796.1694254544&track=ais" alt="Feature 4 Icon">
                    </div>
                    <h2 class="card-heading">Chat Box</h2>
                    <div class="card-sub-heading">Improve user interaction and support by integrating a chatbox, allowing real-time communication and assistance.</div>
                </div>
                <div class="bottomMenu">
                    <div class="card-icon">
                        <img src="https://cdn-icons-png.flaticon.com/128/447/447031.png?ga=GA1.1.204779796.1694254544&track=ais" alt="Feature 5 Icon">
                    </div>
                    <h2 class="card-heading">Provide Shortest Path on Map</h2>
                    <div class="card-sub-heading">Optimize navigation by displaying the shortest route on a map, saving time and resources for efficient travel and logistics planning.</div>
                </div>
            </div>
        </div>
    </div>
   

    <!--hskdhakfhkshkhfs-->
    

    <section class="cta">
        <h2>Ready to save lives ?</h2>
        <p>register with  us now for immediate assistance.</p>
        <a href="#" class="registerBtn btn-2 hover-slide-right">register</a>
    </section>

    <!-- <footer>
        <p>&copy; 2023 Rescue Agency Finder</p>
    </footer> -->
    <footer>
        <div class="footer-container1">
            <div class="container1-i1">
                <span class="logo001">Tez</span>

                <div class="line1"></div>
                <h1>Rescue Agency Finder</h1>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, omnis eos aperiam eius dicta ea libero nostrum illo! Fugiat, officia!</p> 
            <button class="registerBtn btn-2 hover-slide-right">
                <span>CONTACT US</span>
            </button>          
            <p>&copy;Tez.in 2023 All rights rererved</p>
        </div>
    

        <div class="footer-container2">
            
        </div>
    </footer>
    
    
    <!--jhkhsakdkjahd-->
    <script>
        // JavaScript code for handling scroll behavior
document.addEventListener('DOMContentLoaded', function () {
    const usCardCon = document.querySelector('.us-card-con');
    const bottomMenus = document.querySelectorAll('.bottomMenu');
    
    function handleScroll() {
        const y = window.scrollY;
        if (y >= 900) {
            bottomMenus.forEach(menu => {
                menu.classList.add('show');
                menu.classList.remove('hide');
            });
        } else {
            bottomMenus.forEach(menu => {
                menu.classList.add('hide');
                menu.classList.remove('show');
            });
        }
    }
    
    window.addEventListener('scroll', handleScroll);
});
    </script>
  
</body>
</html>
