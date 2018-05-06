<!-- Page Header -->
    <header class="masthead" id="masthead6">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Edit Profile</h1>
              <span class="subheading"><a href="#profile" class="contact_content_link">Edit your profile detail.</a></span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
  <div class="container" id="profile" style="margin-bottom: 70px;">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
          
        
                
              <?php if ($this->session->flashdata('profileupdate_success')): ?>
                <div class="alert alert-success" style="font-size: 15px; text-align: center;">
                  <i class="fa fa-check-circle"></i>
                  <?php echo $this->session->flashdata('profileupdate_success') ?>
                </div>
              <?php endif; ?>
              
              <?php if ($this->session->flashdata('profileupdate_fail')): ?>
                <div class="alert alert-danger"  style="font-size: 15px; text-align: center;">
                  <i class="fa fa-times-circle"></i>
                  <?php echo $this->session->flashdata('profileupdate_fail') ?>
                </div>
              <?php endif; ?>


            <?php 
              $attributes = array('id' => 'editprofile', 'method' => 'post', 'name' => 'editprofile');
              echo form_open('site/editprofile', $attributes);
            ?>
                <div class="control-group">
                  <div class="form-group ">
                    <label>First name</label>
                    <input type="text" class="form-control" placeholder="Enter first name" name= "firstname" id="firstname" value="<?php echo $userProfile->firstname; ?>">
                    <text style="color: red; font-size: 15px"><?php echo form_error('firstname'); ?></text>   
                  </div>
                </div>

                <div class="control-group">
                  <div class="form-group col-xs-12 ">
                    <label>Last name</label>
                    <input type="text" class="form-control" placeholder="Enter last name" name="lastname" id="lastname"  value="<?php echo $userProfile->lastname; ?>">
                    <text style="color: red; font-size: 15px"><?php echo form_error('lastname'); ?></text>   
                  </div>
                </div>

                <div class="control-group">
                  <div class="form-group col-xs-12 ">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Enter email" name="email" id="email"  value="<?php echo $userProfile->email; ?>">
                    <text style="color: red; font-size: 15px"><?php echo form_error('email'); ?></text>   
                  </div>
                </div>

                <button type="submit" class="btn btn-info" id="editProfileBtn" name="editProfileBtn">Edit</button>
           
            <?php echo form_close(); ?>


           

            <?php 
              $attributes = array('id' => 'changePass', 'method' => 'post', 'name' => 'changePass');
              echo form_open('site/editpassword', $attributes);
            ?>

              <?php if ($this->session->flashdata('passUpdate_success')): ?>
                <div class="alert alert-success" style="font-size: 15px; text-align: center; margin-top: 30px">
                  <i class="fa fa-check-circle"></i>
                  <?= $this->session->flashdata('passUpdate_success'); ?>
                </div>
              <?php endif; ?>
              
              <?php if ($this->session->flashdata('passUpdate_fail')): ?>
                <div class="alert alert-danger"  style="font-size: 15px; text-align: center; margin-top: 30px">
                  <i class="fa fa-times-circle"></i>
                  <?= $this->session->flashdata('passUpdate_fail'); ?>
                </div>
              <?php endif; ?>

              <?php if ($this->session->flashdata('passMatch_fail')): ?>
                <div class="alert alert-danger"  style="font-size: 15px; text-align: center; margin-top: 30px">
                  <i class="fa fa-times-circle"></i>
                  <?= $this->session->flashdata('passMatch_fail'); ?>
                </div>
              <?php endif; ?>

                <h3 style="text-align: center; margin-top: 50px">Change Your Password</h3>
                <div class="control-group">
                  <div class="form-group col-xs-12 ">
                    <label>Old Password</label>
                    <input type="password" class="form-control" placeholder="Old Password" name="oldpassword" id="oldpassword">
                    <text style="color: red; font-size: 15px"><?php echo form_error('oldpassword'); ?></text>  
                  </div>
                </div>

                <div class="control-group">
                  <div class="form-group col-xs-12 ">
                    <label>New Password</label>
                    <input type="password" class="form-control" placeholder="New Password" name="newpassword" id="newpassword">
                    <text style="color: red; font-size: 15px"><?php echo form_error('newpassword'); ?></text>  
                  </div>
                </div>

                <div class="control-group">
                  <div class="form-group  ">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword">
                    <text style="color: red; font-size: 15px"><?php echo form_error('confirmpassword'); ?></text>  
                  </div>
                </div>

                <button type="submit" class="btn btn-info" id="editPassBtn" name="editPassBtn">Update password</button>
                <br>

                 <?php echo form_close(); ?>

           <br/>          
     </div>
   </div>
  </div>

 
