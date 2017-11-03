<html>
<head>
	<title>Online Programming</title>
	<meta name="keywords" content="Online,Compiler,Online Compiler" />
	<link rel="shortcut icon" href="styles/favicon.ico" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/style.css" />

</head>

<body>
	<script type="text/javascript">
	function checkPass() {
		//Store the password field objects into variables ...
		var pass1 = document.getElementById('pass1');
		var pass2 = document.getElementById('pass2');
		//Store the Confimation Message Object ...
		var message = document.getElementById('mess');
		//Set the colors we will be using ...
		var goodColor = "#66cc66";
		var badColor = "#ff6666";
		//Compare the values in the password field
		//and the confirmation field
		if(pass1.value == pass2.value){
			//The passwords match.
			//Set the color to the good color and inform
			//the user that they have entered the correct password
			pass2.style.backgroundColor = goodColor;
			message.style.color = goodColor;
			message.innerHTML = "Passwords Match!"
		}else{
			//The passwords do not match.
			//Set the color to the bad color and
			//notify the user.
			pass2.style.backgroundColor = badColor;
			message.style.color = badColor;
			message.innerHTML = "Passwords Do Not Match!"
		}
	}

	</script>
	<div class="container-fluid" id="whole">
		<div id="header">
			<center>
				<h1>
					Online Programming
				</h1>
			</center>

		</div>

		<div id="content">
			<?php
			//session_start();

			if(isset($_SESSION['username']))
			{
				$folder=$_SESSION['username'];
				header("Location: ./$folder/code");
			}
			?>
			<div class="row">
				<div class="col-md-8 col-lg-9" style="float:left;padding-bottom:150px;">
					<img src="styles/homepageGraphics.jpg" width="70%" height="50%" alt="coder image" />
				</div>
				<!--Starting of Login modal-->
				<div id="Loginmodal" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Login</h4>
							</div>
							<div class="modal-body">
								<form action="checklogin.php" method="post">
									<div class="form-group">
										<label for="email">Email address:</label>
										<input class="form-control" id="email" type="text" name="username" placeholder="Email" />
									</div>
									<div class="form-group">
										<label for="pwd">Password:</label>
										<input class="form-control" type="password" name="password" placeholder="Password" id="pwd" />
									</div>

									<input type="submit" name="submit" value="Login" class="btn btn-success pull-right"></br>
									<?php if(isset($_GET['login_attempt']) and ($_GET['login_attempt']==1)) {?>
										<font color="red" class="error">Bad Login or Password. Please try again. <br/></font>
									<?php }?>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>
				<!-- End of Login modal-->

				<!--Starting of SignUp modal-->
				<div id="Signupmodal" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">SignUp :</h4>
							</div>
							<div class="modal-body">
								<form method="post" action="signup.php">
									<div class="row">
										<div class="col-xs-12 col-sm-6">
											<div class="form-group">
												<label for="fname">First Name :</label>
												<input type="text" id="fname" name="first_name" placeholder="First Name" class="form-control">
											</div>
										</div>
										<div class="col-xs-12 col-sm-6">

											<div class="form-group">
												<label for="lname">Last Name :</label>
												<input type="text" id="lname" name="last_name" placeholder="Last Name" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="email">Email :</label>
										<input type="email" id="email" name="email" placeholder="Email" class="form-control">
									</div>
									<div class="form-group">
										<label for="pass1">Password :</label>
										<input type="password" name="password" placeholder="Password" id="pass1" class="form-control">
									</div>
									<div class="form-group">
										<label for="pass2">Confirm Password :</label>
										<input type="password" name="cpassword" placeholder="Confirm Password" id="pass2" onkeyup="checkPass(); return false;" class="form-control">
									</div>

									<div class="form-group">
										<input type="submit" name="submit" value="Create An Account" class="btn btn-success pull-right" id="sub" onclick="clicked()">
									</div>
									<br>
								</div>
								<div class="modal-footer">
									<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
								</form>
							</div>
						</div>

					</div>
				</div>
				<!-- End of SignUp modal-->

				<div class="col-md-1" id="login_portal">
					<div style="padding-bottom:15px" class="row">
						<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#Loginmodal">Login</button><br>
					</div>
					<div class="row">
						<button type="button" class="btn btn-basic btn-lg" data-toggle="modal" data-target="#Signupmodal">Signup</button><br>
					</div>
				</div>
			</div>
			<div style="right:3px">
				<?php
				//include 'counter.php'; ?>
			</div>

			<div id="bottom">
				
			<div class="row">
				<p class="col-md-4 descri">
					</div>
				</div>
			</div>
		</div>
		<script>
		var loginpop = document.getElementById('container');
		if(window.location.href.indexOf("login_attempt=1") > -1) {
			loginpop.style.display = 'block';
		}
		</script>
	</body>
	</html>
