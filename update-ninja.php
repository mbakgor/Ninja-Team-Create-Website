<?php

   include('config/db_connect.php');
   session_start();

$errors = array('newnameError' => '','newfightError' => '','newnatureError' => '');
$newName = $newFight = $newNature = '';

      $userID = $_SESSION['userID'];

      if(isset($_GET['id'])){
          $id = mysqli_real_escape_string($connect,$_GET['id']);
          $_SESSION['id_to_update'] = $id;
      }

     if(isset($_POST['submit'])){


         if(empty($_POST['newName'])){
             $errors['newnameError'] = 'A new name is required <br />';
         } else {
             $newName = $_POST['newName'];
             if(!preg_match('/^[a-zA-Z\s]+$/',$newName)){
                 $errors['newnameError'] = 'your name must be letters only';
         }
     }

     if(empty($_POST['newFight'])){
         $errors['newnfightError'] = 'A new fight style is required <br />';
     } else {
         $newFight = $_POST['newFight'];
         if(!preg_match('/^[a-zA-Z\s]+$/',$newFight)){
             $errors['newnfightError'] = 'your fight style must be letters only';
     }
 }

 if(empty($_POST['newNature'])){
     $errors['newnatureError'] = 'A new nature type is required <br />';
 } else {
     $newNature = $_POST['newNature'];
     if(!preg_match('/^[a-zA-Z\s]+$/',$newNature)){
         $errors['newnatureError'] = 'your nature type must be letters only';
 }

   if(array_filter($errors)){
       echo 'errors in the form';
   }else  {

       $newName = mysqli_real_escape_string($connect,$_POST['newName']);
       $newFight = mysqli_real_escape_string($connect,$_POST['newFight']);
       $newNature = mysqli_real_escape_string($connect,$_POST['newNature']);
       $id_to_update = $_SESSION['id_to_update'];

       $updateNinja = "UPDATE ninjas SET name = '$newName', fight_style = '$newFight', nature_type = '$newNature' WHERE id = '$id_to_update'";

       if(mysqli_query($connect,$updateNinja))

           header('Location:profile.php');

   }
}


}







?>

<!DOCTYPE html>
<html>
            <?php include('templates/header.php') ?>

<section class="container">
<form class="deep-purple darken-4" action="update-ninja.php" method="POST">
         <label class="specLabel">Enter new name:</label>
         <input type="text" style="color:lightblue;" name="newName" value="<?php echo htmlspecialchars($newName) ?>">
         <div class="red-text"><?php echo $errors['newnameError']; ?></div>
         <label class="specLabel">Enter new fight style:</label>
         <input type="text" style="color:lightblue;" name="newFight" value="<?php echo htmlspecialchars($newFight) ?>">
         <div class="red-text"><?php echo $errors['newfightError']; ?></div>
         <label class="specLabel">Enter new nature type:</label>
         <input type="text" style="color:lightblue;" name="newNature" value="<?php echo htmlspecialchars($newNature) ?>">
         <div class="red-text"><?php echo $errors['newnatureError']; ?></div>

         <div class="center">
             <input type="submit" name="submit" value="Update" class="btn brand z-depth-0" style="font-family:narutoFont">
         </div>
</form>
</section>

        <?php include('templates/teamselectStyle.php') ?>
        <?php include('templates/footer.php') ?>
</html>
