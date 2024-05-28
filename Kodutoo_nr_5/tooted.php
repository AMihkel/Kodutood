<div class="container">
<h1>Kõik Tooted</h1>

<div class="row row-cols-1 row-cols-md-4 g-4 pt-5">
<?php
    //faili avamine
    $products = "tooted.csv";
    $minu_csv = fopen($products, "r");

    //kõikide ridade saamine feof = file-end-of-file
    while (!feof($minu_csv)) {
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
            }
        }
    fclose($minu_csv);
?>

</div>
</div>