<?php
session_start();
require_once 'variables.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register | Student Adminastration Portal</title>
   <?php echo '<link rel="stylesheet" href="css/styles.css">' ?>
   <?php echo '<link rel="stylesheet" href="css/normalize_reset.css">' ?>

</head>

<body>

   <header>
      <h1><?php echo FIRSTNAME . ' ' . LASTNAME ?></h1>
      <p><?php echo 'Student Adminastration Portal' ?></p>

   </header>

   <main>

      <div>
         <?php
         if (isset($_SESSION['login_error'])) {
            foreach ($_SESSION['login_error'] as $error) {
               echo '' . $error . '';
            }
         }

         ?>
      </div>

      <form action="login.php" method="post">

         <fieldset>

            <label for="username">Enter Your Username</label>
            <input type="text" name="register-username" id="username">

            <label for="password">Enter Your Password</label>
            <input type="password" name="register-password" id="password">

            <input type="submit" value="Register">

         </fieldset>

      </form>

   </main>

</body>

<footer>
   <h3>Bernard Clarke</h3>

   <section class="footer-tags">
      <p>PHP SQL</p>
      <p>FWD 35</p>
      <p id="year">2023</p>
   </section>
</footer>

</html>