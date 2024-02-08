<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO ile Veri Listeleme</title>
</head>
<body>
    <h1>PDO ile Veri Listeleme</h1>
    <ul>
        <?php
        try {
            // PDO bağlantısını oluştur
            $pdo = new PDO("mysql:host=localhost;dbname=hack", "root", "");

            // Hata modunu ayarla
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Veritabanından veri al
            $statement = $pdo->query("SELECT * FROM web_users");

            // Verileri listeleyen foreach döngüsü
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>" . $row["name"] . "</li>";
            }

            // Bağlantıyı kapat
            $pdo = null;
        } catch (PDOException $e) {
            echo "Bir hata oluştu: " . $e->getMessage();
        }
        ?>
    </ul>
</body>
</html>
