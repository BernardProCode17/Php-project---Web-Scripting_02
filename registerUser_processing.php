<?php
require_once 'dbinfo.php';
$Registered_userName = '';
$Registered_password = '';
$registaration_message = array();

if (isset($_POST['register-username']) && isset($_POST['register-password'])) {
   if (!empty($_POST['register-username']) && !empty($_POST['register-password'])) {
      $Registered_userName = trim(ucwords($_POST['register-username']));
      $Registered_password = trim(ucwords($_POST['register-password']));

      // SQL connection
      $SQL = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      if ($SQL->connect_error) {
         echo 'Failed to connect to MySQL: ' . $SQL->connect_error;
         exit();
      }

      //SQL statment and Injection Protection
      $register_SQL = $SQL->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
      $register_SQL->bind_param("ss", $Registered_userName, $Register_password);
      $register_SQL->execute();

      // Check if the user was successful register display the message and redirect after a timeout
      // else display user alread registerd
      //redirect to the log in page





   } else {
      $registaration_message[] = "<p>Please enter your username and password</p>";
   }
} else {
   $registaration_message[] = "<p>Please enter your username and password</p>";
}
