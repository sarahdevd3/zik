<?php include('partials-front/menu.php'); ?>

      <!-- main section starts !-->
      <div class="main-content">
      <div class="wrapper">
       <h1>Artistes</h1>
      <br><br><br>
<?php
if(isset($_SESSION['add']))
{
      echo $_SESSION['add']; //display the message
      unset($_SESSION['add']); //remove the message
}
?>
<br><br><br>
       <a href="add-artiste.php" class="btn-primary"> Ajouter un artiste</a>
       <br> <br><br><br>
        <table class= "tbl-full">

    <tr>
    <th> S.N </th>
    <th> Nom </th>
    </tr>

    <?php
            $sql = "SELECT * FROM artists";
            $sql2 = "SELECT * FROM styles";
            $sql3 = "SELECT * FROM styles";

            $res = mysqli_query($conn,$sql);


      if($res==TRUE){
//count rows to check wether we have data or not
      $count = mysqli_num_rows($res);//function to get all the rows in database
      
      $sn=1; //create a variable and assign the value

      //check the num of rows
      if($count>0)
      {

            //we have data in database
            while($rows= mysqli_fetch_assoc($res)){

                  //using while loop to get all the data from database
               //and while loop will run as long as we have data in database

               //get individual data
                        $id=$rows['artist_id'];
                        $artist_name=$rows['artist_name'];
                      

               //Display the values in our table
               ?>
<tr>
    <td> <?php echo $sn++?> </td>
    <td> <?php echo $artist_name ?> </td>
   
    <td> 
    <td>  <a href="<?php echo SITEURL; ?>update-artiste.php?id=<?php echo $id; ?>" class="btn-secondary"> Modifier </a>
          <a href="<?php echo SITEURL; ?>delete-artiste.php?id=<?php echo $id; ?>" class="btn-danger"> Supprimer</a>
    </td>
    </tr>
               <?php

               
            }
      }
      else{

      }
      }
      
    ?>

    
        </table>
           
    </div>
</div>
    <!-- main section ends !-->

    

    <?php include('partials-front/footer.php'); ?>
