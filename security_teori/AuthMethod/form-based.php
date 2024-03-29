<?php

class AuthenticationManager{
  private $host = '';
  private $dbname = '';
  private $username = '';
  private $password = '';

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
      // Connection to database function
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


if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $userName = $_POST['userName'];
  $userPassword = $_POST['userPassword'];
  if(isset($userName) && isset($userPassword)){
    if(!empty($userName) && !empty($userPassword)){
      $AuthenticationManager = new AuthenticationManager;
      echo json_encode($AuthenticationManager->authLogin($userName,$userPassword));
    }
  }
}

?>

<html>
  <head></head>
  <body>
    <form action="" method="post"> 
       Username : <input type="text" name="userName"></br>
       Password : <input type="text" name="userPassword"></br>
                  <input type="submit" value="gonder">
    </form>
  </body>
</html>
