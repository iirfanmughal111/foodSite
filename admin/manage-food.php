<?php 
include 'parts/header.php';
include 'login-checkup.php';
?>
<style>
    .table-img{
    max-width: 60px;
    max-height: 60px;
}

</style>
<div class="container-fluid " style="background-color: azure;">
        <div class="container">

    <div class="row">   
        <div class="col-12">
            <h2>Manage Foods</h2>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <a href="add-food.php" class="btn btn-primary my-3">Add Fodd</a>
        </div>

        <?php if (isset($_SESSION['admin-msg'])){
             echo $_SESSION['admin-msg'];
             unset( $_SESSION['admin-msg']);

        }?>
        
       
        <div class="col-12">
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Category</th>
      <th scope="col">Featured</th>
      <th scope="col">Active</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
  <?php
  $temp=1;
      $sql = "Select * from `tbl_food`";
      $result = mysqli_query($conn, $sql);
      if ($result){
          while( $row = mysqli_fetch_assoc($result)){
              $i = $row['id'];
              $t = $row['title'];
              $d = $row['description'];
              $p = $row['price'];
              $img = $row['img_name'];
              $c = $row['cat_id'];
              $f = $row['featured'];
              $a = $row['active'];

              echo "<tr>
      <th scope='row'>$temp</th>
      <td>$t</td>
      <td>$d</td>
      <td>$p</td>
      <td><img class='table-img' src='../images/food/$img' alt='No Image'></td>
      <td>$c</td>
      <td>$f</td>
      <td>$a</td>
      <td><a href='update-food.php?updateId=$i' class='btn btn-primary btn-sm me-3'>Update</a>
      <a href='delete-food.php?deleteId=$i' class='btn btn-danger btn-sm'>Delete</a></td>
    </tr>";
    $temp++;
          }
         
          
          
      }
     else{
         echo 'query problem';
     }
      
      ?>

  </tbody>
</table>
        </div>
    </div>
    </div>
</div>
<?php include'parts/footer.php'?>