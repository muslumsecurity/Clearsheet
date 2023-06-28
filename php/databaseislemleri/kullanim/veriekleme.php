1. Veri Ekleme (Insert):

<!-- HTML -->
<form method="POST">
    İsim: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    <button type="submit" name="ekle">Ekle</button>
</form>

<!-- PHP -->
<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ekle'])) {
    $sql = "INSERT INTO my_table (name, email) VALUES (?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$_POST['name'], $_POST['email']]);
}
?>
