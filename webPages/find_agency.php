<?php
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/php/Tez_DB_connection_script.php');
require('/home/u703275089/domains/vintagclothing.in/public_html/Tez_website/navbar.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <title>Range in Kilometers</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-image: url('https://images.pond5.com/satellite-scan-and-monitor-earth-footage-085439855_prevstill.jpeg');
    /*background-image: url('https://wallpapercave.com/wp/wp3493593.jpg');*/
    background-repeat: no-repeat;
    background-size: cover; /* This ensures the image covers the entire viewport */
    width: 100%;
    margin: 0;
    padding: 0;
    justify-content: center;
    align-items: center;
    /*height: 100vh;*/
    object-fit:contain;
}



         #range-form {
            padding: 20px;
            margin-top: 50px;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* Added dark shadow */
            text-align: center;
        
          
        }
           form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            background-color: rgba(0, 0, 0, 0.5);
        }
            fieldset {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }


        label {
            font-weight: bold;
        }

        input[type="number"] {
            background-color:black;
            color:#f0f0f0;
            padding: 8px;
            width: 90%;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-top: 5px;
        }

        #result {
            margin-top: 20px;
            font-weight: bold;
        }
    

     .seven{
         text-align: center;
        font-size:30px; font-weight:400;letter-spacing:1px;
        text-transform: uppercase;
        display: grid;
        grid-template-columns: 1fr max-content 1fr;
        grid-template-rows: 27px 0;
        grid-gap: 20px;
        align-items: center;
        color: white;
      background: linear-gradient(to right, #00FF92, #3887F7, #BC45A6, #FC3667, #F67A39, #00FF92, #3887F7, #BC45A6, #FC3667, #F67A39);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-family: 'Raleway', sans-serif !important;
      background-size: 300% 300%;
      animation: gradient 12s ease infinite;
    }
    
    .seven:after,.seven:before {
        content: " ";
        display: block;
        border-bottom: 1px solid #c50000;
        border-top: 1px solid #c50000;
        height: 5px;
        background: -webkit-linear-gradient(#eee, #333);
    }
    @keyframes gradient {
  0%, 100% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
}

        form {
            background-color: rgba(0, 0, 0, 0.5);
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            color:white;
            /*background-color: #fff;*/
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        fieldset {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        legend {
            font-weight:500;
            font-size:30px;
            color:gray;
        }

        label {
            display: block;
            font-weight:200;
            font-size:19px;
            margin-bottom: 5px;
        }
        input{
             background-color:black;
            color:#f0f0f0;
            padding: 8px;
            width: 90%;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-top: 5px;
        }

        input[type="checkbox"] {
             background-color:black;
             color:black;
            margin-right: 5px;
        }

    
    /* CSS */
    .button-33{
      background-color: #c2fbd7;
      border-radius: 100px;
      box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 187, 99, .15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(44, 187, 99, .15) 0 16px 32px;
      color: green;
      cursor: pointer;
      display: inline-block;
      font-family: CerebriSans-Regular,-apple-system,system-ui,Roboto,sans-serif;
      padding: 8px 15px;
      text-align: center;
      text-decoration: none;
      transition: all 250ms;
      border: 0;
      font-size: 16px;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
    }
    
    .button-33:hover {
      box-shadow: rgba(44,187,99,.35) 0 -25px 18px -14px inset,rgba(44,187,99,.25) 0 1px 2px,rgba(44,187,99,.25) 0 2px 4px,rgba(44,187,99,.25) 0 4px 8px,rgba(44,187,99,.25) 0 8px 16px,rgba(44,187,99,.25) 0 16px 32px;
      transform: scale(1.05) rotate(-1deg);
    }

    
    /* CSS */
    .button-85 {
        margin-top:3px;
      padding: 0.4em 0.8em;
      border: none;
      outline: none;
      color: rgb(255, 255, 255);
      background: #111;
      cursor: pointer;
      position: relative;
      z-index: 0;
      border-radius: 10px;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
    }
    
    .button-85:before {
      content: "";
      background: linear-gradient(
        45deg,
        #ff0000,
        #ff7300,
        #fffb00,
        #48ff00,
        #00ffd5,
        #002bff,
        #7a00ff,
        #ff00c8,
        #ff0000
      );
      position: absolute;
      top: -2px;
      left: -2px;
      background-size: 400%;
      z-index: -1;
      filter: blur(5px);
      -webkit-filter: blur(5px);
      width: calc(100% + 4px);
      height: calc(100% + 4px);
      animation: glowing-button-85 20s linear infinite;
      transition: opacity 0.3s ease-in-out;
      border-radius: 10px;
    }
    
    @keyframes glowing-button-85 {
      0% {
        background-position: 0 0;
      }
      50% {
        background-position: 400% 0;
      }
      100% {
        background-position: 0 0;
      }
    }
    
    .button-85:after {
      z-index: -1;
      content: "";
      position: absolute;
      width: 100%;
      height: 100%;
      background: #222;
      left: 0;
      top: 0;
      border-radius: 10px;
    }
              
    </style>
</head>
<body>
    <div id="range-form">
        <h1 class="seven">Find Nearby Agencies</h1>
        <form id="distance-form" method="post" action="/Tez_website/webPages/display_nearby_agency.php">
            
             <fieldset>
            <label for="range">Enter Range (in km):</label>
             <div class="distance">
            <input type="number" id="range" name="range" placeholder="Enter range in kilometers" required> 
                            <label for="locationInfo">Location Information:</label>
                <input type="text" id="userLocation" name="userLocation" placeholder="Enter your location" required>
                <button type="button" onclick="getUserLocation()" class="button-85">Use My Location</button> <br>
                
            <input type="submit" value="find agency" class="button-33">
            </div>
         
            </fieldset>
            
              <fieldset>
            <legend>Medical Supplies</legend>
            <label for="medicines">Medicines and Pharmaceuticals</label>
            <input type="checkbox" id="medicines" name="medicalSupplies[]" value="Medicines and Pharmaceuticals">

            <label for="firstAidKits">First Aid Kits</label>
            <input type="checkbox" id="firstAidKits" name="medicalSupplies[]" value="First Aid Kits">

            <label for="ppe">Personal Protective Equipment (PPE)</label>
            <input type="checkbox" id="ppe" name="medicalSupplies[]" value="Personal Protective Equipment (PPE)">
            <!-- Add more checkboxes for other medical supplies here -->
        </fieldset>
        
        <fieldset>
            <legend>Logistics and Supplies</legend>
            <label for="foodWater">Food and Water Supplies</label>
            <input type="checkbox" id="foodWater" name="logistics[]" value="Food and Water Supplies" >

            <label for="shelterTents">Shelter and Tents (for Displaced Populations)</label>
            <input type="checkbox" id="shelterTents" name="logistics[]" value="Shelter and Tents (for Displaced Populations)">

            <label for="generators">Generators and Power Sources</label>
            <input type="checkbox" id="generators" name="logistics[]" value="Generators and Power Sources">

            <label for="clothingBlankets">Clothing and Blankets</label>
            <input type="checkbox" id="clothingBlankets" name="logistics[]" value="Clothing and Blankets">

            <label for="hygieneKits">Hygiene Kits</label>
            <input type="checkbox" id="hygieneKits" name="logistics[]" value="Hygiene Kits">
            <!-- Add more checkboxes for other logistics and supplies options here -->
        </fieldset>

       
        </form>
        <div id="result"></div>
    </div>

    <script>
  
        
        
        
        // function to get user's location
        function getUserLocation() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLatitude = position.coords.latitude;
                    var userLongitude = position.coords.longitude;
                    var userLocation = userLatitude + "," + userLongitude;
                    document.getElementById("userLocation").value = userLocation;
                });
            } else {
                alert("Geolocation is not supported in your browser.");
            }
        }

    </script>
</body>
</html>
