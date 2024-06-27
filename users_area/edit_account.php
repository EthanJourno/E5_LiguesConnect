<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="select * from `utilisateurs` where nom_utilisateur='$user_session_name'";
    $select_query_result=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($select_query_result);
    $id_utilisateur=$row_fetch['id_utilisateur'];
    $nom_utilisateur=$row_fetch['nom_utilisateur'];
    $email_utilisateur=$row_fetch['email_utilisateur'];
    $addresse_utilisateur=$row_fetch['addresse_utilisateur'];
    $tel_utilisateur=$row_fetch['tel_utilisateur'];
}
    if(isset($_POST['update_utilisateur'])){
        $update_id=$id_utilisateur;
        $nom_utilisateur=$_POST['nom_utilisateur'];
        $email_utilisateur=$_POST['email_utilisateur'];
        $addresse_utilisateur=$_POST['addresse_utilisateur'];
        $tel_utilisateur=$_POST['tel_utilisateur'];
        $image_utilisateur=$_FILES['image_utilisateur']['name'];
        $tmp_image_utilisateur=$_FILES['image_utilisateur']['tmp_name'];
        move_uploaded_file($tmp_image_utilisateur,"./users_images/$image_utilisateur");
        $update_data=
        "update `utilisateurs` set 
            nom_utilisateur='$nom_utilisateur', 
            email_utilisateur='$email_utilisateur',
            image_utilisateur='$image_utilisateur',
            addresse_utilisateur='$addresse_utilisateur',
            tel_utilisateur='$tel_utilisateur'
            where id_utilisateur=$update_id";
            $update_query_result=mysqli_query($con,$update_data);
            if($update_query_result){
                echo "<script>alert('Votre compte a été mis à jour avec succès')</script>";
                echo "<script>window.open('logout.php','_self')</script>";
                }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
</head>
<body>
    <h3 class="text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" name="nom_utilisateur" id="" class="form-control w-50 m-auto" value="<?php echo $nom_utilisateur ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="email" name="email_utilisateur" id="" class="form-control w-50 m-auto" value="<?php echo $email_utilisateur ?>">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" name="image_utilisateur" id="" class="form-control m-auto">
            <img src="./users_images/<?php echo $avatar_utilisateur ?>" alt="" class="edit_avatar">
        </div>
        <div class="form-outline mb-4">
            <input type="text" name="addresse_utilisateur" id="" class="form-control w-50 m-auto" value="<?php echo $addresse_utilisateur ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" name="tel_utilisateur" id="" class="form-control w-50 m-auto" value="<?php echo $tel_utilisateur ?>">
        </div>
        <input type="submit" value="Update" name="update_utilisateur" id="" class="bg-info py-2 px-4 border-0">   
        

    </form>
</body>
</html>