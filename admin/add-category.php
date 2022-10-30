<?php 
include('parts/header.php');
include 'login-checkup.php';

if (isset($_POST['submit']) && isset($_FILES['image'])){
$t= $_POST['title'];
if (isset($_POST['featured'])){
    $f= $_POST['featured'];
}else {
    $f = "No";
}
if (isset($_POST['active'])){
    $a = $_POST['active'];
}else {
    $a = "No";
}

$img_name = $_FILES['image']['name'];
$src_path = $_FILES['image']['tmp_name'];
$dest_path = "../images/category/".$img_name;

$uploads = move_uploaded_file($src_path,$dest_path);


if ($uploads==true){
  $sql = "insert into `tbl_category` (title,img_name,featured,active) values ('$t','$img_name','$f','$a')";
  // echo $sql;
  $result = mysqli_query($conn,$sql);
  if ($result){

    $_SESSION['admin-msg']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Congratulations!</strong> Category added successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";

    header('location:manage-category.php');
    
}
else{
    $_SESSION['admin-msg']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Category adding problem.Try again later....
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";
    header('location:manage-category.php');
    
 }
}
else {
  $_SESSION['admin-msg']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Error!</strong> Category adding problem.Try again later....
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>
";
  header('location:manage-category.php');
}







}
?>


<div class="container">
<div class="row">   
        <div class="col-12">
            <h2>Add Category</h2>
        </div>
        <div class="col-12 my-3">
            <a href="manage-category.php" class="btn btn-danger">Cancel</a>
        </div>
    </div>
    <div class="row d-flex justify-ceontent-center">
        <div class="col-md-6 col-11">
        <form method="post" enctype="multipart/form-data">


  <div class="mb-3">
    <label for="name" class="form-label">Title </label>
    <input type="text" class="form-control" id="title"  name="title">
  </div>
    <label for="Featured"> Featured</label>
  <div class="form-check">
  <input class="form-check-input" type="radio" value="Yes" name="featured" id="featured">
  <label class="form-check-label" for="featured">
    Yes
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" value="No" name="featured" id="featured">
  <label class="form-check-label mb-3" for="featured">
    No
  </label>
</div>

<label for="active"> Active</label>
  <div class="form-check">
  <input class="form-check-input" type="radio" value="Yes" name="active" id="active">
  <label class="form-check-label" for="active">
    Yes
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" value="No" name="active" id="active">
  <label class="form-check-label " for="active">
    No
  </label>
</div>
<div class="mb-3">
  <label for="image" class="form-label">Chose Image</label>
  <input class="form-control" type="file"  name="image" >
</div>




  <button type="submit" class="btn btn-primary my-3" name="submit">Submit</button>
</form>

        </div>
    </div>
</div>

<?php include('parts/footer.php')?>
