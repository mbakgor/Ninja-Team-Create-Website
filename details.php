<?php

   include('config/db_connect.php');

   if(isset($_POST['delete'])){

        $id_to_delete = mysqli_real_escape_string($connect,$_POST['id_to_delete']);

        $sql = "DELETE FROM ninjas WHERE id= $id_to_delete";

        if(mysqli_query($connect, $sql)){

        header('Location:details.php');
    } else {

            echo 'query error:' . mysqli_error($connect);
        }

   }





 if(isset($_GET['id'])){

    $id = mysqli_real_escape_string($connect,$_GET['id']);

    $sql = "SELECT * FROM ninjas WHERE id = $id";

    $result = mysqli_query($connect,$sql);

    $ninja = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    mysqli_close($connect);




 }


?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>

    <div class="container center">
     <?php if($ninja): ?>


   <div class="row">
     <div class="col s12 m6">
       <div class="card blue-grey darken-1">
         <div class="card-content center white-text">
           <span class="card-title"><?php echo htmlspecialchars($ninja['name']); ?></span>
           <h4 style="color:#bbdefb;">Speciality:<?php echo htmlspecialchars($ninja['speciality']); ?></h4>
           <h4 style="color:#bbdefb;">Fighting Style:<?php echo htmlspecialchars($ninja['fight_style']); ?></h4>
           <h4 style="color:#bbdefb;">Nature Type:<?php echo htmlspecialchars($ninja['nature_type']); ?></h4>
           <h6 style="color:#bbdefb;">Created At:<?php echo htmlspecialchars($ninja['created_at']); ?></h6>

           <form action="details.php" method="POST">
               <input type="hidden" name="id_to_delete" value="<?php echo $ninja['id'] ?>">
               <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
          </form>

          <form action="update-ninja.php?id=<?php echo $ninja['id']?>" method="POST">
              <input type="hidden" name="id_to_update" value="<?php echo $ninja['id'] ?>">
              <input type="submit" name="update" value="Update" class="btn brand z-depth-0">
         </form>


         </div>
         <div class="card-action">
           <a href="ninjas.php">Go Back</a>
         </div>
       </div>
     </div>
   </div>


     <?php else: ?>
        <h5>No such ninja exists!</h5>
    <?php endif; ?>
         </div>

    <?php include('templates/footer.php'); ?>


</html>
