<?php
session_start();
require_once 'dbinfo.php';
$student_id = $_POST['student_id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$message = array();

if (isset($_POST['student_id']) && isset($_POST['firstname']) && isset($_POST['lastname'])) {

    // check if fields  has been filled out
    if (empty($_POST['student_id']) || empty($_POST['firstname']) || empty($_POST['lastname'])) {
        $message = urlencode('Please fill out all fields');
        header("Location: add_student.php?message=$message");
        exit();
    } else {
        $student_id = trim(ucwords($_POST['student_id']));
        $firstname = trim(ucwords($_POST['firstname']));
        $lastname = trim(ucwords($_POST['lastname']));
    }

    $student_sql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($student_sql->connect_error) {
        echo 'Failed to connect to MySQL: ' . $student_sql->connect_error;
        exit();
    }
    $student_id = $student_sql->real_escape_string($student_id);
    $firstname = $student_sql->real_escape_string($firstname);
    $lastname = $student_sql->real_escape_string($lastname);

    $student_registred = "SELECT * FROM students WHERE id = '" . $student_id . "'";
    $registred_result = $student_sql->query($student_registred);

    if ($registred_result->num_rows > 0) {
        $message = urlencode("Student already registered: $student_id");
        header("Location: table.php?message=$message");
        exit();
    } else {
        $student_query = "INSERT INTO students (id, firstname, lastname) VALUES ('$student_id', '$firstname', '$lastname')";
        $student_sql->query($student_query);
        $message = urlencode("Student added successfully: $student_id , $firstname, $lastname");
        header("Location: table.php?message=$message");
    }
} else {
    $message = urlencode('Please fill out all fields');
    header("Location: add_student.php?message=$message");
    exit();
}


$_SESSION['message'] = $message;
