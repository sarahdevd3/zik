<?php include('partials-front/menu.php'); ?>

      <!-- main section starts !-->
      <div class="main-content">
      <div class="wrapper">
       <h1>Genres</h1>
       <br><br><br>
       <a href="<?php echo SITEURL; ?>add-genre.php" class="btn-primary"> Ajouter un genre</a>
       <br> <br><br><br>
<?php
       if(isset($_SESSION['add']))
{
      echo $_SESSION['add'];
      unset($_SESSION['add']); //remove the message
}

if(isset($_SESSION['upload']))
{
      echo $_SESSION['upload'];
      unset($_SESSION['upload']); //remove the message
}

if(isset($_SESSION['delete']))
{
      echo $_SESSION['delete'];
      unset($_SESSION['delete']); //remove the message
}
if(isset($_SESSION['unauthorized']))
{
      echo $_SESSION['unauthorized'];
      unset($_SESSION['unauthorized']); //remove the message
}
if(isset($_SESSION['update']))
{
      echo $_SESSION['update'];
      unset($_SESSION['update']); //remove the message
}

?>     
       <table class= "tbl-full">

    <tr>
    <th> S.N </th>
    <th> Genre </th>
    
    </tr>

    <?php
      $sql = "SELECT * FROM genres";

      $res = mysqli_query($conn,$sql);

      $count = mysqli_num_rows ($res);

      $sn=1;

      if($count>0)
      {
            while($row=mysqli_fetch_assoc($res)){
                  $id= $row['genre_id'];
                  $genre_name= $row['genre_name'];
                 
            ?>

<tr>
    <td> <?php echo $sn++ ?></td>
    <td> <?php echo $genre_name ?> </td>
   
    <td> 
    <td>  <a href="<?php echo SITEURL; ?>update-genre.php?id=<?php echo $id; ?>" class="btn-secondary"> Modifier </a>
          <a href="<?php echo SITEURL; ?>delete-genre.php?id=<?php echo $id; ?>" class="btn-danger"> Supprimer</a>
    </td>
    </tr>

<?php

            }

      }
      else
      {
            echo "<tr> <td colspan='7' class='error'> Genre non ajouté. </td> </tr>";
      }
    ?>

        
        </table>

               
    </div>
</div>
    <!-- main section ends !-->

    

    <?php include('partials-front/footer.php'); ?>
