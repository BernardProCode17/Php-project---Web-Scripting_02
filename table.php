<?php
session_start();
require_once 'variables.php';
require_once 'table_display.php';

// if(isset($_SESSION['message']) && !empty( $_SESSION['message'] )){
//    $messages = $_SESSION['message'];
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Assignment!</title>
   <?php echo '<link rel="stylesheet" href="css/styles.css">' ?>
   <?php echo '<link rel="stylesheet" href="css/normalize_reset.css">' ?>
   <link rel="stylesheet" href="css/table.css">
</head>

<body>

   <header>
      <h1><?php echo FIRSTNAME . ' ' . LASTNAME ?></h1>
      <p><?php echo 'Student Administraion Portal' ?></p>
      <nav>
         <ul>
            <li><a href="table.php">Home</a></li>
            <li><a href="add_student.php">Add Student</a></li>
            <li><a href="update_record.php">Update</a></li>
            <!-- <li><a href="delete_record.php">Remove</a></li> -->
            <li><a href="logout.php">Log Out</a></li>
         </ul>
      </nav>
   </header>

   <main>

      <section>
         <h2>Hello There, <?php echo $_SESSION['username'] ?></h2>
         <p>Welcome back to your admin dashboard</p>
      </section>

      <section>

         <?php 
         if(isset($_SESSION['message'])){
            foreach ($_SESSION['message'] as $message) {
               echo ''. $message .'';
            }
            unset($_SESSION['message']);
         }
         ?>
     

         <a href="add_student.php">Add New Student</a>
         <?php echo tableDisplay() ?>
      </section>

   </main>

   <footer>

      <h3>Bernard Clarke</h3>

      <section class="footer-tags">
         <p>PHP SQL</p>
         <p>FWD 35</p>
         <p id="year">2023</p>
      </section>

   </footer>

</body>

</html>