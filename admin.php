<?php

try{
    $yhteys=mysqli_connect("db", "root", "password", "dining007");
}
catch(Exception $e){
    print "yhteysvirhe";
    exit;
}
$tulos=mysqli_query($yhteys, "select * from palaute");

print "<ol>";
while ($rivi=mysqli_fetch_object($tulos)){
    print "<li>$rivi->nimi $rivi->asiakaspalvelu $rivi->ruoka $rivi->vapaapalaute"."
    <a href='./luepalaute.php ? modify=$rivi->id'>Poista</a></li>";
}
print "</ol>";

mysql_close($yhteys);
?>