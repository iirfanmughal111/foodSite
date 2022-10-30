<?php 
include('parts/header.php');

$id = $_GET['updateId'];
$sql = "select * from `tbl_order` where id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
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

if (isset($_POST['submit'])){
    $q = $_POST['qty'];
    $t = $p*$q;
    $d = date("d-m-Y");
    $s = $_POST['status'];
    $c_n = $_POST['c_name'];
    $c_c = $_POST['c_contact'];
    $c_e = $_POST['c_email'];
    $c_a = $_POST['c_address'];

$sql = "update `tbl_order` set id = '$id',food = '$f', price = '$p',qty = '$q',total = '$t',order_date = '$d',status = '$s',c_name = '$c_n',c_contact = '$c_c',c_email = '$c_e',c_address = '$c_a' where id = $id";

echo $sql;
$result = mysqli_query($conn,$sql);
if ($result){

    $_SESSION['order-msg']= "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Congratulations!</strong> Order Update successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";
//   echo 'ok';
    header('location:manage-order.php');
}
else{
    $_SESSION['order-msg']= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Order Updation problem.Try again later....
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";
  echo $conn->error;

    // header('location:manage-order.php');
 }

}
?>


<div class="container">
<div class="row">   
        <div class="col-12">
            <h2>Update Order</h2>
        </div>
        <div class="col-12 my-3">
            <a href="manage-order.php" class="btn btn-danger">Cancel</a>
        </div>
    </div>
    <div class="row d-flex justify-ceontent-center">
        <div class="col-md-6 col-11">
        <form method="post">
        <div class="mb-3">
                    <label for="food" class="form-label">Food Name</label>
                    <input type="text" class="form-control" value="<?php echo $f;?>" disabled name="food">
                  </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Receiver Name</label>
                    <input type="text" class="form-control" value="<?php echo $c_n;?>"  name="c_name">
                  </div>
                  <div class="mb-3">
                    <label for="name" class="form-label">Phone</label>
                    <input type="text" class="form-control" value="<?php echo $c_c;?>" name="c_contact">
                  </div>
                  <div class="mb-3">
                    <label for="qty" class="form-label">Price</label>
                    <input type="number" class="form-control" disabled value="<?php echo $p;?>" name="price">
                  </div>
                  <div class="mb-3">
                    <label for="qty" class="form-label">Total Price</label>
                    <input type="number" class="form-control" disabled value="<?php echo $t;?>" name="price">
                  </div>
                  <div class="mb-3">
                    <label for="qty" class="form-label">Order Date</label> 
                    <input type="text" class="form-control" disabled value="<?php echo $d;?>" name="price">
                  </div>
                  <div class="mb-3">
                    <label for="qty" class="form-label">Quantity</label>
                    <input type="number" class="form-control" value="<?php echo $q;?>" name="qty">
                  </div>
                  <div class="mb-3">
                  <select class="form-select" name="status">
                        <?php 
                        if ($s=='In Progress'){
                            echo '<option value="In Progress" selected>In Progress</option>';
                        }else{
                            echo '<option value="In Progress" >In Progress</option>';
                        }
                        if ($s=='Delivered'){
                            echo '<option value="Delivered" selected>Delivered</option>';
                        }else{
                            echo '<option value="Delivered" >Delivered</option>';
                        }
                        
                        ?>
                       
                        
                        
                    </select>
                  
                  </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control" name="c_email"  value="<?php echo $c_e;?>" >
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Address</label>
                    <input type="text" class="form-control"  value="<?php echo $c_a;?>"  name="c_address">
                  </div>


                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </form>

        </div>
    </div>
</div>

<?php include('parts/footer.php')?>
