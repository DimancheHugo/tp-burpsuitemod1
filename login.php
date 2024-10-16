<?php
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifie les informations d'identification (ajoute ta logique ici)
    if ($username == 'admin' && $password == 'password') {
        $_SESSION['loggedin'] = true;
        header("Location: admin.php"); // Redirige vers la page d'administration
        exit;
    } else {
        $error = "Nom d'utilisateur ou mot de passe invalide.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion à l'administration</h2>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="post">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Connexion</button>
    </form>
</body>
</html>
