<?php
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
    print "Yhteysvirhe";
    exit;
}

//Tehdään sql-lause, jossa kysymysmerkeillä osoitetaan paikat
//joihin laitetaan muuttujien arvoja
$sql="insert into kayttaja (id, etunimi, sukunimi, puhelinnro, sposti, kayttajatunnus, salasana, katuosoite, postinumero, postitoimipaikka, ika) values(?, ?, ?, ?, ?, ?, SHA2(?, 256), ?, ?, ?, ?)";
try{
    $stmt=mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, 'ississssisi', $user->id, $user->etunimi, $user->sukunimi, $user->puhelinnro, $user->sposti, $user->kayttajatunnus, $user->salasana, $user->katuosoite, $user->postinumero, $user->postitoimipaikka, $user->ika);
    mysqli_stmt_execute($stmt);
    mysqli_close($yhteys);
    print $json;
    
    include "../html/kiitos.html";
}
catch(Exception $e){
    print "Tunnus jo olemassa tai muu virhe!";
}
?>


<?php
function tarkistaJson($json){
    if (empty($json)){
        return false;
    }
    $user=json_decode($json, false);
    if (empty($user->id) || empty($user->etunimi) || empty($user->sukunimi) || empty ($user->puhelinnro) || empty($user->sposti) || empty($user->kayttajatunnus) || empty($user->salasana) || empty($user->katuosoite) || empty($user->postinumero) || empty($user->postitoimipaikka) || empty($user->ika)){
        return false;
    }
    return $user;
}
?>
