
<?php include('partials-front/menu.php'); ?>

<!-- main section starts !-->
<div class="main-content">
    <div class="wrapper">
     <h2>Ajouter un genre</h2>
    <br><br>

<?php
    if(isset($_SESSION['upload']))
    {
      echo $_SESSION['upload'];
      unset($_SESSION['upload']); //remove the message
   }

   if(isset($_SESSION['add']))
   {
         echo $_SESSION['add'];
         unset($_SESSION['add']); //remove the message
   }
   ?>

    <form action="" method="POST" enctype="multipart/form-data">

<table class="tbl-30">
  <tr> 
      <td> style:</td>
      <td> <input type ="text"name="style_name"placeholder="Entrez le style"></td>
   </tr>

   <tr>
   <td colspan="2">
   <input type ="submit"name="submit"value="Ajouter" class="btn-secondary"></td>
   </tr>
</table>

</form>
<?php

if(isset($_POST['submit']))
{
  //add in DB
  //echo"clicked";

  //1.get the data from form
  $style_name = $_POST['style_name'];

     //3.insert into DB
     //numerical value do not need to be passed with quote
          $sql2 = "INSERT INTO styles SET
          style_name ='$style_name'
        
          ";

          //execute query

          $res2 = mysqli_query($conn, $sql2);

  //4.redirect
  if($res2==true)
  {
      //query executed and add category
      $_SESSION['add'] = "<div class='success'> Le style à bien été ajouté.<div>";
      //redirect
      header('location:'.SITEURL.'manage-style.php');
  }

 
  else
  {
      $_SESSION['add'] = "<div class='error'> Le style n'a pas été ajouté.<div>";
      //redirect
      header('location:'.SITEURL.'add-style.php');
  }

   
}
  ?>



    </div>
    </div>


<?php include('partials-front/footer.php'); ?>
