<?php include("config.php"); ?>
<?php include("header.php"); ?>
<div class="container-fluid">
        
           <?php
        //p2ringud andmebaasi
             //Vali kÃµikide seadmete nimed, IP-aadressid ja asukoht ning kuva 10 esimest
            $paring1 = ' SELECT `asset_name`,`ip_address`,`location` FROM `network_inventory` LIMIT 10;';
            //Kuva kolm kÃµige vanemat seadet
            $paring2 = " SELECT `asset_name`,`purchase_date` FROM `network_inventory` ORDER BY `purchase_date` LIMIT 3;";
            //Kuva kÃµikide seadmete arv, mis on praegu hoolduses
            $paring3 = " SELECT COUNT(*) FROM `network_inventory` WHERE `status` = 'maintenance';";
            //Leia, mitu seadet on igas asukohas
            $paring4 = "SELECT `location`, COUNT(*) AS `device_count` FROM `network_inventory` GROUP BY `location` ORDER BY `device_count` DESC LIMIT 15;";
        
            
            //saadan soovitud ühendusele minu päringu
            
            //vastused
            ?>
            <!-- Vali kÃµikide seadmete nimed, IP-aadressid ja asukoht ning kuva 10 esimest -->
            <div class="container-fluid">
            <caption><strong>IP aadressid ja asukohad</strong></caption>
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">Nimi</th>
                    <th scope="col">IP-aadress</th>
                    <th scope="col">Asukoht</th>
                  </tr>
                </thead>
                <?php
                $valjund = mysqli_query($yhendus, $paring1);
            while ($rida  = mysqli_fetch_assoc($valjund)) {
              echo '
                <tbody>
                  <tr>
                    <td>'.$rida['asset_name'].'</td>
                    <td>'.$rida['ip_address'].'</td>
                    <td>'.$rida['location'].'</td>
                  </tr>
                  
                ';

          }
            ?> 
            </tbody>
              </table>
            </div>
            <!-- Kuva kolm kÃµige vanemat seadet -->
            <div class="container-fluid">
            <caption><strong>Kõige vanemad masinad</strong></caption>
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">Nimi</th>
                    <th scope="col">Ostmise kuupäev</th>
                  </tr>
                </thead>
                <?php
                $valjund = mysqli_query($yhendus, $paring2);
            while ($rida  = mysqli_fetch_assoc($valjund)) {
              //print_r ($rida);
              echo '
                <tbody>
                  <tr>
                    <td>'.$rida['asset_name'].'</td>
                    <td>'.$rida['purchase_date'].'</td>
                  </tr>
                  
                ';

          }
            ?> 
            </tbody>
              </table>

              <!-- Kuva kÃµikide seadmete arv, mis on praegu hoolduses -->
              <?php 
              $valjund = mysqli_query($yhendus, $paring3);
              if ($valjund) {
                $rida = mysqli_fetch_assoc($valjund);
                //print_r($rida);
                $nr = $rida['COUNT(*)']; // COUNT(*) on mysql-i enda muutuja kui kasutada lugemist
                echo "Hetkel on " . $nr . " seadet paranduses";
            }
              ?>
            <!-- Leia, mitu seadet on igas asukohas, panin limiidiks 15 -->
            <div class="container-fluid">
            <caption><strong>Mitu seadet on asukohas</strong></caption>
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">Asukoht</th>
                    <th scope="col">Mitu tk</th>
                  </tr>
                </thead>
                <?php
                $valjund = mysqli_query($yhendus, $paring4);
            while ($rida  = mysqli_fetch_assoc($valjund)) {
              //print_r ($rida);
              echo '
                <tbody>
                  <tr>
                    <td>'.$rida['location'].'</td>
                    <td>'.$rida['device_count'].'</td>
                  </tr>
                  
                ';

          }
            ?> 
            </tbody>
              </table>

              
            </div>
</div>
        

<?php include("footer.php"); ?>