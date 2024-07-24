<?php
    session_start();

    $status = $_GET['status'] ?? '';

    if ($status === 'success') {
        echo "<script>alert('Successfully registered. Please login to continue.');</script>";
    } elseif ($status === 'register-fail') {
        echo "<script>alert('Failed to register your account. Please try again.');</script>";
    } elseif ($status === 'login-fail') {
        echo "<script>alert('Username or Password is wrong. Please try again');</script>";
    } elseif ($status === 'exists') {
        echo "<script>alert('Email is already registered. Try different email or please login into your account.');</script>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Login-Page </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="images/one24.png" width="150px"></a>
            </div>
            <nav>
                <ul>
                <li><a href="index.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <?php 
                        if (isset($_SESSION['email'])) {
                            echo '<li><a href="account.php">Account</a></li><li><a href="cart.php">Cart</a></li><li><a href="logout.php" class="btn-login">Logout</a></li>';
                        }else {
                            echo '<li><a href="login.php" class="btn-login">Login</a></li>';
                        }
                    ?>
                </ul>
            </nav>
        </div>



        
        
        <div class="account-page">
            <div class="container">
                <div class="row">
                    <div class="images">
                        <img src="images/home page.jpeg" width="400px" height="600px">
                    </div>
                    <div class="login-container">
                        <h1>Login</h1>
                        <form action="loginHandler.php" method="post">
                          <input type="text" placeholder="Email" name="email" required>
                          <input type="password" placeholder="Password" name="password" required>
                          <input type="submit" value="login">
                        </form>
                      </div>
                      <div class="registration-container">
                        <h1>Registration</h1>
                        <form action="registerHandler.php" method="post">
                          <input type="text" placeholder="Full Name" name="fullname" required>
                          <input type="email" placeholder="Email" name="email" required>
                          <input type="password" placeholder="Password" name="password" required>
                          <input type="number" placeholder="Phone" name="number" required>
                          <input type="submit" value="Register">
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        

        




    </body>
</html>