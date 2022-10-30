<?php include 'parts/header.php'?>
<?php include 'partss/search-form.php'?>
    <div class="container">
      <div class="row">
        <div class="col-12 my-5">
          <h1 class="text-center fw-bold">Explore Foods</h1>
        </div>
      </div>
      <!-- Cards -->
      <div class="row d-flex justify-content-evenly my-5">

      <?php

$sql = "Select * from `tbl_category` where active='Yes' order by id DESC";
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
    <?php include 'parts/footer.php'?>