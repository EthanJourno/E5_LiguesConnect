<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
    <h3 class="text-danger mb-4">Supression du compte</h3>
    <form action="" method="post" class="mt-5">
    <div class="form-outline mb-4">
        <input type="submit" value="Delete Account" class="form-control w-50 m-auto" name="delete">
    </div>
    <div class="form-outline mb-4">
        <input type="submit" value="Don't delete the account" class="form-control w-50 m-auto" name="dont_delete">
    </div>

    </form>
    <?php
    $nom_utilisateur_session=$_SESSION['username'];
    if(isset($_POST['delete'])) {
        $sql = "DELETE FROM `utilisateurs` WHERE `nom_utilisateur` = '$nom_utilisateur_session'";
        $result = mysqli_query($con, $sql);
        if($result) {
            session_destroy();
            echo"<script>alert('Compte supprimé')</script>";
            echo"<script>window.open('../index.php','_self')</script>";
        }

    }
    if (isset($_POST['dont_delete'])){
        echo"<script>window.open('profile.php','_self')</script>";

    }

    
    
    ?>
</body>
</html>