<?php
session_start();
include('../includes/connect.php');
include('../functions/common_function.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>User registration</title>
          <!-- bootstrap css link -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
      crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">
            New user registration
        </h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <!-- username field -->
                        <label for="nom_utilisateur" class="form-label">Username</label>
                        <input type="text" name="nom_utilisateur" id="nom_utilisateur" class="form-control"
                        placeholder="Entrer votre nom d'utilisateur" autocomplete="off" required="required"/>
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="email_utilisateur" class="form-label">Email</label>
                        <input type="text" name="email_utilisateur" id="email_utilisateur" class="form-control"
                        placeholder="Entrer votre emai" autocomplete="off" required="required"/>
                    </div>
                        <!-- image field -->
                        <div class="form-outline mb-4">
                        <label for="image_utilisateur" class="form-label">Votre avatar</label>
                        <input type="file" name="image_utilisateur" id="image_utilisateur" class="form-control"
                        required="required"/>
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="mdp_utilisateur" class="form-label">Mot de Passe</label>
                        <input type="password" name="mdp_utilisateur" id="mdp_utilisateur" class="form-control"
                        placeholder="Entrer votre mot de passe" autocomplete="off" required="required"/>
                    </div>
                    <!-- confirm password field -->
                    <div class="form-outline mb-4">
                        <label for="conf_mdp_utilisateur" class="form-label">Mot de Passe</label>
                        <input type="password" name="conf_mdp_utilisateur" id="conf_mdp_utilisateur" class="form-control"
                        placeholder="Confirmer votre mot de passe" autocomplete="off" required="required"/>
                    </div>
                        <!-- Address field -->
                        <div class="form-outline mb-4">
                        <label for="adresse_utilisateur" class="form-label">Adresse</label>
                        <input type="text" name="adresse_utilisateur" id="adresse_utilisateur" class="form-control"
                        placeholder="Entrer votre adresse" autocomplete="off" required="required"/>
                    </div>
                        <!-- contact field -->
                        <div class="form-outline mb-4">
                        <label for="tel_utilisateur" class="form-label">Numéro de telephone</label>
                        <input type="text" name="tel_utilisateur" id="tel_utilisateur" class="form-control"
                        placeholder="Entrer votre numéro de telephone" autocomplete="off" required="required"/>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="enrengistrer_utilisateur">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Vous avez déjà un compte? 
                            <a href="user_login.php" class="text-danger">Connectez-vous </a></p>
                    </div>






                </form>

            </div>
        </div>
    </div>
    
</body>
</html>
<?php
if (isset($_POST['enrengistrer_utilisateur'])) {
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $email_utilisateur = $_POST['email_utilisateur'];
    $mdp_utilisateur = $_POST['mdp_utilisateur'];
    $conf_mdp_utilisateur = $_POST['conf_mdp_utilisateur'];
    $hash_mdp = password_hash($mdp_utilisateur, PASSWORD_DEFAULT);
    $adresse_utilisateur = $_POST['adresse_utilisateur'];
    $tel_utilisateur = $_POST['tel_utilisateur'];
    $image_utilisateur = $_FILES['image_utilisateur']['name'];
    $tmp_image_utilisateur = $_FILES['image_utilisateur']['tmp_name'];
    $ip_utilisateur = getIPAddress();

    // Select query
    $select_query = "SELECT * FROM `utilisateurs` WHERE nom_utilisateur='$nom_utilisateur'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);

    if ($rows_count > 0) {
        echo "<script>alert(\"Ce nom d'utilisateur existe déjà\");</script>";
    } else if ($mdp_utilisateur !== $conf_mdp_utilisateur) {
        echo "<script>alert(\"Les mots de passe ne sont pas les mêmes\");</script>";
    } else {
        // Insert query
        move_uploaded_file($tmp_image_utilisateur, "./users_images/$image_utilisateur");
        $insert_query = "INSERT INTO `utilisateurs` 
        (nom_utilisateur, email_utilisateur, mdp_utilisateur, 
        image_utilisateur, ip_utilisateur, addresse_utilisateur, tel_utilisateur)
        VALUES ('$nom_utilisateur', '$email_utilisateur', '$hash_mdp', 
        '$image_utilisateur', '$ip_utilisateur', '$adresse_utilisateur', '$tel_utilisateur')";
        $sql_execute = mysqli_query($con, $insert_query);

        // Selecting items from cart
        $select_cart_items = "SELECT * FROM `panier_details` WHERE ip_address='$ip_utilisateur'";
        $result_cart = mysqli_query($con, $select_cart_items);
        $rows_count_cart = mysqli_num_rows($result_cart);

        if ($rows_count_cart > 0) {
            $_SESSION['username'] = $nom_utilisateur;
            echo "<script>alert('Tu as des produits dans ton panier');</script>";
            echo "<script>window.open('checkout.php', '_self');</script>";
        } else {
            echo "<script>window.open('../index.php', '_self');</script>";
        }
    }
}
?>
