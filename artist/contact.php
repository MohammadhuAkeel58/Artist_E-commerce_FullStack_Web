<?php
    session_start();

    $status = $_GET['status'] ?? '';

    if ($status === 'success') {
        echo "<script>alert('Successfully your message is sent');</script>";
    } elseif ($status === 'fail') {
        echo "<script>alert('Failed to send your message. Please try again.');</script>";
    } 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Contact-Page </title>
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
                        <h1>Contact</h1>
                        <form action="contactHandler.php" method="post">
                          <input type="text" placeholder="Full Name" name="fullname" required>
                          <input type="email" placeholder="Email" name="email" required>
                          <textarea name="message" id="" cols="30" rows="10" required placeholder="Write your message"></textarea>
                          <input type="submit" value="Send Message">
                        </form>
                      </div>

                    </div>
                </div>
            </div>
        </div>
        </div>

        

        




    </body>
</html>