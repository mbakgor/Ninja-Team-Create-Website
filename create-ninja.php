<?php

    include('config/db_connect.php');
    session_start();

$yourName = $yourStyle = $speciality = $natureType = '';
$errors = array('yourNameError' =>'', 'yourStyleError' =>'','specialityError' =>'', 'natureTypeError' =>'');


    if(isset($_POST['submit'])){

        if(empty($_POST['yourName'])){
             $errors['yourNameError'] = 'A name is required! <br />';
         } else {
             //echo htmlspecialchars($_POST['yourName']);

             $yourName = $_POST['yourName'];
             if(!preg_match('/^[a-zA-Z\s]+$/',$yourName)){
                 $errors['yourNameError'] = 'your name must be letters only';
             }



         }

         if(empty($_POST['yourStyle'])){
              $errors['yourStyleError'] = 'A style is required! <br />';
          } else {
              //echo htmlspecialchars($_POST['yourRole']);

              $yourStyle = $_POST['yourStyle'];
              if(!preg_match('/^[a-zA-Z\s]+$/',$yourStyle)){
                  $errors['yourStyleError'] = 'Your fighting style must be letters only';
              }


          }

          if(empty($_POST['natureType'])){
              $errors['natureTypeError'] = 'Nature type is required! <br />';
          } else{
              $natureType = $_POST['natureType'];
              if(!preg_match('/^[a-zA-Z\s]+$/',$natureType)){
                  $errors['natureTypeError'] = "Your nature type must be letters only";
              }


          }

          if(empty($_POST['speciality'])){
               $errors['specialityError'] = 'Speciality is required! <br />';
           } else {
               //echo htmlspecialchars($_POST['hitlerStatus']);
               $speciality = $_POST['speciality'];
               if(!preg_match('/^[a-zA-Z\s]+$/',$speciality)){
                   $errors['specialityError'] = 'Your speciality style must be letters only';
           }

           if(array_filter($errors)){
               echo 'errors in the form';
           }else {

               $yourName = mysqli_real_escape_string($connect, $_POST['yourName']);
               $speciality = mysqli_real_escape_string($connect, $_POST['speciality']);
               $yourStyle = mysqli_real_escape_string($connect, $_POST['yourStyle']);
               $natureType = mysqli_real_escape_string($connect, $_POST['natureType']);
               $specialCheck = mysqli_real_escape_string($connect,((isset($_POST['specialCheck'])) ? 1: 0));
               $userID = $_SESSION['userID'];

               $sql = "INSERT INTO ninjas(name,speciality,fight_style,nature_type,specialCheck,userID)
                                                VALUES('$yourName','$speciality','$yourStyle','$natureType','$specialCheck','$userID')";

               if(mysqli_query($connect,$sql)){

                     header('Location: index.php');

               } else {
                   echo 'query error:' . mysqli_error($connect);
               }

           }

        }
}


?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>


     <section class="container red-text text-red accent-1">

            <h4 class="center" style="font-family:narutoFont" >Create Ninja</h4>
            <form class="deep-purple darken-4" action="create-ninja.php" method="POST">
                <label class="specLabel">Your Ninja Name:</label>
                <input type="text" style="color:lightblue;" name="yourName" value="<?php echo htmlspecialchars($yourName) ?>">
                <div class="red-text"><?php echo $errors['yourNameError']; ?></div>
                <label class="specLabel">Your Fighting Style:</label>
                <input type ="text" style="color:lightblue;" name="yourStyle" value="<?php echo htmlspecialchars($yourStyle) ?>">
                <div class="red-text"><?php echo $errors['yourStyleError']; ?></div>
                <label class="specLabel">Your Nature Type:</label>
                <input type="text" style="color:lightblue;" name="natureType" value="<?php echo htmlspecialchars($natureType) ?>">
                <div class="red-text"><?php echo $errors['natureTypeError']; ?></div>
                <label class="specLabel">Your Speciality:</label>
                <input type="text" style="color:lightblue;" name="speciality" value="<?php echo htmlspecialchars($speciality) ?>">
                <div class="red-text"><?php echo $errors['specialityError']; ?></div>
                <label class="specLabel">Are you special character ?</label>
                <p>
                    <label>
                        <input type="checkbox" name="specialCheck" checked="checked" value="<?php echo ($specialCheck) ?>">
                        <span>Yes</span>
                    </label>
                </p>

                <div class="center">
                    <input type="submit" name="submit" value="Create" class="btn brand z-depth-0" style="font-family:narutoFont">
                </div>
            </form>

     </section>


	<?php include('templates/footer.php'); ?>

</html>
