 <?php
    include 'connect.php';
    if (isset($_POST['add_to_cart'])) {
        $products_name = $_POST['product_name'];
        $products_price = $_POST['product_price'];
        $products_image = $_POST['product_image'];
        $product_quantity = 1;


        // select cart data based on condition
        $select_cart = mysqli_query($conn, "Select * from `cart` where name='$products_name' ");
        if (mysqli_num_rows($select_cart) > 0) {
            $display_message[] = "product already added to cart";
        } else {
            //  insert cart data in cart table
            $insert_products = mysqli_query($conn, "insert into `cart`(name,price,image,quantity) values
   ('$products_name', '$products_price', '$products_image', '$product_quantity')");
            $display_message[] = "product added to cart";
        }
    }
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <!-- css file -->
     <link rel="stylesheet" href="style.css">


     <!-- font link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 </head>

 <body>
     <!-- header -->
     <?php include 'header.php' ?>
     <div class="con">
         <?php
            if (isset($display_message)) {
                foreach ($display_message as $display_message) {
                    echo "<div class='display_message'>
            <span>$display_message</span>
            <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
   </div>";
                }
            }
            ?>
     <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
         <div class="carousel-indicators">
             <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
             <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
             <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
         </div>
         <div class="carousel-inner">
             <div class="carousel-item active">
                 <img src="images/HP_EverythingAppleCampaign_20March2024_abx39i.webp" class="d-block w-100" alt="...">
             </div>
             <div class="carousel-item">
                 <img src="images/lgtv.webp" class="d-block w-100" alt="...">
             </div>
             <div class="carousel-item">
                 <img src="images/redmi.webp" class="d-block w-100" alt="...">
             </div>
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
             <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
             <span class="carousel-control-next-icon" aria-hidden="true"></span>
             <span class="visually-hidden">Next</span>
         </button>
     </div>

   <!-- miss  -->


         <section class="products">
             <h1 class="heading">All Products</h1>
             <div class="product_container">
                 <?php
                    $select_products = mysqli_query($conn, "Select  * from `products` ");
                    if (mysqli_num_rows($select_products) > 0) {
                        while ($fetch_product = mysqli_fetch_assoc($select_products)) {

                    ?>

                    

                         <form method="post" action="">
                             <div class="edit_form">
                                 <img src="images/<?php echo $fetch_product['image'] ?> " alt="">
                                 <h3><?php echo $fetch_product['name'] ?></h3>
                                 <div class="price">Price: <?php echo $fetch_product['price'] ?>/-</div>
                                 <input type="hidden" name="product_name" value="<?php echo $fetch_product['name'] ?>">
                                 <input type="hidden" name="product_price" value="<?php echo $fetch_product['price'] ?>">
                                 <input type="hidden" name="product_image" value="<?php echo $fetch_product['image'] ?>">
                                 <input type="submit" class="submit_btn cart_btn" value="Add to Cart" name="add_to_cart">
                             </div>
                         </form>
                 <?php
                        }
                    } else {
                        echo "<div class='empty_text'>No Products Avaliable</div>";
                    }

                    ?>


             </div>
             </form>
     </div>
     </section>

     </div>
 </body>

 </html>