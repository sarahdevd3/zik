
 <?php include ('partials-front/menu.php'); ?>

<!-- main section starts !-->
<div class="main-content">
 <div class="wrapper">
  <h1>Modifier un style</h1>
 <br><br>

 <?php
     if(isset($_GET['id']))
     {


     //select id
         $id= $_GET['id'];

        //create sql to get * the details
         $sql= "SELECT * FROM styles WHERE style_id=$id";

         //execute the query
         $res= mysqli_query($conn, $sql);

         //count the row to check wether the id is valid or not

         $count = mysqli_num_rows($res);

         if($count==1)
          {
             $row = mysqli_fetch_assoc($res);
             $style_id = $row['style_id'];
             $style_name = $row['style_name'];

          }
          else
          {
             $_SESSION['no-category-found'] = "<div class='success'> Ce style n'existe pas<div>";
             //redirect
             header('location:'.SITEURL.'manage-style.php');
          }



     }
     else
     {
         header('location:'.SITEURL.'manage-style.php');
     }

 ?>

   <form action="" method="POST" enctype="multipart/form-data">

<table class="tbl-30">
 <tr> 
     <td> style:</td>
     <td> <input type ="text"name="style_name"value=<?php echo $style_name; ?> ></td>
  </tr>

  <tr>
 
  <input type ="hidden"name="style_id"value="<?php echo $id; ?>"></td>
  </tr>
  <tr>
  <td>
  <input type ="submit"name="submit"value="Modifier la catégorie" class="btn-secondary"></td>
  </tr>
</table>

</form>
</div>
</div>

<?php
if(isset($_POST['submit']))
{
 //echo "clicked";
 $id= $_POST['style_id'];
 $style_name= $_POST['style_name'];


 $sql2 = "UPDATE styles SET 
 style_name= '$style_name'

 WHERE style_id= '$id' 
 ";

 //execute
 $res2 = mysqli_query($conn, $sql2);


 if($res2==true)
 {
     //category updated

     $_SESSION['update'] = "<div class='success'> Le style a été modifiée <div>";
     //redirect
     header('location:'.SITEURL.'manage-style.php');
   
 }
 else
 {
     //failed
     $_SESSION['update'] = "<div class='error'> Le style n'a pas été modifiée<div>";
     //redirect
     header('location:'.SITEURL.'manage-style.php');
   
 }
}


?>

</div>
</div>
<?php include('partials-front/footer.php'); ?>
