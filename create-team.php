<?php
     include('config/db_connect.php');
     session_start();

      $teamName = '';

      $errors = array('teamnameError' =>'');

      $userID = $_SESSION['userID'];

      $selectsql = "SELECT name FROM ninjas WHERE userID = '$userID'";

      $selectresult = mysqli_query($connect,$selectsql);

      $selectedninjas = mysqli_fetch_all($selectresult,MYSQLI_ASSOC);

      mysqli_free_result($selectresult);



      if(isset($_POST['submit'])){

          if(empty($_POST['teamName'])){
              $errors['teamnameError'] = 'A name is required! <br />';
          } else {

             $teamName = mysqli_real_escape_string($connect,$_POST['teamName']);
             $userID = $_SESSION['userID'];

             $teamsql = "INSERT INTO teams(team_name,userID) VALUES('$teamName','$userID')";

             if(mysqli_query($connect,$teamsql)){

               $firstNinja = $_POST['select1'];
               $secondNinja = $_POST['select2'];
               $thirdNinja = $_POST['select3'];

               $teamsqlID = "SELECT teamID FROM teams WHERE userID = '$userID' AND team_name = '$teamName'";
               $teamResult = mysqli_query($connect,$teamsqlID);
               $fetchedteamID = mysqli_fetch_assoc($teamResult);
               $lastteamID = $fetchedteamID['teamID'];


               $insertteamID = "UPDATE ninjas SET teamID = '$lastteamID' WHERE name = '$firstNinja' AND userID = '$userID'";



               if(mysqli_query($connect,$insertteamID)){

                   $insertteamID = "UPDATE ninjas SET teamID = '$lastteamID' WHERE name = '$secondNinja' AND userID = '$userID'";
                    if(mysqli_query($connect,$insertteamID)){
                        $insertteamID = "UPDATE ninjas SET teamID = '$lastteamID' WHERE name = '$thirdNinja' AND userID = '$userID'";
                         if(mysqli_query($connect,$insertteamID)){
                             $insertninja1 = "UPDATE teams SET ninja_name1 = '$firstNinja' WHERE teamID  = '$lastteamID' AND userID = '$userID'";
                             $insertninja2 = "UPDATE teams SET ninja_name2 = '$secondNinja' WHERE teamID = '$lastteamID' AND userID = '$userID'";
                             $insertninja3 = "UPDATE teams SET ninja_name3 = '$thirdNinja' WHERE teamID  = '$lastteamID' AND userID = '$userID'";
                             if(mysqli_query($connect,$insertninja1) && mysqli_query($connect,$insertninja2) && mysqli_query($connect,$insertninja3))

                             header('Location:teams.php');
                         }
                    }

               } else {
                   echo 'query error:' . mysqli_error($connect);
               }




             } else {
                 echo 'query error:' . mysqli_error($connect);
             }


              }
          }






?>



<!DOCTYPE html>
<html>
            <?php include('templates/header.php') ?>

<section class="container">
<form class="deep-purple darken-4" action="create-team.php" method="POST">
      <label>Your Team Name:</label>
      <input type="text" style="color:lightblue;" name="teamName" value="<?php echo htmlspecialchars($teamName) ?>">
      <div class="red-text"><?php echo $errors['teamnameError']; ?></div>
        <div class="custom-select" style="width:200px;">
             <select name="select1">
            <option value="" disabled selected>Select first ninja</option>
            <?php foreach($selectedninjas as $selectedninja){ ?>
            <option value="<?php echo htmlspecialchars($selectedninja['name']);?>"><?php echo htmlspecialchars($selectedninja['name']);?></option>
        <?php } ?>
            </select>
         </div>
         <div class="custom-select" style="width:200px;">
              <select name="select2" >
             <option value="" disabled selected>Select second ninja</option>
             <?php foreach($selectedninjas as $selectedninja){ ?>
             <option value="<?php echo htmlspecialchars($selectedninja['name']);?>"><?php echo htmlspecialchars($selectedninja['name'])?></option>
        <?php } ?>
             </select>
          </div>
          <div class="custom-select" style="width:200px;">
               <select name="select3">
              <option value="" disabled selected>Select third ninja</option>
              <?php foreach($selectedninjas as $selectedninja){ ?>
              <option value="<?php echo htmlspecialchars($selectedninja['name']);?>"><?php echo htmlspecialchars($selectedninja['name'])?></option>
         <?php } ?>
              </select>
           </div>
         <div class="center">
             <input type="submit" name="submit" value="Create" class="btn brand z-depth-0" style="font-family:narutoFont">
         </div>
</form>
</section>

        <?php include('templates/teamselectStyle.php') ?>
        <?php include('templates/footer.php') ?>
</html>
