<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ekle'])) {
        $sql = "INSERT INTO my_table (name, email) VALUES (?, ?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$_POST['name'], $_POST['email']]);
    } elseif (isset($_POST['sil'])) {
        $sql = "DELETE FROM my_table WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id']]);
    } elseif (isset($_POST['guncelle'])) {
        $sql = "UPDATE my_table SET name = ?, email = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['name'], $_POST['email'], $_POST['id']]);
    }
}
?>

<form method="POST">
    ID (güncelleme ve silme işlemleri için gereklidir): <input type="number" name="id"><br>
    İsim: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    <button type="submit" name="ekle">Ekle</button>
    <button type="submit" name="sil">Sil</button>
    <button type="submit" name="guncelle">Güncelle</button>
</form>

<h2>Liste</h2>
<ul>
<?php
$sql = "SELECT * FROM my_table";
foreach ($pdo->query($sql) as $row) {
    echo "<li>{$row['name']} ({$row['email']})</li>";
}
?>
</ul>
