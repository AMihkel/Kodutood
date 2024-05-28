<?php
if (isset($_GET['add'])) {
    echo '<div class="alert alert-success" role="alert">
    Toote lisamine õnnestus!
  </div>
  ';
}elseif (isset($_GET['del'])) {
    echo '<div class="alert alert-success" role="alert">
    Toote kustutamine õnnestus!
  </div>
  ';
}elseif (isset($_GET['fail'])) {
    echo '<div class="alert alert-warning" role="alert">
    Sellise nimega toodet ei ole!!
  </div>';
}
if(isset($_POST['nimetus'])){
    
	$sinu_faili_nimi = $_FILES['minu_fail']['name']; //lisab failinime muutujasse
	$ajutine_fail= $_FILES['minu_fail']['tmp_name'];
    $kataloog = 'img';
	
    $read=array();
    $id = array_push($read,count(file('tooted.csv'))+1);
    $nimetus = array_push($read, $_POST['nimetus']);
    $ext = pathinfo($sinu_faili_nimi, PATHINFO_EXTENSION);
    $hind = array_push($read, $_POST['hind']);
    $pildinimi = array_push($read, $_FILES['minu_fail']['name']);
    move_uploaded_file($ajutine_fail, $kataloog.'/'.$sinu_faili_nimi);
    $path = 'tooted.csv';
    $fp = fopen($path,'a');
    fputcsv($fp, $read);
    fclose($fp);
    header('Location:index.php?page=admin&add');
}
if (isset($_POST['kustu'])) {
    $kustu= $_POST['kustu'];
    $l=0;
    $csvFile= 'tooted.csv';
    $ajutine = 'temp.csv';
    $csvArray = array_map('str_getcsv', file($csvFile));//loen csv faili massiivi
    $tempFileHandle = fopen($ajutine, 'w');
    $length = sizeof($csvArray);
    foreach ($csvArray as $line) {
        // Check if the second variable (index 1) matches the search term
        if (isset($line[1]) && $line[1] !== $kustu) {
            // Write the line to the temporary file if it doesn't match
            fputcsv($tempFileHandle, $line);
            $l++;
            if ($l == $length) {
                header('Location:index.php?page=admin&fail');
            }
        }else {
            
            $del= "./img/$line[3]";
            if (unlink($del)) {
                header('Location:index.php?page=admin&del');
            }
        }
    }
    fclose($tempFileHandle);
    rename($ajutine, $csvFile);

}
?>

<H1>Lisamine</H1>
<form action="" method="post" enctype="multipart/form-data">
    <label for="nimetus">Toote nimetus</label>
    <input type="text" name="nimetus" required><br>

    <label for="hind">Toote hind</label>
    <input type="number" min="0.00" max="100.00" step="0.01" name="hind" required><br>

    <label for="minu_fail"></label>
    <input type="file" name="minu_fail"><br>
    <input type="hidden" name="page" value="admin">

<input class="btn btn-success" type="submit" value="Lisa uus toode">
</form>
<H2>Kustutamine</H2>

<form action="" method="post">
    <label for="kustu">Toode mida tahad kustutada</label>
    <input type="text" name="kustu" required><br>
    <input class="btn btn-success" type="submit" value="Kustuta">

</form>
