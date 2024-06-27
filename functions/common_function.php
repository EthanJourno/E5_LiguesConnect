<?php


//getting products
function getproducts(){
    global $con;
    // isset or not
    if(!isset($_GET['sport'])){
        if (!isset($_GET['demographie'])){

    $select_query="select * from `produits` order by rand() LIMIT 0,4"; 
$result_query=mysqli_query($con, $select_query);
while($row=mysqli_fetch_assoc($result_query)){
  $id_produit=$row['id_produit'];
  $titre_produit=$row['titre_produit'];
  $description_produit=$row['description_produit'];
  $image1_produit=$row['image1_produit'];
  $produit_prix=$row['prix_produit'];
  $id_sport= $row['id_sport'];
  $id_demographie= $row['id_demographie'];
  echo "  <div class='col-md-4 mb-2'>
            <div class='card' >
            <img src='./admin_area/images_produit/$image1_produit' class='card-img-top' alt='$titre_produit'>
              <div class='card-body'>
              <h5 class='card-title'>$titre_produit</h5>
              <p class='card-text'>$description_produit</p>
              <p class='card-text'>Prix: $produit_prix/-</p>
              <a href='index.php?ajouter_panier=$id_produit' class='btn btn-info'>Ajouter au panier</a>
              <a href='details_produit.php?id_produit=$id_produit' class='btn btn-secondary'>Voir plus</a>
              </div>
            </div>
          </div>";

         }
        }
    }
}

//get all produits

function get_all_produits(){

    global $con;
    // isset or not
    if(!isset($_GET['sport'])){
        if (!isset($_GET['demographie'])){

    $select_query="select * from `produits` order by rand()"; 
$result_query=mysqli_query($con, $select_query);
while($row=mysqli_fetch_assoc($result_query)){
  $id_produit=$row['id_produit'];
  $titre_produit=$row['titre_produit'];
  $description_produit=$row['description_produit'];
  $image1_produit=$row['image1_produit'];
  $produit_prix=$row['prix_produit'];
  $id_sport= $row['id_sport'];
  $id_demographie= $row['id_demographie'];
  echo "  <div class='col-md-4 mb-2'>
            <div class='card' >
            <img src='./admin_area/images_produit/$image1_produit' class='card-img-top' alt='$titre_produit'>
              <div class='card-body'>
              <h5 class='card-title'>$titre_produit</h5>
              <p class='card-text'>$description_produit</p>
              <p class='card-text'>Prix: $produit_prix/-</p>
              <a href='index.php?ajouter_panier=$id_produit' class='btn btn-info'>Ajouter au panier</a>
              <a href='details_produit.php?id_produit=$id_produit' class='btn btn-secondary'>Voir plus</a>
              </div>
            </div>
          </div>";

         }
        }
    }


}

// getting unique categories

function get_unique_sports(){
    global $con;
    if(isset($_GET['sport'])){
    $id_sport=$_GET['sport'];
    $select_query="select * from `produits` where id_sport= $id_sport"; 
    $result_query=mysqli_query($con, $select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if ($num_of_rows==0){
        echo "<h2 class='text-center text-danger'> Plus de places pour ce sport</h2>";
    }
$result_query=mysqli_query($con, $select_query);
while($row=mysqli_fetch_assoc($result_query)){
  $id_produit=$row['id_produit'];
  $titre_produit=$row['titre_produit'];
  $description_produit=$row['description_produit'];
  $image1_produit=$row['image1_produit'];
  $produit_prix=$row['prix_produit'];
  $id_sport= $row['id_sport'];
  $id_demographie= $row['id_demographie'];
  echo "  <div class='col-md-4 mb-2'>
            <div class='card' >
            <img src='./admin_area/images_produit/$image1_produit' class='card-img-top' alt='$titre_produit'>
              <div class='card-body'>
              <h5 class='card-title'>$titre_produit</h5>
              <p class='card-text'>$description_produit</p>
              <p class='card-text'>Prix: $produit_prix/-</p>
              <a href='index.php?ajouter_panier=$id_produit' class='btn btn-info'>Ajouter au panier</a>
              <a href='details_produit.php?id_produit=$id_produit' class='btn btn-secondary'>Voir plus</a>
              </div>
            </div>
          </div>";

         }
        }
    }

// getting unique demographies
function get_unique_demographies(){
    global $con;
    if(isset($_GET['demographie'])){
    $id_demographie=$_GET['demographie'];
    $select_query="select * from `produits` where id_demographie= $id_demographie"; 
    $result_query=mysqli_query($con, $select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if ($num_of_rows==0){
        echo "<h2 class='text-center text-danger'> Plus de places pour cette demoghraphie</h2>";
    }
$result_query=mysqli_query($con, $select_query);
while($row=mysqli_fetch_assoc($result_query)){
  $id_produit=$row['id_produit'];
  $titre_produit=$row['titre_produit'];
  $description_produit=$row['description_produit'];
  $image1_produit=$row['image1_produit'];
  $produit_prix=$row['prix_produit'];
  $id_sport= $row['id_sport'];
  $id_demographie= $row['id_demographie'];
  echo "  <div class='col-md-4 mb-2'>
            <div class='card' >
            <img src='./admin_area/images_produit/$image1_produit' class='card-img-top' alt='$titre_produit'>
              <div class='card-body'>
              <h5 class='card-title'>$titre_produit</h5>
              <p class='card-text'>$description_produit</p>
              <p class='card-text'>Prix: $produit_prix/-</p>
              <a href='index.php?ajouter_panier=$id_produit' class='btn btn-info'>Ajouter au panier</a>
              <a href='details_produit.php?id_produit=$id_produit' class='btn btn-secondary'>Voir plus</a>
              </div>
            </div>
          </div>";

         }
        }
    }



function getsport(){
    global $con;
    $select_sport="Select * from `sports`";
    $results_sport=mysqli_query($con,$select_sport);
    while($row_data=mysqli_fetch_assoc($results_sport)){
        $titre_sport=$row_data['titre_sport'];
        $id_sport= $row_data['id_sport']; 
        echo "<li class='nav-item'>
        <a href='index.php?sport=$id_sport' class='nav-link text-light'>$titre_sport</a>
    </li>";
    }


}

//displaying demographie dans la sidenav
function getdemographie(){
    global $con;
    $select_demographie="Select * from `demographies`";
    $results_demographie=mysqli_query($con,$select_demographie);
    // $row_data=mysqli_fetch_assoc($results_demo);
    // echo $row_data['titre_demographie'];  //affichage du premier type de sport
    while($row_data=mysqli_fetch_assoc($results_demographie)){
        $titre_demographie=$row_data['titre_demographie'];
        $id_demographie= $row_data['id_demographie']; 
        echo "<li class='nav-item'>
        <a href='index.php?demographie=$id_demographie' class='nav-link text-light'>$titre_demographie</a>
    </li>";
    }
}

//searching products
function search_product(){

    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];

$search_query="Select * from `produits` where keywords_produit like '%$search_data_value%'";
$result_query=mysqli_query($con, $search_query);
$num_of_rows=mysqli_num_rows($result_query);
if ($num_of_rows==0){
    echo "<h2 class='text-center text-danger'> Aucun resultats trouvé pour votre recherche, reessayez! </h2>";
}

while($row=mysqli_fetch_assoc($result_query)){
  $id_produit=$row['id_produit'];
  $titre_produit=$row['titre_produit'];
  $description_produit=$row['description_produit'];
  $image1_produit=$row['image1_produit'];
  $produit_prix=$row['prix_produit'];
  $id_sport= $row['id_sport'];
  $id_demographie= $row['id_demographie'];
  echo "  <div class='col-md-4 mb-2'>
            <div class='card' >
            <img src='./admin_area/images_produit/$image1_produit' class='card-img-top' alt='$titre_produit'>
              <div class='card-body'>
              <h5 class='card-title'>$titre_produit</h5>
              <p class='card-text'>$description_produit</p>
              <p class='card-text'>Prix: $produit_prix/-</p>
              <a href='index.php?ajouter_panier=$id_produit' class='btn btn-info'>Ajouter au panier</a>
              <a href='details_produit.php?id_produit=$id_produit' class='btn btn-secondary'>Voir plus</a>
              </div>
            </div>
          </div>";

         }
        }
    }

//voir plus function
function voir_plus() {
    global $con;
    // isset or not
    if (isset($_GET['id_produit'])) {
        if (!isset($_GET['sport'])) {
            if (!isset($_GET['demographie'])) {
                $id_produit = $_GET['id_produit'];

                $select_query = "SELECT * FROM `produits` WHERE id_produit=$id_produit";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $id_produit = $row['id_produit'];
                    $titre_produit = $row['titre_produit'];
                    $description_produit = $row['description_produit'];
                    $image1_produit = $row['image1_produit'];
                    $image2_produit = $row['image2_produit'];
                    $image3_produit = $row['image3_produit'];
                    $produit_prix = $row['prix_produit'];
                    $id_sport = $row['id_sport'];
                    $id_demographie = $row['id_demographie'];
                    echo "    
<div class='col-md-4 mb-2'>
    <div class='card'>
        <img src='./admin_area/images_produit/$image1_produit' class='card-img-top' alt='$titre_produit'>
        <div class='card-body'>
            <h5 class='card-title'>$titre_produit</h5>
            <p class='card-text'>$description_produit</p>
            <p class='card-text'>Prix: $produit_prix/-</p>
            <a href='#' class='btn btn-info'>Ajouter au panier</a>
            <a href='index.php' class='btn btn-secondary'>Revenir à l'accueuil</a>
        </div>
    </div>
</div>
<div class='col-md-8'>
    <div class='row'>
        <div class='col-md-12'>
            <h4 class='text-center text-info mb-5'>Related products</h4>
        </div>
        <div class='col-md-6'>
            <img src='./admin_area/images_produit/$image2_produit' class='card-img-top' alt='$titre_produit'>
            <div class='card-body'></div>
        </div>
        <div class='col-md-6'>
            <img src='./admin_area/images_produit/$image3_produit' class='card-img-top' alt='$titre_produit'>
            <div class='card-body'></div>
        </div>
    </div>
</div>";
                }
            }
        }
    }
}

//get ip address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//calling ip function
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


// fonction panier
function panier(){

    if(isset($_GET['ajouter_panier'])){
        global $con;
        $ip = getIPAddress();  
        $get_product_id=$_GET['ajouter_panier'];
        $select_query="Select * from `panier_details` where ip_address='$ip' 
        and id_produit=$get_product_id";
        $result_query= mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if ($num_of_rows>0){
            echo "<script>alert('Cet objet est present dans le panier')</script>";
            echo"<script>window.open('index.php','_self')</script>";
        } else{
            $insert_query="insert into `panier_details` (id_produit, ip_address,qte)
            VALUES ($get_product_id, '$ip',0)";
            $result_query= mysqli_query($con,$insert_query);
            echo "<script>alert('Cet objet est ajouté au panier')</script>";
            echo"<script>window.open('index.php','_self')</script>";



        }
    



    }
        

}

//function to get numero_panier
function cart_item(){

    if(isset($_GET['ajouter_panier'])){
        global $con;
        $ip = getIPAddress();  
        $select_query="Select * from `panier_details` where ip_address='$ip'";
        $result_query= mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        } else{
            global $con;
            $ip = getIPAddress();  
            $select_query="Select * from `panier_details` where ip_address='$ip'";
            $result_query= mysqli_query($con,$select_query);
            $count_cart_items=mysqli_num_rows($result_query);
           }
           echo $count_cart_items;
    }


//total price function
function prix_total_panier(){
    global $con;
    $ip = getIPAddress();
    $prix_total=0;
    $cart_query="Select * from `panier_details` where ip_address='$ip'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $id_produit=$row['id_produit'];
        $select_produits="Select * from `produits` where id_produit=$id_produit";
        $result_produits=mysqli_query($con,$select_produits);
        while($row_prix_produits=mysqli_fetch_array($result_produits)){
        $prix_produits=array($row_prix_produits['prix_produit']);
        $valeur_produits=array_sum($prix_produits);
        $prix_total+=$valeur_produits;

        }

    }
    echo $prix_total;
}

// get utilisateur commandes details
function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="Select * from `utilisateurs` where nom_utilisateur='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $id_utilisateur=$row_query['id_utilisateur'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['vos_commandes'])){
                if(!isset($_GET['supprimer_compte'])){
                $get_orders="Select * from `commandes` where id_utilisateur=$id_utilisateur 
                and status_commande='pending'";
                $result_commandes_query=mysqli_query($con,$get_orders);
                $row_count=mysqli_num_rows($result_commandes_query);
                if($row_count>0){
                    echo "<h3 class='text-center text-success'>Tu as <span class='text-danger'>$row_count</span> commandes en attente</h3>
                    <p class='text-center'><a href='profile.php?vos_commandes' class='text-dark'>Details de vos commandes</a></p>";
                } else{
                    echo "<h3 class='text-center text-success'>Tu n'as pas de commandes</h3>
                    <p class='text-center'><a href='../index.php' class='text-dark'>Explorer nos sports</a></p>";

                }
                }
        }
    }

}
}

?>