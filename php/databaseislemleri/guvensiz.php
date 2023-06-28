Ekleme (INSERT):
$pdo = new PDO('mysql:host=localhost;dbname=veritabani_adi', 'kullanici_adi', 'sifre');
$deger1 = $_POST['deger1'];
$deger2 = $_POST['deger2'];
$sql = "INSERT INTO tablo_adi (kolon1, kolon2) VALUES ('$deger1', '$deger2')";
$pdo->query($sql);

Listeleme (SELECT):
$pdo = new PDO('mysql:host=localhost;dbname=veritabani_adi', 'kullanici_adi', 'sifre');
$sql = "SELECT * FROM tablo_adi";
foreach ($pdo->query($sql) as $row) {
   echo $row['kolon1'].' '.$row['kolon2']. "\n";


Silme (DELETE):
$pdo = new PDO('mysql:host=localhost;dbname=veritabani_adi', 'kullanici_adi', 'sifre');
$id = $_POST['id'];
$sql = "DELETE FROM tablo_adi WHERE id = $id";
$pdo->query($sql);


Güncelleme (UPDATE):
$pdo = new PDO('mysql:host=localhost;dbname=veritabani_adi', 'kullanici_adi', 'sifre');
$id = $_POST['id'];
$deger1 = $_POST['deger1'];
$deger2 = $_POST['deger2'];
$sql = "UPDATE tablo_adi SET kolon1 = '$deger1', kolon2 = '$deger2' WHERE id = $id";
$pdo->query($sql);
