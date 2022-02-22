<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dining007 restaurant About Us">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dining007 | Feedback</title>
</head>
<body>
    <!--Sofia Mäkelä made the "About Us/Information" -page-->
    
        <!--Tiina Moilanen made the navbar-->
    <nav class="navbar navbar-expand-md navbar">
	
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navigation">
            <img src="images/Di.png" alt="restaurantdining007" style= "width: 200px; height: 50px;">
            <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="navrr" href="index.html">Home</a>
                <li class="nav-item">
                    <a class="navrr" href="menu.html">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="navrr" href="information.html">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="navrr" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="navrr" href="luepalaute.php">Feedback</a>
                </li>
            </ul>
    </div>
    </nav> 
        


<!--Sofia Mäkelä made this image banner thing-->
    <div class="imagebanner">
    <picture>
    <img srcset="images/pexels6.jpg 100w"
    sizes="(max-width: 1200px) 1200px"
    src="images/pexels6.jpg" alt="aboutusbanner"
    style="width: 100%; height: 300px;">
    </picture> 
</div>


    <!--Sofia Mäkelä made the col-thing for this site-->
    <div class="container"> </div>
        <div class="row"> 
            
            <div class="col-2">

    <!--some content for the side bar if needed-->
            </div> 
        <div class="col-6">
        <br> <h2>Asiakaspalautteet</h2> 
        
    </div>
    <div class="col-2 sh">
        <br>
       
          
        </div>
    </div>

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
    print "Miten onnistuimme asiakaspalvelussa?: $rivi->asiakaspalvelu<br>";
    print "Miten onnistuimme ruoassa?: $rivi->ruoka<br>";
    print "Vapaa palaute: $rivi->Vapaapalaute<br><br>";
}
print "</ol>";
mysqli_close($yhteys);
?>
<p><br>Haluatko antaa palautetta? <a href='./kirjaudu.html'>Kirjaudu sisään</a>

<?php
include"./footer.html";
?>