<div class="alert alert-warning">
	<strong>Info!</strong> Registracijom na sajt sticete pravo objavljivanja oglasa!
</div>
<?php echo validation_errors();
 ?>
<?php echo form_open('users/register'); ?> 
<div class="row">
	<div style="background-color: white;" class="col-md-4 col-md-offset-4">
		<h1 class="text-center">Registrujte se</h1>
		<div class="form-group">
			<label>Ime</label>
			<input type="text" class="form-control" name="name" placeholder="Unesite ime" autofocus>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" class="form-control" name="email" placeholder="Unesite email adresu">
		</div>
		<div class="form-group">
			<label>Zipcode</label>
			<input type="text" class="form-control" name="zipcode" placeholder="Unesite ime">
		</div>
		<div class="form-group">
			<label>Lozinka</label>
			<input type="password" class="form-control" name="password" placeholder="Unesite lozinku">
		</div>
		<div class="form-group">
			<label>Ponovite lozinku</label>
			<input type="password" class="form-control" name="cpassword" placeholder="Ponovite lozinku">
		</div>
		<div class="form-group">
			<button class="btn btn-danger btn-block" type="submit" name="submit">Gotovo</button>
		</div>	
	</div>
</div>
<?php echo form_close(); ?>
<div style="margin-top: 30px" class="row ">
	<div class="col-md-4 col-md-offset-4 ">
		<a href="<?= $facebookURL ;?>">
			<button class="btn btn-primary btn-block">SignUp with Facebook <i class='fab fa-facebook'></i></button>
		</a>
	</div>
	<div style="margin-top: 5px" class="col-md-4 col-md-offset-4 ">
		<a href="<?= $googleURL ;?>">
			<button class="btn btn-danger btn-block">Continue with Google <i class='fab fa-google'></i></button>
		</a>
	</div>
</div> 
