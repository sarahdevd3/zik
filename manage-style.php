<?php include('partials-front/menu.php'); ?>

      <!-- main section starts !-->
      <div class="main-content">
      <div class="wrapper">
       <h1>Styles</h1>
       <br><br><br>
<?php
       if(isset($_SESSION['add']))
{
      echo $_SESSION['add'];
      unset($_SESSION['add']); //remove the message
}
if(isset($_SESSION['delete']))
{
      echo $_SESSION['delete'];
      unset($_SESSION['delete']); //remove the message
}


?>

<br><br>
       <!-- add style form -->
<a href="<?php echo SITEURL; ?>add-style.php" class="btn-primary"> Ajouter un Style </a>
       <br> <br><br><br>


<table class= "tbl-full">

    <tr>
    <th> S.N </th>
    <th> Style </th>
  
    </tr>
  <?php
        $sql="SELECT*FROM styles";
        $res = mysqli_query($conn, $sql);

        $sn=1;

        //count rows

        $count = mysqli_num_rows($res);

        if($count>0)
        {
            // we have data in database
            while($row=mysqli_fetch_assoc($res)){
                  $id=$row['style_id'];
                  $style_name=$row['style_name'];
                  $style_genre_id=$row['style_genre_id'];

?>
    <tr>
    <td><?php echo $sn++; ?> </td>
    <td> <?php echo $style_name; ?> </td>
   

   
     </td>
    <td>  <a href="<?php echo SITEURL; ?>update-style.php?id=<?php echo $id; ?>" class="btn-secondary"> Modifier le style</a>
          <a href="<?php echo SITEURL; ?>delete-style.php?id=<?php echo $id; ?>" class="btn-danger"> Supprimer le style</a>
    </td>
    </tr>

<?php
            }
        }
        else
        {
            //no data display the message
            ?>
            <tr>
                  <td colspan="6"><div class="error">Aucune donnée ajoutée</div> </td>
        </tr>
        <?php
        }

  ?>
    </table>

        </div>
</div>
    <!-- main section ends !-->

    

    <?php include('partials-front/footer.php'); ?>
