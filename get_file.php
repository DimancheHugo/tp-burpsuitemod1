<?php
// Définir le chemin vers le répertoire des images
define('IMAGE_DIR', __DIR__ . '/images/');

// Vérifier si le paramètre 'filename' est présent
if (isset($_GET['filename'])) {
    $filename = basename($_GET['filename']); // Récupérer le nom de fichier de manière sécurisée
    $filePath = IMAGE_DIR . $filename; // Construire le chemin complet du fichier

    // Vérifier si le fichier existe et s'il est bien dans le répertoire des images
    if (file_exists($filePath) && strpos(realpath($filePath), IMAGE_DIR) === 0) {
        // Envoyer le fichier en réponse
        header('Content-Type: image/jpeg'); // Adapter le type de contenu selon l'image
        readfile($filePath);
        exit;
    } else {
        // Si le fichier n'existe pas, afficher une erreur
        http_response_code(404);
        echo 'Fichier non trouvé';
    }
} else {
    // Si le paramètre n'est pas défini, afficher une erreur
    http_response_code(400);
    echo 'Paramètre filename manquant';
}
?>
