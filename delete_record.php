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
      <a href="table.php">Back</a>
         <?php
         if (isset($_SESSION['login_error'])) {
            foreach ($_SESSION['login_error'] as $error) {
               echo '' . $error . '';
            }
         }

         ?>
      </div>
      
      <?php echo getRecordInfo() ?>

      <form action="delete_record_process.php" method="post">

         <fieldset>
            <h3>Are you sure you want to remove this record </h3>

            <?php echo isset($_SESSION['delMessage']) ? $_SESSION['delMessage'] :null; ?>

            <label for="yes">Yes</label>
            <input type="radio" name="remove_record" id="yes" value="yes">

            <label for="no">No</label>
            <input type="radio" name="remove_record" id="no" value="no">

            <input type="submit" value="Delete">

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