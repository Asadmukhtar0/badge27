<?php include_once('header.php');  ?>
	<div class="container" style="margin-top:5%;">
		<div class="row">
			<div class="col-lg-4">
				<?php 
					if(!empty($_GET['msg'])){
				?>
					<div class="alert alert-success">
						<?php echo $_GET['msg']; ?>
					</div>
				<?php
					} //lkdasklhdjkk
				?>
				<form action="action/login.php" method="get">
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" />
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" />
					</div>
					<div class="form-group">
						<button class="btn btn-danger" type="submit">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include_once('footer.php'); ?>