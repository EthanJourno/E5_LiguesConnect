<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
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
    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image{
    width: 100px;
    object-fit: contain;
    }
    .footer{
        position: absolute;
        bottom:0;
    }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info ">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg navbar-light bg-info ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                        </nav>
            </div>
        </nav>
        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-5">
                    <a href="#"><img src="../images/rugby.jpg" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <!-- button*10>a.nav-link.text-light.bg-info.my-1 -->
                <div class="button text-center">
                <button class="my-3"><a href="insert_produit.php" class="nav-link text-light bg-info my-1">Insert Products</a>
            </button>
                <button><a href="" class="nav-link text-light bg-info my-1">View Products</a>
            </button>
                <button><a href="index.php?insert_sport" class="nav-link text-light bg-info my-1">Insert Type de sport</a>
            </button>
                <button><a href="" class="nav-link text-light bg-info my-1">View Type de sport</a>
            </button>
                <button><a href="index.php?insert_demographie" class="nav-link text-light bg-info my-1">Insert Demographie</a>
            </button>
                <button><a href="" class="nav-link text-light bg-info my-1">View Categories</a>
            </button>
                <button><a href="" class="nav-link text-light bg-info my-1">All orders</a>
            </button>
                <button><a href="" class="nav-link text-light bg-info my-1">All payments</a>
            </button>
                <button><a href="" class="nav-link text-light bg-info my-1">List users</a>
            </button>
            <br>
                <button><a href="" class="nav-link text-light bg-info my-1">Logout</a>
            </button>
                </div>
            </div>
        </div>
        <!-- fourth child -->
        <div class="container my-3">
            <?php 
                if(isset($_GET['insert_sport'])){
                    include('insert_sport.php');
                }
                if(isset($_GET['insert_demographie'])){
                    include('insert_demographie.php');
                }
            ?>
        </div>

        <div class="bg-info p-3 text-center footer" >
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