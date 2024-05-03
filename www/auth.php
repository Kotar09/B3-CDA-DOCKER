<?php
if (isset($_POST['US_login']) and isset($_POST['US_password'])) {
    session_start();
    include 'connect.php';

    ini_set('display_errors', '1');

   
    $US_login = $_POST['US_login'];  
    $US_password = $_POST['US_password'];

    $sql = "SELECT * FROM utilisateurs WHERE US_login = ? AND US_password = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$US_login, hash('sha256', $US_password)]); 

    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($utilisateur) {
        $_SESSION['login'] = $utilisateur['US_login'];
        header("Location: home.php");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
}
?>
