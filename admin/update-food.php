<?php 
include('parts/header.php');

$id = $_GET['updateId'];

$sql = "select * from `tbl_food` where id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$t = $row['title'];
$d = $row['description'];
$p = $row['price'];
$c = $row['cat_id'];
$img = $row['img_name'];
$f = $row['featured'];
$a = $row['active'];

if (isset($_POST['submit'])){
    $new_t = $row['title'];
    $new_d = $row['description'];
    $new_p = $row['price'];
    $new_c = $row['cat_id'];
if (isset($_POST['featured'])){
  $new_f= $_POST['featured'];
}else {
  $new_f = "No";
}
if (isset($_POST['active'])){
  $new_a = $_POST['active'];
}else {
  $new_a = "No";
}
$img_name = $_FILES['image']['name'];
$src_path = $_FILES['image']['tmp_name'];
$dest_path = "../images/food/".$img_name;


if (move_uploaded_file($src_path,$dest_path)){
$sql = "update `tbl_food` set id = '$id', title = '$new_t',description = '$new_d',price = '$new_p',img_name = '$img_name',cat_id = '$new_c',featured = '$new_f',active = '$new_a' where id = '$id'";

$result = mysqli_query($conn,$sql);
echo $sql;



if ($result){

    $_SESSION['admin-msg']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Congratulations!</strong> Food Updated successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";
    // header('location:manage-food.php');
  echo $_SESSION['admin-msg'];

}
else{
    $_SESSION['admin-msg']= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Food Updation problem.Try again later....
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";
  echo $conn->error;
  echo $_SESSION['admin-msg'];

    // header('location:manage-food.php');
 }

}else {echo 'img issu';}
}
else {echo 'not clicked';}
?>


<div class="container">
<div class="row">   
        <div class="col-12">
            <h2>Update Food</h2>
        </div>
        <div class="col-12 my-3">
            <a href="manage-food.php" class="btn btn-danger">Cancel</a>
        </div>
    </div>
    <div class="row d-flex justify-ceontent-center">
        <div class="col-md-6 col-11">
        <form method="post" enctype="multipart/form-data">


<div class="mb-3">
  <label for="name" class="form-label">Title </label>
  <input type="text" class="form-control"  value="<?php echo $t;?>"  name="title">
</div>
<div class="mb-3">
  <label for="name" class="form-label">Description </label>
  <input type="text" class="form-control"  value="<?php echo $d;?>"  name="desc">
</div>
<div class="mb-3">
  <label for="name" class="form-label">Price </label>
  <input type="number" class="form-control"  value="<?php echo $p;?>"  name="price">
</div>
<div class="mb-3">
<label for="image" class="form-label">Choose Image</label>
<input class="form-control" type="file"  name="image" >
</div>
<label for="Cat_id" class="form-label">Choose Category</label>
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
<?php if ($f=='Yes'){
    echo '<input class="form-check-input" type="radio" value="Yes" name="featured" id="featured" checked>';
  }else echo'<input class="form-check-input" type="radio" value="No" name="featured" id="featured" >';?>

<label class="form-check-label" for="featured">Yes</label>
</div>
<div class="form-check">
<?php if ($f=='No'){
    echo '<input class="form-check-input" type="radio" value="No" name="featured" id="featured" checked>';
  } else echo'<input class="form-check-input" type="radio" value="No" name="featured" id="featured" >';?>
<label class="form-check-label mb-3" for="featured">No</label>
</div>

<label for="active"> Active</label>
<div class="form-check">
<?php if ($a=='Yes'){
    echo '<input class="form-check-input" type="radio" value="Yes" name="active" id="active" checked>';
  }else echo'<input class="form-check-input" type="radio" value="Yes" name="active" id="active" >';?>

<label class="form-check-label" for="active">Yes</label>
</div>
<div class="form-check">
<?php if ($a=='No'){
    echo '<input class="form-check-input" type="radio" value="No" name="active" id="active" checked>';
  } else echo'<input class="form-check-input" type="radio" value="No" name="active" id="active" >';?>
<label class="form-check-label mb-3" for="active">No</label>
</div>





<button type="submit" class="btn btn-primary my-3" name="submit">Submit</button>
</form>

        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center">
          <img src="../images/food/<?php echo $img?>" style='max-height:300px;max-width:300px;' class="img-thumbnail" alt="no figure">
          
        </div>
    </div>
</div>

<?php include('parts/footer.php')?>
