<html>
<head>
  <meta charset="utf-8">
</head>
    <body>



<?php

$words = "php neler yapılabilir";
echo $words."</br>";

// words degiskeninden gelen veriyi kuculten fonksiyon
$kucult = strtolower($words);
echo $kucult."</br>";

// words degiskeninden gelen veriyi buyutur.
$buyut = strtoupper($words);
echo $buyut."</br>" ;

//metnin içinde ki kelimelerinin baş harfini büyütür
$basharfler = ucwords($words);
echo $basharfler."</br>";

// Cümlenin bas harfini büyütür
$bashharf = ucfirst($words);
echo $bashharf."</br>";

// Türkçe karakterlerde sorun yaşamamak için kullanılan fonksiyon
$turkce = mb_strtolower($words);
echo $turkce;
?>



</body>
</html>
