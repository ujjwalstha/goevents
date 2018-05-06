<div class="container-fluid">

    <div class="content">
        <h2><i class="fa fa-lock"></i> Update Dashboard Password</h2>
        <hr>


        <div class="row">

            <div class="col-md-4"></div>
            <div class="col-md-4">
            
            </div>
            <div class="col-md-4"></div>

            <div class="col-md-12">
                
                <div class="col-md-6">
                   
                      <?php 
                        $attributes = array('id' => 'changePass', 'method' => 'post', 'name' => 'changePass');
                        echo form_open('admin/changepassword', $attributes);
                      ?>

                      <?php if ($this->session->flashdata('passUpdate_success')): ?>
                        <div class="alert alert-success" style="font-size: 12px; text-align: center;">
                          <i class="fa fa-check-circle"></i>
                          <?php echo $this->session->flashdata('passUpdate_success') ?>
                        </div>
                      <?php endif; ?>
                      
                      <?php if ($this->session->flashdata('passUpdate_fail')): ?>
                        <div class="alert alert-danger"  style="font-size: 12px; text-align: center;">
                          <i class="fa fa-times-circle"></i>
                          <?php echo $this->session->flashdata('passUpdate_fail') ?>
                        </div>
                      <?php endif; ?>

                      <?php if ($this->session->flashdata('passMatch_fail')): ?>
                        <div class="alert alert-danger"  style="font-size: 12px; text-align: center;">
                          <i class="fa fa-times-circle"></i>
                          <?php echo $this->session->flashdata('passMatch_fail') ?>
                        </div>
                      <?php endif; ?>

                        <div class="control-group">
                          <div class="form-group  ">
                            <label>Old Password</label>
                            <input type="password" class="form-control" placeholder="Old Password" name="oldpassword" id="oldpassword">
                            <text style="color: red; font-size: 15px; font-weight: bold;"><?php echo form_error('oldpassword'); ?></text>
                          </div>
                        </div>

                        <div class="control-group">
                          <div class="form-group  ">
                            <label>New Password</label>
                            <input type="password" class="form-control" placeholder="New Password" name="newpassword" id="newpassword">
                            <text style="color: red; font-size: 15px; font-weight: bold;"><?php echo form_error('newpassword'); ?></text>  
                          </div>
                        </div>

                        <div class="control-group">
                          <div class="form-group  ">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword">
                            <text style="color: red; font-size: 15px; font-weight: bold;"><?php echo form_error('confirmpassword'); ?></text>  
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="editPassBtn" name="editPassBtn">Update password</button>

                        <br>
                    <?php echo form_close(); ?>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>


</div>
