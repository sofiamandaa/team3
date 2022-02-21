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
    print "yhteysvirhe";
}

//Tehdään sql-lause, jossa kysymysmerkeillä osoitetaan paikat
//joihin laitetaan muuttujien arvoja
$sql="insert into admin (tunnus, salasana) values(?, SHA2(?, 256))";
try{
    $stmt=mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $user->tunnus, $user->salasana);
    mysqli_stmt_execute($stmt);
    mysqli_close($yhteys);
    // print $json;
   // header("Location:./adminkirjaudu.html");
    print "admin";
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
    if (empty($user->tunnus) || empty($user->salasana)){
      return false;
    }
    return $user;
}
?>