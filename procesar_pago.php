<?php
session_start();  
unset($_SESSION['carrito']); 
header('Location: gracias.html');
exit();
?>
