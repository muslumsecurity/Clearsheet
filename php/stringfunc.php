String İşlemleri:

strlen($string): Bir dizgenin uzunluğunu döndürür.
strpos($haystack, $needle): Bir dizgede belirli bir alt dizgenin ilk bulunduğu konumu döndürür.
str_replace($search, $replace, $subject): Bir dizgede belirli bir alt dizgeyi başka bir dizgeyle değiştirir.
Dizi İşlemleri:

count($array): Bir dizinin eleman sayısını döndürür.
array_push($array, $element): Bir dizinin sonuna bir veya daha fazla eleman ekler.
array_pop($array): Bir dizinin sonundaki elemanı çıkarır ve döndürür.
array_merge($array1, $array2): İki veya daha fazla diziyi birleştirir.
Matematiksel İşlemler:

abs($number): Bir sayının mutlak değerini döndürür.
round($number): Bir sayıyı en yakın tam sayıya yuvarlar.
rand($min, $max): Belirli bir aralıkta rastgele bir sayı üretir.
Dosya İşlemleri:

file_get_contents($filename): Bir dosyanın içeriğini bir dizge olarak döndürür.
file_put_contents($filename, $data): Bir dizgeyi belirtilen dosyaya yazar.
fopen($filename, $mode): Bir dosyayı açar ve bir kaynak işaretçisi döndürür.
Tarih ve Zaman İşlemleri:

date($format, $timestamp): Belirtilen tarih ve saati belirli bir biçimde döndürür.
time(): Geçerli zamanı Unix zaman damgası olarak döndürür.
strtotime($time, $now): Dizge tabanlı bir tarih ifadesini Unix zaman damgasına dönüştürür.
Veritabanı İşlemleri (örneğin MySQL):

mysqli_connect($host, $username, $password, $database): MySQL veritabanına bağlantı oluşturur.
mysqli_query($connection, $query): Veritabanında bir sorgu çalıştırır.
mysqli_fetch_assoc($result): Sorgu sonucundan bir satırı assoçatif bir dizi olarak döndürür.
URL İşlemleri:

urlencode($string): Bir dizgeyi URL uyumlu hale kodlar.
urldecode($string): URL kodlanmış bir dizgeyi orijinal haline çözer.
HTML İşlemleri:

htmlspecialchars($string): HTML özel karakterlerini kodlar, XSS saldırılarını engeller.
strip_tags($string): Bir dizgeden HTML ve PHP etiketlerini kaldırır.
JSON İşlemleri:

json_encode($data): Bir dizgeyi JSON biçimine dönüştürür.
json_decode($jsonString): Bir JSON dizgesini PHP nesnesine dönüştürür.

                                                    String işlemleri
#strlen
$string = "Merhaba, dünya!";
$length = strlen($string);
echo "Dizgenin uzunluğu: " . $length;
-------------------------------------
#strpos
$string = "Bu bir örnek dizgedir.";
$position = strpos($string, "örnek");
echo "Alt dizgenin konumu: " . $position;
------------------------------------
#str_replace
$string = "Merhaba, dünya!";
$newString = str_replace("Merhaba", "Selam", $string);
echo $newString;
------------------------------------

                                                      Dizi İşlemleri
#count_array
$array = array(1, 2, 3, 4, 5);
$count = count($array);
echo "Dizinin eleman sayısı: " . $count;
----------------------------------------
#array_push
$array = array(1, 2, 3);
array_push($array, 4, 5);
print_r($array);
----------------------------------------
#arra_pop
$array = array(1, 2, 3, 4);
$removedElement = array_pop($array);
echo "Çıkarılan eleman: " . $removedElement;
---------------------------------------
#array_merge
$array1 = array("kırmızı", "yeşil");
$array2 = array("mavi", "sarı");
$mergedArray = array_merge($array1, $array2);
print_r($mergedArray);
--------------------------------------
                                                    Matematiksel İşlemler
#abs
$number = -5;
$absoluteValue = abs($number);
echo "Mutlak değer: " . $absoluteValue;
-------------------------------------
#round
$number = 3.7;
$roundedNumber = round($number);
echo "Yuvarlanmış sayı: " . $roundedNumber;
-------------------------------------
#rand($min, $max)
$randomNumber = rand(1, 10);
echo "Rastgele sayı: " . $randomNumber;
