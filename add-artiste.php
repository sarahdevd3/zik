<?php include('partials-front/menu.php'); ?>


     <!-- main section starts !-->
     <div class="main-content">
      <div class="wrapper">
      <h1>Ajouter un artiste</h1>
<br> <br>

<?php
if(isset($_SESSION['add']))//Checking wether the Session is set or not
{
echo $_SESSION['add']; //Display the session message if set
unset($_SESSION['add']); //Remove Session message
}
?>

    <form action="" method="POST">

    <table class="tbl-30">
        <tr> 
            <td> Nom :</td>
            <td> <input type ="text"name="artist_name"placeholder="Entrez le nom de l'artiste"></td>
         </tr>
         
         <td colspan="2">
             
         <input type ="submit"name="submit"value="Ajouter un artiste" class="btn-secondary"></td>
         </tr>
</table>

    </form>
</div>



<?php
// process the value from form and save it to database
//Check wether the submit button is clicked or not

if(isset($_POST['submit']))
{
    //button clicked
   // echo "button clicked";
   // get the data from form

   $artist_name= $_POST['artist_name'];
 

   //sql query to save the data into database

   $sql= "INSERT INTO artists SET
   artist_name='$artist_name'

   ";
  
//execute query and save it to database
$res = mysqli_query($conn,$sql) or die (mysqli_error());
// check wether the data is inserted or not and display appropriate message
if($res==TRUE)
{
   //create a session variable to display message
   $_SESSION['add'] = "L'artiste à bien été ajouté";
   //redirect page to manage admin
   header("location:".SITEURL.'manage-artiste.php');
}
else{
    //failed to insert data
  //create a session variable to display message
  $_SESSION['add'] = "L'artiste n'a pas été ajouté";
  //redirect page to manage admin
  header("location:".SITEURL.'add-artiste.php');
}
}


?>

<?php include('partials-front/footer.php'); ?>
