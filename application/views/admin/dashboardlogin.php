<!doctype html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>

    <!-- British College Icon -->
    <link rel="icon" type="image/gif/png" href="<?php echo base_url('assets/img/icon/logo.png'); ?>">

    <!-- Bootstrap core CSS -->
    <link href= "<?php echo base_url('assets/bootstrap3/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/dashboardstyle.css'); ?>" rel="stylesheet">

   
    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

</head>


<body>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4" style="margin-top: 110px">

            <div class="panel panel-danger">
                <div class="panel-heading"><strong>Dashboard Login</strong></div>

                <div class="panel-body">


                    <?php 
                      $attributes = array('id' => 'adminlogin', 'method' => 'post', 'name' => 'adminlogin');
                      echo form_open('admin/dashboardlogin', $attributes);
                    ?>

                      <?php if (isset($_SESSION['captcha_invalid'])): ?>
                        <div class="alert alert-danger" style="text-align: center; font-size: 12px">
                          <i class="fa fa-times-circle"></i>
                          <?= $_SESSION['captcha_invalid'] ?>
                          <?php unset($_SESSION['captcha_invalid']) ?>
                        </div>
                      <?php endif; ?>
                      
                      <?php if (isset($_SESSION['login_fail'])): ?>
                        <div class="alert alert-danger" style="text-align: center; font-size: 12px">
                          <i class="fa fa-times-circle"></i>
                          <?= $_SESSION['login_fail'] ?>
                          <?php unset($_SESSION['login_fail']) ?>
                        </div>
                      <?php endif; ?>

                      <!--   <div class="control-group">
                          <div class="form-group ">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Enter Username" name="username" id="username">  
                          </div>
                        </div>   

                        <div class="control-group">
                          <div class="form-group ">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">  
                          </div>
                        </div>     -->


                        <div class="form-group">
                            <label>Username</label>
                            <div class="input-group">
                                <span class="input-group-addon" style="background-color: #F2DEDE"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
                            </div>
                            <h6 style="color: red; font-weight: bold; margin-top: 5px"><?php echo form_error('username'); ?></h6>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <span class="input-group-addon" style="background-color: #F2DEDE"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                            </div>
                            <h6 style="color: red; font-weight: bold; margin-top: 5px"><?php echo form_error('password'); ?></h6>
                        </div>
            
                       <!--  <div class="control-group" >
                          <div class="form-group ">
                            <label>Captcha</label>
                            <img src="captcha.php" class="form-control" style="height: 80px; ">
                          </div>
                        </div> -->

                        <!-- <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="captcha" placeholder="Enter Captcha Code Here">
                            </div>
                        </div> -->

                       <!--  <div class="control-group">
                          <div class="form-group ">
                            <input type="text" class="form-control" name="captcha" placeholder="Enter Captcha Code Here">  
                          </div>
                        </div>  -->

                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-danger " name="loginBtn" value="Login" id="loginBtn">
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

        <div class="col-md-4"></div>
    </div>
</div>

</body>
</html>


 <!-- Bootstrap core JavaScript -->

<script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.js'); ?>"></script>
