

<?php 

if (isset($_POST["nimi"])){
   $nimi=$_POST["nimi"];
}
else{
  
   header("Location:ruokalomake.html");
   exit;
}
if (isset($_POST["asiakaspalvelu"])){
   $nimi=$_POST["asiakaspalvelu"];
}
else{
   $asiakaspalvelu="";
}
if (isset($_POST["ruoka"])){
   $nimi=$_POST["ruoka"];
}
else{
   $ruoka="";
if (isset($_POST["Vapaapalaute"])){
   $nimi=$_POST["Vapaapalaute"];
}
else{
   $Vapaapalaute="";
}

}

$yhteys = mysqli_connect("localhost:82", "root", "password");
if (!$yhteys) {
   die("Yhteyden muodostaminen epäonnistui: " . mysqli_connect_error());
}
echo "Yhteys OK";

$tietokanta=mysqli_select_db($yhteys, "palaute");
if (!tietokanta) {
   die("Tietokannan valinta epäonnistui: " . mysqli_connect_error());
}
echo "Tietokanta OK.";

$sql="insert into palaute(nimi, asiakaspalvelu, ruoka, Vapaapalaute) values(?, ?, ?, ?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'siis', $nimi, $asiakaspalvelu, $ruoka, $Vapaapalaute);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys);

header("Location:lomake.html");
exit;
?>