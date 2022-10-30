<?php 
include('parts/header.php');

$id = $_GET['updateId'];
$sql = "select * from `tbl_admin` where id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$n = $row['name'];
$u = $row['username'];
$p = $row['password'];

if (isset($_POST['submit'])){
$n= $_POST['name'];
$u= $_POST['username'];
$p= $_POST['password'];

$sql = "update `tbl_admin` set id = '$id', name = '$n',username = '$u',password = '$p' where id = $id";

$result = mysqli_query($conn,$sql);
if ($result){

    $_SESSION['admin-msg']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Congratulations!</strong> Admin Update successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";
    header('location:manage-admin.php');
}
else{
    $_SESSION['admin-msg']= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Admin Updation problem.Try again later....
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";

    header('location:manage-admin.php');
 }

}
?>


<div class="container">
<div class="row">   
        <div class="col-12">
            <h2>Update Admin</h2>
        </div>
        <div class="col-12 my-3">
            <a href="manage-admin.php" class="btn btn-danger">Cancel</a>
        </div>
    </div>
    <div class="row d-flex justify-ceontent-center">
        <div class="col-md-6 col-11">
        <form method="post">


  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" value="<?php echo $n?>"  name="name">
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Username</label>
    <input type="text" class="form-control" id="name" value="<?php echo $u?>" name="username">
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Password</label>
    <input type="password" class="form-control"  name="password" value="<?php echo $p?>" id="password">
  </div>


  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

        </div>
    </div>
</div>

<?php include('parts/footer.php')?>
