<?php
include('../includes/connect.php');
if(isset($_POST['insert_demographie'])){
    $titre_demographie=$_POST['insert_demographie'];
    // select data from database
    $select_query="Select * FROM `demographies` where titre_demographie='$titre_demographie'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This category is present inside the database')</script>";
    } else{
    $insert_query="insert into `demographies` (titre_demographie) values ('$titre_demographie')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Category has been inserted successfully')</script>";
    }
    }
}
?>
<h2 class="text-center">Insert démographies</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id ="basic-addon-1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="insert_demographie" placeholder="Insert demographies" 7
    aria-label="demographies" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class="bg-info border-0 p-2 my-2" name="submit" value="Insert demographies">
</div>
</form>
