

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

$yhteys=mysqli_connect("db", "root", "password", "dining007");
if (!$yhteys) {
   die("Yhteyden muodostaminen epäonnistui: " . mysqli_connect_error());
}


$sql="insert into palaute3(nimi, asiakaspalvelu, ruoka, Vapaapalaute) values(?, ?, ?, ?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'ssss', $nimi, $asiakaspalvelu, $ruoka, $Vapaapalaute);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys);

header("Location:palautekiitos.html");
exit;
?>