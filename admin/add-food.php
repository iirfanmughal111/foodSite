<?php 
include('parts/header.php');


if (isset($_POST['submit'])){
$t= $_POST['title'];
$d= $_POST['desc'];
$p= $_POST['price'];
$c= $_POST['cat_id'];
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
$dest_path = "../images/food/".$img_name;

$uploads = move_uploaded_file($src_path,$dest_path);


if ($uploads==true){
  $sql = "insert into `tbl_food` (title,description,price,img_name,cat_id,featured,active) values ('$t','$d','$p','$img_name','$c','$f','$a')";
  echo $sql;
  $result = mysqli_query($conn,$sql);
  if ($result){

    $_SESSION['admin-msg']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Congratulations!</strong> Food added successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";


    header('location:manage-food.php');
    
}
else{
    $_SESSION['admin-msg']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Food adding problem.Try again later....
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";

  echo $conn->error;
    header('location:manage-food.php');
    
 }
}
else {
  $_SESSION['admin-msg']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Error!</strong> Food adding problem.Try again later....
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>
";

  header('location:manage-food.php');
}


}
?>


<div class="container">
<div class="row">   
        <div class="col-12">
            <h2>Add Food</h2>
        </div>
        <div class="col-12 my-3">
            <a href="manage-food.php" class="btn btn-danger">Cancel</a>
        </div>
    </div>
    <div class="row d-flex justify-ceontent-center">
        <div class="col-md-6 col-11">
        <form method="post" enctype="multipart/form-data">


  <div class="mb-3">
    <label for="name" class="form-label">Title</label>
    <input type="text" class="form-control" id="name"  name="title">
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Description</label>
    <input type="text" class="form-control" id="name" name="desc">
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Price</label>
    <input type="number" class="form-control" id="name" name="price">
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Selcet Image</label>
    <input type="file" class="form-control" id="name" name="image">
  </div>
  <select class="form-select" name="cat_id">
    <?php 
    $sql = "select * from `tbl_category` where active='Yes'";
   
    $result = mysqli_query($conn,$sql);
    $n = mysqli_num_rows($result);
    if ($n<=0){
        echo '<option value="0">No category Active</option>';
    }
    else{
    while ($row = mysqli_fetch_assoc($result)){
        echo $row;
        $id = $row['id'];
        $title = $row['title'];
        ?>
      <option value="<?php echo $id?>"><?php echo $title?></option>
        <?php
    }}
    ?>
</select>
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
  <button type="submit" class="btn btn-primary mt-3 mb-5" name="submit">Submit</button>
</form>

        </div>
    </div>
</div>

<?php include('parts/footer.php')?>
