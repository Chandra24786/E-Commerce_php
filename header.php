<header class="header">
    <div class="header_body">
        <a href="index.php" class="logo">E-Commerce</a>
        <nav class="class navbar">
            <a href="Admin.php">Add products</a>
            <a href="view_products.php">View products</a>
            <a href="index.php">shopit</a>
        </nav>


        <!--  select query-->
        <?php
        $select_product=mysqli_query($conn, "Select * from `cart`") or die('query failed');
 $row_count=mysqli_num_rows($select_product);

?> 
        <!-- shopping cart icon -->
        <a href="cart.php" class="cart"><i class="fa-solid fa-cart-shopping"></i><span><sup><?php
          echo $row_count ?> </sup></span></a>
    </div>
    
</header>