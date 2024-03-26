<?php
include('../includes/connect.php');
if(isset($_POST['insert_sport'])){
    $titre_sport=$_POST['insert_sport'];
    // select data from database
    $select_query="Select * FROM `sports` where titre_sport='$titre_sport'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This category is present inside the database')</script>";
    } else{
    $insert_query="insert into `sports` (titre_sport) values ('$titre_sport')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Category has been inserted successfully')</script>";
    }
    }
}
?>

<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id ="basic-addon-1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="insert_sport" placeholder="Insert sports" 7
    aria-label="Sports" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class="bg-info border-0 p-2 my-2" name="submit" value="Insert Sports">
</div>
</form>