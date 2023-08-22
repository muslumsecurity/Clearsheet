count($array): Bir dizinin eleman sayısını döndürür.

array_push($array, $element1, $element2, ...): Bir dizinin sonuna bir veya daha fazla eleman ekler.

array_pop($array): Bir dizinin sonundaki elemanı çıkarır ve döndürür.

array_shift($array): Bir dizinin başındaki elemanı çıkarır ve döndürür.

array_unshift($array, $element1, $element2, ...): Bir dizinin başına bir veya daha fazla eleman ekler.

array_merge($array1, $array2, ...): İki veya daha fazla diziyi birleştirir.

array_slice($array, $start, $length): Bir diziden belirli bir alt dizge kesitini alır.

array_splice($array, $start, $length, $replacement): Bir diziyi belirli bir kesit ile değiştirir.

array_reverse($array): Bir dizinin elemanlarını tersine çevirir.

array_search($needle, $haystack): Bir değeri bir dizide arar ve bulunursa dizindeki konumunu döndürür.

in_array($needle, $haystack): Bir değerin bir dizide olup olmadığını kontrol eder.

array_keys($array): Bir dizinin anahtarlarını içeren yeni bir dizi döndürür.

array_values($array): Bir dizinin değerlerini içeren yeni bir dizi döndürür.

array_unique($array): Bir dizideki yinelenen değerleri kaldırır.

array_filter($array, $callback): Bir dizinin elemanlarını belirtilen bir işlevle filtreler.

array_map($callback, $array1, $array2, ...): Bir veya daha fazla diziyi belirtilen bir işlevle işler ve sonuçları yeni bir dizi olarak döndürür.

array_reduce($array, $callback, $initial): Bir diziyi belirtilen bir işlevle azaltır (reduce) ve sonucu döndürür.

sort($array): Bir diziyi sıralar (küçükten büyüğe).

rsort($array): Bir diziyi tersine sıralar (büyükten küçüğe).

asort($array): Bir diziyi değerlerine göre sıralar ve anahtarları korur.

ksort($array): Bir diziyi anahtarlarına göre sıralar.

array_multisort($array1, $array2, ...): Birden fazla diziyi birlikte sıralar.

array_rand($array, $num): Bir diziden belirli sayıda rastgele anahtar seçer ve bunları döndürür.

shuffle($array): Bir dizinin elemanlarını karıştırır.

array_fill($start_index, $num, $value): Bir diziyi belirtilen bir değerle doldurur.

array_column($array, $column_key, $index_key): Bir dizinin belirli bir sütununu döndürür.

array_intersect($array1, $array2, ...): Birden fazla dizinin kesişimini bulur.

array_diff($array1, $array2, ...): İlk dizide bulunan, ancak diğer dizilerde bulunmayan elemanları döndürür.

array_combine($keys, $values): Bir anahtar dizisi ve bir değer dizisi kullanarak yeni bir dizi oluşturur.

array_walk($array, $callback): Bir dizinin her bir elemanını belirtilen bir işlevle işler.

array_change_key_case($array, $case): Bir dizinin anahtarlarını büyük veya küçük harfe dönüştürür.

array_fill_keys($keys, $value): Belirli anahtarları belirtilen bir değerle doldurur.

array_key_exists($key, $array): Bir dizide belirli bir anahtarın var olup olmadığını kontrol eder.
