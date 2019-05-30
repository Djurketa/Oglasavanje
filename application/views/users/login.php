<div class="alert alert-warning">
	<strong>Info!</strong> Ukoliko nemate profil mozete se registrovati <a href="register">ovdje</a>!
</div>
<?php echo form_open('users/login'); ?>
<div class="row">
	<div style="background-color: white;" class="col-md-4 col-md-offset-4">
		<h1 class="text-center">Prijavite se</h1>
		<div class="form-group">
			<input type="text" name="email" class="form-control" placeholder="Unesite email"  autofocus>
		</div>
		<div class="form-group">
			<input type="password" name="password" class="form-control"  autofocus placeholder="Unesite lozinku">
		</div>
		<div class="form-group">
		<button type="submit" name="submit" class="btn btn-danger btn-block">Prijavite se</button>
		</div>
		<div class="form-group">
		<button type="submit" name="submit" class="btn btn-danger btn-block">Prijavite se</button>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
<div style="margin-top: 30px" class="row ">
	<div class="col-md-4 col-md-offset-4 ">
		<a href="<?= $facebookURL ;?>">
			<button class="btn btn-primary btn-block">Continue with Facebook <i class='fab fa-facebook'></i></button>
		</a>
	</div>
	<div style="margin-top: 5px" class="col-md-4 col-md-offset-4 ">
		<a href="<?= $googleURL ;?>">
			<button class="btn btn-danger btn-block">Continue with Google <i class='fab fa-google'></i></button>
		</a>
	</div>
</div>
<?php echo validation_errors(); ?>