<?php $ip = $_SERVER['REMOTE_ADDR'];

if (!empty($_GET['api'])){

    header('Access-Control-Allow-Origin: *');
    echo json_encode(["ip"=>$ip]);

} else {

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IP - Tyrolium</title>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JLLQJ3XW3P"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-JLLQJ3XW3P');
    </script>
    <link href="https://tyrolium.fr/Contenu/Image/Tyrolium Site.png" rel="shortcut icon">
    <!-- Chargement de Tailwind CSS pour un design moderne et responsive -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center p-4">
    <!-- Conteneur principal de la page -->
    <div class="bg-gray-800 p-8 md:p-12 rounded-xl shadow-2xl max-w-lg w-full text-center border border-gray-700">
        <h1 class="text-3xl md:text-4xl font-bold mb-4 text-emerald-400 drop-shadow-lg">Votre IP publique</h1>
        <p class="text-gray-400 mb-6">
            Cette page affiche votre adresse ip publique
        </p>

        <!-- Section où l'adresse IP sera affichée -->
        <div id="ip-container" class="bg-gray-700 rounded-lg p-6 flex flex-col items-center shadow-inner border border-gray-600 transition-all duration-500">
            <span class="text-gray-400 text-lg mb-2">Votre ip publique :</span>
            <div id="ip-display" class="text-green-400 text-4xl md:text-5xl font-extrabold animate-pulse">
                <?= $ip ?>
            </div>
        </div>

        <!-- Conteneur pour le message d'erreur (initialement caché) -->
        <div style="display: none" id="error-container" class="mt-4 p-4 bg-red-800 rounded-lg shadow-md border border-red-700 hidden transition-all duration-500">
            <p id="error-message" class="text-red-300 font-medium">
                Une erreur est survenue lors de la récupération de l'IP. Veuillez vérifier que votre serveur est bien connecté à Internet.
            </p>
        </div>
    </div>

</body>
</html>

<?php } ?>
