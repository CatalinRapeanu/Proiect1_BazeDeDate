<?php
require_once "connection.php";
require_once 'upload_trigger.php'; 

if(isset($_POST['upload'])){
    if(!empty($_POST['nume']) && !empty($_POST['ingrediente']) && !empty($_POST['tipbautura']) && !empty($_POST['pret']) && !empty($_FILES['image']['name'])) {
        $text=$_POST['nume'];
        $target="./multimedia/".md5(uniqid(time())).basename($_FILES['image']['name']);
        $ingrediente=$_POST['ingrediente'];
        $tipb=$_POST['tipbautura'];
        $pret=$_POST['pret'];

        $sql="INSERT INTO bauturi(nume, imagine, ingrediente, tip_bautura, pret) VALUES(:numeBautura, :imagine, :ingrediente, :tipBautura, :pret)";
        
        $stmt = $con->prepare($sql);

        $stmt->bindParam(':numeBautura', $text);
        $stmt->bindParam(':imagine', $target);
        $stmt->bindParam(':ingrediente', $ingrediente);
        $stmt->bindParam(':tipBautura', $tipb);
        $stmt->bindParam(':pret', $pret);
    
        if($stmt->execute()){
            if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
                //header('location:administrarebaza.php');
                echo "<script>alert('Băutura a fost încărcată cu succes!'); 
                      window.location.href = 'administrarebaza.php';</script>";
            }
            else{ 
                echo "<script>alert('Eroare la incarcarea imaginii.');
                      window.location.href = 'upload.php';</script>";
            }
        }
        else{ 
            echo "<script>alert('Eroare la inserarea datelor in baza de date.');
                  window.location.href = 'upload.php';</script>";
        }
    }else { 
        echo "<script>alert('Toate câmpurile sunt obligatorii!');
              window.location.href = 'upload.php';</script>";
    }
}   