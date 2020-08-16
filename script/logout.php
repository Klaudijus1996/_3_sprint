<?php 
if (isset($_GET['logout'])) {
        session_start();
        unset($_POST['username']);
        unset($_POST['userpassword']);
        unset($_SESSION['logged_in']);
        header('Location: ../index.php');
}   
?>