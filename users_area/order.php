<?php
include('../includes/connect.php');
include('../functions/common_function.php');
if (isset($_GET['id_utilisateur'])){
    $id_utilisateur=$_GET['id_utilisateur'];
}
//getting total items and price of all items
$ip=getIPAddress();
$prix_total=0;
$panier_requete_prix="Select * from `panier_details` where ip_address='$ip'";
$result_panier_prix=mysqli_query($con,$panier_requete_prix);
$numero_commande=mt_rand();
$status='pending';

$count_produits=mysqli_num_rows($result_panier_prix);
while ($row_prix=mysqli_fetch_array($result_panier_prix)){
    $id_produit=$row_prix['id_produit'];
    $select_produit="Select * from `produits` where id_produit=$id_produit";
    $run_prix=mysqli_query($con,$select_produit);
    while ($row_produit_prix=mysqli_fetch_array($run_prix)){
        $prix_produit=array($row_produit_prix['prix_produit']);
        $prix_produit_sum=array_sum($prix_produit);
        $prix_total+=$prix_produit_sum;
    }
}

//getting quantity from cart

$panier_query="Select * from `panier_details`";
$run_panier=mysqli_query($con,$panier_query);
$get_item_quantity=mysqli_fetch_array($run_panier);
$quantity=$get_item_quantity['qte'];
if ($quantity==0){
    $quantity=1;
    $subtotal=$prix_total;
} else{
    $quantity=$quantity;
    $subtotal=$prix_total*$quantity;

}
$insert_commande="insert into `commandes` (id_utilisateur,montant,numero_commande,
produits_totaux,date_commande,status_commande)
values ($id_utilisateur,$subtotal,$numero_commande, 
$count_produits, NOW(),'$status')";
$result_query=mysqli_query($con,$insert_commande);
if ($result_query){
    echo "<script>alert('Commande placée avec succès')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}
//orders pending
$insert_pending_commande="insert into `commandes_pending` (id_utilisateur,numero_commande,
id_produit,qte,status_commande) values ($id_utilisateur,$numero_commande,$id_produit,$quantity,'$status')";
$result_pending_commande=mysqli_query($con,$insert_pending_commande);

//delete items du panier
$delete_panier="delete from `panier_details` where ip_address='$ip'";
$result_delete=mysqli_query($con,$delete_panier);


?>
