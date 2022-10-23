<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'init.php';

$inputs = ['email', 'password'];
$success = [];
$errors = false;

if(isset($_POST['login'])){
	foreach($inputs as $key=>$input){
		if(isset($_POST[$input])  &&  !empty(trim($_POST[$input]))){
			$success[$input] = trim($_POST[$input]);
		}else{
		$errors[$input]	 = $input;
		}
	}

	//---------------------------

	if(!$errors){
	 $login =	login($success);
	 if($login == 'user not found'){
		$errors['userNotFound'] = 'userNotFound';
	 } elseif($login == 'password error'){
		$errors['passwordError'] = 'passwordError';
	 }
	}

}

//var_dump($success);

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">

					<?php  if($errors)  :?>
						<div class="alert alert-danger">
							<?php  foreach($errors as $key=> $error) :?>
								<p><?=  getmessage($error)  ?></p>
								<?php endforeach ;?>
						</div>
					<?php endif ; ?>

					</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Sign In</h3>
						<form action="" method="POST" class="login-form">
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" placeholder="Email" name="email">
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" placeholder="Password" name="password">
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3" name="login">Login</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

