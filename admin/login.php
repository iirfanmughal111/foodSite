<?php 
include'../parts/config.php';


if (isset($_POST['submit'])){
$u= $_POST['username'];
$p= $_POST['password'];

$sql = "select * from `tbl_admin` where username='$u' and password='$p'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if ($u==$row['username'] and $p==$row['password'])
{

    $_SESSION['admin-msg']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Congratulations!</strong> Login successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";

    $_SESSION['user']=$u;
    
    $_SESSION['admin-msg']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong class='fw-bold fs-3'>$u</strong> Welcome to dashbord .
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";
    header('location:manage-admin.php');
}
else{
    $_SESSION['admin-msg']= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Admin Loging problem.Try again later....
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";

 }

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="css/style.css" />
    <script src="https://kit.fontawesome.com/3c6a48fcc7.js" crossorigin="anonymous"></script>

    <title>Wow Food</title>
  </head>
  <body>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center" style="min-width:70vw;min-height:90vh">
    
        <div class="col-md-6 col-11 border border-2 shadow rounded p-5">
            <h2 class="text-center text-primary fw-bold">Login</h2>
            <?php 
            if (isset($_SESSION['admin-msg'])){
             echo $_SESSION['admin-msg'];
             unset( $_SESSION['admin-msg']);
            }
             if (isset($_SESSION['not-login'])){
              echo $_SESSION['not-login'];
              unset( $_SESSION['not-login']);

        }
        ?>
        <form method="post">



  <div class="mb-3">
    <label for="name" class="form-label">Username</label>
    <input type="text" class="form-control" id="name" name="username">
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Password</label>
    <input type="password" class="form-control"  name="password" id="password">
  </div>


  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

        </div>
    </div>
</div>

      </body>
      </html>
