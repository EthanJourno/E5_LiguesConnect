<?php
session_start();
include('../includes/connect.php');

if (isset($_GET['id_commande'])){
    $id_commande = $_GET['id_commande'];
    $sql = "SELECT * FROM `commandes` WHERE id_commande = '$id_commande'";
    $result = mysqli_query($con, $sql);
    $row_fetch = mysqli_fetch_assoc($result);
    $numero_commande = $row_fetch['numero_commande'];
    $montant = $row_fetch['montant'];
}

if (isset($_POST['confirm_paiement'])){
    $numero_commande = $_POST['numero_commande'];
    $montant = $_POST['montant'];
    $mode_paiement = $_POST['mode_paiement'];
    
    $insert_query = "INSERT INTO `payements` (id_commande, numero_commande, montant, mode_payement, date) VALUES ($id_commande, $numero_commande, $montant, '$mode_paiement', NOW())";
    $result = mysqli_query($con, $insert_query);
    
    if ($result){
        echo "<h3 class='text-center text-light'>Achat confirmé</h3>";
        echo "<script>window.open('profile.php?vos_commandes','_self')</script>";
    } else {
        echo "<script>alert('Erreur lors de la confirmation du paiement')</script>";
        echo "Error: " . mysqli_error($con);
    }
    
    $update_user_commande = "UPDATE `commandes` SET status_commande='Complete' WHERE id_commande=$id_commande";
    $result_commande = mysqli_query($con, $update_user_commande);
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de paiement</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
      crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <h1 class="text-center text-light">Confirmer paiement</h1>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" name="numero_commande" id="" class="form-control w-50 m-auto" value="<?php echo $numero_commande ?>" readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Montant:</label>
                <input type="text" name="montant" id="" class="form-control w-50 m-auto" value="<?php echo $montant ?>" readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="mode_paiement" class="form-select w-50 m-auto" required>
                    <option value="" disabled selected>Selectionner le mode de paiement</option>
                    <option value="UPI">UPI</option>
                    <option value="Netbanking">Netbanking</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="Pay offline">Pay offline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" value="Confirmer" class="bg-info py-2 px-3 border-0" name="confirm_paiement">
            </div>
        </form>
    </div>
</body>
</html>
