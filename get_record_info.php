<?php
require_once 'dbinfo.php';

function getRecordInfo()
{

    $studentID = '';

    if (isset($_GET['id'])) { // Get the Student ID from the URL

        if (!empty($_GET['id'])) { // Chech if the Student ID has a value
            
            //Store the ID and make connecting with the DataBase
            $delSQL = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $studentID = $delSQL->real_escape_string($_GET['id']);
            $_SESSION['studentID'] = $studentID;

            //Check for DataBase Error
            try {
                if ($delSQL->connect_error) {
                    throw new Exception("Error Processing Request", $delSQL->connect_error);
                }
            } catch (Exception $e) {
                "There was an unexpected error: " . " <br>" . $e->getMessage() . "<br> <br>" . " Please Return Later";
                exit();
            }

            //Record Query
            $delQuery = "SELECT * FROM students WHERE id = '" . $studentID . "'";

            $delResults = $delSQL->query("$delQuery");

            if ($delSQL->error) {
                "" . $delSQL->error . "" . "";
            }

            // Record Result
            if ($delResults->num_rows > 0) {
                while ($recordRow = $delResults->fetch_assoc()) {
                    $recordInfo = "ID:" . $recordRow['id'] . "<br>" . "First Name: " .  $recordRow['firstname'] . "<br>" .  "Last Name: " . $recordRow['lastname'];
                }
                return $recordInfo; //Record information display
            }
            $delSQL->close();
        } else {
            return "<p>Record Not Found</p>";
        }
    } else {
        return "<p>Record Not Found</p>";
    }
}
