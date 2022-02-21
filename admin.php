<?php
mysqli_report(MYSQLI_REPORT_ERROR ^ MYSQLI_REPORT_STRICT);

$poistettava=isset($_GET["poistettava"]) ? $_GET["poistettava"] : 0;

if (empty($poistettava)){
    header("Location:./luepalaute.php");
    exit;
}

try{
    $yhteys=mysqli_connect("db", "root", "password", "dining007");
}
catch(Exception $e){
    header("Location:./yhteysvirhe.html");
    exit;
}
$sql="delete from palaute where id=?";

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
    print "<li>$rivi->nimi $rivi->asiakaspalvelu $rivi->ruoka"."
    <a href='./luepalaute.php?poistettava=$rivi->nimi'>Poista</a></li>";
}
print "</ol>";

$stmt=mysqli_prepare($yhteys, $sql);
Sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 'i', $poistettava);
Suoritetaan sql-lause
mysqli_stmt_execute($stmt);

mysqli_close($yhteys);

header("Location:./luepalaute.php");
?>