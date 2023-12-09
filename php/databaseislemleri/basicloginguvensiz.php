<?php
session_start();

// Veritabanı bağlantısı için bilgiler
$host = 'localhost';
$dbname = 'veritabani_adi';
$username = 'veritabani_kullanici';
$password = 'veritabani_sifre';

// Veritabanına bağlan
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

// Form gönderilmiş mi kontrolü
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formdan gelen kullanıcı adı ve şifre
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kullanıcı var mı kontrolü (GÜVENSİZ YOL)
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $pdo->query($query);

    if ($result->rowCount() > 0) {
        // Giriş başarılı, oturum başlat
        $_SESSION['user'] = $username;
        header("Location: dashboard.php"); // Örneğin, giriş başarılıysa yönlendirme
        exit();
    } else {
        $error = "Hatalı kullanıcı adı veya şifre!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="username">Kullanıcı Adı:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Şifre:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Giriş Yap</button>
    </form>
</body>
</html>
