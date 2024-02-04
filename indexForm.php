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
    if (isset($_GET["nom"])) {
        if (!empty($_GET["genre"]) && ($_GET["nom"]) && ($_GET["prenom"]) && ($_GET["email"]) && ($_GET["message"])) {
            $answer = "Bonjour " . $_GET["nom"] . " ! ";
        } else $answer = "Aucune valeur saisie.";
    } else $answer = "Utilisation incorrecte.";

    // Supposons que le nom du formulaire soit passé via la méthode GET
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Récupérer le nom du formulaire depuis le formulaire
        $nom = $_GET["nom"];
        $email = $_GET["email"];
        $prenom = $_GET["prenom"];
       
        // strlen pour la vérification la longueur du nom du formulaire
        if (strlen($nom) >= 3) {
            // Le nom du formulaire a au moins 3 caractères
            echo "Le nom est correctement saisi.<br>";
        } else {
            // Le nom du formulaire ne comporte pas au moins 3 caractères
            echo "Le nom du formulaire doit comporter au moins 3 caractères.<br>";
        }
    }
    // strpos pour vérifier si le caractère @ est présent dans le champ email
    if (strpos($email, "@") !== false) {
        echo "L'adresse e-mail contient un '@'.<br>";
    } else {
        echo "L'adresse e-mail ne contient pas de '@'.<br>";
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

    <p><?php echo $answer ?></p>
    <!-- Afficher la fiche formatée -->
    <p><?php echo "Nom: $nomFormate <br>" ?></p>
    <p><?php echo "Prénom: $prenomFormate <br>" ?></p>
    <p><?php echo "Email: $emailFormate <br>"?></p>


</body>

</html>