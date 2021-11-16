<!doctype html>

<?php
  session_start();
  include("include/nustatymai.php");
  include("include/functions.php");
?>
<html lang="en">
  <head>
    <title>Pagrindinis</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/commentstyles.css">
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
            <a class="nav-link" href="index.php">Pagrindinis</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Navbar end -->
    <div class="container">
    <?php
      //prisijungimas
      $server = "localhost";
      $db = "jobadsdb";
      $user = "root";
      $password = "";
      $table = "komentaras";
      $conn = new mysqli($server, $user, $password, $db);
      if($conn->connect_error){
          die("Negaliu prisijungti:".$conn->connect_error);
      }
      
      $ad_id = $_GET['id'];
      //skaitymas
      $sql = "SELECT * FROM `skelbimas` WHERE id_Skelbimas = $ad_id";
      if(!$result = $conn->query($sql)){
          die("Negaliu nuskaityti:".$conn->error);
      } 
      
      while($row = $result->fetch_assoc()){
        echo "<div id=\"titl\" class=\"mx-0\"><h2>".$row['pavadinimas']."</h2></div>";
        echo "<div id=\"description\"><p>".$row['aprasymas']."</p></div>";
      }

      // komentaru irasymas
      if($_POST != null){
        $zinute = $_POST['zinute'];
        $autorius = $_SESSION['user'];
        $sql = "INSERT INTO $table (autorius, zinute, ikelimo_laikas, id_Komentaras, skelbimo_id)
        VALUES('$autorius','$zinute',now(),'', '$ad_id')";
        if(!$result = $conn->query($sql)){
            die("Negaliu irasyti:".$conn->error);
        }
      }

      // komentaru skaitymas
      $sql = "SELECT * FROM $table WHERE `skelbimo_id` = $ad_id";
      if(!$result = $conn->query($sql)){
          die("Negaliu nuskaityti:".$conn->error);
      }
    ?>
    </div>

    <div style="margin-top:100px">
      <div><h2 style="text-align:center;">Komentarai</h2></div>
      <?php
        echo "<form method=\"POST\" action=\""."ad_view.php?id=".$ad_id."\">";
		if ($_SESSION['user'] != "guest"){
			echo "<div class=\"container\">";
			echo "<div class=\"form-group\">";
			echo "<label for=\"zinute\">Žinutė</label>";
			echo "<input type=\"text\" name=\"zinute\" class=\"form-control\" id=\"zinute\" aria-describedby=\"zinuteHelp\">";
			echo "<small id=\"zinuteHelp\" class=\"form-text text-muted\">Įveskite savo komentarą</small>";
			echo "</div>";
			echo "<button type=\"submit\" class=\"btn btn-primary\">Komentuoti</button>";
		}
      ?>
      </form>
    </div>
      </div>
      

	<div class="comments-container">
    <?php
      $resultTest = $result;
      if(sizeof($resultTest->fetch_all()) == 0){
        echo "<ul id=\"comments-list\">";
        echo "Komentarų nėra";
      }
      else{
        echo "<ul id=\"comments-list\" class=\"comments-list\">";
      }
		  
        while($row = $result->fetch_assoc()){
          ?>
			<li>
				<div class="comment-main-level">

					<div class="comment-avatar"><img src="https://png.pngitem.com/pimgs/s/130-1300400_user-hd-png-download.png" alt=""></div>

					<div class="comment-box">
						<div class="comment-head">
              <?php
                  echo "<h6 class=\"comment-name\">".$row['autorius']."</h6>";
                  echo "<span>".$row['ikelimo_laikas']."</span>";
                  echo "</div>";
                  echo "<div class=\"comment-content\">";
                  echo $row['zinute'];
                  echo "</div>";
              ?>
					</div>
        </div>
      </li>
      <?php
        }
      ?>
		</ul>
	</div>
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>