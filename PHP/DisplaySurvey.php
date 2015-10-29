<?php
/**
 * Created by PhpStorm.
 * User: 1229753
 * Date: 29/10/2015
 * Time: 12:53
 */
include "function.php";

session_start();

if(!isset($_SESSION))
    header("location: ../index.php");

Display($_SESSION["email"]);
?>