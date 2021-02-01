<head>
  <title>Herbland | Create Account</title>
</head>
<?php
    include 'includes/header.php';
    include 'includes/nav.php';
?>

<body>
  <section class="registerUser">
  <div class = 'container'>
      <form action="#" method="POST">
      <p>First Name</p>
      <input type="text" name="firstName" required />
      <p>Last Name</p>
      <input type="text" name="lastName" required />
      <p>Email Address</p>
      <input type="email" name="userEmail" required />
      <p>Password</p>
      <input type="password" name="userPassword" required />
      <p>Re-Enter Password</p>
      <input type="password" name="rePassword" required /><br />

      <button name="userRegister" type="submit">Register</button>
    </form>
    </div>
  </section>
</body>

<?php
    include_once 'includes/db.php';
    createUser();   

    ?>
