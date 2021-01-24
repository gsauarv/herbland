
<?php
    include 'includes/header.php'
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
                       <button name="register_user" type="submit">Create a Account</button>
                   </form>             
           </div>
       </div>
    </section>
</body>

<?php
    include_once "includes/db.php";
    login();
?>