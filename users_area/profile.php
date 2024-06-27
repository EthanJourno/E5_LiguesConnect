  <!-- Connect files -->
  <?php
  session_start();
  include('../includes/connect.php');
  include('../functions/common_function.php');

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Bienvenue <?php echo $_SESSION['username']; ?></title>
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
      <link rel="stylesheet" href="../style.css">
  </head>
  <body>
      <!-- navbar -->
      <div class="container-fluid p-0">
          <!-- first child -->
          <nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
      <img src="../images/logo.png" alt="" class="logo">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../catalogue.php">Produits</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="profile.php">Mon Compte</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../panier.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Prix total : <?php prix_total_panier(); ?>/-</a>
          </li>

        </ul>
        <form class="d-flex" role="search" action ="../search_product.php" method="get"> 
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
                    <a class='nav-link' href='user_login.php'>Login</a>
                </li>";
            } else {
                echo "
                <li class='nav-item'>
                    <a class='nav-link' href='logout.php'>Logout</a>
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

<div class="row">
    <div class="col-md-2">
        <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
        <li class="nav-item bg-info">
            <a class="nav-link text-light" href="#"><h4>Votre Profil</h4></a>
          </li>
          <?php
          $username=$_SESSION['username'];
          $avatar="Select * from `utilisateurs` where nom_utilisateur='$username'";
          $result_avatar=mysqli_query($con,$avatar);
          $row_image=mysqli_fetch_array($result_avatar);
          $avatar_utilisateur=$row_image['image_utilisateur'];
          echo
          " 
        <li class='nav-item'>
            <img src='./users_images/$avatar_utilisateur' alt='' srcset='' class='avatar my-4'>
        </li>

          ";
          ?>
          <li class="nav-item ">
            <a class="nav-link text-light" href="profile.php">Commandes en attente</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light" href="profile.php?edit_account">Editer votre compte</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light" href="profile.php?vos_commandes">Vos commandes</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light" href="profile.php?supprimer_compte">Supprimer votre compte</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light" href="logout.php">Deconnexion</a>
          </li>
            
            

        </ul>
    </div>
    <div class="col-md-10 text-center">
        <?php
        get_user_order_details();
        if(isset($_GET['edit_account'])){
            include('edit_account.php');
        }
        if(isset($_GET['vos_commandes'])){
            include('user_orders.php');
        }
        if(isset($_GET['supprimer_compte'])){
            include('delete_account.php');
        }


        ?>
    </div>
</div>

  <!-- last child -->
<!-- include footer -->
 <?php
  include('../includes/footer.php');
 ?>
      </div>


  <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
  crossorigin="anonymous"></script>

  </body>
  </html>