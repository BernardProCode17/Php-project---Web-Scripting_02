<?php
session_start();
require_once 'dbinfo.php';

$message = array();
$studentID = $_SESSION['studentID'];

var_dump($studentID);
if (isset($_POST['student_id']) || isset($_POST['firstname']) || isset($_POST['lastname'])) {

   if (!empty($_POST['student_id']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])) {

      $student_id = $_POST['student_id'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];



      //Open databse connection
      $updateSQL = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

      try {
         if ($updateSQL->connect_error) {
            throw new Exception("Error Processing Request", $updateSQL->connect_error);
         }
      } catch (Exception $e) {
         "There was an unexpected error: " . " <br>" . $e->getMessage() . "<br> <br>" . " Please Return Later";
         exit();
      }

      $updateQuery = $updateSQL->prepare("UPDATE students SET id= ?, firstname= ?, lastname= ? WHERE id= ?");
      $updateQuery->bind_param("ssss", $student_id, $firstname, $lastname, $studentID);
      $updateQuery->execute();

      if ($updateQuery->affected_rows > 0) { // Check if record was deleted
         $message[] =  "<p>Student record with: <br>ID: " . $student_id . "<br> First name: " . $firstname . "<br> Last Name " . $lastname . "<br> was updates in the Database</p>"; // deleted message
      } else {
         $message[] = "<p>No Student Record was deleted</p>";
      }
      //}
   } else {
      $message[] = "<p>Please fill in all the fields</p>";
   }
} else {
   $message[] = "<p> Please select Yes or No</p>"; // No Radio Button was selected
}


$_SESSION['message'] = $message; // message array
header("Location: table.php"); // redirect to the tables page
exit();
