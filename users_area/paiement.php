<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .paiement_img{
            width: 90%;
            margin:auto;
            display:block;

        }


    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de paiement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
      crossorigin="anonymous">
    </head>
<body>
    <!-- php code to get user id -->
     <?php
     $ip_utilisateur=getIPAddress();
     $get_user="Select * from `utilisateurs` where ip_utilisateur='$ip_utilisateur'";
     $result=mysqli_query($con,$get_user);
     $run_query=mysqli_fetch_array($result);
     $id_utilisateur=$run_query['id_utilisateur'];


     ?>
    <div class="container">
        <h2 class="text-center text-info mt-2">Options de paiement</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
            <a href="https://www.paypal.com" target="_blank ">
                <img src="../images/hockeyG2.jpg" class="paiement_img" alt=""></a>
            </div>
            <div class="col-md-6">
            <a href="order.php?id_utilisateur=<?php echo $id_utilisateur ?>" ><h2 class="text-center">Payer hors ligne</h2></a>
            </div>

        </div>
    </div>
    <?php
        include('../includes/footer.php');
        ?>


</body>
</html>