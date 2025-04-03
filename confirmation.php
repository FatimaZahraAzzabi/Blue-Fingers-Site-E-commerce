<?php session_start();
//  session_destroy(); 
include('connexion.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de commande</title>
    <link rel="stylesheet" href="css/file7.css">
</head>
<body>
    <div class="confirmation-container">
        <div class="header">
            <img src="images/logo.jpg" alt="Logo de l'entreprise">
            <h1>Merci pour votre commande !</h1>
        </div>
        <div class="order-summary">
            <h2>Récupération da la commande </h2>
            <p>le mode de paiement : <b style="color:#427CEA;"><?php echo $_SESSION["mode"];?></b></p>
            <div class="product">
    
                <p>la date de laivraison : <b style="color:#427CEA;"><?php echo $_SESSION["date_liv"];?></b></p>
            </div>
            <div class="product">
                <p>le lieu de livraison : <b style="color:#427CEA;"><?php echo $_SESSION["add"];?></b></p>
            </div>
            <p> Le prix total :<b style="color:#427CEA;"> 5690 DH </b></p>
        </div>
        <div class="voucher">
            <h2>Votre bon d'achat :</h2>
            <p>Code : ABC123</p>
            <p>Valable jusqu'au : 31 décembre 2023</p>
            <p>Réduction : 10%</p>
        </div>
        <div class="butt">
            <button type="button" onclick="imprimerBon()">Imprimer</button>
            <button type="button" onclick="sortir()">Sortir</button>
        </div>
    </div>

    <script>
        function imprimerBon() {
            window.print();
        }

        function sortir() {
            window.location.href = "paged'accueil.html";
        }

        
        if (sessionStorage.getItem("visitedConfirmationPage")) {
   
        } else {
            
            sessionStorage.setItem("visitedConfirmationPage", true);
        }
    </script>
</body>
</html>
