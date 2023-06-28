3. Veri Güncelleme (Update):

<!-- HTML -->
<form method="POST">
    ID: <input type="number" name="id"><br>
    İsim: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    <button type="submit" name="guncelle">Güncelle</button>
</form>

<!-- PHP -->
<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guncelle'])) {
    $sql = "UPDATE my_table SET name = ?, email = ? WHERE id = ?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$_POST['name'], $_POST['email'], $_POST['id']]);
}
?>
