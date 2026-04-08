<?php
session_start();

$agency_id_of_agency=$_SESSION['USER_ID'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rescue Agency Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        select, input[type="text"] {
            width: 90%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Rescue Agency Registration</h2>
        
 <!----------------------------------------- form end --------------------------------------------------------->
        <form id="registrationForm" method="post" action="/Tez_website/php/process_add_agency_form.php">
            <div class="form-group">
                <label for="agencyName">Name of the Agency:</label>
                <input type="text" id="agencyName" name="agencyName" required>
            </div>
            <input type="hidden" name="agency_id" value=<?php echo $agency_id_of_agency; ?> />
            
            <div class="form-group">
                <label for="contactInfo">Contact Information:</label>
              
            </div>
            
            <div class="form-group" id="phoneField">
                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number">
            </div>
            
            <div class="form-group" id="emailField">
                <label for="emailAddress">Email Address:</label>
                <input type="email" id="emailAddress" name="emailAddress" placeholder="Enter email address">
            </div>
            
            <div class="form-group">
                <label for="locationInfo">Location Information:</label>
                <input type="text" id="userLocation" name="userLocation" placeholder="Enter your location" required>
                <button type="button" onclick="getUserLocation()">Use My Location</button>
            </div>

            <div class="form-group">
                <label>Services Provided:</label><br>
                <input type="checkbox" id="fireServices" name="servicesProvided[]" value="Fire Department">
                <label for="fireServices">Fire Department</label><br>
                <input type="checkbox" id="policeServices" name="servicesProvided[]" value="Police Department">
                <label for="policeServices">Police Department</label><br>
                <input type="checkbox" id="medicalServices" name="servicesProvided[]" value="Medical Services (Hospitals, Ambulance Services)">
                <label for="medicalServices">Medical Services (Hospitals, Ambulance Services)</label><br>
                <input type="checkbox" id="searchRescueServices" name="servicesProvided[]" value="Search and Rescue Teams">
                <label for="searchRescueServices">Search and Rescue Teams</label><br>
                <input type="checkbox" id="disasterManagementServices" name="servicesProvided[]" value="Disaster Management Authorities">
                <label for="disasterManagementServices">Disaster Management Authorities</label><br>
                <input type="checkbox" id="civilDefenseServices" name="servicesProvided[]" value="Civil Defense">
                <label for="civilDefenseServices">Civil Defense</label><br>
                <input type="checkbox" id="ngoServices" name="servicesProvided[]" value="Non-Governmental Organizations (NGOs)">
                <label for="ngoServices">Non-Governmental Organizations (NGOs)</label><br>
                <input type="checkbox" id="volunteerServices" name="servicesProvided[]" value="Volunteer Organizations">
                <label for="volunteerServices">Volunteer Organizations</label><br>
                <input type="checkbox" id="transportationServices" name="servicesProvided[]" value="Transportation Services">
                <label for="transportationServices">Transportation Services</label><br>
            </div>

            <div class="form-group">
                <label for="capacity">Capacity:</label>
                <select id="capacity" name="capacity" required>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>

            <div class="form-group">
                <label for="availability">Availability:</label>
                <select id="availability" name="availability" required>
                    <option value="24/7">24/7</option>
                    <option value="specificHours">Specific Hours</option>
                </select>
            </div>

            <div class="form-group">
                <label for="emergencyContact">Emergency Contact Person:</label>
                <input type="text" id="emergencyContact" name="emergencyContact" placeholder="Enter emergency contact details" required>
            </div>

            <div class="form-group">
                <label for="verificationStatus">Verification Status:</label>
                <select id="verificationStatus" name="verificationStatus" required>
                    <option value="verified">Verified</option>
                    <option value="not_verified">Not Verified</option>
                </select>
            </div>

            <div class="form-group">
                <label for="serviceArea">Service Area:</label>
                <input type="text" id="serviceArea" name="serviceArea" placeholder="Enter service area details" required>
            </div>

            <div class="form-group">
                <label for="specializations">Specializations:</label><br>
                <input type="checkbox" id="hazardousMaterial" name="specializations[]" value="Hazardous Material Handling">
                <label for="hazardousMaterial">Hazardous Material Handling</label><br>
                <input type="checkbox" id="advancedLifeSupport" name="specializations[]" value="Advanced Life Support">
                <label for="advancedLifeSupport">Advanced Life Support</label><br>
                
            </div>




            <div class="form-group">
                <input type="submit" id="submitButton" value="submit">
            </div>
        </form>
    </div>
<!----------------------------------------- form end --------------------------------------------------------->








<!------------------------------ javascript file to handle for validation ---------------------->
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