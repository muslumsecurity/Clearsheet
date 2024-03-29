<?php

class AuthenticationManager{
  private $host = 'localhost';
  private $dbname = 'your_database_name';
  private $username = 'your_username';
  private $password = 'your_password';

  private function connectToDatabase(){
     try {
        // PDO nesnesini oluştur ve veritabanına bağlan
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
        $pdo = new PDO($dsn, $this->username, $this->password);
        
        // PDO istisnasız modunu ayarla
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Bağlantıyı döndür
        return $pdo;
    } catch (PDOException $e) {
        // Bağlantı hatası durumunda istisnayı yakala ve hata mesajını yazdır
        echo "Veritabanına bağlanırken bir hata oluştu: " . $e->getMessage();
        // Opsiyonel olarak loglama veya başka bir işlem yapabilirsiniz
        return null;
    }
  }

  public function authLogin($userName, $userPassword){
    try {
       $conn = $this->connectToDatabase();
      // PDO hata modunu ayarla
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      // Prepared statement oluştur
      $stmt = $conn->prepare("SELECT * FROM basics WHERE username = :username AND password = :password");
    
      // Değişkenleri bağla
      $stmt->bindParam(':username', $userName);
      $stmt->bindParam(':password', $userPassword);
    
      // Sorguyu çalıştır
      $stmt->execute();
    
      // Kullanıcıyı kontrol et
      if ($stmt->rowCount() > 0) {
          // Kullanıcı bulundu
          $response =  ["Message" => "Hoş geldiniz. -> " . $userName];
      } else {
          // Kullanıcı bulunamadı veya parola hatalı
          $response =  ["Message" => "Giriş başarısız!"];
      }
      return $response;
    } catch(PDOException $e) {
      // Veritabanı hatasını yakala ve kullanıcıya uygun bir mesaj gönder
      return ["Error" => "Veritabanından listeleme hatası: " . $e->getMessage()];
    }
  }
}

// Kullanıcı adı ve parolanın doğruluğunu kontrol etme
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="Giriş yapınız"');
    header('HTTP/1.0 401 Unauthorized');
    echo json_encode(["Message" => "Kimlik bilgileri sağlanmadı."]);
} else {
    $AuthenticationManager = new AuthenticationManager;
    echo json_encode($AuthenticationManager->authLogin($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']));
}

?>
