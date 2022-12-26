<?php 
require_once '../controller/Session.php';
$session->DestroySession();
header('location: ../index.php');
?>