 <!-- Page Header -->
    <header class="masthead" id="masthead5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Profile</h1>
              <span class="subheading"><a href="#profile" class="contact_content_link">Go through your profile.</a></span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
	<div class="container" id="profile" style="margin-bottom: 70px;">
	  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
          <table class="table">
              <tr>
                <th>First Name</th>
                <td><?php echo $userProfile->firstname; ?></td> 
              </tr>
              <tr>
                <th>Last Name</th>
                <td><?php echo $userProfile->lastname; ?></td>
              </tr>
              <tr>
                <th>Email</th>
                <td><?php echo $userProfile->email;; ?></td>
              </tr>
          </table> <br/>

          <a href="<?php echo base_url('site/editprofile'); ?>"><button type="button" class="btn btn-info">Edit Profile</button></a>   
      </div>
	  </div>
	</div>

  
