<?php
if (isset($_POST['prix'])) {
    include 'connexion.php';

    $prixTotal = $_POST['prix'];

    $ns = "INSERT INTO prix (prix) VALUES ('$prixTotal')";

    if (mysqli_query($sql, $ns)) {
        header("Location: confirmation.php");
    } else {
        
    }

    mysqli_close($conn);
}
?>
