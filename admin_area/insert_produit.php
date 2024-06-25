<?php
include('../includes/connect.php');
if(isset($_POST['insert_produit'])){
    $titre_produit=$_POST['titre_produit'];
    $description_produit =$_POST['description_produit'];
    $keywords_produit=$_POST['keywords_produit'];
    $sport_produit=$_POST['sport_produit'];
    $demographie_produit=$_POST['demographie_produit'];
    $prix_produit=$_POST['prix_produit'];
    $status_produit='true';
    
    //accessing images
    $image1_produit=$_FILES['image1_produit']['name'];
    $image2_produit=$_FILES['image2_produit']['name'];
    $image3_produit=$_FILES['image3_produit']['name'];
    
    // accessing image tmp name
    $image1_temp=$_FILES['image1_produit']['tmp_name'];
    $image2_temp=$_FILES['image2_produit']['tmp_name'];
    $image3_temp=$_FILES['image3_produit']['tmp_name'];
    
    //checking empty condition
    if($titre_produit=='' or $description_produit=='' or $keywords_produit=='' 
    or $sport_produit=='' or $demographie_produit=='' or $prix_produit==''
    or $image1_produit == '' or $image2_produit=='' or $image3_produit==''){
        echo "<script>alert('Please fill all the available fields!')</script>";
        exit();
    }else{
        //uploading images to its folder
        move_uploaded_file($image1_temp,"./images_produit/$image1_produit");
        move_uploaded_file($image2_temp,"./images_produit/$image2_produit");
        move_uploaded_file($image3_temp,"./images_produit/$image3_produit");
        //insert query
        $insert_produit=
         "INSERT INTO `produits` 
         (titre_produit, description_produit, keywords_produit, id_sport, 
         id_demographie, image1_produit, image2_produit, image3_produit, prix_produit, date, status)
         VALUES ('$titre_produit', '$description_produit', '$keywords_produit',
         '$sport_produit', '$demographie_produit', '$image1_produit', '$image2_produit', '$image3_produit',
         $prix_produit, NOW(), '$status_produit')";
         $result=mysqli_query($con,$insert_produit);
        
         if($result){
            echo "<script>alert('Produit inserted successfully')</script>";
         }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Produits Admin Dashboard</title>
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
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="titre_produit" class="form-label">Titre du Produit</label>
            <input type="text" name="titre_produit" id="titre_produit" class="form-control" 
            placeholder="Entre le titre du produit" autocomplete="off" required="required"/>
        </div>
        <!-- Description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="description_produit" class="form-label">Description du Produit</label>
            <input type="text" name="description_produit" id="description_produit" class="form-control" 
            placeholder="Entre la description du produit" autocomplete="off" required="required"/>
        </div> 
        <!-- mots clés -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="keywords_produit" class="form-label">Mot-Clés du Produit</label>
            <input type="text" name="keywords_produit" id="keywords_produit" class="form-control" 
            placeholder="Entre les mot-clés du produit" autocomplete="off" required="required"/>
        </div> 
        <!-- Sports -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="sport_produit" id="" class="form-select">
                <option value="">Selectionner un sport </option>
                <?php
                    $select_query="Select * from `sports`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $titre_sport=$row['titre_sport'];
                        $id_sport=$row['id_sport'];
                        echo "<option value='$id_sport'>$titre_sport</option>";
                    }                   
                ?>
            </select>
        </div>
        <!-- Démographies -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="demographie_produit" id="" class="form-select">
            <option value="">Selectionner une  Démographie </option>
            <?php
                    $select_query="Select * from `demographies`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $titre_demographie=$row['titre_demographie'];
                        $id_demographie=$row['id_demographie'];
                        echo "<option value='$id_demographie'>$titre_demographie</option>";
                    }                   
                ?>

            </select> 
            </div>
            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="image1_produit" class="form-label">Image 1 du produit</label>
            <input type="file" name="image1_produit" id="image1_produit" class="form-control" 
            placeholder="Entre l'image 1 du produit"  required="required"/>
        </div> 
                    <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="image2_produit" class="form-label">Image 2 du produit</label>
            <input type="file" name="image2_produit" id="image2_produit" class="form-control" 
            placeholder="Entre l'image 2 du produit"  required="required"/>
        </div> 
        <!-- Image 2 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="image3_produit" class="form-label">Image 3 du produit</label>
            <input type="file" name="image3_produit" id="image3_produit" class="form-control" 
            placeholder="Entre l'image 3 du produit"  required="required"/>
        </div> 
        <!-- Price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="prix_produit" class="form-label">Prix du Produit</label>
            <input type="text" name="prix_produit" id="prix_produit" class="form-control" 
            placeholder="Entre les prix du produit" autocomplete="off" required="required"/>
        </div> 
        <!-- Price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_produit" class="btn btn-info mb-3 px-3" value="Inserer Produits">
        </div>        

    </form>
    </div>
    

</body>
</html>