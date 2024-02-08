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

    // Verileri listeleyen foreach döngüsü
    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($rows as $row) {
            echo "<li>" . $row["name"] . "</li>";
        }
    } else {
        echo "Veritabanında kayıtlı öğrenci bulunamadı.";
    }

    // Bağlantıyı kapat
    $conn->close();
} catch (Exception $e) {
    echo "Bir hata oluştu: " . $e->getMessage();
}
?>
