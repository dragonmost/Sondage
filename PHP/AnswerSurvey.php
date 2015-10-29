<?php
include "function.php";

session_start();
if(!isset($_SESSION))
    header("location: ../index.php");

FillSurvey($_POST["pw"]);
?>