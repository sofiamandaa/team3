<?php

mysqli_report(MYSQLI_REPORT_ERROR ^ MYSQLI_REPORT_STRICT);

$poistettava=isset($_GET["poistettava"]) ? $_GET["poistettava"] : 0;

if (empty($poistettava)){
    header("Location:./admin.php");
    exit;
}

try{
    $yhteys=mysqli_connect("db", "root", "password", "dining007");
}
catch(Exception $e){
    header("Location:./yhteysvirhe.html");
    exit;
}

$sql="delete from palaute where nimi=?";

$stmt=mysqli_prepare($yhteys, $sql);
//Sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 's', $poistettava);
//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);

mysqli_close($yhteys);

header("Location:./luepalaute.php");
?>