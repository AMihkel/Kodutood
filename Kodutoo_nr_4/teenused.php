<!doctype html>
<html lang="et">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kodutöö nr 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <!-- navbar container-->
    <div class="container">
        <div class="container">
      <nav class="navbar navbar-expand-md navbar-light">
          <!-- navbar brand / title -->
          <a class="navbar-brand">
            <p class="fs-3">Mihkel Andre</p>
          </a>
          <!-- toggle button for mobile nav -->
          <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#main-nav">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <!-- navbar links -->
          <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
            <ul class="navbar-nav">
                <!-- navbar items-->
              <li class="nav-item">
                <a class="nav-link" href="index.html">Avaleht</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Tooted</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Teenused.html">Teenused</a>
              </li>
              <li class="nav-item d-md-none">
                <a class="nav-link" href="kontakt.php">Kontakt</a>
              </li> 
              <!--blue button fro when navbar is extended-->
              <li class="nav-item ms-2 d-none d-md-inline">
                <a class="btn btn-primary" href="kontakt.php">Kontakt</a>
              </li>
              
            </ul>
          </div>
      </nav>
        </div>
      <!-- main content-->
      <div class="container">
        <h1>Teenused</h1>
        <form action="" method="GET">
            <table>
                <tr>
                    <td>Nimi:</td>
                    <td><input type="text" maxlength="20" name="nimi" pattern="[A-Za-züõöä]+" placeholder="Teie eesnimi" required></td><!--pattern="[A-Za-züõöä]+" only letters are acceptable  -->
                </tr>
                <tr>
                    <td>Vali Teenus:</td>
                    <td>
                    <input type="radio" name="teenus" value="10">Ühe ruumi puhastus(10eur) <br>
                    <input type="radio" name="teenus"value="50">Korteri puhastus(50eur)<br>
                    <input type="radio" name="teenus"value="100">Maja puhastus(100eur)<br>
                    </td>
                </tr>
                <tr>
                    <td>Vali teenuse aste :</td>
                    <td>
                        <select name="aste" id="">
                        <option value="1">Üldine(Teenuse hind*1)</option>
                        <option value="5">Koos pesuga(Teenuse hind*5)</option>
                        <option value="10">Detailne(Teenuse hind*10)</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Nõustun tingimustega:</td>
                    <td><input type="checkbox" name="N" required></td></tr>
                <tr> <!-- buttons-->
                    <td><a class="btn btn-warning" href="teenused.php" role="button">Alusta uuesti</a></td>
                    <td><input type="submit" value="Arvuta"></td>
                </tr>
            </table>
        </form>
        <?php
          if ((isset($_GET["nimi"])) && (!empty($_GET["teenus"]) && (!empty($_GET["aste"])))) {

            $nimi = $_GET['nimi'];
            $teenus = $_GET['teenus'];
            $aste = $_GET['aste'];
            $maksumus = $teenus*$aste;
            if ($teenus==10) {
              $t_nimi="ühe ruumi puhastus";
            }
            elseif ($teenus==50) {
              $t_nimi="korteri puhastus";
            }
            elseif ($teenus==100) {
              $t_nimi="maja puhastus";
            }
            echo '<br><h2>Tere '.$nimi.', sinu '.$t_nimi.' läheb maksma '.$maksumus.' eurot!! </h2>';
            
          
    }
    elseif ((isset($_GET["nimi"])) && (empty($_GET["teenus"]))) {
      ?>
      <br>
      <div class=" bg-danger text-center">
           <h2>Palun vali mis teenust soovid!!</h2>
      </div>
      <?php
    }
       
    ?>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>