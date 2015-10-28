<?php
/**
 * Created by PhpStorm.
 * User: 1229753
 * Date: 23/10/2015
 * Time: 16:31
 */

include "function.php";

session_start();
if(!isset($_SESSION))
    header("location: ../index.php");

if (isset($_POST["check"]))
    CreateAccount($_POST["email"], $_POST["pw"], 1);
else
    CreateAccount($_POST["email"], $_POST["pw"], 0);
?>