<?php
session_start();
include("connexion.php");
//***********************************/
// pour vérifier si un utilisateur est inscrit ou non 
if (isset($_POST["submit"])) {
    $passe = $_POST["password"];
    $em = $_POST["email"];
    $verf = "SELECT email FROM users WHERE password = '$passe'";
    $resultat = mysqli_query($sql, $verf);

    if (!$resultat) {
        die("Erreur dans la requête : " . mysqli_error($sql));
    }

    if (mysqli_num_rows($resultat) > 0) {
    
        $row = mysqli_fetch_assoc($resultat);
        $email_client = $row["email"];
        $tel= $row["tel"];
        if ($email_client == $em) {
            $_SESSION["pass"]=$passe ;
            $_SESSION["email"]=$email_client;
            header("Location: produits.php");
            exit();
        } else {

            echo "<script>alert('Cet email est incorrect pour le code_cl saisi. Veuillez réessayer.');</script>";
            echo "<script>window.location='login.php';</script>"; 
            exit();
        }
    } else {
        
        echo "<script>alert('Le code_cl saisi n'existe pas dans la base de données. Veuillez réessayer.');</script>";
        echo "<script>window.location='login.php';</script>"; 
        exit();
    }
}

//***********************************/
//pour s'assurer que cet utilisateur est un admin  
if(isset($_POST["subad"])){
    $passe = $_POST["password"];
    $em = $_POST["email"];

    $verf = "SELECT email_ad FROM admin WHERE mot_ad = '$passe'";
    $resultat = mysqli_query($sql, $verf);

    if (!$resultat) {
        die("Erreur dans la requête : " . mysqli_error($sql));
    }

    if (mysqli_num_rows($resultat) > 0) {
    
        $row = mysqli_fetch_assoc($resultat);
        $email_client = $row["email_ad"];

        if ($email_client == $em) {
        
            header("Location:admin_panel");
            exit();
        } else {

            echo "<script>alert('Cet email est incorrect pour le code_cl saisi. Veuillez réessayer.');</script>";
            echo "<script>window.location='admin.php';</script>"; 
            exit();
        }
    } else {
        
        echo "<script>alert('Le code_cl saisi n'existe pas dans la base de données. Veuillez réessayer.');</script>";
        echo "<script>window.location='admin.php';</script>"; 
        exit();
    }
}
//*************************************/
// pour l'inscription des clients 
if(isset($_POST["inscrit"])){
    $passe=$_POST["password"];
    $pre=$_POST["username2"];
    $nom=$_POST["username3"];
    $tel=$_POST["tel"];
    $em=$_POST["email"];
    $adr=$_POST["adr"];
    $_SESSION["rel"]=$tel;
    $_SESSION["pass"]=$passe ;
    $_SESSION["em"]=$em;

    // Password verification
    if (strlen($passe) < 8 || !preg_match('/[A-Za-z]/', $passe) || !preg_match('/[0-9]/', $passe) || !preg_match('/[^A-Za-z0-9]/', $passe)) {
        
        echo "Le mot de passe doit contenir au moins 8 caractères avec un mélange de lettres, de chiffres et de caractères spéciaux.";
    } else {
        // Hash the password
        $hashed_password = password_hash($passe, PASSWORD_DEFAULT);

        // Insert the user information into the database
        $inser="INSERT INTO users (first_name,last_name,email,password,contact_no,user_address) VALUES ('$pre','$nom','$em','$hashed_password','$tel','$adr')";
        $res= mysqli_query($sql,$inser);
        if($res){
            header("location:produits.php");
        }
    }
}


?>  