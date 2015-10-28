<script src="../js/sondage.js"></script>
<?php

include "function.php";
session_start();
Connect($_POST["email"], $_POST["pw"]);
?>