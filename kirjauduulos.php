<?php
session_start();
unset($_SESSION["asiakas"]);
header("Location:./kirjaudu.html");
?>