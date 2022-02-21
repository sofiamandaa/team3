<?php
session_start();
$json=isset($_POST["user"]) ? $_POST["user"] : "";

if (!($user=tarkistaJson($json))){
    print "Täytä kaikki kentät";
    exit;
}

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
    $yhteys=mysqli_connect("db", "root", "password", "dining007");
}
catch(Exception $e){
    print "Yhteysvirhe";
    exit;
}

//Tehdään sql-lause, jossa kysymysmerkeillä osoitetaan paikat
//joihin laitetaan muuttujien arvoja
function login(){
$sql="select * from asiakas where kayttajatunnus=? and salasana=SHA2(?, 256)";
try{
    //Valmistellaan sql-lause
    $stmt=mysqli_prepare($yhteys, $sql);
    //Sijoitetaan muuttujat oikeisiin paikkoihin
    mysqli_stmt_bind_param($stmt, 'ss', $user->kayttajatunnus, $user->salasana);
    //Suoritetaan sql-lause
    mysqli_stmt_execute($stmt);
    //Koska luetaan prepared statementilla, tulos haetaan
    //metodilla mysqli_stmt_get_result($stmt);
    $tulos=mysqli_stmt_get_result($stmt);
    if ($rivi=mysqli_fetch_object($tulos)){
        $_SESSION["asiakas"]="$rivi->kayttajatunnus";
        print "ok";
        exit;
    }
    $query = "SELECT * FROM asiakas WHERE kayttajatunnus='$kayttajatunnus' AND salasana='$salasana' LIMIT 1";
		$results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) { // user found
        // check if user is admin or user
        $logged_in_user = mysqli_fetch_assoc($results);
        if ($logged_in_user['kayttaja_tyyppi'] == 'admin') {

            $_SESSION['asiakas'] = $logged_in_user;
            $_SESSION['success']  = "You are now logged in";
            header('location:./poista.php');		  
        }else{
            $_SESSION['asiakas'] = $logged_in_user;
            $_SESSION['success']  = "You are now logged in";

            header('location:./palautelomake.html');
        }
    }
    //Suljetaan tietokantayhteys
    mysqli_close($yhteys);
    //print $json;
}
catch(Exception $e){
    
    print "Jokin meni vikaan. Yritä uudelleen.";
 
}
?>


<?php
function tarkistaJson($json){
    if (empty($json)){
        return false;
    }
    $user=json_decode($json, false);
    if (empty($user->kayttajatunnus) || empty($user->salasana)){
        return false;
    }
    return $user;
}
?>