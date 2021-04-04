
 <?php include ('partials-front/menu.php'); ?>

   <!-- main section starts !-->
   <div class="main-content">
    <div class="wrapper">
     <h1>Modifier un genre</h1>
    <br><br>

    <?php
        if(isset($_GET['id']))
        {


        //select id
            $id= $_GET['id'];

           //create sql to get * the details
            $sql= "SELECT * FROM genres WHERE genre_id=$id";

            //execute the query
            $res= mysqli_query($conn, $sql);

            //count the row to check wether the id is valid or not

            $count = mysqli_num_rows($res);

            if($count==1)
             {
                $row = mysqli_fetch_assoc($res);
                $genre_id = $row['genre_id'];
                $genre_name = $row['genre_name'];

             }
             else
             {
                $_SESSION['no-category-found'] = "<div class='success'> Ce genre n'existe pas<div>";
                //redirect
                header('location:'.SITEURL.'manage-genre.php');
             }



        }
        else
        {
            header('location:'.SITEURL.'manage-genre.php');
        }

    ?>

      <form action="" method="POST" enctype="multipart/form-data">

<table class="tbl-30">
    <tr> 
        <td> Genre:</td>
        <td> <input type ="text"name="genre_name"value=<?php echo $genre_name; ?> ></td>
     </tr>

     <tr>
    
     <input type ="hidden"name="genre_id"value="<?php echo $id; ?>"></td>
     </tr>
     <tr>
     <td>
     <input type ="submit"name="submit"value="Modifier le genre" class="btn-secondary"></td>
     </tr>
</table>

</form>
</div>
</div>

<?php
if(isset($_POST['submit']))
{
    //echo "clicked";
    $id= $_POST['genre_id'];
    $genre_name= $_POST['genre_name'];


    $sql2 = "UPDATE genres SET 
    genre_name = '$genre_name'

    WHERE genre_id = '$id' 
    ";

    //execute
    $res2 = mysqli_query($conn, $sql2);


    if($res2==true)
    {
        //genre updated

        $_SESSION['update'] = "<div class='success'> Le genre a été modifiée <div>";
        //redirect
        header('location:'.SITEURL.'manage-genre.php');
      
    }
    else
    {
        //failed
        $_SESSION['update'] = "<div class='error'> Le genre n'a pas été modifiée<div>";
        //redirect
        header('location:'.SITEURL.'manage-genre.php');
      
    }
  }


?>

</div>
</div>
<?php include('partials-front/footer.php'); ?>
