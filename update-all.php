<?php include('partials-front/menu.php'); ?>

      <!-- main section starts !-->
      <div class="main-content">
      <div class="wrapper">
      <h2>Gestion des Commandes</h2>
       <br> <br>


       <?php

            if(isset($_GET['id']))
            {
                $id=$_GET['id'];

                $sql="SELECT * FROM tbl_order WHERE id=$id";
    
                //execute the query
                $res=mysqli_query($conn,$sql);

                //count rows
                 $count = mysqli_num_rows($res);

                 if($count==1){
                  //get the details
                  $row=mysqli_fetch_assoc($res);
  
                  $food = $row['food'];
                  $price = $row['price'];
                  $qty = $row['qty'];
                  $status = $row['status'];
                  $customer_name = $row['customer_name'];
                  $customer_contact = $row['customer_contact'];
                  $customer_email = $row['customer_email'];
                  $customer_address = $row['customer_address'];

          } 
            else
            {
              header('location:'.SITEURL.'manage-order.php');
            }
          }
            else
            {
              header('location:'.SITEURL.'manage-order.php');
            }
            
        

       ?>

       <form action="" method="POST">

       <table class= "tbl-30">
       <tr>
            <td>
                Plat
            </td>
            <td>
              <b> <?php echo $food; ?></b>
            </td>
       </tr>

       <tr>
            <td>
                Price
            </td>
            <td>
              <b> <?php echo $price; ?>€</b>
            </td>
       </tr>

       <tr>
            <td>
                Qté
          </td>
        <td>
        <input type="number" name="qty" value="<?php echo $qty; ?>">
        </td>
       </tr>

       <tr>
       <td>
         Statut
       </td>
       <td>
        <select name="status">
            <option <?php if($status=="Commandé"){echo "selected";} ?> value="Commandé"> Commandé </option>
            <option <?php if($status=="En livraison"){echo "selected";} ?> value="En livraison"> En livraison </option>
            <option <?php if($status=="Livré"){echo "selected";} ?> value="Livré"> Livré </option>
            <option <?php if($status=="Annulé"){echo "selected";} ?> value="Annulé"> Annulé </option>

       </select> 
       </td>
       </tr>


       <tr>
          <td>
              Nom du client:
          </td>
        <td>
       <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
       </td>
       </tr>

       <tr>
          <td>
              Tel:
          </td>
        <td>
       <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
       </td>
       </tr>

       <tr>
          <td>
              Email:
          </td>
        <td>
       <input type="email" name="customer_email" value="<?php echo $customer_email; ?>">
       </td>
       </tr>

       <tr>
          <td>
              adresse:
          </td>
        <td>
        <textarea name="address" rows="5" placeholder="<?php echo $customer_address; ?>" class="input-responsive"></textarea>
       </td>
       </tr>


       <tr>
       <td colspan="2">
       <input type ="hidden"name="id"value="<?php echo $id; ?>" class="btn-secondary">
       <input type ="hidden"name="price"value="<?php echo $price; ?>" class="btn-secondary">
       <input type ="submit"name="submit"value="Modifier" class="btn-secondary"></td>
       </td>
  </form>
<?php
          if(isset($_POST['submit']))
          {
              $id = $_POST['id'];
              $price = $_POST['price'];
              $qty = $_POST['qty'];

              $total = $price*$qty;
              $status = $_POST['status'];
              $customer_name = $_POST['customer_name'];
              $customer_contact = $_POST['customer_contact'];
              $customer_email = $_POST['customer_email'];
              $customer_address = $_POST['customer_address'];

              $sql2 = "UPDATE tbl_order SET
              qty = $qty,
              total= $total,
              status = '$status',
              customer_name = 'customer_name',
              customer_name = 'customer_contact',
              customer_name = 'customer_email',
              customer_name = 'customer_address'
              ";

              //check wether query is successfully executed or not
              $res2 = mysqli_query($conn, $sql2);

    if($res2==true)
    {
        //query executed and admin updated
        $_SESSION['update'] = "<div class='success'> commande modifiée.<div>";
        //redirect
        header('location:'.SITEURL.'manage-order.php');
    }
    else
    {
        $_SESSION['update'] = "<div class='error'> Commande non modifiée.<div>";
        //redirect
        header('location:'.SITEURL.'manage-order.php');
    }

}
          
          

          

          ?>
       </div>
</div>

