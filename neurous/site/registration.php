<?php
	include_once "functions.php";
	include_once "header.php";
	$data = $_POST + $_GET;
	if(isset($data["do_registration"])){
		$errors = array();
		if ($data["login"] == '') {
			$errors[] = "Enter login!";
		}
		if ($data["password"] == '') {
			$errors[] = "Enter password!";
		}
		if ($data["first_name"] == '') {
			$errors[] = "Enter first name!";
		}
		if ($data["last_name"] == '') {
			$errors[] = "Enter last name!";
		}
		if ($data["gender"] == '') {
			$errors[] = "Enter user gender!";
		}
		if ($data["birthday"] == '') {
			$errors[] = "Enter user birthday!";
		}
		if( empty($errors) ){
			if( isset($_SESSION["logged_user"]["admin"]) != 1){
				$query = "INSERT INTO users (login, password, email, first_name, last_name, admin, user_avatar, gender, birthday) VALUES ('".$data['login']."', '".$data['password']."', '".$data['email']."', '".$data['first_name']."', '".$data['last_name']."', '0', 'http://chocolatevent.by/sites/default/files/noavatar.png', '".$data['gender']."', '".$data['birthday']."')";
				connectDB();
				$conn->query($query);
				closeDB();		
				echo "<div class='container text-center'><div class='alert alert-success'>You are registered!</div></div>";
			}
			else {	
				$query = "INSERT INTO users (login, password, email, first_name, last_name, admin, user_avatar) VALUES ('".$data['login']."', '".$data['password']."', '".$data['email']."', '".$data['first_name']."', '".$data['last_name']."', '".$data['admin']."', '".$data['image']."', '".$data['gender']."', '".$data['birthday']."')";
				connectDB();
				$conn->query($query);
				closeDB();		
				echo "<div class='container text-center'><div class='alert alert-success'>You are registered!</div></div>";
			}
		}
		else {
			echo "<div class='container text-center'><div class='alert alert-danger'>".array_shift($errors)."</div></div>";
		}
	}
	if(isset($data["edit_user"])) {
		$errors = array();
		if ($data["login"] == '') {
			$errors[] = "Enter login!";
		}
		if ($data["password"] == '') {
			$errors[] = "Enter password!";
		}
		if ($data["first_name"] == '') {
			$errors[] = "Enter first name!";
		}
		if ($data["last_name"] == '') {
			$errors[] = "Enter last name!";
		}
		if ($data["image"] == '') {
			$errors[] = "Enter user image!";
		}
		if ($data["gender"] == '') {
			$errors[] = "Enter user gender!";
		}
		if ($data["birthday"] == '') {
			$errors[] = "Enter user birthday!";
		}
		if( empty($errors) ){
			$query = "
				UPDATE `users` 
				SET `login` = '".$data["login"]."'
					, `password` = '".$data["password"]."'
					, `email` = '".$data["email"]."'
					, `first_name` = '".$data["first_name"]."'
					, `last_name` = '".$data["last_name"]."'
					, `admin` = '".$data["admin"]."'
					, `user_avatar` = '".$data["image"]."'
					, `gender` = '".$data["gender"]."'
					, `birthday` = '".$data["birthday"]."'
					WHERE `users`.`id_user` = ".$data["id_user"]."
				";
			connectDB();
			$conn->query($query);
			closeDB();		
			echo "<div class='container text-center'><div class='alert alert-success'>User changed!</div></div>";
		}
		else {
			echo "<div class='container text-center'><div class='alert alert-danger'>".array_shift($errors)."</div></div>";
		}
	}
	if(isset($data["id_user"])) {	
		$user = get_users($data["id_user"]);
		echo '
			<div class="container">
				<form action="#" method="post" class="form-horizontal">
					<div class="form-group">
						<label class="col-xs-2" for="login" >Login:</label>
						<input class="form-control" id="login" name="login" type="text" required value="'.$user["login"].'">
					</div>
					<div class="form-group">
						<label class="col-xs-2" for="pwd">Password:</label>
						<input class="form-control" id="pwd" name="password" type="text" required value="'.$user["password"].'">
					</div>
					<div class="form-group">
						<label class="col-xs-2" for="email">Email:</label>
						<input class="form-control" id="email" name="email" required value="'.$user["email"].'">
					</div>
					<div class="form-group">
						<label class="col-xs-2" for="first_name">Full Name:</label>
						<div class="col-xs-2">
							<input class="form-control" id="first_name" name="first_name"  type="text" required value="'.$user["first_name"].'">
						</div>
						<div class="col-xs-2">
							<input class="form-control" id="last_name" name="last_name" type="text" required value="'.$user["last_name"].'">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-2" for="gender">Gender:</label>
						<input class="form-control" id="gender" name="gender" placeholder="Enter your gender" type="gender" required value="'.@$data["gender"].'">
					</div>
					<div class="form-group">
						<label class="col-xs-2" for="birthday">Birthday:</label>
						<input class="form-control" id="birthday" name="birthday" placeholder="Enter your birthday" type="date" required value="'.@$data["birthday"].'">
					</div>	
					
		';
		if( isset($_SESSION["logged_user"])){
			if ( $_SESSION["logged_user"]["admin"] == 1 ){
					echo '
					<div class="form-group">
						<label class="col-xs-2" for="admin">Admin:</label>
						<input class="form-control" id="admin" name="admin"  value="'.$user["admin"].'">
					</div>';					
			}
		}
	
		echo 		'<div class="form-group">
						<label class="col-xs-2" for="image">Image URL:</label>
						<input class="form-control" id="image" name="image" value="'.$user["user_avatar"].'">
					</div>	
					<button type="submit" name="edit_user" class="btn btn-default ">Submit</button> 
				</form>
			</div>			
		';		
	}
	else {
	
			echo '
			<div class="container">
				<form action="#" method="post" class="form-horizontal">
					<div class="form-group">
						<label class="col-xs-2" for="login" >Login:</label>
						<input class="form-control" id="login" name="login" placeholder="Enter login" type="text" required value="'.@$data["login"].'">
					</div>
					<div class="form-group">
						<label class="col-xs-2" for="pwd">Password:</label>
						<input class="form-control" id="pwd" name="password" placeholder="Enter password" type="password" required value="'.@$data["password"].'">
					</div>
					<div class="form-group">
						<label class="col-xs-2" for="email">Email:</label>
						<input class="form-control" id="email" name="email" placeholder="Enter email" type="email" required value="'.@$data["email"].'">
					</div>
					<div class="form-group">
						<label class="col-xs-2" for="first_name">Full Name:</label>
						<div class="col-xs-2">
							<input class="form-control" id="first_name" name="first_name"  placeholder="Enter your first name" type="text" required value="'.@$data["first_name"].'">
						</div>
						<div class="col-xs-2">
							<input class="form-control" id="last_name" name="last_name" placeholder="Enter your  last name" type="text" required value="'.@$data["last_name"].'">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-2" for="gender">Gender:</label>
						<input class="form-control" id="gender" name="gender" placeholder="Enter your gender" type="gender" required value="'.@$data["gender"].'">
					</div>
					<div class="form-group">
						<label class="col-xs-2" for="birthday">Birthday:</label>
						<input class="form-control" id="birthday" name="birthday" placeholder="Enter your birthday" type="date" required value="'.@$data["birthday"].'">
					</div>
		';
		if( isset($_SESSION["logged_user"]["admin"])) {
			echo '
					<div class="form-group">
						<label class="col-xs-2" for="admin">Admin:</label>
						<input class="form-control" id="admin" name="admin" placeholder="1 or 0">
					</div>
					<div class="form-group">
						<label class="col-xs-2" for="image">Image URL:</label>
						<input class="form-control" id="image" name="image" placeholder="http://chocolatevent.by/sites/default/files/noavatar.png">
					</div>	
			';				
		}
		echo '
					<button type="submit" name="do_registration" class="btn btn-default ">Submit</button> 
				</form>
			</div>			
		';			
	}

?>



