<?php include('partials-front/menu.php'); ?>

      <!-- main section starts !-->
      <div class="main-content">
      <div class="wrapper">
       <h1>Artistes</h1>
      <br><br><br>

<br><br><br>
       <a href="add-artiste-style.php" class="btn-primary"> Ajouter un artiste </a>
       <br> <br><br><br>
        <table class= "tbl-full">

    <tr>
    <th> S.N </th>
    <th> Nom </th>
    <th> Style </th>
    </tr>

    <?php
            $sql = "SELECT `artists`.`artist_id`,`artists`.`artist_name`, `styles`.`style_name`, `assoc_artists_styles`.* FROM `styles` JOIN `assoc_artists_styles` ON `assoc_artists_styles`.`assoc_styles_id` = `styles`.`style_id` 
            JOIN `artists` ON `assoc_artists_styles`.`assoc_artists_id` = `artists`.`artist_id` ";


            $res = mysqli_query($conn,$sql);


      if($res==TRUE){
//count rows to check wether we have data or not
      $count = mysqli_num_rows($res);//function to get all the rows in database
      
      $sn=1; //create a variable and assign the value



     
      //check the num of rows
      if($count>0)
      {



            //we have data in database
            while ($rows= mysqli_fetch_assoc($res)){

                  //using while loop to get all the data from database
               //and while loop will run as long as we have data in database

               //get individual dat
                        $id=$rows['artist_id'];
                        $artist_name=$rows['artist_name'];
                        $style_name=$rows['style_name'];
                        $assoc_artists_id=$rows['assoc_artists_id'];
                        $assoc_styles_id=$rows['assoc_styles_id'];
                      

               //Display the values in our table
               ?>



<tr>


     <td> <?php echo $sn++ ?> </td>
    <td> <?php echo $artist_name ?> </td>
    <td> <?php echo $style_name ?> </td>

    <td> 
    <td>  <a href="<?php echo SITEURL; ?>add-artiste-style.php?id=<?php echo $assoc_artists_id; ?>" class="btn-secondary"> Modifier </a>
          <a href="<?php echo SITEURL; ?>delete-artiste.php?id=<?php echo $id; ?>" class="btn-danger"> Supprimer</a>
    </td>
    </tr>
               <?php

            }
      }
      
}  
    ?>

    
        </table>
           
    </div>
</div>
    <!-- main section ends !-->
    

    

    <?php include('partials-front/footer.php'); ?>
