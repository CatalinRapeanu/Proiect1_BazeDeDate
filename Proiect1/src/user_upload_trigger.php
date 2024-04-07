<?php
require_once 'connection.php';

$sql1 = "DROP TRIGGER IF EXISTS BeforeUserInsertTrigger";
$sql2 = "CREATE TRIGGER BeforeUserInsertTrigger BEFORE INSERT ON conturi FOR EACH ROW
BEGIN 
    SET NEW.username = UPPER(NEW.username);
END;";

$stmt1 = $con->prepare($sql1);
$stmt2 = $con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();

$sql3 = "DROP TRIGGER IF EXISTS AfterUserInsertTrigger";
$sql4 = "CREATE TRIGGER AfterUserInsertTrigger AFTER INSERT ON conturi FOR EACH ROW
BEGIN 
    INSERT INTO conturi_update(nume, status, edtime) VALUES (NEW.username, 'INSERTED', NOW());
END;";

$stmt3 = $con->prepare($sql3);
$stmt4 = $con->prepare($sql4);
$stmt3->execute();
$stmt4->execute();