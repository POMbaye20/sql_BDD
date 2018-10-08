<?php require 'connexion.php'; ?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Immobilier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>La maison du bonheur ; Location et vente dans toute la France</h1>

    <?php 
        $sql = $pdo ->prepare ("SELECT * FROM agence ORDER BY nom ASC");
        $sql -> execute();
    ?>
       <p>1/ Afficher le nom des agences : <code>SELECT * FROM agence</code></p>
       <p>1bis/ en les triant par nom : <code>SELECT * FROM agence ORDER BY nom ASC</code></p>
      

       <table border="1">
           <tr>
               <th>Nom</th>
               <th>Adresse</th>
           </tr>
           <?php    while ($ligne_agence = $sql->fetch()) { // ou :
            // echo $ligne_agence['nom'];
            ?>
           <tr>
               <td><?php echo $ligne_agence['nom']; ?></td> 
               <td><?php echo $ligne_agence['adresse']; ?></td> 
           </tr>
           <?php } // ou endwhile; ?>
       </table>
            
        <hr>

        <?php 
         $sql = $pdo ->prepare("SELECT idAgence FROM agence WHERE nom='orpi'");
         $sql -> execute();
        ?>

       <p>2/ Afficher le numéro ou l'identifiant de l'agence Orpi
        <code>SELECT idAgence FROM agence WHERE nom='orpi'</code>
        </p>

        <table border="1">
           <tr>
               <th>Identifiant de l'agence</th>
           </tr>
           <?php    while ($idAgence = $sql->fetch()) { // ou :
            // echo $idAgence['nom'];
            ?>
           <tr>
               <td><?php echo $idAgence['idAgence']; ?></td> 
           </tr>
           <?php } // ou endwhile; ?>
       </table>
       
        <hr>

       <?php 
           $sql = $pdo ->prepare("SELECT * FROM logement LIMIT 0,1");
           $sql -> execute(); 
       ?>
       
       <p>3/ Quel est le premier enregistrement de la table logement ? :
            <code>SELECT * FROM logement LIMIT 0,1</code>
            Si on veut les 2 premiers ex. <code>SELECT * FROM logement LIMIT 0,2</code> etc.
            <code>SELECT * FROM logement ORDER BY idLogement, ville DESC LIMIT 0,4</code>
        </p>

        <table border="1">
           <tr>
               <th>Premier enregistrement de la table de logement</th>
           </tr>
           <?php    while ($premierEnregistrement = $sql->fetch()) { // ou :
            // echo $premierEnregistrement['nom'];
            ?>
           <tr>
               <td><?php echo $premierEnregistrement['idLogement']; ?></td> 
           </tr>
           <?php } // ou endwhile; ?>
       </table>

       <hr>

        <?php
         $sql = $pdo ->query("SELECT COUNT(*) AS 'nombre de logements' FROM logement");
        $ligne_compte->fetch();
        echo $ligne_compte;
        ?>

        <p>4/Afficher le nombre de logement (avec un alias "nombre_de_logements") ? qui va permettre de créer une table virtuelle :
        <code>SELECT COUNT(*) AS 'nombre de logements' FROM logement</code>

        

       <hr>

        <?php
         $sql = $pdo ->prepare("SELECT * FROM logement  WHERE prix < 150000 AND categorie 'vente' 
        ORDER BY prix ");
         $sql -> execute(); 
        ?>

        <p>5/Afficher les logements à vendre à moins de 150 000 € dans l'ordre croissant des prix :
        <code>SELECT * FROM logement  WHERE prix < 150000 AND categorie 'vente' 
        ORDER BY prix</code>

         <table border="1">
           <tr>
               <th>Logement à vendre à moins de 150 000 €</th>
           </tr>
           <?php    while ($logementVente = $sql->fetch()) { // ou :
            // echo $logementVente[''];
            ?>
           <tr>
               <td><?php echo $logementVente['1']; ?></td> 
           </tr>
           <?php } // ou endwhile; ?>
       </table>




</body>
</html>

