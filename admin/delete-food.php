<?php
include 'parts/header.php';
if (isset($_GET['deleteId'])){
    $id = $_GET['deleteId'];
    
    $sql = "delete from `tbl_food` where id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){

        $_SESSION['admin-msg']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Congratulations!</strong> Food deleted successfully.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";


        header('location:manage-food.php');
    }
 else {
   
    $_SESSION['admin-msg']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Food deleting problem.Try again later....
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";



    header('location:manage-food.php'); 
    }
}
?>

