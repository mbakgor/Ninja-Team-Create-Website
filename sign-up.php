<?php

           include('config/db_connect.php');

$nickName = $password = $repassword = '';
$errors = array('nicknameError' =>'', 'passwordError' =>'','repasswordError' =>'');


              if(isset($_POST['submit'])){

                  if(empty($_POST['nickName'])){
                      $errors['nicknameError'] ='A nickname is required! <br />';
                  } else {

                      $nickName = $_POST['nickName'];
                      if(!preg_match('/^[a-zA-Z0-9\s]+$/',$nickName)){
                          $errors['yourNameError'] = 'your nick name must be letters only';
                      }


                  }

                  if(empty($_POST['password'])){
                      $errors['passwordError'] = 'A password is required! <br />';
                  } else {
                      $password = $_POST['password'];

                      if(!preg_match('/^[a-zA-Z0-9\s]+$/',$password)){
                         $errors['passwordError'] = 'Your password must be letters and numbers only';
                          }
                  }

                  if(empty($_POST['repassword'])){
                      $errors['repasswordError'] = 'A password is required! <br />';
                  } else {
                      $repassword = $_POST['repassword'];

                      if($repassword != $password ){
                         $errors['repasswordError'] = 'Your password not match!';
                          }
                      if(array_filter($errors)){
                          echo 'errors in the form';
                      }else{

                            $nickName = mysqli_real_escape_string($connect,$_POST['nickName']);
                            $password = mysqli_real_escape_string($connect,$_POST['password']);

                            $sql = "INSERT INTO users(nickname,password)
                                    VALUES('$nickName','$password')";

                            if(mysqli_query($connect,$sql)){

                                header('Location: sign-in.php');

                            }else{
                                echo 'query error' . mysqli_error($connect);
                            }

                      }
                  }

    }
?>


<!DOCTYPE html>
<html>

     <?php include('templates/header.php'); ?>
     <?php include('templates/signupStyle.php'); ?>

            <section class="signForm red-text text-red accent-1 center">

                  <h4 class="center" style="font-family:narutoFont">Sign Up</h4>
                  <form class="deep-purple darken-4" action="sign-up.php" method="POST">
                      <label class="specLabel">Enter Your Nickname:</label>
                      <input type="text" style="color:lightblue;" name="nickName" value="<?php echo htmlspecialchars($nickName) ?>">
                      <div class="red-text"><?php echo $errors['nicknameError']; ?></div>
                      <label class="specLabel">Enter Your Password</label>
                      <input type="password" style="color:lightblue;" name="password" value="<?php echo htmlspecialchars($password) ?>">
                      <div class="red-text"><?php echo $errors['passwordError']; ?></div>
                      <label class="specLabel">Enter Your Password Again:</label>
                      <input type="password" style="color:lightblue;" name="repassword" value="<?php echo htmlspecialchars($repassword) ?>">
                      <div class="red-text"><?php echo $errors['repasswordError']; ?></div>
                  <div class="center">
                          <input type="submit" name="submit" value="Sign Up" class="btn brand z-depth-0" style="font-family:narutoFont" >
                      </div>

                  <div class="container signin">
                    <p>Already have an account? <a href="sign-in.php">Sign in</a>.</p>
                  </div>

                  </form>

            </section>



     <?php include('templates/footer.php'); ?>

</html>
