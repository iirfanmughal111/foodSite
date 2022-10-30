<?php include 'parts/header.php';
 
if (isset($_SESSION['user-msg'])){
  echo '<div class="row d-flex mt-4 mb-2 justify-content-center"><div class="col-8">'.$_SESSION['user-msg'].'</div></div>';
   unset( $_SESSION['user-msg']);

}

include 'parts/search-form.php';
?>
    <div class="container">
      <div class="row">
        <div class="col-12 my-5">
          <h1 class="text-center fw-bold">Explore Foods</h1>
        </div>
      </div>

      <!-- Cards -->
 <div class="row d-flex justify-content-evenly">
      <?php

      $sql = "Select * from `tbl_category` where active='Yes' and featured='Yes' order by id DESC";
      $result = mysqli_query($conn, $sql);
      if ($result){
          while( $row = mysqli_fetch_assoc($result)){
              $i = $row['id'];
              $t = $row['title'];
              $img = $row['img_name'];
              $f = $row['featured'];
              $a = $row['active'];
              ?>

        <div class="col-3 my-3">
          <div class="card bg-dark text-white">
            <img src="images/category/<?php echo $img?>" class="card-img" alt="pizza.jpg" />
            <div class="card-img-overlay">
              <h5 class="card-title text-center bg-secondary p-2 rounded"><?php echo $t?></h5>
            </div>
          </div>
        </div>
        
        
    
              <?php

          }
         
          
          
      }
     else{
         echo 'query problem';
     }
      
      ?>

       </div>
    </div>
    
    <div class="container-fluid mt-5" style="background-color: #ececec">
      <div class="container">
        <div class="row py-5">
          <div class="col-12">
            <h1 class="fw-bold text-center">Food Menu</h1>
          </div>

          <div class="row d-flex justify-content-evenly mb-3">
          <?php

$sql = "Select * from `tbl_food` where active='Yes' and featured='Yes' order by id DESC";
$result = mysqli_query($conn, $sql);

if ($result){
    while( $row = mysqli_fetch_assoc($result)){
        $i = $row['id'];
        $t = $row['title'];
        $d = $row['description'];
        $p = $row['price'];


        $img = $row['img_name'];
        $f = $row['featured'];
        $a = $row['active'];
        ?>

<div class="col-5 my-3">
              <div class="row p-2 bg-white">
                <div class="col-4">
                  <img
                    src="images/food/<?php echo $img?>"
                    class="img-fluid rounded img-thubnail"
                    alt=""
                  />
                </div>
                <div class="col-8">
                  <h5><?php echo $t?></h5>
                  <h6>$ <?php echo $p?></h6>
                  <p>
                  <?php echo $d?>.
                  </p>
                  <a href="order.php?orderId=<?php echo $i?>" class="btn btn-sm btn-danger">Order now</a>
                </div>
              </div>
            </div>

  

        <?php

    }
   
    
    
}
else{
   echo 'query problem';
}

?>

    

          </div>

          <div class="row">
            <div class="col-12 d-flex justify-content-center"><a href="foods.php" class="fs-3">More foods</a></div>
          </div>
        </div>
       
      </div>
    </div>
    <?php include 'parts/footer.php'?>
