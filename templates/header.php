
<?php include('templates/fonts/fonts.css'); ?>

<?php if(!isset($_SESSION)){
    session_start();
} ?>

<head>
	<title >Random Ninja Generator</title>

	<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style type="text/css">
	  .brand{
	  	background: #1C1919 !important;
	  }
  	.brand-text{
  		color: #e65100 !important;
  	}
	.specLabel
	{
	    font-family:narutoFont;
	    font-size:30px;
	}

    form{
        max-width: 460px;
        margin: 20px auto;
        padding: 20px;
    }


  </style>
</head>


<body class="deep-purple darken-4">

	<nav class="light-blue darken-4">
    <div class="container">
      <a href="index.php" class="brand-logo brand-text" style="font-family:narutoFont">Random Ninja Generator</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">


        <?php if(isset($_SESSION['userLogin'])): ?>
        <li><a href="create-ninja.php" class="btn brand z-depth-0" style="font-family:narutoFont">Create Ninja</a></li>
		<li><a href="random-ninja.php" class="btn brand z-depth-0" style="font-family:narutoFont">Random Ninja</a></li>
        <li><a href="create-team.php" class="btn brand z-depth-0" style="font-family:narutoFont">Create Team</a></li>
		<li><a href="profile.php" class="btn brand z-depth-0" style="font-family:narutoFont">Profile</a></li>
        <li><a href="logout.php" class="btn brand z-depth-0"  style="font-family:narutoFont">Logout</a></li>
        <?php else: ?>
		<li><a href="sign-up.php" class="btn brand z-depth-0" style="font-family:narutoFont">Sign Up</a></li>
        <li><a href="sign-in.php" class="btn brand z-depth-0" style="font-family:narutoFont">Sign In</a></li>
        <?php endif; ?>

      </ul>
    </div>
  </nav>
</body>
