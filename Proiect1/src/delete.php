<?php
    require_once "connection.php";

    $sql="DELETE FROM conturi WHERE id=:id"; 

    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();

    header('Location:administrareconturi.php');
?>