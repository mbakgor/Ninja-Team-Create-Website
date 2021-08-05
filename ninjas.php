<?php
     include('config/db_connect.php');
     session_start();

     $userID = $_SESSION['userID'];

     $sql = "SELECT * FROM ninjas WHERE userID = '$userID'";

     $result = mysqli_query($connect,$sql);

     $ninjas = mysqli_fetch_all($result,MYSQLI_ASSOC);

     mysqli_free_result($result);

?>



<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<h4 class="center grey-text">Your Ninjas!</h4>

<div class="container">
    <div class="row">

        <?php foreach($ninjas as $ninja){ ?>

           <div class="col s6 md3">
              <div class="card blue-grey darken-1">
                 <div class="card-content center" style="font-family:narutoFont; color:#00b8d4">
                    <h6><?php echo htmlspecialchars($ninja['name']); ?></h6>
                    <div><?php echo htmlspecialchars($ninja['nature_type']); ?></div>
                </div>
                <div class="card-action right-align">
                <a class="brand-text" href='details.php?id=<?php echo $ninja['id']?>'>more info</a>
                </div>
            </div>
        </div>


    <?php } ?>

<?php include('templates/footer.php'); ?>



</html>
