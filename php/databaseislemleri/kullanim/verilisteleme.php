4. Veri Listeleme (Select):

<!-- HTML -->
<h2>Liste</h2>
<ul id="list"></ul>

<!-- PHP -->
<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$sql = "SELECT * FROM my_table";
foreach ($pdo->query($sql) as $row) {
    echo "<li>{$row['name']} ({$row['email']})</li>";
}
?>
