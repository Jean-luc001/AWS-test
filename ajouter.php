
  <?php
       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($nom) && isset($prenom) && isset($Numero) && $Adresse){
                //connexion à la base de donnée
                include_once "connexion.php";
                //requête d'ajout
                $req = mysqli_query($con , "INSERT INTO participant VALUES(NULL, '$nom', '$prenom', '$Numero','$Adresse')");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                  
                }else {//si non
                    $message = "Participant non ajouté";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  
    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png">Voir la liste</a>
        <h2>Ajouter un participant</h2>
        <p class="erreur_message">
            <?php 
            // si la variable message existe , affichons son contenu
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>Prénom</label>
            <input type="text" name="prenom">
            <label>Numero de téléphone</label>
            <input type="text" name="Numero">
            <label>Adresse email</label>
            <input type="text" name="Adresse">
            <input type="submit" value="Ajouter" name="button">
        </form>
        <p class="erreur_message">
            <?php 
            // si la variable message existe , affichons son contenu
            if(isset($req)){
                 if(($req)){
                echo "Ajouter avec succes";
            }
              
        }
            ?>

        </p>
    </div>
</body>
</html>
