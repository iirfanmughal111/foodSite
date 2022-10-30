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
            <h2>Manage Categories</h2>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <a href="add-category.php" class="btn btn-primary my-3">Add category</a>
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
      <th scope="col">Image</th>
      <th scope="col">Featured</th>
      <th scope="col">Active</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $temp=1;
      $sql = "Select * from `tbl_category`";
      $result = mysqli_query($conn, $sql);
      if ($result){
          while( $row = mysqli_fetch_assoc($result)){
              $i = $row['id'];
              $t = $row['title'];
              $img = $row['img_name'];
              $f = $row['featured'];
              $a = $row['active'];

              echo "<tr>
      <th scope='row'>$temp</th>
      <td>$t</td>
      <td><img class='table-img' src='../images/category/$img' alt='No Image'></td>
      <td>$f</td>
      <td>$a</td>
      <td><a href='update-category.php?updateId=$i' class='btn btn-primary btn-sm me-3'>Update</a>
      <a href='delete-category.php?deleteId=$i' class='btn btn-danger btn-sm'>Delete</a></td>
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