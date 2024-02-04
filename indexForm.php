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
    // Si tous les champs sont saisie on affiche la eponse
    if (isset($_GET["nom"])) {
        if (!empty($_GET["genre"]) && ($_GET["nom"]) && ($_GET["prenom"]) && ($_GET["email"]) && ($_GET["message"])) {
            $reponse = "Bonjour " . $_GET["nom"] . " ! ";
        } else $reponse = "Aucune valeur saisie.";
    } else $reponse = "Utilisation incorrecte.";

    // Si les champs du formulaire sont passés via la méthode GET
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Récupérer les champs du formulaire depuis le formulaire
        $nom = $_GET["nom"];
        $email = $_GET["email"];
        $prenom = $_GET["prenom"];
        $message = $_GET["message"];
        
        // strlen pour la vérification la longueur du nom et du message du formulaire
        // strpos pour vérifier si le caractère @ est présent dans le champ email
        if ((strlen($nom) >= 3) && (strpos($email, "@") !== false) && (strlen($message) >= 2) ) {
            // Après vérification tous les champs sont saisis suivant les conditions ci-dessus
            echo "Les champs sont correctement saisis.</p>";
        } else {
            // Sinon, le message suivant s'affiche
            echo "<ul ><strong>Veuillez vérifier que</strong> : 
            <li>Le nom du formulaire comporte au moins 3 caractères.</li>
            <li>L'adresse e-mail contient bien un '@'.</li>
            <li>Le nombre de caractère de votre message soit compris entre 2 et 200.</li>
            </ul>
            ";
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
    <p><?php echo "Nom: $nomFormate <br>" ?></p>
    <p><?php echo "Prénom: $prenomFormate <br>" ?></p>
    <p><?php echo "Email: $emailFormate <br>" ?></p>
    <p><?php echo "Message: $emailFormate <br>" ?></p>


</body>

</html>