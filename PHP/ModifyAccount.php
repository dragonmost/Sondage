<?php
/**
 * Created by PhpStorm.
 * User: Baker
 * Date: 2015-10-28
 * Time: 15:43
 */

include "function.php";
print_r($_POST);

if (isset($_POST["check"]))
    ModifyAccount($_POST["input"], $_POST["oldName"], 1);
else
    ModifyAccount($_POST["input"], $_POST["oldName"], 0);


?>