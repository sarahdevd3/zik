<?php

//iclude constant.php file here

include ('config/constant.php');

// 1. Get the ID of artist to be deleted

$id = $_GET['id'];

// 2. Create SQL Query to delete artist
$sql = "DELETE FROM genres WHERE genre_id=$id";

// execute the query
$res = mysqli_query($conn, $sql);
// check wether the query is executed or not
if($res==true){
//Query successfully executed
$_SESSION['delete'] = "<div class='success'>Genre supprimé</div>";
header('location:'.SITEURL.'manage-genre.php');
}
else{
    $_SESSION['delete'] = "<div class='error'>Genre non supprimé. </div>";
    header('location:'.SITEURL.'manage-genre.php');

}


// 3. redirect to manage artist page with message (success/error)

?>