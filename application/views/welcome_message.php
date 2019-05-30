<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/style.css">
    <title>Oglasavanje</title>  
  </head>
<body>
<nav id="nav" class="navbar navbar-default navbar-fixed-top">  
    <div class="container">
      <a class="navbar-brand " href="<?php echo base_url();?>"><span class="glyphicon glyphicon-home"></span> Oglasavanje</a>
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url(); ?>categories"><span class="glyphicon glyphicon-list"></span> KATEGORIJE</a></li>
        <li><a href="<?php echo base_url(); ?>contact"><i class="glyphicon glyphicon-phone-alt"></i> KONTAKT</a></li>
      </ul>
      
      <ul style="margin-right: 10px" class="nav navbar-nav navbar-right">
        
    <?php if (!$this->session->userdata('logged_in')): ?>
           
        <li><a href="<?php echo base_url(); ?>users/register"><i class="glyphicon glyphicon-registration-mark"></i> REGISTRACIJA</a></li>
        <li><a href="<?php echo base_url(); ?>users/login"><i class="glyphicon glyphicon-log-in"></i> PRIJAVA</a></li>
         
    <?php else: ?>

        <li><a href="#"><i class="glyphicon glyphicon-envelope"></i> Poruke</a></</li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <?php print_r($this->session->userdata('user_name')) ;?><span class="caret"></span></a>
          <ul id="dropdown" class="dropdown-menu">
            <li><a href="#">Moji oglasi</a></li>
            <li><a href="<?php echo base_url(); ?>article/create">Kreiraj oglas</a></li>
            <li><a href="#">Promjeni password</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Odjava</a></li>
          </ul>
        </li>

    <?php endif; ?>
     
      </ul> 

    </div><div class=""><form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form></div>
</nav>
<div style="position:fixed;width: 1000px;overflow:visible;" class="well ">dad</div>
<div class="container">
  <!-- flash -->
  <?php if($this->session->flashdata('user_registered')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
  <?php endif; ?>
  <?php if($this->session->flashdata('login_failed')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
  <?php endif; ?>
