<!DOCTYPE html>
<html>
<head>
    <title>Paiement PayPal</title>
</head>
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

/* Style pour le lien de validation PayPal */
a {
    font-size: 20px;
    color: #0070ba;
    text-decoration: none;
}

/* Style pour le lien au survol */
a:hover {
    text-decoration: underline;
}

</style>
<body>
    <h1>Paiement PayPal</h1>
    <p>Vous allez être redirigé vers PayPal pour effectuer le paiement.</p>

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="VOTRE_ID_DE_BOUTON_PAYPAL">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>
</body>
</html>
