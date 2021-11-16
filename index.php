<!doctype html>

<?php
// index.php
// jei vartotojas prisijungęs rodomas demonstracinis meniu pagal jo rolę
// jei neprisijungęs - prisijungimo forma per include("login.php");
// toje formoje daugiau galimybių...

session_start();
include("include/functions.php");
?>

<html lang="en">
  <head>
    <title>Pagrindinis</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php">Darbo skelbimai</a>
    
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            
          </li>
        </ul>
      </div>
    </nav>
    <!-- Navbar end -->

    <?php
           
           if (!empty($_SESSION['user']))     //Jei vartotojas prisijungęs, valom logino kintamuosius ir rodom meniu
           {                                  // Sesijoje nustatyti kintamieji su reiksmemis is DB
                                              // $_SESSION['user'],$_SESSION['ulevel'],$_SESSION['userid'],$_SESSION['umail']
           
           inisession("part");   //   pavalom prisijungimo etapo kintamuosius
           $_SESSION['prev']="index"; 
               
               include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę
    ?>
    <div>
      <div class="container">
        <h2 style="text-align: center;">Skelbimai</h2>
        <div class="row a-no-decor">
          <div class="col-8 border item-height font-weight-bold">Pavadinimas</div>
          <div class="col border item-height font-weight-bold">Tipas</div>
          <div class="col border item-height font-weight-bold">Galioja nuo</div>
          <div class="col border item-height font-weight-bold">Galioja iki</div>
        </div>
      <?php
        //prisijungimas
        $server = "localhost";
        $db = "jobadsdb";
        $user = "root";
        $password = "";
        $table = "skelbimas";
        $conn = new mysqli($server, $user, $password, $db);
        if($conn->connect_error){
            die("Negaliu prisijungti:".$conn->connect_error);
        }

        //irasymas
        if($_POST != null){
          $pavadinimas = $_POST['pavadinimas'];
          $aprasymas = $_POST['aprasymas'];
          $tipas = $_POST['tipas'];
          $galiojimas = $_POST['galiojimas'];

          $sql = "INSERT INTO $table (pavadinimas, aprasymas, tipas, ikelimo_laikas, galiojimo_laikas)
          VALUES('$pavadinimas','$aprasymas','$tipas',now(), now() + INTERVAL $galiojimas DAY)";
          if(!$result = $conn->query($sql)){
              die("Negaliu irasyti:".$conn->error);
          }
        }
        

        //skaitymas
        $sql = "SELECT * FROM $table";
        if(!$result = $conn->query($sql)){
            die("Negaliu nuskaityti:".$conn->error);
        } 

        $i = 1;
        while($row = $result->fetch_assoc()){
          echo "<a class=\"a-no-decor\" href=\""."ad_view.php?id=".$row['id_Skelbimas']."\">";
          echo "<div class=\"row\">";
          echo "<div class=\"col-8 border item-height\">".$row['pavadinimas']."</div>";
          echo "<div class=\"col border item-height\">".$row['tipas']."</div>";
          echo "<div class=\"col border item-height\">".$row['ikelimo_laikas']."</div>";
          echo "<div class=\"col border item-height\">".$row['galiojimo_laikas']."</div>";
          echo "</div>";
          echo "</a>";
          $i = $i + 1;
        }

      ?>
      </div>
    </div>
    <?php
                 }                
                 else {   			 
                     
                     if (!isset($_SESSION['prev'])) inisession("full");             // nustatom sesijos kintamuju pradines reiksmes 
                     else {if ($_SESSION['prev'] != "proclogin") inisession("part"); // nustatom pradines reiksmes formoms
                          }  
                  // jei ankstesnis puslapis perdavė $_SESSION['message']
               echo "<div align=\"center\">";echo "<font size=\"4\" color=\"#ff0000\">".$_SESSION['message'] . "<br></font>";          
           
                       echo "<table class=\"center\"><tr><td>";
                 include("include/login.php");                    // prisijungimo forma
                       echo "</td></tr></table></div><br>";
                  
             }
      ?>

    
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>