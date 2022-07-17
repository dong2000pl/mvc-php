<?php
    include "Model/dbconfig.php";
    $db = new DBConfig;
    $db->connect();

    require_once('Controller/index.php');
?>