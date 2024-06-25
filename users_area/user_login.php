<?php
@session_start();
include('../includes/connect.php');
include('../functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Connexion utilisateur</title>
          <!-- bootstrap css link -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
      crossorigin="anonymous">
      <style>
        body{
            overflow-x:hidden;
        }
      </style>

</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">
            Connexion utilisateur
        </h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" >
                    <div class="form-outline mb-4">
                        <!-- username field -->
                        <label for="nom_utilisateur" class="form-label">Username</label>
                        <input type="text" name="nom_utilisateur" id="nom_utilisateur" class="form-control"
                        placeholder="Entrer votre nom d'utilisateur" autocomplete="off" required="required"/>
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="mdp_utilisateur" class="form-label">Mot de Passe</label>
                        <input type="password" name="mdp_utilisateur" id="mdp_utilisateur" class="form-control"
                        placeholder="Entrer votre mot de passe" autocomplete="off" required="required"/>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Connection" class="bg-info py-2 px-3 border-0"
                         name="connection_utilisateur">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Vous n'avez pas de compte? 
                            <a href="user_registration.php" class="text-danger">Creez-le </a></p>
                    </div>






                </form>

            </div>
        </div>
    </div>
    
</body>
</html>
<?php
if(isset($_POST['connection_utilisateur'])){
    $ip_utilisateur=getIPAddress();
    $nom_utilisateur=$_POST['nom_utilisateur'];
    $mdp_utilisateur=$_POST['mdp_utilisateur'];
    $select_query="Select * from `utilisateurs` where ip_utilisateur='$ip_utilisateur'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    //cart item
    $select_query_panier="Select * from `panier_details` where ip_address='$ip_utilisateur'";
    $select_panier=mysqli_query($con,$select_query_panier);
    $row_count_panier=mysqli_num_rows($select_panier);

    if($row_count>0){
        $_SESSION['username']=$nom_utilisateur; 
        if(password_verify($mdp_utilisateur,$row_data['mdp_utilisateur'])){
            // echo "<script>alert('Connexion réussite')</script>";
            if($row_count==1 and $row_count_panier==0 ){
                $_SESSION['username']=$nom_utilisateur; 
                 echo "<script>alert('Connexion réussite')</script>";
                 echo"<script>window.open('profile.php','_self' )</script>";

            } else{
                $_SESSION['username']=$nom_utilisateur; 
                echo "<script>alert('Connexion réussite')</script>";
                echo"<script>window.open('paiement.php','_self' )</script>";

            }

            
        }else{
            echo "<script>alert('Identifiants invalide')</script>";
        }

    } else{
        echo"<script>alert('Identifiants invalide')</script>";
    }



}

?>