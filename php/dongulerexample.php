for : 
<?php
$numbers = array(1, 2, 3, 4, 5);

for ($i = 0; $i < count($numbers); $i++) {
    echo $numbers[$i] . "<br>";
}
?>


while : 
<?php
$numbers = array(1, 2, 3, 4, 5);
$i = 0;

while ($i < count($numbers)) {
    echo $numbers[$i] . "<br>";
    $i++;
}
?>


foreach : 
<?php
$students = array(
    array("name" => "John", "age" => 20),
    array("name" => "Alice", "age" => 22),
    array("name" => "Bob", "age" => 21)
);

foreach ($students as $student) {
    echo "Name: " . $student["name"] . ", Age: " . $student["age"] . "<br>";
}
?>
