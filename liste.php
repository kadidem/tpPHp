<?php
$conn = new mysqli("localhost", "root", "", "portail");
$req = "order by id DESC LIMIT 10 ";
// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données: " . $conn->connect_error);
}
if(isset($_GET['app']) && $_GET['app'] == "all"){
    // ajouter d'un requette qui nous permettre d'afficher tous les apprenants ;
    $req = "";
}

    // Récupérer tous les apprenants
    $sql = "SELECT * FROM apprenants ";//.$req;
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Portail ODK - Liste des apprenants</title>
  <link rel="stylesheet" href="/css/style.css">
  
  <style>

    body {
  
  border: 1px solid #ddd;
}
    table {
  width: 100%;
  border-collapse: collapse;
}

table th,
table td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

table th {
  background-color: #f2f2f2;
}
.button {
  display: inline-block;
  background-color: #428bca;
  color: #fff;
  padding: 10px 20px;
  text-decoration: none;
  border: none;
  cursor: pointer;
}
header {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
img{
    height:100px;
    width:100px;
}
  </style>
</head>
<body>
  <header>
    <h1>Liste des apprenants</h1>
    <a href="index.html" class="button">Ajouter un apprenant</a>
</header>
  

  <table>
    <thead>
      <tr>
        <th>Matricule</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Age</th>
        <th>Date de naissance</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Photo</th>
        <th>Promotion</th>
        <th>Année de certification</th>
      </tr>
    </thead>
    <tbody>

      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['matricule'] . "</td>";
          echo "<td>" . $row['nom'] . "</td>";
          echo "<td>" . $row['prenom'] . "</td>";
          echo "<td>" . $row['age'] . "</td>";
          echo "<td>" . $row['date_naissance'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          echo "<td>" . $row['numero_telephone'] . "</td>";
          echo "<td><img src='image/" . $row['photo'] . "'></td>";
          echo "<td>" . $row['id_promotion'] . "</td>";
          echo "<td>" . $row['annee_certification'] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='10'>Aucun apprenant inscrit.</td></tr>";
      }
      ?>
    </tbody>
  </table>
    <?php if(!isset($_GET['app'])):?>
    <div style="text-align:center">
        <a href="liste.php?app=all" class="button">Afficher tout</a>
    </div>
    
    <?php endif?>
    </body>
    </html>