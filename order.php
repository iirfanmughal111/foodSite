<?php 
include "parts/header.php";
$id = $_GET['orderId'];
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

    $c_n= $_POST['c_name'];
    $c_c= $_POST['c_contact'];
    $c_e= $_POST['c_email'];
    $c_a= $_POST['c_address'];
    $q= $_POST['qty'];
    $total=$q*$p;
    $f=$t;
   
   $s = "In Progress";
    $d=date("d-m-Y");
    
  
      $sql = "insert into `tbl_order` (food,price,qty,total,order_date,status,c_name,c_contact,c_email,c_address) values ('$f','$p','$q','$total','$d','$s','$c_n','$c_c','$c_e','$c_a')";

      $result = mysqli_query($conn,$sql);
      if ($result){
    
        $_SESSION['user-msg']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Congratulations!</strong> Order Placed successfully.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
       
    
        header('location:index.php');
        
    }
    else{
        $_SESSION['user-msg']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Error!</strong> Order placing problem.Try again later....
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
    
    
      echo $conn->error;
        header('location:index.php');
        
     }
  
    
    }
?>

<div class="container-fluid" id="foodSearch">
    <div class="row d-flex justify-content-end align-items-center" style="min-height:80vh !important;">
        <div class="col-md-6 py-5 px-3">
        <div class="row d-flex justify-content-evenly mb-3">

<div class="col-10 my-3 mt-n5">
                <div class="row">
                  <div class="col-12">
                    <h3 class="text-white">You are ordering now: </h3>
                  </div>
                </div>
              <div class="row p-2 bg-white rounded">
                <div class="col-4">
                  <img
                    src="images/food/<?php echo $img?>"
                    class="img-fluid rounded img-thubnail"
                    alt="No Img" style="max-height:100px;max-width:100px;"
                  />
                </div>
                <div class="col-8 d-flex flex-column justify-content-center">
                  <h5><?php echo $t?></h5>
                  <h6>$ <?php echo $p?></h6>
                  <p>
                  <?php echo $d?>.
                  </p>
                </div>
              </div>
            </div>

  

    

          </div>

            <form method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="c_name">
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="c_contact">
                  </div>
                  <div class="mb-3">
                    <label for="qty" class="form-label">Price</label>
                    <input type="number" class="form-control" disabled value="<?php echo $p;?>" name="price">
                  </div>
                  <div class="mb-3">
                    <label for="qty" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="qty">
                  </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control" name="c_email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Address</label>
                    <input type="text" class="form-control" name="c_address">
                  </div>


                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>
<?php 
include "parts/footer.php";




  ?>

