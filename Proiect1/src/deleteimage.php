<?php
require_once 'connection.php';
require_once 'delete_trigger.php';

$sql1="SELECT * FROM bauturi WHERE id=:id";

$stmt1 = $con->prepare($sql1);
$stmt1->bindParam(':id', $_GET['id']);
$stmt1->execute();

$row = $stmt1->fetch(PDO::FETCH_ASSOC);

unlink($row["imagine"]);

$sql2="DELETE FROM bauturi WHERE id=:id";

$stmt2 = $con->prepare($sql2);
$stmt2->bindParam(':id', $_GET['id']);
$stmt2->execute();

header('location:administrarebaza.php');
?>