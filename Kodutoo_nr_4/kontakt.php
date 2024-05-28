<?php
$oskused= array('HTML','CSS','Bootstrap','PHP'); //php massiiv oskused
$klassid= array("primary", "secondary", "success", "danger", "warning", "info", "dark"); // php massiiv värviklassid

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kodutöö nr 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      .jumbo{
        background-image: url('bs2 31799.jpg');
        color: #fff;
      }
    </style>
  </head>
  <body>
    <!-- navbar container-->
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
              <li class="nav-item">
                <a class="nav-link" href="index.html">Avaleht</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Tooted</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="teenused.php">Teenused</a>
              </li>
              <li class="nav-item d-md-none">
                <a class="nav-link" href="kontakt.php">Kontakt</a>
              </li>
              <li class="nav-item ms-2 d-none d-md-inline">
                <a class="btn btn-primary" href="kontakt.php">Kontakt</a>
              </li>
              
            </ul>
          </div>
      </nav>

      
    </div>
    

      <!-- Minu oskused-->
      <div class="container">
        <h1 class=" text-center strong">Minu oskused</h1>
        <?php
            for ($i=0; $i < 4; $i++) {
                echo '<div class="progress">
                    <div class="progress-bar bg-'.$klassid[array_rand($klassid)].'" role="progressbar" style="width: '.rand(1,10).'0%">'.$oskused[$i].'
                    </div>
                        </div>
                    <br>';
            }
        ?>
    </div>

    <!-- Meie töötajad -->
    <div class="container">
    <h1 class=" text-center strong">Meie töötajad</h1>
    <div class="row">
            <?php

             $kataloog = 'tootajad';
             $asukoht=opendir($kataloog);
             while($rida = readdir($asukoht)){

                  if($rida!='.' && $rida!='..'){
                    $nimi= pathinfo($rida, PATHINFO_FILENAME);
                    ?>
                          <div class="col">
                            <div class="row"><img src="./tootajad/<?php echo $rida; ?>" alt=""></div>
                            <div class="row"><p class="text-center text-capitalize fs-4"><?php echo $nimi; ?></p></div>
                            <div class="row"><p class="text-center"><?php echo $nimi; ?>@suvamail.ee</p></div>
                        </div>
                        <?php
                  }
             }
            ?>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>