<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/style.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <title>Oglasavanje</title>  
  </head>
<body>
<nav  id="nav" class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand " href="<?php echo base_url();?>"><span class="glyphicon glyphicon-home"></span> Oglasavanje</a>       
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url(); ?>contact"><span class="glyphicon glyphicon-phone-alt"></span> KONTAKT</a></li>
      <li><a  href="<?php echo base_url(); ?>categories/view"><span class="glyphicon glyphicon-list"></span> KATEGORIJE</a></li>    
      <form class="navbar-form navbar-left" action="<?php echo base_url('search/result')?>" method="get">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Pretrazi oglase">
        </div>
        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search"></span> Pretraga</button>
      </form>    
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php if (!$this->session->userdata('logged_in')): ?>      
        <li><a href="<?php echo base_url(); ?>users/register"><span class="glyphicon glyphicon-registration-mark"></span> REGISTRACIJA</a></li>
        <li><a href="<?php echo base_url(); ?>users/login"><span class="glyphicon glyphicon-log-in"></span> PRIJAVA</a></li>        
        <?php else: ?>
        <li><a href="<?php echo base_url(); ?>messages"><i class="glyphicon glyphicon-envelope"></i> Poruke</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <?php print_r($this->session->userdata('user_name')) ;?><span class="caret"></span></a>
          <ul id="dropdown" class="dropdown-menu">
            <li><a href="<?php echo base_url() ;?>article/user_articles">Moji oglasi</a></li>
            <li><a href="<?php echo base_url(); ?>article/create">Kreiraj oglas</a></li>
            <li><a href="#" class="disabled" >-----</a></li>
            <li role="separator" class="divider"></li>                   
            <li><a href="<?php echo base_url(); ?>users/logout">Odjava</a></li>         
          </ul>
        </li>
      <?php endif; ?> 
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <!-- flash -->
  <?php if($this->session->flashdata('user_registered')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
  <?php endif; ?>
  <?php if($this->session->flashdata('login_failed')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
  <?php endif; ?>
  <?php if($this->session->flashdata('user_loggedin')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
  <?php endif; ?>
  <?php if($this->session->flashdata('user_logout')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logout').'</p>'; ?>
  <?php endif; ?>
  <?php if($this->session->flashdata('created')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('created').'</p>'; ?>
  <?php endif; ?>
  <?php if($this->session->flashdata('search_result')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('search_result').'</p>'; ?>
  <?php endif; ?>


  



