<?php
  session_start();

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require 'db_connection.php';

      if (!isset($_SESSION['email'])) {
          echo "<script>alert('Please Login to Add to Cart');</script>";
          echo "<script>window.location.href = 'index.php';</script>";
          die();
      }

    $email    = $_SESSION['email'];
    $p_id = $_POST['p_id'];

    
    $sql = "INSERT INTO cart (p_id, email) VALUES ($p_id, '$email') ";

    $result = $mysqli->query($sql);

    if ($result) {
      echo "<script>alert('Product Adding to Cart Successfully');</script>";
      echo "<script>window.location.href = 'cart.php';</script>";
    } else {
      echo "<script>alert('Product Adding to Cart Failed');</script>";
      echo "<script>window.location.href = 'product.php';</script>";
    }
    
  }