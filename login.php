<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de connexion</title>
  <link rel="stylesheet" href="css/file2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <div id="container">
    <form action="verif.php" method="POST">
      <h1>Login up</h1>
      <label><b>Nom d'utilisateur</b></label>
      <input type="text" placeholder="Entrer le nom complet" name="username" required>
      <label><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>
      <label><b>Mot de passe</b></label>
      <div class="password-input">
        <input type="password" id="password" placeholder="Entrer le mot de passe" name="password" required>
        <!-- <i class="toggle-password fas fa-eye"></i> -->
      </div>

      <input type="submit" id='submit' name="submit" value='LOGIN'>
    </form>
  </div>

  <script>
    const togglePassword = document.querySelector('.toggle-password');
    const passwordInput = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        togglePassword.classList.remove('fa-eye');
        togglePassword.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        togglePassword.classList.remove('fa-eye-slash');
        togglePassword.classList.add('fa-eye');
      }
    });
  </script>
  <?php  ?>
</body>
</html>