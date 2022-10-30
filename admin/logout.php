<?php 
include '../parts/config.php';
if (isset($_SESSION['user'])){
    session_destroy();

    unset($_SESSION['user']);


    $_SESSION['logout']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong class='fw-bold fs-3'>Action performed</strong> Logout Successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";
    header('location:login.php');
} else{
    $_SESSION['logout']= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong class='fw-bold fs-3'>Access denied</strong> Login required!!!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";
    header('location:login.php');
}

?>