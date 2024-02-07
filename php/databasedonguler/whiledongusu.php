<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>while Döngüsü ile Veri Listeleme</title>
</head>
<body>
    <h1>while Döngüsü ile Veri Listeleme</h1>
    <ul>
        <?php
        // Veritabanından veri al
        $conn = new mysqli("localhost", "kullanici_adi", "sifre", "veritabani_adi");
        $result = $conn->query("SELECT name FROM students");

        // Verileri listeleyen while döngüsü
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row["name"] . "</li>";
            }
        } else {
            echo "Veritabanında kayıtlı öğrenci bulunamadı.";
        }
        ?>
    </ul>
</body>
</html>
