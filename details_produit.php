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
      <title>E-commerce Website using PHP and MySQL</title>
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
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="panier.php">Prix total : <?php prix_total_panier(); ?>/-</a>
          </li>

        </ul>
        <form class="d-flex" role="search" action ="search_product.php" method="get"> 
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
          <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
        </form>
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
  <!-- fourth child -->
  <div class="row px-1">
      <div class="col-md-10">
          <!-- produits -->
          <div class="row">
            <!-- fetching produits -->
            <?php
            voir_plus();   
            get_unique_sports();
            get_unique_demographies();

            ?>

    
          </div> <!-- nouvelle ligne -->
        </div> <!-- sortie de la navbar -->
      <div class="col-md-2 bg-secondary p-0">
          <!-- types de sport -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
              <a href="#" class="nav-link text-light"><h4>Type de sport</h4></a>
          </li>
          <?php
          getsport();
          ?>
        </ul>
        <!-- demographies de sport -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
              <a href="#" class="nav-link text-light"><h4>Categories de sport</h4></a>
          </li>
          <?php
          
          getdemographie();
          
          ?>

        </ul>
      </div>
      



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