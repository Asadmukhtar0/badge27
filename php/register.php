<?php 
	include_once('header.php');
	if(!empty($_GET['submit'])){
			if(!empty($_GET['fname'])){
				$fname    = $_GET['fname'];
			} else {
				$err_fname = "Full Name is Required";
			}
			if(!empty($_GET['email'])){
				$email    = $_GET['email'];
			} else {
				$err_email = "Email is Required";
			}
			if(!empty($_GET['phone'])){
				$phone    = $_GET['phone'];
			} else {
				$err_phone = "Phone is Required";
			}
			if(!empty($_GET['password'])){
				$password    = $_GET['password'];
			} else {
				$err_password = "Password is Required";
			}
			if(!empty($fname) && !empty($email) && !empty($phone) && !empty($password)){
				// database connection ...
				include_once('action/cn.php');
				$query = "INSERT INTO `users`(`fname`,`email`,`phone`,`password`) VALUES ('$fname','$email','$phone','$password')";
				mysqli_query($cn,$query) or die('Cannt Run Query'.mysqli_error($cn));
				header("Location:index.php?msg='Thank You For SignUp, Please Login Here'");
				
			}
	}	
?>
	<div class="container" style="margin-top:5%;">
		<div class="row">
			<div class="col-lg-4">
				<form action="register.php" method="get">
					<div class="form-group">
						<label>Full Name</label> <br />
						<font color="red">
							<b> <?php if(!empty($err_fname)){ echo $err_fname; } ?> </b>
						</font>
						<input type="text" class="form-control" name="fname" />
					</div>
					<div class="form-group">
						<label>Email</label> <br />
						<?php if(!empty($err_email)){ echo $err_email; } ?>
						<input type="text" class="form-control" name="email" />
					</div>
					<div class="form-group">
						<label>Phone</label> <br />
						<?php if(!empty($err_phone)){ echo $err_phone; } ?>
						<input type="tel" class="form-control" name="phone" />
					</div>
					<div class="form-group">
						<label>Password</label> <br />
						<?php if(!empty($err_password)){ echo $err_password; } ?>
						<input type="password" class="form-control" name="password" />
					</div>
					<div class="form-group">
						<button class="btn btn-danger" value="sub" name="submit" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include_once('footer.php'); ?>