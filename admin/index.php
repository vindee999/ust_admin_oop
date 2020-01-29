<?php 

  if(!isset($_SESSION['email'])){
  		header('Location:login.php');
  }
  include 'includes/header.php';
  include 'includes/footer.php';

?>