<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $username=$_SESSION['username'];
    $get_user="select * from `utilisateurs` where nom_utilisateur='$username'";
    $result=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $id_utilisateur=$row_fetch['id_utilisateur'];
    ?>
<h3 class="text-success">Toutes vos commandes</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
    <tr>
        <th>Sl no</th>
        <th>Montant</th>
        <th>Produits totaux</th>
        <th>Numero de la commande</th>
        <th>Date</th>
        <th>Complet/Incomplet</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        
        $get_commandes_details="select * from `commandes` where id_utilisateur=$id_utilisateur";
        $result_commandes=mysqli_query($con,$get_commandes_details);
        while($row_orders=mysqli_fetch_assoc($result_commandes)){
            $id_commande=$row_orders['id_commande'];
            $total=$row_orders['montant'];
            $numero_commande=$row_orders['numero_commande'];
            $produits_totaux=$row_orders['produits_totaux'];
            $status_commande=$row_orders['status_commande'];
            if($status_commande=='pending'){
                $status_commande='Incomplet';
            } else{
                $status_commande='Complet';
            }
            $date_commande=$row_orders['date_commande'];
            $number=1;
            echo
            "            
            <tr>
            <td>$number</td>
            <td>$total</td>
            <td>$produits_totaux</td>
            <td>$numero_commande</td>
            <td>$date_commande</td>
            <td>$status_commande</td>";
            ?>
            <?php
            if($status_commande=='Complet'){
                echo "<td>Payé</td>";
            } else{
            echo"<td><a href='confirm_paiement.php?id_commande=$id_commande' class='text-light'>Confirm</a></td>
        </tr>";
            }
        $number++;
        }
        
        ?>
      
    </tbody>
</table>
</body>
</html>