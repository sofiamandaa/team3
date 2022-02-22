Kiitos palautteesta!
<a class="navrr" href="kirjauduulos.php">Kirjaudu ulos</a>
<?php 
//jos laatikot ovat täytetty, alla oleva koodi lähettää ne tietokantaan, jos ei ole täytetty niin mitään ei lähetetä
$nimi="";
if (isset($_POST["nimi"])){
   $nimi=$_POST["nimi"];
}

$asiakaspalvelu="";
if (isset($_POST["asiakaspalvelu"])){
   $asiakaspalvelu=$_POST["asiakaspalvelu"];
}
$ruoka=""; 
if (isset($_POST["ruoka"])){
   $ruoka=$_POST["ruoka"];

}
$vapaapalaute="";
if (isset($_POST["vapaapalaute"])){
   $vapaapalaute=$_POST["vapaapalaute"];
}



//yhdistää tietokantaan yhteyden, jos epäonnistuu tulee error viesti
$yhteys=mysqli_connect("db", "root", "password", "dining007");
if (!$yhteys) {
   die("Yhteyden muodostaminen epäonnistui: " . mysqli_connect_error());
}

//laittaa täytetyt tiedot oikeaan tableen ja oikeisiin sarakkeisiin
$sql="insert into palaute(nimi, asiakaspalvelu, ruoka, vapaapalaute) values(?, ?, ?, ?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'ssss', $nimi, $asiakaspalvelu, $ruoka, $vapaapalaute);
mysqli_stmt_execute($stmt);
//sulkee yhteyden
mysqli_stmt_close($stmt);
mysqli_close($yhteys);


?>