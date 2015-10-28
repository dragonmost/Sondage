<?php
/**
 * Created by PhpStorm.
 * User: Baker
 * Date: 2015-10-27
 * Time: 20:46
 */

session_start();

FilledSurvey($_POST);

function FilledSurvey($data)
{
    print_r($data);
}

?>