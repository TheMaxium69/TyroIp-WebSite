<?php
// PHP Script to get the client's public IP address by cURLing a local server script.

// The URL of the script that returns the IP address.
$url = 'http://192.168.1.59/get-ip.php?api=1';

// Initialize a cURL session.
$ch = curl_init();

// Set the cURL options.
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the transfer as a string.
curl_setopt($ch, CURLOPT_TIMEOUT, 5); // Set a timeout to prevent the script from hanging.

// Execute the cURL request.
$result = curl_exec($ch);

// Check for cURL errors.
if (curl_errno($ch)) {
    // If an error occurred, set the IP to an error message.
    $ip = "Erreur cURL: " . curl_error($ch);
} else {
    // Attempt to decode the JSON response.
    $json_data = json_decode($result, true);

    // Check if the JSON decoding was successful and the 'ip' key exists.
    if ($json_data && isset($json_data['ip'])) {
        $ip = $json_data['ip'];
    } else {
        // If decoding failed or the 'ip' key is missing, set an error message.
        $ip = "Erreur: Données d'IP invalides.";
    }
}

// Close the cURL session.
curl_close($ch);

// Check if the 'api' parameter is present in the URL.
// If so, respond with a JSON object.
if (!empty($_GET['api'])) {
    // Set the CORS header to allow requests from any origin.
    header('Access-Control-Allow-Origin: *');
    // Set the content type to JSON.
    header('Content-Type: application/json');
    // Encode the IP address into a JSON object and echo it.
    echo json_encode(["ip" => $ip]);
} else {
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Meta tag to prevent search engines from indexing the page -->
    <meta name="robots" content="noindex, nofollow">
    <title>IP Int804 - Tyrolium</title>
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
        <h1 class="text-3xl md:text-4xl font-bold mb-4 text-emerald-400 drop-shadow-lg">IP de INT804</h1>
        <p class="text-gray-400 mb-6">
            Cette page affiche l'adresse ip de INT804
        </p>

        <!-- Section où l'adresse IP sera affichée -->
        <div id="ip-container" class="bg-gray-700 rounded-lg p-6 flex flex-col items-center shadow-inner border border-gray-600 transition-all duration-500">
            <span class="text-gray-400 text-lg mb-2">IP de INT804 :</span>
            <div id="ip-display" class="text-green-400 text-4xl md:text-5xl font-extrabold animate-pulse">
                <?= htmlspecialchars($ip) ?>
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
