<?php
session_start();
 $pass=$_SESSION["pass"];
include("connexion.php");
$codeClient = $_SESSION["pass"];
$var = "SELECT contact_no FROM users WHERE password='$codeClient'";
$res = mysqli_query($sql, $var);
$var2= "SELECT email FROM users WHERE password='$codeClient'";
$res2= mysqli_query($sql, $var2);

    if(isset($_GET['mode_paiement'])){
        $mode_paiement = $_GET['mode_paiement'];
       
    }

if ($res) {
  
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
       
        $numeroTelephone = $row['contact_no'];
    } 
    else{     
        $numeroTelephone =$_SESSION["rel"];
    }
}
if ($res2) {
   
    if (mysqli_num_rows($res2) > 0) {
      
        $row2 = mysqli_fetch_assoc($res2);
       
        $email= $row2['email'];
    } 
    else{
        $email=$_SESSION["em"];
    }
}  
$test="SELECT user_id FROM users where password='$codeClient'";
$res3=mysqli_query($sql,$test);
if ($res3) {
  
    if (mysqli_num_rows($res3) > 0) {
        $row3 = mysqli_fetch_assoc($res3);
       
        $user_id= $row3['user_id'];
    } }
if (isset($_POST["date_liv"]) && isset($_POST["address"]) && isset($_POST["mode_paiement"])) {
    
    $pass = $_SESSION["pass"];
    $date = $_POST["date_liv"];
    $add = $_POST["address"];
    $mode = $_POST["mode_paiement"];
    $_SESSION["mode"]=$_POST["mode_paiement"];
    $_SESSION["date_liv"]=$_POST["date_liv"];
    $_SESSION["add"]=$_POST["address"];
    if ($mode == 'espece') {
        $test = 0;
    } else if ($mode == 'carte_credit' || $mode == 'paypal') {
        $test = 1;
    }
    $insert = "INSERT INTO orders (user_id, delivered_to, phone_no, deliver_address, pay_method, pay_status, order_status, order_date) 
               VALUES ( '$user_id','$email', '$numeroTelephone', '$add', '$mode', '$test', '0', '$date')";

    $exec = mysqli_query($sql, $insert);
    if ($exec) {
        
       header("location:confirmation.php");
    } else {
        echo 'not inserted: ' . mysqli_error($sql);
    }
    exit();
}

?>
