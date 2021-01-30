
<?php
    include 'includes/header.php';
    session_start();
    session_destroy();
?>
<head>
    <title>Herbland  | Userlogin</title>
    </head>

<body>
    <section class="userLogin">
       <div class="userLoginContainer">
           <div class="comlogo">
               <h3>Herbland</h3>
               <p>#Gogreen</p>
           </div>
           <div class="userInputs">
            <h4>User Login</h4>
                   <form method="POST" action="#">
                       <p>Email Address</p>
                       <input type="email" name="Usremail" required>
                       <p>Password</p>
                       <input type="password" name="Usrpassword" required>
                       <br>
                       <button name="user_submit" type="submit">Login</button>
                       <h4>Or</h4>                     
                   </form>
                   <button name="register_user" type="submit" onClick = "location.href = 'register.php'" >Create a Account</button>             
           </div>
       </div>
    </section>
</body>

<?php
    include_once "includes/db.php";
    login();
?>