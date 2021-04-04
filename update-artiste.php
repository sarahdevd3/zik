<?php include ('partials-front/menu.php'); ?>

<div class = "main-content">
    <div class="wrapper">
        <h1> Modifier l'artiste </h1>
<br>

<?php
    //1. get the id of the selected artist
    $id=$_GET['id'];
    

    //2.Create sql query to get the details
    $sql="SELECT * FROM artists WHERE artist_id=$id";
    

    //execute the query
    $res=mysqli_query($conn,$sql);

    //check wether the query is executed or not

    if($res==true)
    {
        //check wether the query is executed or not
        $count = mysqli_num_rows($res);
        //check wether we have artist or not
        if($count==1){
                //get the details
                $row=mysqli_fetch_assoc($res);

                $artist_id = $row['artist_id'];
                $artist_name = $row['artist_name'];
        }
        else{
            //redirect
            header('location:'.SITEURL.'manage-artiste.php');
        }
    }

?>
        <form action="" method="POST">

<table class="tbl-30">
    <tr> 
        <td> Nom :</td>
        <td> <input type ="text"name="artist_name"value="<?php echo $artist_name; ?>"></td>
     </tr>
 
     <td colspan="2">
     <input type ="hidden"name="artist_id"value= <?php echo $id; ?> class="btn-secondary">
     <input type ="submit"name="submit"value="Modifier un admin" class="btn-secondary"></td>
     </tr>
</table>

</form>

</div>
</div>
<?php
// check wether the submit button is clicled or not
if(isset($_POST['submit']))
{
    //echo"ok modifié"
    //get all the values from form
    $id = $_POST['artist_id'];
    $artist_name = $_POST['artist_name'];
   //create sql query to update artist
    $sql = "UPDATE artists SET 
    artist_name = '$artist_name'

    WHERE artist_id='$id'
    ";

      //execute the query
      $res = mysqli_query($conn, $sql);

  

    //check wether query is successfully executed or not

    if($res==true)
    {
        //query executed and artist updated
        $_SESSION['update'] = "<div class='success'> Artiste modifié.<div>";
        //redirect
        header('location:'.SITEURL.'manage-artiste.php');
    }
    else
    {
        $_SESSION['update'] = "<div class='success'> Artiste  non modifié.<div>";
        //redirect
        header('location:'.SITEURL.'manage-artiste.php');
    }

}

?>
<?php include('partials-front/footer.php'); ?>
