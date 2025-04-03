<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/file6.css">
</head>
<body>
    <div class="logo">
        <img src="images/logo.jpg" alt="Logo de l'entreprise">
    </div>
    <div class="checkout-container">
        <h1>Checkout</h1>
        <form action="InserCmd.php" method="post" id="deliveryForm">
            <!-- Champs de saisie des informations de livraison -->
            <label for="fullname">Nom complet :</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="address">Adresse de livraison :</label>
            <input type="text" id="address" name="address" required>

            <label for="city">Ville :</label>
            <input type="text" id="city" name="city" required>

            <label for="date_liv">Date livraison:</label>
            <input type="date" id="date_liv" name="date_liv" required>
            <input type="hidden" name="total_price" value="">
          <!-- <?php echo $_SESSION['prixTotal']; ?> -->
            <button type="button" onclick="proceedToPayment()">Continuer vers le paiement</button>
            <input type="hidden" name="mode_paiement" id="mode_paiement_hidden">
        </form>

        <div id="paymentForm" style="display: none;">
            <!-- Choisir le mode de paiement -->
            <label>Choisir le mode de paiement :</label>
            <select name="mode_paiement" id="mode_paiement" required onchange="togglePaymentOptions()">
                <option value="">Sélectionner un mode de paiement</option>
                <option value="carte_credit">Carte de crédit</option>
                <option value="paypal">PayPal</option>
                <option value="espece">Espèces</option>
                <!-- Ajouter d'autres options de paiement ici -->
            </select>

            <!-- Options de paiement pour la carte de crédit -->
            <div id="carte_credit_options" class="payment-options" style="display: none;">
                <!-- Champs pour les informations de carte de crédit -->
                <label for="card_number">Numéro de carte de crédit :</label>
                <input type="text" id="card_number" name="card_number" required><br>

                <label for="expiration_date">Date d'expiration :</label>
                <input type="date" id="expiration_date" name="expiration_date" required><br>

                <label for="cvv">Code de sécurité (CVV) :</label>
                <input type="text" id="cvv" name="cvv" required><br>

                <!-- Vous pouvez ajouter d'autres champs ici si nécessaire -->
            </div>

            <!-- Options de paiement pour PayPal -->
            <div id="paypal_options" class="payment-options" style="display: none;">
                <!-- Champs pour les informations PayPal -->
                <label for="paypal_email">Adresse e-mail PayPal :</label>
                <input type="email" id="paypal_email" name="paypal_email" required>

                
            </div>

            <!-- Options de paiement en espèces -->
            <div id="espece_options" class="payment-options" style="display: none;">
                <p>Veuillez préparer la somme en espèces pour le paiement à la livraison.</p>
            </div>

            <!-- Le bouton "Confirmer la commande" est maintenant de type "button" -->
            <button type="button" id="confirmBtn">Confirmer la commande</button>
        </div>
        <div id="cardValidationLink" style="display: none;">
    <a href="transaction.php">Valider la carte</a>
</div>
    </div>
    <div id="paypalValidationLink" style="display: none;">
    <a href="paypal_validation.php">Valider avec PayPal</a>
</div>

    <script>
        function proceedToPayment() {
            const selectedPaymentMode = document.getElementById("mode_paiement").value;
            document.getElementById("mode_paiement_hidden").value = selectedPaymentMode;

            // Masquer le formulaire de livraison
            document.getElementById("deliveryForm").style.display = "none";
            // Afficher le formulaire de paiement
            document.getElementById("paymentForm").style.display = "block";

            // Mettre à jour l'action du formulaire pour inclure le mode de paiement sélectionné
            document.getElementById("deliveryForm").action = "InserCmd.php";


        }

        document.getElementById('confirmBtn').addEventListener('click', function(event) {
    // Activer le champ caché avant la soumission du formulaire
    document.getElementById("mode_paiement_hidden").disabled = false;

    
    const selectedPaymentMode = document.getElementById("mode_paiement").value;
    if (selectedPaymentMode === "carte_credit") {
        document.getElementById("cardValidationLink").style.display = "block";
    } else if (selectedPaymentMode === "paypal") {
        
        document.getElementById("paypalValidationLink").style.display = "block";
    } else {
        // Sinon, soumettez le formulaire
        document.getElementById("deliveryForm").submit();
    }
});



        function togglePaymentOptions() {
            const selectedPaymentMode = document.getElementById("mode_paiement").value;
            document.getElementById("mode_paiement_hidden").value = selectedPaymentMode;

            const paymentOptions = document.querySelectorAll(".payment-options");
            paymentOptions.forEach(option => option.style.display = "none");

            const selectedOption = document.getElementById(selectedPaymentMode + "_options");
            if (selectedOption) {
                selectedOption.style.display = "block";
            }
            }
    </script>
</body>
</html>
