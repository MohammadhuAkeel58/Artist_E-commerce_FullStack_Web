<?php
    session_start();
    require 'db_connection.php';

    if (!isset($_SESSION['email'])) {
        header('location: index.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Account-Page </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.html"><img src="images/one24.png" width="150px"></a>
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
                        <!-- <img src="images/home page.jpeg" width="400px" height="600px"> -->
                    </div>
                    <div class="login-container" style="width: 75%">
                        <h1>My Account</h1>
                        <?php

                          $email = $_SESSION['email'];
                          $sql = "SELECT * FROM customer WHERE email = '$email'";
                          $result = $mysqli->query($sql);
                          if ($result->num_rows > 0) {
                            echo "<style>";
                            echo "table { border-collapse: collapse; margin-bottom: 40px; }";
                            echo "th, td { padding: 20px; }";
                            echo "</style>";

                            echo "<table>";
                            echo "<tr><th>Full Name</th><th>Email</th><th>Password</th></tr>";
                            
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['fullname'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['password'] . "</td>";
                                echo "</tr>";
                            }
                            
                            echo "</table>";
                        } else {
                            echo "Email not found.";
                        }

                        ?>
                      <a href="logout.php" class="btn-login" style="">Logout</a>

                      </div>

                    </div>
                </div>
            </div>
        </div>
        </div>

        

        




    </body>
</html>