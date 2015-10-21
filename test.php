<?php
$url = 'http://data.bmkg.go.id/cuaca_indo_1.xml';
$url2 = 'http://data.bmkg.go.id/cuaca_indo_2.xml';
$xml = simplexml_load_file($url) or die("feed not loading");
$xml2 = simplexml_load_file($url) or die("feed not loading");

$cuaca = $xml->Isi->Row[35]->Cuaca;
$kota = $xml->Isi->Row[35]->Kota;
$suhumin = $xml->Isi->Row[35]->SuhuMin;
$suhumax = $xml->Isi->Row[35]->SuhuMax;


$cuaca2 = $xml2->Isi->Row[35]->Cuaca;
$kota2 = $xml2->Isi->Row[35]->Kota;
$suhumin2 = $xml2->Isi->Row[35]->SuhuMin;
$suhumax2 = $xml2->Isi->Row[35]->SuhuMax;

?>