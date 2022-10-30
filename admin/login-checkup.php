<?php 
if (!isset($_SESSION['user'])){


    $_SESSION['not-login']= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong class='fw-bold fs-3'>Access denied</strong> Login to access this page.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";

    header('location:login.php');
}
else {

}

?>