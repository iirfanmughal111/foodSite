<?php
session_start();
define('SITEURL',"http://localhost/foodSite/");
define('HOST',"localhost");
define('DB_USERNAME',"root");
define('DB_PASSWORD',"Admin12$");
define('DB_NAME',"foodOrder");



$conn = mysqli_connect(HOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
$db_conn = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
if ($db_conn==1){

    // echo 'db connecion ok ';

}
else{
    echo "Connection Error";
}
?>

