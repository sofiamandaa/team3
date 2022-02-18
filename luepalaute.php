<?php
try{
    $yhteys=mysqli_connect("db", "root", "password", "dining007");
}
catch(Exception $e){
    header("Location:../html/yhteysvirhe.html");
    exit;
}
$tulos=mysqli_query($yhteys, "select * from palaute");
print "<ol>";
while ($rivi=mysqli_fetch_object($tulos)){
    print "<li>$rivi->asiakaspalvelu $rivi->ruoka $rivi->Vapaapalaute";
}
print "</ol>";
mysqli_close($yhteys);
?>
