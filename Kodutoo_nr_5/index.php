<?php include("header.php"); ?>

<?php
if (isset($_GET["page"])) {
    // echo "tere";
    $page = $_GET["page"];
    if ($page=="tooted") {
        include("tooted.php");
    }else if($page=="kontakt"){
        echo '<h1>Kahjuks kontakte ei ole</h1>';
    } else if($page=="admin"){
        include("admin.php");
    }
}else{
?>
<div class="container">
    <h4 class="text-center py-4">Parimad pakkumised</h4>
    <div class="row">
    <?php 
    $tooted = "tooted.csv";
    $minu_csv = fopen($tooted, "r");
    $i =0;//kaartide lugemiseks
    while (!feof($minu_csv) && $i < 4) {// näidatakse ainult 8 kaarti 0..3
        //ühe rea saamine, eraldatud komaga
        $rida = fgetcsv($minu_csv, filesize($tooted), ",");
        //print_r($rida);
        // echo "$rida[1] - $rida[3]€<br>";
        if (is_array($rida)) {
            echo '
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <img src="./img/'.$rida[3].'" class="card-img-top" alt="'.$rida[1].'">
                    <div class="card-body">
                    <h5 class="card-title">'.$rida[1].'</h5>
                    <p class="card-text">'.$rida[2].'€</p>
                    </div>
                </div>
            </div>
            ';
            $i++;
            }
        }
    fclose($minu_csv);
    ?>
    </div>
</div>
<?php
}
?>
<?php include("footer.php"); ?>
