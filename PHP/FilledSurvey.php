<?php
/**
 * Created by PhpStorm.
 * User: Baker
 * Date: 2015-10-27
 * Time: 20:46
 */

include "function.php";

session_start();
if(!isset($_SESSION))
    header("location: ../index.php");

FilledSurvey($_POST);
?>