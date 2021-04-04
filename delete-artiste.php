<?php

//iclude constant.php file here

include ('config/constant.php');

// 1. Get the ID of artist to be deleted

$id = $_GET['id'];

// 2. Create SQL Query to delete 
$sql = "DELETE FROM artists WHERE artist_id=$id";

// execute the query
$res = mysqli_query($conn, $sql);
// check wether the query is executed or not
if($res==true){
//Query successfully executed
$_SESSION['delete'] = "<div class='success'>Artiste supprimé</div>";
header('location:'.SITEURL.'manage-artiste.php');
}
else{
    $_SESSION['delete'] = "<div class='error'>Artiste non supprimé. </div>";
    header('location:'.SITEURL.'manage-artiste.php');

}


// 3. redirect to manage manage page with message (success/error)

?>