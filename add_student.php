<?php
session_start();
if (!isset($_SESSION['username'])){
   header('Cache-control: no-cache, must-revalidate, max-age=0');
   header('Pragma: no-cache');
   header('Expires: Thu, 01 Jan 1970 00:00:00 GMT');
   header('Location: logout.php');
}
require_once 'variables.php';
require_once 'timeout.php';
timeout();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Student | Student Administraion Portal</title>
   <?php echo '<link rel="stylesheet" href="css/styles.css">' ?>
   <?php echo '<link rel="stylesheet" href="css/normalize_reset.css">' ?>
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
         <h2>Add Student</h2>
         <a href="table.php">Back</a>

         <?php
         if (isset($_SESSION['message'])) {
            foreach ($_SESSION['message'] as $message) {
               echo '' . $message . '';
            }
            unset($_SESSION['message']);
         }
         ?>

      </section>
      <form action="add_student_processing.php" method="post">

         <fieldset>

            <label for="student_id">Student ID</label>
            <input type="text" name="student_id" id="student_id">

            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname">

            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname">

            <input type="submit" value="Add Student">

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