<?php
session_start();
// tarkistaa, onko kentät täytetty
$json=isset($_POST["user"]) ? $_POST["user"] : "";

if (!($user=tarkistaJson($json))){
    print "Täytä kaikki kentät";
    exit;
}

// jos kentät on täytetty, tarkistetaan yhteys
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    $yhteys=mysqli_connect("db", "root", "password", "dining007");
}
catch(Exception $e){
    print "yhteysvirhe";
}
function register(){
//Tehdään sql-lause, jossa kysymysmerkeillä osoitetaan paikat
//joihin laitetaan muuttujien arvoja
$sql="insert into asiakas (etunimi, sukunimi, puhelinnro, sposti, kayttajatunnus, ".
"salasana, katuosoite, postinumero, postitoimipaikka, ika) values(?, ?, ?, ?, ?, SHA2(?, 256), ?, ?, ?, ?)";
try{
    $stmt=mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, 'ssissssisi', $user->etunimi, $user->sukunimi, $user->puhelinnro, $user->sposti, $user->kayttajatunnus, 
    $user->salasana, $user->katuosoite, $user->postinumero, $user->postitoimipaikka, $user->ika);
    mysqli_stmt_execute($stmt);
    
   // print $json;
    
    print "kirjaudu";
}
catch(Exception $e){
    print "Tunnus jo olemassa tai muu virhe!";
}

if (isset($_POST['kayttaja_tyyppi'])) {
    $user_type = e($_POST['kayttaja_tyyppi']);
    $query = "INSERT INTO asiakas (etunimi, sukunimi, puhelinnro, sposti, kayttajatunnus, ".
    "salasana, katuosoite, postinumero, postitoimipaikka, ika, kayttaja_tyyppi) 
              VALUES('$etunimi', '$sukunimi', '$puhelinnro', '$sposti', '$kayttajatunnus', '$salasana',
              '$katuosoite', '$postinumero', '$postitoimipaikka', '$ika', '$kayttaja_tyyppi')";
    mysqli_query($db, $query);
    $_SESSION['success']  = "Rekisteröinti onnistunut!";
    header('location:./kirjaudu.html');
}
else{
    $query = "INSERT INTO asiakas (etunimi, sukunimi, puhelinnro, sposti, kayttajatunnus, ".
    "salasana, katuosoite, postinumero, postitoimipaikka, ika, kayttaja_tyyppi) 
              VALUES('$etunimi', '$sukunimi', '$puhelinnro', '$sposti', '$kayttajatunnus', '$salasana',
              '$katuosoite', '$postinumero', '$postitoimipaikka', '$ika', '$kayttaja_tyyppi')";
    mysqli_query($db, $query);

    // get id of the created user
    $logged_in_user_id = mysqli_insert_id($db);

    $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
    $_SESSION['success']  = "Olet kirjautunut sisään.";
    header('location:./palautelomake.html');				
    }
}
    mysqli_close($yhteys);
?>


<?php
function tarkistaJson($json){
    if (empty($json)){
        return false;
    }
    $user=json_decode($json, false);
    if (empty($user->etunimi) || empty($user->sukunimi) || empty ($user->puhelinnro) || empty($user->sposti) || empty($user->kayttajatunnus) || empty($user->salasana) || empty($user->katuosoite) || empty($user->postinumero) || empty($user->postitoimipaikka) || empty($user->ika)){
        return false;
    }
    return $user;
}
function getUserById($id){
	global $db;
	$query = "SELECT * FROM asiakas WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['kayttaja_tyyppi'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
?>
