<?php
session_start();
require_once 'variables.php';
require_once 'get_record_info.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Assignment!</title>
   <?php echo '<link rel="stylesheet" href="css/styles.css">' ?>
   <?php echo '<link rel="stylesheet" href="css/normalize_reset.css">' ?>

</head>

<body>

   <header>
      <h1><?php echo FIRSTNAME . ' ' . LASTNAME ?></h1>
      <p><?php echo 'PHP Site' ?></p>
      <nav>
         <ul>
            <li><a href="table.php">Home</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About</a></li>
         </ul>
      </nav>
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

      <form action="update_record_process.php" method="post">

         <?php echo getRecordInfo() ?>

         <fieldset>

            <legend>New Record Information</legend>

            <label for="studentID">Student ID</label>
            <input type="text" name="studentID" id="studentID">

            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname">

            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname">

            <input type="submit" value="login">

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