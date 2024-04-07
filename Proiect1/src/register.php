<?php
require_once 'user_upload_trigger.php';

session_start();

$status=0;
require_once 'connection.php';
if(isset($_POST['Register'])){
    $nume=$_POST['nume'];
    $pass=$_POST['pass'];
    $usertype='user';
    $sql="SELECT * FROM conturi WHERE username=:username";
    
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':username', $nume);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        $status=1;
    }
    if($status==0){
        if($nume!=NULL && $pass!=NULL){
            $sql1 = "INSERT INTO conturi (username, password, user_type) VALUES (:username, :password, :userType)";

            $stmt1 = $con->prepare($sql1);
            $stmt1->bindParam(':username', $nume);
            $stmt1->bindParam(':password', $pass);
            $stmt1->bindParam(':userType', $usertype); 
            
            if($stmt1->execute()){ 
                header('location:rememberme.php');
            }
            else{
                $errorInfo = $stmt->errorInfo();
                echo "Error: " . $errorInfop[2];
            }
        }
        else{ 
            header('location:registerform.php');
        }
    }
}
?>