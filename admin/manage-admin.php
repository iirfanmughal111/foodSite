<?php 
include 'parts/header.php';
include 'login-checkup.php';
?>
<div class="container-fluid " style="background-color: azure;">
        <div class="container">

    <div class="row">   
        <div class="col-12">
            <h2>Manage admins</h2>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <a href="add-admin.php" class="btn btn-primary my-3">Add Admin</a>
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
      <th scope="col">First Name</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $temp=1;
      $sql = "Select * from `tbl_admin`";
      $result = mysqli_query($conn, $sql);
      if ($result){
          while( $row = mysqli_fetch_assoc($result)){
              $i = $row['id'];
              $n = $row['name'];
              $u = $row['username'];
              $p = $row['password'];
              echo '<tr>
      <th scope="row">'.$temp.'</th>
      <td>'.$n.'</td>
      <td>'.$u.'</td>
      <td>'.$p.'</td>
      <td><a href="update-admin.php?updateId='.$i.'" class="btn btn-primary btn-sm me-3">Update</a>
      <a href="delete-admin.php?deleteId='.$i.'" class="btn btn-danger btn-sm">Delete</a></td>
    </tr>';
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