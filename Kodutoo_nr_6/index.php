<?php include("config.php"); ?>
<?php include("header.php"); ?>
<div class="container">
        <h1>Parimad albumid!!</h1>
        
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <form action="" method="get">
            Otsi: <input type="text" name="s">
            <input type="submit" value="otsi">
        </form>
          <?php 
            $paring = " SELECT `asset_name`, `location`
                        FROM `network_inventory` 
                        ORDER BY `asset_name` ASC
                        LIMIT 10;
                        ";
            $valjund = mysqli_query($yhendus, $paring);
            if ($valjund) {
              while ($rida = mysqli_fetch_assoc($valjund)) {
                  // Echo individual fields
                  echo "Asset Name: " . $rida['asset_name'];
                  echo "Location: " . $rida['location'] . "<br><br>";
              }
          } else {
              echo "Error: " . mysqli_error($yhendus);
          }
          ?>
        </div>
</div>



<?php include("footer.php"); ?>