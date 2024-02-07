<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON ile Döngü Kullanımı</title>
</head>
<body>
    <h1>JSON ile Döngü Kullanımı</h1>
    <ul>
        <?php
        // JSON verisi
        $json_data = '[
            {"name": "John", "age": 25},
            {"name": "Alice", "age": 22},
            {"name": "Bob", "age": 30}
        ]';

        // JSON verisini diziye çevirme
        $data = json_decode($json_data, true);

        // Dizi üzerinde döngü kullanarak verileri listeleyin
        foreach ($data as $item) {
            echo "<li>Name: " . $item['name'] . ", Age: " . $item['age'] . "</li>";
        }
        ?>
    </ul>
</body>
</html>
