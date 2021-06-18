<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
	<!-- <link href="assets/css/main_2.css" rel="stylesheet"> -->
</head>

<body>
<section>
		<div class="container">     
		  <div class="row  mt-5">
			<div class="col-lg-6 m-auto">
			  <div class="card bg-dark mt-5">
			  <div class="section-header mt-3" > 
			<h3>Login Form</h3>
			<!-- <p>Contact us txt</p> -->
		  </div>
			  <?php
			  if(@$_GET['Empty']==true)
			  {
				?>
				  <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?>
				  </div>
				<?php
			  }
			  ?>
			  <?php
			  if(@$_GET['Invalid']==true)
			  {
				?>
				  <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?>
				  </div>
				<?php
			  }
			  ?>
			  <div class="card-body">
				<form action="./assets/process/process.php" method="POST">
				  <input type="text" name="UName" placeholder="User Name" class="form-control mb-3">
				  <input type="password" name="Password" placeholder="Password" class="form-control mb-3">
				  <div class="align-centre">
					<button class="btn btn-primary btn-xl text-uppercase" name="Login">Login</button>
				  </div>
				</form>
			  </div>
			  </div>          
			</div>
		  </div>
	  </div>
  </section>
</body>

</html>