<?php
    session_start();
    require 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> One-Clothes </title>
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
        
        <font face="roboto" size="8" color="Black">
                <h1> Get The Best At Ones! </h1>
        </font>
        
                <h3>"The Secret Of Great Style Is To Feel Good In What You Wear"</h3>
        
                <a href="products.html" class="btn">Buy &#8594</a>
        
            <div class="col-2">
                <img src="images/home page.jpeg" width="2500px" height="900px">
            </div>
        
        

    


    <div class="categories">
        <div class="small-container">
            <h2 class="title">Fashions</h2>
            <div class="row">
                <div class="col-3">
                 <img src="images/product page/123/cat5.png">
                </div>
                <div class="col-3"> 
                <img src="images/product page/123/cat2.png">
                </div>
                <div class="col-3">
                <img src="images/product page/123/cat4.png">
                </div>
                
                
            </div>
        </div>
        </div>



        <div class="small-container">
            <h2 class="title">New Arrivals</h2>
            <div class="row">
                <?php
                    $sql = "SELECT * FROM product WHERE p_type = 'new-arrival'";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='col-4'>";
                            echo "<img src='images/products/".$row['picture']."'>";
                            echo "<h4>".$row['p_name']."</h4>";
                            echo "<h4>$".$row['price'].".00</h4>";
                            echo "<a href='single-product.php?p_id=".$row['p_id']. "'>View More</a>";
                            echo "</div>";
                        }      
                    } else {
                        echo "Products not found.";
                    }
                ?>
            </div>
        </div>



        <div class="small-container">
            <h2 class="title">Latest Fashions</h2>
            <div class="row">
            <?php
                    $sql = "SELECT * FROM product WHERE p_type = 'latest-fashion'";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='col-4'>";
                            echo "<img src='images/products/".$row['picture']."'>";
                            echo "<h4>".$row['p_name']."</h4>";
                            echo "<h4>$".$row['price'].".00</h4>";
                            echo "<a href='single-product.php?p_id=".$row['p_id']. "'>View More</a>";
                            echo "</div>";
                        }      
                    } else {
                        echo "Products not found.";
                    }
                ?>
            </div>
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