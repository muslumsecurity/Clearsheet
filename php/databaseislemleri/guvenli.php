Ekleme (İNSERT):
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=veritabani_adi', 'kullanici_adi', 'sifre');
    $sql = "INSERT INTO tablo_adi (kolon1, kolon2) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$deger1, $deger2]);
} catch (PDOException $e) {
    echo "Veritabanına ekleme hatası: " . $e->getMessage();
}


Listeleme (select):
try {
    $pdo = new PDO('mysql:host=localhost;dbname=veritabani_adi', 'kullanici_adi', 'sifre');
    $sql = "SELECT * FROM tablo_adi";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo $row['kolon1'].' '.$row['kolon2']. "\n";
    }
} catch (PDOException $e) {
    echo "Veritabanından listeleme hatası: " . $e->getMessage();
}


Limitli listeleme :
try {
    $pdo = new PDO('mysql:host=localhost;dbname=veritabani_adi', 'kullanici_adi', 'sifre');
    $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 2";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) {
        echo "Başlık: " . $row['title'] . "\n";
        echo "İçerik: " . $row['content'] . "\n";
        echo "Yazar: " . $row['author'] . "\n";
        echo "\n";
    }
} catch (PDOException $e) {
    echo "Veritabanından listeleme hatası: " . $e->getMessage();
}


Kullanıcı adı ve parola denetleme :
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
    // PDO hata modunu ayarla
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepared statement oluştur
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    
    // Değişkenleri bağla
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    
    // Sorguyu çalıştır
    $stmt->execute();
    
    // Kullanıcıyı kontrol et
    if ($stmt->rowCount() > 0) {
        // Kullanıcı bulundu
        echo "Giriş başarılı!";
    } else {
        // Kullanıcı bulunamadı veya parola hatalı
        echo "Kullanıcı adı veya parola hatalı!";
    }
} catch(PDOException $e) {
    echo "Veritabanından listeleme hatası: " . $e->getMessage();
}



Silme (Delete):
try {
    $pdo = new PDO('mysql:host=localhost;dbname=veritabani_adi', 'kullanici_adi', 'sifre');
    $sql = "DELETE FROM tablo_adi WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
} catch (PDOException $e) {
    echo "Veritabanından silme hatası: " . $e->getMessage();
}

Güncelleme(Update) : 
try {
    $pdo = new PDO('mysql:host=localhost;dbname=veritabani_adi', 'kullanici_adi', 'sifre');
    $sql = "UPDATE tablo_adi SET kolon1 = ?, kolon2 = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$deger1, $deger2, $id]);
} catch (PDOException $e) {
    echo "Veritabanında güncelleme hatası: " . $e->getMessage();
}
