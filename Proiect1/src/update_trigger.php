<?php
require_once 'connection.php';

$sql1 = "DROP TRIGGER IF EXISTS BeforeUpdateTrigger";
$sql2 = "CREATE TRIGGER BeforeUpdateTrigger BEFORE UPDATE ON bauturi FOR EACH ROW
BEGIN 
    SET NEW.nume = LOWER(NEW.nume);
END;";

$stmt1 = $con->prepare($sql1);
$stmt2 = $con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();

$sql3 = "DROP TRIGGER IF EXISTS AfterUpdateTrigger";
$sql4 = "CREATE TRIGGER AfterUpdateTrigger AFTER INSERT ON bauturi FOR EACH ROW
BEGIN 
    INSERT INTO bauturi_update(nume, status, edtime) VALUES (NEW.nume, 'UPDATED', NOW());
END;";

$stmt3 = $con->prepare($sql3);
$stmt4 = $con->prepare($sql4);
$stmt3->execute();
$stmt4->execute();