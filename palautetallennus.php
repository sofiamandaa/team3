Kiitos palautteesta!
session_start();
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
<?php 
include('./rekisteroidyajax.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location:./kirjauduajax.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location:./kirjauduajax.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Dining007 | Sign Up</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style>
	.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		
			</div>
		</div>
	</div>
</body>
</html>
mysqli_close($yhteys);


?>