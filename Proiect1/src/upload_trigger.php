<?php
require_once 'connection.php';

$sql1 = "DROP TRIGGER IF EXISTS BeforeInsertTrigger";
$sql2 = "CREATE TRIGGER BeforeInsertTrigger BEFORE INSERT ON bauturi FOR EACH ROW
BEGIN 
    SET NEW.nume = UPPER(NEW.nume);
END;";

$stmt1 = $con->prepare($sql1);
$stmt2 = $con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();

$sql3 = "DROP TRIGGER IF EXISTS AfterInsertTrigger";
$sql4 = "CREATE TRIGGER AfterInsertTrigger AFTER INSERT ON bauturi FOR EACH ROW
BEGIN 
    INSERT INTO bauturi_update(nume, status, edtime) VALUES (NEW.nume, 'INSERTED', NOW());
END;";

$stmt3 = $con->prepare($sql3);
$stmt4 = $con->prepare($sql4);
$stmt3->execute();
$stmt4->execute();