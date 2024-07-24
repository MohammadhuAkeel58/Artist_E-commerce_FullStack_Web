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
    <title> Cart </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
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



            <div class="small-container cart-page">
                <table>
                    <tr>
                        <th>Products</th>
                        <th>Quantity</th>
                        <th>SubTotal</th>
                    </tr>
                    <?php
                        $email = $_SESSION["email"];
                        $sql  = "SELECT p.p_id, p.p_name, p.price, p.picture, COUNT(*) AS quantity, (p.price * COUNT(*)) AS subtotal
                        FROM product p
                        JOIN cart c ON p.p_id = c.p_id
                        WHERE c.email = '$email'
                        GROUP BY p.p_id;";
                        $result = $mysqli->query($sql);

                        if ($result->num_rows > 0) {
                            $total = 0;
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>';
                                echo '<div class="cart-info">';
                                echo '<img src="images/products/'.$row['picture'].'">';
                                echo '<div>';
                                echo '<p>' . $row['p_name'] . '</p>';
                                echo '<small>Price: $'. $row['price'] .'.00</small>';
                                echo '<br>';
                                echo '</div>';
                                echo '</div>';
                                echo '</td>';
                                echo '<td>'.$row['quantity'].'</td>';
                                echo '<td>Quantity</td>';
                                echo '<td> $'.$row['subtotal'].'.00</td>';
                                echo '</tr>';
                                $total += $row["subtotal"];
                            }
                        } else {
                            echo "No products found.";
                        }
                    ?>



                </table>
            </div>
        


            <div class="total-price">
                <table>
                    <tr>
                        <td>Total</td>
                        <td>$<?php echo $total; ?>.00</td>
                    </tr>
                </table>
            </div>
        
            <div class="brands">
                <div class="small-container">
                 <div class="row">
                    <div class="col-5">
                        <img src="images/Untitled designqwe.png">
                    </div>
                    <div class="col-5">
                        <img src="images/axe111.png">
                    </div>
                    <div class="col-5">
                        <img src="images/add.png">
                    </div>
                    <div class="col-5">
                        <img src="images/nike.png">
                    </div>
                    <div class="col-5">
                        <img src="images/cal.png">
                    </div>
                 </div>
                </div>
            </div>
            
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="footer-col-1">
                            <h3>Download Our App</h3>
                            <p>Download App For Android and ios Phone</p>
                            <div class="app-logo">
                                <img src="images/png-transparent-app-store-google-play-apple-apple-text-logo-sign.png">
                                
                            </div>
                        </div>
                        <div class="footer-col-2">
                            <img src="images/one24.png" width="100px" height="100px">
                            <p>Our Purpose Is Giving Best ONES</p>
                            
                        </div>
                        <div class="footer-col-3">
                            <h3>Useful Links</h3>
                            <ul>
                                <li>Coupons</li>
                                <li>Blog Post</li>
                                <li>Return Policy</li>
                            </ul>
                        </div>
                        <div class="footer-col-4">
                            <h3>Useful Links</h3>
                            <ul>
                                <li>Facebook</li>
                                <li>Twitter</li>
                                <li>Instagram</li>
                                <li>Youtube</li>
                            </ul>
                        </div>
                    </div>
                </div>
             </div>
                
</body>
</html>