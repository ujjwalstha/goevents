 <!-- Page Header -->
    <header class="masthead" id="masthead4">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Contact Us</h1>
              <span class="subheading"><a href="#contact" class="contact_content_link">Have questions? We have answers.</a></span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container" id="contact" style="margin-bottom: 70px;">
      <div class="row">

        <div class="col-md-4"></div>

        <div class="col-md-4">
          <?php if ($this->session->flashdata('feedback_success')): ?>
            <div class="alert alert-success" style="text-align: center; font-size: 13px">
              <i class="fa fa-check-circle"></i>
              <?php echo $this->session->flashdata('feedback_success'); ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="col-md-4"></div>

        <div class="col-lg-8 col-md-10 mx-auto">
    
          <p>Want to get in touch? Fill out the form below to send us a message and we will get back to you as soon as possible!</p>
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->

          	<?php 
          		$attributes = array('id' => 'contact', 'method' => 'post', 'name' => 'contact');
          		echo form_open('site/customerfeedback', $attributes) 
          	?>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Your Name" name="name" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" name="email" id="email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <!-- <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Phone Number</label>
                <input type="tel" class="form-control" placeholder="Phone Number(Optional)" name="number" id="phone"  data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div> -->
             <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Subject</label>
                <input type="text" class="form-control" placeholder="Subject" name="subject" id="subject" required data-validation-required-message="Please enter subject.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="5" class="form-control" placeholder="Message" name="message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton" name="send"><i class="fa fa-paper-plane"></i> Send</button>
            </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
