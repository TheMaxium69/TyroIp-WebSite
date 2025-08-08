<?php
// Fichier 1: get-ip.php
// Ce script s'exécute côté serveur pour récupérer l'IP publique.

// Définir l'en-tête pour que la réponse soit au format JSON
header('Content-Type: application/json');

// Utiliser cURL pour faire une requête HTTP à l'API externe.
// C'est une méthode standard et robuste en PHP.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.ipify.org?format=json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Vérifier si la requête a réussi (code HTTP 200)
if ($http_code == 200 && $response) {
    // Si tout va bien, imprimer la réponse JSON directement
    echo $response;
} else {
    // En cas d'erreur, renvoyer un message d'erreur au format JSON
    http_response_code(500);
    echo json_encode(['error' => 'echec']);
}
?>
