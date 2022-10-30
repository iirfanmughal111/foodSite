<?php 

include ('parts/header.php');
include ('login-checkup.php');

        $sql = "Select * from `tbl_admin`";
        $result = mysqli_query($conn, $sql);
        $t_admins = mysqli_num_rows($result);

        $sql = "Select * from `tbl_order`";
        $result = mysqli_query($conn, $sql);
        $t_orders = mysqli_num_rows($result);

        $sql = "Select * from `tbl_category`";
        $result = mysqli_query($conn, $sql);
        $t_categories = mysqli_num_rows($result);

        $sql = "Select * from `tbl_food`";
        $result = mysqli_query($conn, $sql);
        $t_foods = mysqli_num_rows($result);

        $sql = "Select SUM(total) as Total from `tbl_order`";
        $result = mysqli_query($conn, $sql);
        $t_prices = mysqli_fetch_assoc($result);
        $t_revenue = $t_prices['Total'];

      
?>

    <div class="container-fluid " style="background-color: azure;">
        <div class="container">
     
        <div class="row">   
        <div class="col-12">
            <h2>Dashbord</h2>
        </div>
    </div>
    <div class="row d-flex justify-content-evenly my-5">

        <div class="col-2 border shadow rounded bg-white py-3">
            <h2 class="text-center"><?php echo $t_admins?></h2>
            <h6 class="text-center">Admins</h6>
        </div>

        <div class="col-2 border shadow rounded bg-white py-3">
            <h2 class="text-center"><?php echo $t_foods?></h2>
            <h6 class="text-center">Foods</h6>
        </div> 

        <div class="col-2 border shadow rounded bg-white py-3">
            <h2 class="text-center"><?php echo $t_categories?></h2>
            <h6 class="text-center">Categories</h6>
        </div> 

        <div class="col-2 border shadow rounded bg-white py-3">
            <h2 class="text-center"><?php echo $t_orders?></h2>
            <h6 class="text-center">Orders</h6>
        </div>

        <div class="col-2 border shadow rounded bg-white py-3">
            <h2 class="text-center"><?php echo $t_revenue?></h2>
            <h6 class="text-center">Revenue</h6>
        </div>

        
    </div>
<div class="row">
<div class="col-12 mb-5">
            <h1>Recent Unfinished Orders</h1>
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Food</th>
      <th scope="col">Qunatity</th>
      <th scope="col">Total</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">Name</th>
      <th scope="col">Contact</th>
      <th scope="col">Addres</th>

    </tr>
  </thead>
  <tbody>
  <?php
  $temp=1;
      $sql = "Select * from `tbl_order` where status='In Progress' order by id desc";
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

      <td class="border-end border-secondary">'.$q.'</td>
      <td class="border-end border-secondary">'.$t.'</td>
      <td class="border-end border-secondary">'.$d.'</td>
      <td class="border-end border-secondary">'.$s.'</td>
      <td class="border-end border-secondary">'.$c_n.'</td>
      <td class="border-end border-secondary">'.$c_c.'</td>
      <td class="border-end border-secondary">'.$c_a.'</td>
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