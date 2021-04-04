<?php

//iclude constant.php file here

include ('config/constant.php');

// 1. Get the ID of admin to be deleted

$id = $_GET['id'];

// 2. Create SQL Query to delete admin
$sql = "DELETE FROM styles WHERE style_id=$id";

// execute the query
$res = mysqli_query($conn, $sql);
// check wether the query is executed or not
if($res==true){
//Query successfully executed
$_SESSION['delete'] = "<div class='success'>style supprimé</div>";
header('location:'.SITEURL.'manage-style.php');
}
else{
    $_SESSION['delete'] = "<div class='error'>style non supprimé. </div>";
    header('location:'.SITEURL.'manage-style.php');

}


// 3. redirect to manage admin page with message (success/error)

?>
