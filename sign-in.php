<?php

           include('config/db_connect.php');
           session_start();

$userName = $password = '';
$errors = array('usernameError' =>'', 'passwordError' =>'', 'loginError' =>'');



              if(isset($_POST['submit'])){

                  if(empty($_POST['nickName'])){
                      $errors['nicknameError'] ='A nickname is required! <br />';
                  }

                  if(empty($_POST['password'])){
                      $errors['passwordError'] = 'A password is required! <br />';
                  } else {


                      $userName = mysqli_real_escape_string($connect,$_POST['userName']);
                      $password = mysqli_real_escape_string($connect,$_POST['password']);

                      $sql    = "SELECT * FROM users WHERE nickname = '$userName' AND password ='$password' limit 1";
                      $result =  mysqli_query($connect,$sql);

                      if(mysqli_num_rows($result) == 1) {

                          $_SESSION['userLogin']= $userName;
                          $usersql = "SELECT userID FROM users WHERE nickname = '$userName'";
                          $userresult = mysqli_query($connect,$usersql);
                          $row = $userresult -> fetch_assoc();
                          $_SESSION['userID'] =  $row["userID"];


                      }else {
                         $errors['loginError'] = "Invalid Login!";
                      }

                     if(isset($_SESSION['userLogin']))
                     {
                         header('Location: profile.php');
                     }

                  }





    }
?>


<!DOCTYPE html>
<html>

     <?php include('templates/header.php'); ?>
     <?php include('templates/signupStyle.php'); ?>

            <section class="signForm red-text text-red accent-1 center">

                  <h4 class="center" style="font-family:narutoFont">Sign In</h4>
                  <form class="deep-purple darken-4" action="sign-in.php" method="POST">
                      <label class="specLabel">Enter Your Username:</label>
                      <input type="text" style="color:lightblue;" name="userName" value="<?php echo htmlspecialchars($userName) ?>">
                      <div class="red-text"><?php echo $errors['usernameError']; ?></div>
                      <label class="specLabel">Enter Your Password</label>
                      <input type="password" style="color:lightblue;" name="password" value="<?php echo htmlspecialchars($password) ?>">
                      <div class="red-text"><?php echo $errors['passwordError']; ?></div>
                  <div class="center">
                          <input type="submit" name="submit" value="Sign In" class="btn brand z-depth-0" style="font-family:narutoFont" >
                      </div>
                  <div class="red-text"><?php echo $errors['loginError']; ?></div>
                  </form>

            </section>



     <?php include('templates/footer.php'); ?>

</html>
