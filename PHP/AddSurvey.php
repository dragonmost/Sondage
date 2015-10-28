<?php
/**
 * Created by PhpStorm.
 * User: 1229753
 * Date: 27/10/2015
 * Time: 11:23
 */
include "function.php";

session_start();
if(!isset($_SESSION))
    header("location: ../index.php");

AddSurvey($_POST);




?>