<?php
include "./header.html"
?>

<?php

try{
    $yhteys=mysqli_connect("db", "root", "password", "dining007");
}
catch(Exception $e){
    header("location:./yhteysvirhe.html");
    exit;
}
$tulos=mysqli_query($yhteys, "select * from palaute");

print "<ol>";
while ($rivi=mysqli_fetch_object($tulos)){
    print "<li>$rivi->nimi $rivi->asiakaspalvelu $rivi->ruoka"."
    <a href='./poista.php?poistettava=$rivi->nimi'>Poista</a></li>";
}
print "</ol>";

mysqli_close($yhteys);


?>

<?php
include "./footer.html"
?>