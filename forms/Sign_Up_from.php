
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login/sign up</title>
    <link rel="stylesheet" href="/Tez_website/css/login_page.css">
   
    <style>
      body{
          background-color:#3e454b;
      }
      .container001{
          margin-left:35%;
      }
  </style>
</head>
<body>
  
<div class="container d-flex justify-content-center align-items-center">
    <div class="container001">
        <!-- form starting -->
        <form action="/Tez_website/php/process_Sign_Up_form.php" method="post" id="signupFORM" class="form_container002">
            <div>
              <label for="username" class="label001">Email:</label>
              <input type="email" id="username" name="username" class="input002">
              <?php if(isset($_GET['error'])) echo "<div class='error-msg'>".$_GET['error']."</div>"; ?>
             

            </div>
            <div>
              <label for="password" class="label001">Create Password:</label>
              <span class="password-container">
                <input type="password" id="password" name="password" class="input002">
                <span class="toggle-password" onclick="togglePasswordVisibility()">&#128065;</span>
              </span>
            </div>
            
            <input type="submit" value="register" id="submit001">
           
        </form>
    </div>
    </div>

  <!------------------------- javascript---------------------------------------------->

  <script >
     function togglePasswordVisibility() {
    const passwordInput = document.getElementById("password");
    const togglePassword = document.querySelector(".toggle-password");
  
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      togglePassword.innerHTML = "&#128065;"; // Change the eye icon to an open eye
    } else {
      passwordInput.type = "password";
      togglePassword.innerHTML = "&#128065;"; // Change the eye icon back to a closed eye
    }
  }


  document.getElementById('signupFORM').addEventListener('submit', function (event) {
    event.preventDefault();

    const email = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // Validate email format
    const emailPattern = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
    if (!email.match(emailPattern)) {
      alert("Please enter a valid email address.");
      return false;
    }

    // Validate password strength (at least 8 characters)
    if (password.length < 8) {
      alert("Password should be at least 8 characters long.");
      return false;
    }

    document.getElementById('signupFORM').submit();
  
});
  </script>

<script src="/js/signup_form.js"></script>
</body>
</html>
