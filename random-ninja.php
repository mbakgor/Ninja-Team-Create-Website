<?php

     include('config/db_connect.php');
     session_start();

$yourName = '';
$errors = array('yourNameError' =>'');
$fight_styles = array("Taijutsu","Genjutsu","Ninjutsu");
$nature_types = array("Water","Fire","Lightning","Wind");
$specialities = array("Byakugan","Rinnegan","Sharingan");

      if(isset($_POST['submit'])){

          if(empty($_POST['yourName'])){
              $errors['yourNameError'] = 'A name is required! <br />';
          } else {

              $yourName = $_POST['yourName'];
              if(!preg_match('/^[a-zA-Z\s]+$/',$yourName)){
                  $errors['yourNameError'] = 'your name must be letters only';
              }

              if(array_filter($errors)){
                  echo 'errors in the form';
              }else {
                      $yourName = mysqli_real_escape_string($connect,$_POST['yourName']);
                      $specialCheck = mysqli_real_escape_string($connect,((isset($_POST['specialCheck'])) ? 1: 0));
                      $userID = $_SESSION['userID'];
                      shuffle($specialities); shuffle($nature_types); shuffle($fight_styles);

                      $sql = "INSERT INTO ninjas(name,speciality,fight_style,nature_type,specialCheck,userID)
                              VALUES('$yourName','$specialities[0]','$fight_styles[0]','$nature_types[0]','$specialCheck','$userID')";

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



        <section class="container red-text t text-red accent-1">

            <h4 class="center" style="font-family:narutoFont" >Random Ninja</h4>
            <form class="deep-purple darken-4" action="random-ninja.php" method="post">
                <label class="specLabel">Your Ninja Name:</label>
                <input type="text" style="color:lightblue;" name="yourName" value="<?php echo htmlspecialchars($yourName) ?>">
                <div class="red-text"><?php echo $errors['yourNameError']; ?></div>
                <label class="specLabel">Are you special character ?</label>
                <p>
                    <label>
                        <input type="checkbox" name="specialCheck" class="btn brand z-depth-0" checked="checked">
                        <span class="specLabel" >Yes</span>
                    </label>
                </p>




                <div class="center">
                    <input type="submit" name="submit" value="Create" class="btn brand z-depth-0" style="font-family:narutoFont" >
                </div>




            </form>
        </section>


         <?php include('templates/style.php');  ?>
         <?php include('templates/footer.php'); ?>

</html>
