<?php include 'parts/header.php'?>
<?php include 'partss/search-form.php'?>
    <div class="container-fluid mt-5" style="background-color: #ececec">
      <div class="container">
        <div class="row py-5">
          <div class="col-12">
            <h1 class="fw-bold text-center">Food Menu</h1>
          </div>

          <div class="row d-flex justify-content-evenly mb-3">

                     <?php

$sql = "Select * from `tbl_food` where active='Yes' order by id DESC";
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
                  <a href="order.php" class="btn btn-sm btn-danger">Order now</a>
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
       
      </div>
    </div>
<?php include 'parts/footer.php'?>
