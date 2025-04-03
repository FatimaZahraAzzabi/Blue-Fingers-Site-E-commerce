<?php

require_once 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullName = htmlspecialchars($_POST["fullName"]);
    $email =htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $query = "INSERT INTO contact (full_name, email, message) VALUES (?, ?, ?)";
    $stmt = $sql->prepare($query);
    $stmt->bind_param("sss", $fullName, $email, $message);

    if ($stmt->execute()) {
       
        $confirmationMessage = "Votre message a été envoyé avec succès!";
    } else {
       
        $confirmationMessage = "Erreur lors de l'enregistrement du message dans la base de données.";
    }

    $stmt->close();
    $sql->close();
}

header("Location: contactUs.html?message=" . urlencode($confirmationMessage));
exit();
?>
