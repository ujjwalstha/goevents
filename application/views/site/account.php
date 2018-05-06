

 <!-- Page Header -->
 <header class="masthead" id="masthead2">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Login / Sign Up</h1>
            <span class="subheading">Already have an account? <a href="#account" class="acc_link">Login</a></span>
            <span class="subheading">Not Registered yet? <a href="#account" class="acc_link">Sign Up</a></span>
          </div>
        </div>
      </div>
    </div>
  </header>


  <!-- Main Content -->
<div class="container" id="account" style="margin-bottom: 70px;">
  <div class="row">
     <div class="col-md-4">
        <div class="page-heading">
          <h2>Login</h2>

          

          	<?php 
          		$attributes = array('id' => 'login-form', 'method' => 'post', 'name' => 'login-form');
          		echo form_open('site/login', $attributes);
          	?>
          
             <?php if ($this->session->flashdata('loginfirst')): ?>
              <div class="alert alert-danger" style="text-align: center; font-size: 15px">
                <i class="fa fa-exclamation-circle"></i>
                <?php echo $this->session->flashdata('loginfirst'); ?>
              </div>
            <?php endif; ?>

           

            <?php if ($this->session->flashdata('login_error')): ?>
              <div class="alert alert-danger" style="text-align: center; font-size: 15px">
                <i class="fa fa-times-circle"></i>
                <?php echo $this->session->flashdata('login_error'); ?>
              </div>
            <?php endif; ?>
            
            <?php if ($this->session->flashdata('status_error')): ?>
              <div class="alert alert-danger" style="text-align: center; font-size: 15px">
                <i class="fa fa-times-circle"></i>
                <?php echo $this->session->flashdata('status_error'); ?>
              </div>
            <?php endif; ?>

            <div class="control-group">
              <div class="form-group ">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" name= "uemail" id="uemail"  >  
                <text style="color: red; font-size: 15px"><?php echo form_error('uemail'); ?></text>   
              </div>
            </div>

            <div class="control-group">
              <div class="form-group col-xs-12 ">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="upassword" id="upassword">
                <text style="color: red; font-size: 15px"><?php echo form_error('upassword'); ?></text>   
              </div>
            </div>

           <!--  <div class="control-group">
              <div class="form-group col-xs-12 ">
                <label>Captcha</label>
                <p><?php //echo $captcha; ?></p>
              </div>
            </div> -->

            <!--  <div class="control-group">
              <div class="form-group col-xs-12 ">
                <input type="text" class="form-control" placeholder="Enter captcha code here" name="captcha" id="captcha">
              </div>
            </div> -->

            <br>
          
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="loginBtn" name="login">Login <i class="fa fa-sign-in"></i></button>
            </div>
          <?php echo form_close(); ?>
         
        </div>
      </div>

      <div class="col-md-1" style="border-right: 1px gray solid" ></div> 
      <div class="col-md-1" style="border-left: 1px gray solid" ></div> 

      <div class="col-md-6">
        <div class="page-heading">

          	<?php if ($this->session->flashdata('register_success')): ?>
              <div class="alert alert-success" style="text-align: center; font-size: 13px">
                <i class="fa fa-check-circle"></i>
                <?php echo $this->session->flashdata('register_success') ?>
              </div>
            <?php endif; ?>
              
             <?php if ($this->session->flashdata('register_fail')): ?>
              <div class="alert alert-danger" style="text-align: center; font-size: 13px">
                <i class="fa fa-times-circle"></i>
                <?php echo $this->session->flashdata('register_fail') ?>
              </div>
            <?php endif; ?>

          <h2>Sign Up</h2>

          	<?php 
          		$attributes = array('id' => 'signup-form', 'method' => 'post', 'name' => 'signup-form');
          		echo form_open('site/signup', $attributes) 
          	?>

            <div class="control-group">
              <div class="form-group ">
                <label>First Name</label> 
                <input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname">  
                <text style="color: red; font-size: 15px"><?php echo form_error('firstname'); ?></text>
              </div>

            </div>

            <div class="control-group">
              <div class="form-group ">
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname"> 
                <text style="color: red; font-size: 15px"><?php echo form_error('lastname'); ?></text>
              </div>
            </div>

            <div class="control-group">
              <div class="form-group ">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" name="email" id="email"> 
                <text style="color: red; font-size: 15px"><?php echo form_error('email'); ?></text>
              </div>
            </div>

            <div class="control-group">
              <div class="form-group col-xs-12">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                <text style="color: red; font-size: 15px"><?php echo form_error('password'); ?></text>
              </div>
            </div>

            <div class="control-group">
              <div class="form-group col-xs-12">
                <label id="termsconditions">Terms and Conditions</label>&nbsp;
                <input type="checkbox" placeholder="terms" name="termscheck" >
                <text style="color: red; font-size: 15px"><?php echo form_error('termscheck'); ?></text>

                <div class="control-group text-muted" id="termscontents">
                    The provided agreements on www.termsfeed.com are for informational purposes only and do not constitute legal advice.<br><br>

                    TermsFeed.com is not a law firm and is not providing legal advice. All information (including agreements, forms and documents) available on Our Site, www.termsfeed.com, are provided without any warranty, express or implied, including as to their legal effect and completeness. The information should be used as a guide and modified to meet your own individual needs and the laws of your state. Your use of any information or forms is at your own risk. TermsFeed and any of its employees, contractors, or attorneys who participated in providing the information expressly disclaim any warranty: they are not creating or entering into any Attorney-Client relationship by providing information to you.<br><br>

                    Communications between you and TermsFeed is only protected by our Privacy Policy, but NOT protected by the attorney-client privilege since TermsFeed is not a law firm and is not providing legal advice. No employee of TermsFeed, contractor, or attorney is authorized to provide you with any advice about what information (including agreements, forms and documents) to use or how to use or how to complete them. 
                </div>

              </div>
            </div>

            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="signupBtn" name="register"><!-- <i class="fa fa-sign-up"></i> --> Sign Up</button>
            </div>

            
          <?php echo form_close(); ?>

        </div>
      </div>
  </div>
</div>





