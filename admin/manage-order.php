<?php 
include 'parts/header.php';
include 'login-checkup.php';
?>
<div class="container-fluid " style="background-color: azure;">
        <div class="container">

    <div class="row">   
        <div class="col-12">
            <h2>Manage Order</h2>
        </div>
    </div>


    <div class="row">

        <?php if (isset($_SESSION['admin-msg'])){
             echo $_SESSION['admin-msg'];
             unset( $_SESSION['admin-msg']);

        }?>
        
       
        <div class="col-12">
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Food</th>
      <th scope="col">Price</th>
      <th scope="col">Qunatity</th>
      <th scope="col">Total</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">Name</th>
      <th scope="col">Contact</th>
      <th scope="col">Email</th>
      <th scope="col">Addres</th>
      <th scope="col">Action</th>






    </tr>
  </thead>
  <tbody>
  <?php
  $temp=1;
      $sql = "Select * from `tbl_order` order by id desc";
      $result = mysqli_query($conn, $sql);
      if ($result){
          while( $row = mysqli_fetch_assoc($result)){
              $i = $row['id'];
              $f = $row['food'];
              $p = $row['price'];
              $q = $row['qty'];
              $t = $row['total'];
              $d = $row['order_date'];
              $s = $row['status'];
              $c_n = $row['c_name'];
              $c_c = $row['c_contact'];
              $c_e = $row['c_email'];
              $c_a = $row['c_address'];

              echo '<tr >
      <th scope="row" class="border-end border-secondary"class="border-end border-secondary">'.$temp.'</th>
      <td class="border-end border-secondary">'.$f.'</td>
      <td class="border-end border-secondary">'.$p.'</td>
      <td class="border-end border-secondary">'.$q.'</td>
      <td class="border-end border-secondary">'.$t.'</td>
      <td class="border-end border-secondary">'.$d.'</td>
      <td class="border-end border-secondary">'.$s.'</td>
      <td class="border-end border-secondary">'.$c_n.'</td>
      <td class="border-end border-secondary">'.$c_c.'</td>
      <td class="border-end border-secondary">'.$c_e.'</td>
      <td class="border-end border-secondary">'.$c_a.'</td>
      <td class="border-end border-secondary"><a href="update-order.php?updateId='.$i.'" class="btn btn-primary btn-sm me-3">Update</a>
      <a href="delete-order.php?deleteId='.$i.'" class="btn btn-danger btn-sm">Delete</a></td>
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