  <!-- Connect files -->
  <?php
  session_start();
  include('includes/connect.php');
  include('./functions/common_function.php');


  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>E-commerce Website - Details du panier</title>
      <!-- bootstrap css link -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
      crossorigin="anonymous">
      <!-- font awesome link -->
      <link rel="stylesheet" 
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
      crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- css file -->
      <link rel="stylesheet" href="style.css">
  </head>
  <body>
      <!-- navbar -->
      <div class="container-fluid p-0">
          <!-- first child -->
          <nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
      <img src="./images/logo.png" alt="" class="logo">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="catalogue.php">Produits</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./users_area/user_registration.php">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="panier.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- calling panier fonction -->
   <?php
    panier();
   ?>
  <!-- second child -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
      <?php
            if(isset($_SESSION['username'])){
                echo "
                <li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
                </li>";
            } else {
                echo "
                <li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome Guest</a>
                </li>";  
            }
            
            if(!isset($_SESSION['username'])){
                echo "
                <li class='nav-item'>
                    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                </li>";
            } else {
                echo "
                <li class='nav-item'>
                    <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                </li>";           
            }
            ?>

      </ul>
  </nav>
  <!-- third child -->
  <div class="bg-light">
      <h3 class="text-center">
          Biclodata
      </h3>
      <p class="text-center"> 
          A la pointe de la vente de formation pour le sport
      </p>
  </div>
  <!-- fourth child-table -->
  <div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
            <tbody>
              <!-- php code to display dynamic data -->
               <?php
                   $ip = getIPAddress();
                   $prix_total=0;
                   $cart_query="Select * from `panier_details` where ip_address='$ip'";
                   $result=mysqli_query($con,$cart_query);
                   $result_count=mysqli_num_rows($result);
                   if($result_count>0){            
                    echo
                    "
                  <thead>
                  <tr>
                  <th>Titre produit</th>
                    <th>Image produit</th>
                    <th>Quantité</th>
                    <th>Prix total</th>
                    <th>Enlever</th>
                    <th colspan='2'>Operations</th>
                  </tr>
                </thead>
                    ";       
                   while($row=mysqli_fetch_array($result)){
                       $id_produit=$row['id_produit'];
                       $select_produits="Select * from `produits` where id_produit=$id_produit";
                       $result_produits=mysqli_query($con,$select_produits);
                       while($row_prix_produits=mysqli_fetch_array($result_produits)){
                       $prix_produits=array($row_prix_produits['prix_produit']);
                       $table_prix=$row_prix_produits['prix_produit'];
                       $titre_produit=$row_prix_produits['titre_produit'];
                       $image1_produit=$row_prix_produits['image1_produit'];
                       $valeur_produits=array_sum($prix_produits);
                       $prix_total+=$valeur_produits; 
              ?>
                <tr>
                    <td><?php echo $titre_produit ?></td>
                    <td><img src="./admin_area/images_produit/<?php echo $image1_produit ?>" alt="" class="panier_image"></td>
                    <td><input type="text" name="qty" id="" class="form-input w-50"></td>
                    <?php
                      $ip = getIPAddress();
                      if(isset($_POST['update_panier'])){
                        $quantity=$_POST['qty'];
                        $update_panier="UPDATE `panier_details` SET qte=$quantity WHERE ip_address='$ip'";
                        $result_quantity=mysqli_query($con,$update_panier);
                        $prix_total = $prix_total * $quantity;
                  }
                  
                    ?>
                    <td><?php echo $table_prix ?>/-</td>
                    <td><input type="checkbox" name="removeitem[]"value="<?php echo $id_produit  ?>" id="" ></td>
                    <td>
                      <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                       <input type="submit" value="Update Panier" 
                       class="bg-info px-3 py-2 border-0 mx-3" name="update_panier">
                      <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                      <input type="submit" value="Remove Panier" 
                       class="bg-info px-3 py-2 border-0 mx-3" name="remove_panier">

                    </td>
                </tr>
                <?php
                  }
                }
              }
              else {
                echo"<h2 class='text-center text-danger'>Le panier est vide</h2>";

              }
                ?>
            </tbody>
        </table>
        <!-- subtotal -->
         <div class="d-flex mb-5">
          <?php
          
          $ip = getIPAddress();
          $cart_query="Select * from `panier_details` where ip_address='$ip'";
          $result=mysqli_query($con,$cart_query);
          $result_count=mysqli_num_rows($result);
          if ($result_count > 0) {  
            echo "
            <h4 class='px-3'>Subtotal: <strong class='text-info'>$prix_total/-</strong></h4>
                <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                <button class='bg-info px-3 py-2 border-0'> <a href='./users_area/checkout.php' class='text-light'> Checkout</button>";
        } else {
          echo"<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
        }
        
        if (isset($_POST['continue_shopping'])) {
            echo "<script>window.open('index.php','_self')</script>";
        }
        
          
          ?>
          
         </div>
    </div>
  </div>
  </form>
  <!-- function to remove items -->
   <?php
    function remove_panier(){
      global $con;
      if(isset($_POST['remove_panier'])){
        foreach($_POST['removeitem'] as $remove_id){
          echo $remove_id;
          $delete_query="Delete from `panier_details` where id_produit=$remove_id";
          $run_delete=mysqli_query($con, $delete_query);
          if($run_delete){
            echo "<script>window.open('panier.php','_self')</script>";
          }
        }
      }
    }
    echo $remove_item=remove_panier();
?>
  <!-- last child -->
<!-- include footer -->
 <?php
  include('./includes/footer.php');
 ?>
      </div>


  <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
  crossorigin="anonymous"></script>

  </body>
  </html>