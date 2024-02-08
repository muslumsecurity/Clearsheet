<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>While Döngüsü ile Veri Listeleme</title>
</head>
<body>
    <h1>While Döngüsü ile Veri Listeleme</h1>
    <ul>
        <?php
        try {
            // Veritabanına bağlan
            $conn = new mysqli("localhost", "root", "", "hack");

            // Bağlantı hatasını kontrol et
            if ($conn->connect_error) {
                die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
            }

            // Veritabanından veri al
            $result = $conn->query("SELECT * FROM web_users");

            // Verileri listeleyen while döngüsü
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row["name"] . "</li>";
            }

            // Bağlantıyı kapat
            $conn->close();
        } catch (Exception $e) {
            echo "Bir hata oluştu: " . $e->getMessage();
        }
        ?>
    </ul>
</body>
</html>
