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
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Prix total:100-/</a>
        </li>

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>

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
    <div class="col-md-10">
        <!-- produits -->
        <div class="row">
            <div class="col-md-4 mb-2">
            <div class="card" >
  <img src="./images/football.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-info">Ajouter au panier</a>
    <a href="#" class="btn btn-secondary">Voir plus</a>
  </div>
</div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card" >
    <img src="./images/basket.jpg" class="card-img-top" alt="...">
    <div class="card-body">
     <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-info">Ajouter au panier</a>
    <a href="#" class="btn btn-secondary">Voir plus</a>
     </div>
    </div>
</div>
    <div class="col-md-4 mb-2">
        <div class="card" >
            <img src="./images/rugby.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-info">Ajouter au panier</a>
                <a href="#" class="btn btn-secondary">Voir plus</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card" >
                <img src="./images/football.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-info">Ajouter au panier</a>
                <a href="#" class="btn btn-secondary">Voir plus</a>
                </div>
            </div>                        
        </div>
        <div class="col-md-4 mb-2">
            <div class="card" >
                <img src="./images/football.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-info">Ajouter au panier</a>
                <a href="#" class="btn btn-secondary">Voir plus</a>
                </div>
            </div>                    
    </div>
    <div class="col-md-4 mb-2">
            <div class="card" >
                <img src="./images/football.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-info">Ajouter au panier</a>
                <a href="#" class="btn btn-secondary">Voir plus</a>

                </div>
            </div>
        </div>                    
</div> <!-- nouvelle ligne -->
</div> <!-- sortie de la navbar -->
    <div class="col-md-2 bg-secondary p-0">
        <!-- types de sport -->
       <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h4>Type de sport</h4></a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link text-light">Sport1</a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link text-light">Sport2</a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link text-light">Sport3</a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link text-light">Sport4</a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link text-light">Sport5</a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link text-light">Sport6</a>
        </li>
       </ul>
       <!-- categories de sport -->
       <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h4>Categories de sport</h4></a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link text-light">Categories1</a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link text-light">Categories2</a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link text-light">Categories3</a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link text-light">Categories4</a>
        </li>
        <li class="nav-item ">
        <a href="#" class="nav-link text-light">Categories3</a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link text-light">Categories6</a>
        </li>
       </ul>
    </div>
    



<!-- last child -->
<div class="bg-info p-3 text-center" >
    <p>
        All rights reserved Designed by Ethan-2024
    </p>
</div>
    </div>


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
crossorigin="anonymous"></script>

</body>
</html>