<?php
require_once 'dbinfo.php';

function remove_record() {

    if (isset($_GET['id'])){
        echo $_GET['id'];
    }
}

?>