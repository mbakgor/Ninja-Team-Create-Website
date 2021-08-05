<?php
include('config/db_connect.php');
session_start();

$userID = $_SESSION['userID'];

$sql = "SELECT * FROM teams WHERE userID = '$userID'";

$result = mysqli_query($connect,$sql);

$teams = mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);

if(isset($_POST['delete'])){

     $id_to_delete = mysqli_real_escape_string($connect,$_POST['id_to_delete']);

     $sql = "DELETE FROM teams WHERE teamID= $id_to_delete";

     if(mysqli_query($connect, $sql)){

     header('Location:teams.php');
 } else {

         echo 'query error:' . mysqli_error($connect);
     }

}

?>





<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<h4 class="center grey-text">Your Teams!</h4>

<div class="container">
    <div class="row">

<?php foreach($teams as $team){ ?>
           <div class="col s6 md3">
              <div class="card blue-grey darken-1">
                 <div class="card-content center" style="font-family:narutoFont; color:#00b8d4">
                    <h3 style="font-family:narutoFont"><?php echo htmlspecialchars($team['team_name']); ?></h3>
                    <h6><?php echo htmlspecialchars($team['ninja_name1']); ?></h6>
                    <div><?php echo htmlspecialchars($team['ninja_name2']); ?></div>
                    <div><?php echo htmlspecialchars($team['ninja_name3']); ?></div>

                    <form action="teams.php" method="POST">
                        <input type="hidden" name="id_to_delete" value="<?php echo $team['teamID'] ?>">
                        <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
                   </form>

                </div>



                <div class="card-action right-align">
                <a class="brand-text" href='team-details.php?id=<?php echo $team['id']?>'>more info</a>
                </div>
            </div>
        </div>
<?php } ?>


<?php include('templates/footer.php'); ?>



</html>
