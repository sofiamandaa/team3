Kiitos palautteesta!
<a class="navrr" href="kirjauduulos.php">Kirjaudu ulos</a>
<?php 
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




$yhteys=mysqli_connect("db", "root", "password", "dining007");
if (!$yhteys) {
   die("Yhteyden muodostaminen epäonnistui: " . mysqli_connect_error());
}


$sql="insert into palaute(nimi, asiakaspalvelu, ruoka, vapaapalaute) values(?, ?, ?, ?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'ssss', $nimi, $asiakaspalvelu, $ruoka, $vapaapalaute);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys);


?>