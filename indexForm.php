<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>TEST PHP</title>
</head>

<body>

    <?php
    // Si tous les champs sont saisie on affiche la reponse
    
    if (isset($_GET["nom"])) {
        if (!empty($_GET["genre"]) && ($_GET["nom"]) && ($_GET["prenom"]) && ($_GET["email"]) && ($_GET["message"])) {
            $reponse = "Bonjour " . $_GET["nom"] . " ! ";
        } else $reponse = "Aucune valeur saisie.";

        // Si les champs du formulaire sont passés via la méthode GET
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Récupérer les champs du formulaire depuis le formulaire
            $nom = $_GET["nom"];
            $email = $_GET["email"];
            $prenom = $_GET["prenom"];
            $message = $_GET["message"];

            // strlen pour la vérification la longueur du nom et du message du formulaire
            // strpos pour vérifier si le caractère @ est présent dans le champ email
            if ((strlen($nom) >= 3)) {
                // Après vérification tous les champs sont saisis suivant les conditions ci-dessus
                echo "<p>Le nom du formulaire comporte au moins 3 caractères.</p>";
            } 
            else{echo "<p>Le nom du formulaire comporte au moins 3 caractères.</p>";}

            if(strpos($email, "@") !== false){
                // Sinon, le message suivant s'affiche
                echo "<p>L'adresse e-mail contienne bien un '@'.</p>"; 
            }
            else

            if (strlen($message) >= 2) {
                echo "<p>Le message comporte au moins 2 caractères.</p>"; 
            }
            else {

            }
        }
    }
    // Fonction pour formater le nom et le prénom
    function formaterNomPrenom($nomPrenom)
    {
        // Convertir la première lettre en majuscule et le reste en minuscules
        return ucfirst(strtolower($nomPrenom));
    }

    // Formater les données
    $emailFormate = strtolower($email);
    $nomFormate = formaterNomPrenom($nom);
    $prenomFormate = formaterNomPrenom($prenom);
    ?>


    <p><?php echo $reponse ?></p>
    <!-- Afficher la fiche formatée -->
    <div id="fiche">
        <p><?php echo "<p>Nom: $nomFormate <br></p>" ?></p>
        <p><?php echo "Prénom: $prenomFormate <br>" ?></p>
        <p><?php echo "Email: $emailFormate <br>" ?></p>
        <p><?php echo "Message: $message <br>" ?></p>
    </div>

    <!-- formulaire -->
    <h2>Contactez-nous</h2>
       
       <div id="contenu">
       <form action="indexForm.php" method="get" >
            <label>Genre :</label>
            <label><input type="checkbox" name="genre" value="homme"> Homme</label>
            <label><input type="checkbox" name="genre" value="femme"> Femme</label>
            <label><input type="checkbox" name="genre" value="autre"> Autre</label>

            <label for="nom">Nom :</label>
            <input type="text" name="nom" value="<?php if (isset($_GET['nom'])) {
                                                        echo $_GET['nom'];
                                                        } ?>"><br>

            <label for="nom">Prénom:</label>
            <input type="text" name="prenom" value="<?php if (isset($_GET['prenom'])) {
                                                        echo $_GET['prenom'];
                                                        } ?>"><br>

            <label for="email">Email :</label>
            <input type="text" name="email" value="<?php if (isset($_GET['email'])) {
                                                        echo $_GET['email'];
                                                        } ?>"><br>

            <label for="message">Message :</label>
            <textarea name="message" rows="4" value="<?php if (isset($_GET['message'])) {
                                                        echo $_GET['nom'];
                                                        } ?>"></textarea><br>

            <input type="submit" value="Envoyer">
        </form>
        <aside id="image">
            <img src="images/kids.png" alt="enfants">
        </aside>
       </div>
    <!-- fin formulaire -->
</body>

</html>