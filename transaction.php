<!DOCTYPE html>
<html>
<head>
    <title>Validation de la carte</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    text-align: center;
    margin: 50px;
    background-color: #f2f2f2;
}

h1 {
    color: #333;
}

.message {
    font-size: 18px;
    color: green;
    font-weight: bold;
}

.error-message {
    font-size: 18px;
    color: red;
    font-weight: bold;
}

    </style>
</head>
<body>
    <h1>Validation de la carte</h1>
    <?php
    
    $carte_valide = false;

    if ($carte_valide) {
        echo "La carte est valide. La transaction a été effectuée avec succès.";
    } else {
        echo "La carte est invalide. La transaction a échoué.";
    }
    ?>
</body>
</html>
