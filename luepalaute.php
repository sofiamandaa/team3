
<?php
include"./header.html";
?>

<?php
try{
    $yhteys=mysqli_connect("db", "root", "password", "dining007");
}
catch(Exception $e){
    header("Location:./yhteysvirhe.html");
    exit;
}
$tulos=mysqli_query($yhteys, "select * from palaute");
print "<ol>";
while ($rivi=mysqli_fetch_object($tulos)){
    print "<li>$rivi->asiakaspalvelu<br> $rivi->ruoka<br> $rivi->Vapaapalaute<br>";
}
print "</ol>";
mysqli_close($yhteys);
?>
<p><br>Haluatko antaa palautetta? <a href='./kirjaudu.html'>Kirjaudu sisään</a>

<?php
include"./footer.html";
?>