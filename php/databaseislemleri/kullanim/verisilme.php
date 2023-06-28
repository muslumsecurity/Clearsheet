2. Veri Silme (Delete):

<!-- HTML -->
<form method="POST">
    ID: <input type="number" name="id"><br>
    <button type="submit" name="sil">Sil</button>
</form>

<!-- PHP -->
<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sil'])) {
    $sql = "DELETE FROM my_table WHERE id = ?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$_POST['id']]);
}
?>
