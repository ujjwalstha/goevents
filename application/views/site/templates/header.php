<?php //session_start(); ?>
<?php 
  // $time = microtime();
  // $time = explode(' ', $time);
  // $time = $time[1] + $time[0];
  // $start = $time;
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- British College Icon -->
    <link rel="icon" type="image/gif/png" href="<?php echo base_url('assets/img/icon/logo.png'); ?>">

    <!-- Bootstrap core CSS -->
    <link href= "<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?php  echo base_url('assets/css/clean-blog.min.css'); ?>" rel="stylesheet"> 

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url('site/home'); ?>">GoEvents.com</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="#navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

         <?php if ( (($this->session->userdata('email') == null) && ($this->session->userdata('userid') == null)) && (($this->session->userdata('adminid') == null) && ($this->session->userdata('adminname') == null)) )  : ?> 

          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('site/home'); ?>" data-ajax="false">Home</a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('site/contact'); ?>">Contact</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('site/gettingstarted'); ?>">Getting Started</a>
            </li> 
          
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('site/account'); ?>">Account</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="<?php //echo base_url('site/login'); ?>">Login</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php //echo base_url('site/signup'); ?>">Signup</a>
            </li> -->
          </ul>

        <?php elseif ( ($this->session->userdata('email') != null) && ($this->session->userdata('userid') != null) ) : ?>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('site/home'); ?>" data-ajax="false">Home</a>
            </li>
                 
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('site/contact'); ?>">Contact</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('site/gettingstarted'); ?>">Getting Started</a>
            </li> 
          
            <li class="nav-item dropdown">
              <a class="nav-link " href="#"><i class="glyphicon glyphicon-user"></i><?php echo $this->session->userdata('welcome').' ';?>&nabla;</a>

              <ul class="navbar-nav dropdown-content" style="color: black">
                <li class="nav-item"><a href="<?php echo base_url('site/profile'); ?>" class="sub-account"> Profile </a></li>
                <li class="nav-item"><a href="<?php echo base_url('site/eventjoined'); ?>" class="sub-account"> Events Joined </a></li>
                <li class="nav-item"><a href="<?php echo base_url('site/logout'); ?>" class="sub-account"> Logout </a></li>
              </ul>
            </li>
          </ul>
      <!--   <?php //endif;?> -->


        <?php elseif ( ($this->session->userdata('adminid') != null) && ($this->session->userdata('adminname') != null) ) : ?>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('site/home'); ?>" data-ajax="false">Home</a>
            </li>
                 
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('site/contact'); ?>">Contact</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('site/gettingstarted'); ?>">Getting Started</a>
            </li> 

            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('admin/adminpanel'); ?>">Return to Dashboard</a>
            </li> 
          
           
          </ul>
        <?php endif;?>
           
        
        </div>
      </div>
    </nav>

  </head>
<body>


