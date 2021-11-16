<!doctype html>
<html lang="en">
  <head>
    <title>Pridėti skelbimą</title>
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
            <a class="nav-link" href="index.php">Pagrindinis</a>
          </li>
      </div>
    </nav>
    <!-- Navbar end -->
    <div class="container">
      <h2>Sukurti skelbimą:</h2>
      <form method="POST" action="index.php">
        <div class="form-group">
          <label for="pavadinimas">Pavadinimas</label>
          <input type="text" name="pavadinimas" class="form-control" id="pavadinimas" aria-describedby="pavadinimasHelp" placeholder="Įveskite pavadinimą...">
          <small id="pavadinimasHelp" class="form-text text-muted">Įveskite savo skelbimo pavadinimą.</small>
        </div>
        <div class="form-group">
          <label for="aprasymas">Aprašymas</label>
          <textarea type="text" name="aprasymas" class="form-control" style="height: 350px;" id="aprasymas" placeholder="Įveskite aprašymą..."></textarea>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="tipas" id="siulo" value="Siūlo darbą" checked>
          <label class="form-check-label" for="siulo">
            Siūlau
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="tipas" id="iesko" value="Ieško darbo">
          <label class="form-check-label" for="iesko">
            Ieškau
          </label>
        </div>
        <div class="form-group">
          <label for="galiojimas">Galiojimas(dienomis)</label>
          <select name="galiojimas" class="form-control" id="galiojimas">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Skelbti skelbimą</button>
      </form>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>