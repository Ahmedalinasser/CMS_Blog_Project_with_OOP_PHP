
<?php /*require_once("includes/header.php")*/ ?>

<?php /*

if ($session->is_loged_in()) {
	redirect("index.php");
}

if (isset($_POST["submit"])) {
	 $username = trim($_POST["username"]);
	 $password = trim($_POST["password"]);


	 $user_found = User::verfiy_user($username, $password);



	if ($user_found) {
		$session->login($user_found);
		redirect("index.php");
	}else{
		$the_message = "your Pass OR username is incorrect";
	}

}else{
	$username 	 = "";
	$password  	 = "";
	$the_message = "";
}

*/
 ?>

<?php require_once("includes/header.php") ?>
<?php 
if ($session->is_logedIn()) {redirect("index.php");}

if (isset($_POST["submit"])) {
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);

	$the_user = User::conferm_user_info($username , $password);

	if ($the_user) {
		$session->login($the_user);
		redirect("index.php");
	}else{
		$message = "The username or the password is incorrect please check it again";
	}

}else {
	$username ="";
	$password ="";
	$message  ="";
}



 ?>


<div class="col-md-4 col-md-offset-3">

<h4 class="bg-danger"><?php //echo $the_message ?></h4>
<h4 class="bg-danger"><?php echo $message ?></h4>
	
<form id="login-id" action="" method="post">
	
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username" value="<?php echo htmlentities($username) ?>" >

</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password" value="<?php echo htmlentities($password) ?>">
	
</div>


<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">

</div>


</form>


</div>