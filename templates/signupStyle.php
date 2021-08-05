<?php include('templates/fonts/fonts.css'); ?>

<div class="slideshow-container">


  <div class="mySlides fade">
    <div class="numbertext">1 / 4</div>
    <img src="templates/media/nin2.jpg" width="800" height="600" >
    <div class="text">Create Ninjas!</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 4</div>
    <img src="templates/media/nin1.jpg" width="800" height="600" >
    <div class="text">Make Teams!</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 4</div>
    <img src="templates/media/nin3.jpg" width="800" height="600" >
    <div class="text">Store Ninjas!</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">4 / 4</div>
    <img src="templates/media/nin4.jpg" width="800" height="600" >
    <div class="text">Make Random Ones!</div>
  </div>



</div>
<br>




<style>

* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 700px;
  position: absolute;
  margin: 40px;
}

/* Hide the images by default */
.mySlides {
  display: none;
}



/* Caption text */
.text {
  font-family: narutoFont;
  color: #e65100;
  font-size: 35px;
  padding: 8px 12px;
  position: absolute;
  bottom: -55px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  font-family: narutoFont;
  color: #e65100;
  font-size: 25px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}



/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

.signForm
{
position: absolute;
width:1000px;
margin-top: 30px;
margin-bottom: 100px;
margin-right: 700px;
margin-left: 680px;
padding:5px;
}

.specLabel
{
    font-family:narutoFont;
    font-size:30px;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

</style>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 8000);
}
</script>
