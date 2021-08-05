<?php

     include('config/db_connect.php');

	 $sql = 'SELECT * FROM ninjas ORDER BY created_at';

	 $result = mysqli_query($connect, $sql);

	 $ninjas = mysqli_fetch_all($result,MYSQLI_ASSOC);

	 mysqli_free_result($result);

	 mysqli_close($connect);





?>

<script>

function openTab(tabName) {
  var i;
  var x = document.getElementsByClassName("card-content");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(tabName).style.display = "block";
}

</script>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>

    <h3 class="center" style="font-family:narutoFont; color:#e65100" >What Can You Do?</h3>
<div class="container center">
    <div class="row">
   <div class="col s12 m10">
     <div class="card blue-grey darken-1 center">
       <div id="t1" class="card-content" style="font-family:narutoFont">
         <span class="card-title" style="color:#80deea">Create Ninjas</span>
         <div class="card-image">
         <p style="color:#00bfa5">You can create ninjas whatever you like!</p>
         <img src="templates/media/tab1.jpg" style="width:1000px;height:505px;">
         </div>
       </div>
       <div id="t2" class="card-content" style="display:none; font-family:narutoFont">
         <span class="card-title" style="color:#80deea">Create Teams</span>
         <div class="card-image">
         <p style="color:#00bfa5">You can edit your teams whatever you like!</p>
         <img src="templates/media/tab2.png" style="width:1000px;height:505px;">
         </div>
       </div>
       <div id="t3" class="card-content" style="display:none; font-family:narutoFont">
         <span class="card-title" style="color:#80deea">Randomize It</span>
         <div class="card-image">
         <p style="color:#00bfa5">If you want you can do it all random!</p>
         <img src="templates/media/tab3.jpg" style="width:1000px;height:505px;">
         </div>
       </div>
       <div id="t4" class="card-content" style="display:none; font-family:narutoFont">
         <span class="card-title" style="color:#80deea">Your Profile</span>
         <div class="card-image">
         <p style="color:#00bfa5">You can find all ninjas and teams in your profile!</p>
         <img src="templates/media/tab4.png" style="width:1000px;height:505px;">
       </div>
       </div>
       <div id="t5" class="card-content" style="display:none; font-family:narutoFont">
         <span class="card-title" style="color:#80deea">Future Contents</span>
         <div class="card-image">
         <p style="color:#00bfa5">And future contents are coming soon!</p>
         <img src="templates/media/tab5.jpg" style="width:1000px;height:505px;">
       </div>
       </div>


       <div class="card-action">
         <a class="waves-effect waves-light btn" style="font-family:narutoFont" onclick="openTab('t1')"><i class="material-icons left">looks_one</i>Create Ninjas</a>
         <a class="waves-effect waves-light btn" style="font-family:narutoFont" onclick="openTab('t2')"><i class="material-icons left">looks_two</i>Create Teams</a>
         <a class="waves-effect waves-light btn" style="font-family:narutoFont" onclick="openTab('t3')"><i class="material-icons left">looks_3</i>Randomize It</a>
         <a class="waves-effect waves-light btn" style="font-family:narutoFont" onclick="openTab('t4')"><i class="material-icons left">looks_4</i>Look Your Profile</a>
         <a class="waves-effect waves-light btn" style="font-family:narutoFont" onclick="openTab('t5')"><i class="material-icons left">looks_5</i>Future Contents</a>
       </div>
     </div>
   </div>
 </div>
</div>

	<?php include('templates/footer.php'); ?>

</html>
