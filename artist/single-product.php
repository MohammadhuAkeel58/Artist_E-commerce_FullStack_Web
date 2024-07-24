<?php
    session_start();

    require 'db_connection.php';

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
                <?php
                    $p_id = $_GET['p_id'];
                    $sql = "SELECT * FROM product WHERE p_id = $p_id";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) { 
                        $row = $result->fetch_assoc();
                ?>
                        <div class="">
                            <img src="images/products/<?php echo $row['picture'] ?>" width="400px" height="600px">
                        </div>
                        <div class="">
    
                            <h1><?php echo $row['p_name'] ?></h1>
                            <p><?php echo $row['p_type'] ?></p>
                            <p>$<?php echo $row['price'] ?>.00</p>
                            <p><?php echo $row['description'] ?></p><br>
                            <form action="cartHandler.php" method="post">
                                <input type="hidden" name="p_id" value="<?php echo $p_id ?>">
                                <input type="submit" value="Add to Cart" style="background-color: dodgerblue; color: white; font-weight: bold; padding: 10px 20px;">
                            </form>
                          </div>
                <?php
                    }
                ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

        

        




    </body>
</html>