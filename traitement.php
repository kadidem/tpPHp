<?php
$login = "root";
$password = "";
// try {
    $conex =new PDO("mysql:host=localhost:3306;dbname=portail",$login,$password);
  

    $insert = $conex->prepare('INSERT INTO apprenants(matricule,nom,prenom,age,date_naissance,email,numero_telephone,photo,
        id_promotion,annee_certification) VALUES(
        ?,?,?,?,?,?,?,?,?,?)');
    // Génération du matricule
$promotion = $_POST['promos'];
$matricule = generateMatricule($promotion);
$photo = $matricule.".".strtolower(pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION));
   //liaison des valeurs
   $insert->bindValue(1, $matricule, PDO::PARAM_STR);
    $insert->bindValue(2,$_POST['nom'],PDO::PARAM_STR);
    $insert->bindValue(3,$_POST['prenom'],PDO::PARAM_STR);
    $insert->bindValue(4,$_POST['age'],PDO::PARAM_INT);
    $insert->bindValue(5,$_POST['date'],PDO::PARAM_STR);
    $insert->bindValue(6,$_POST['email'],PDO::PARAM_STR);
    $insert->bindValue(7,$_POST['numero'],PDO::PARAM_STR);
    $insert->bindValue(8,$photo,PDO::PARAM_STR);
    $insert->bindValue(9,$_POST['promos'],PDO::PARAM_INT);
    $insert->bindValue(10,$_POST['annee'],PDO::PARAM_STR);
  
   //execution de la requete

   $insertion = $insert->execute();

   if($insertion){
        move_uploaded_file($_FILES['photo']['tmp_name'],"image/".$photo);
       echo("insertion reussi");
       header("location:index.html");
   }
   else{
       echo("echec d'insertion");
   }
  
   function generateMatricule($promotion) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $matricule = $promotion . substr(str_shuffle($characters), 0, 4);
    return $matricule;
}
 
 ?>
