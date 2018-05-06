<!-- Page Header -->
    <header class="masthead" id="masthead7">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Events Joined</h1>
              <span class="subheading"><a href="#eventjoined" class="event_join_link">Events that you are interested in.</a></span>
            </div>
          </div>
        </div>
      </div>
    </header>

      <!-- Main Content -->
    <div class="container">
      <div >
        <h3>Events that you are interested in...</h3>
      </div> <br/>
    </div>


     <div class="container" id="eventjoined" style="margin-bottom: 70px;">
      <div class="row">

        <div class="col-md-4">
          </div>

          <div class="col-md-4">
              <?php if ($this->session->flashdata('joinedeventdelete_success')): ?>
                <div class="alert alert-success" style="font-size: 15px; text-align: center;">
                  <i class="fa fa-check-circle"></i>
                  <?php echo $this->session->flashdata('joinedeventdelete_success') ?>
                </div>
              <?php endif; ?>
              
              <?php if ($this->session->flashdata('joinedeventdelete_fail')): ?>
                <div class="alert alert-danger"  style="font-size: 15px; text-align: center;">
                  <i class="fa fa-times-circle"></i>
                  <?php echo $this->session->flashdata('joinedeventdelete_fail') ?>
                </div>
              <?php endif; ?>
          </div>

          <div class="col-md-4">
          </div>
        

        <?php
          if(is_array($getJoinedEvent)) :
          foreach($getJoinedEvent as $joinedEvent) : 
        ?>

        <div class="col-md-4" style="margin-top: 30px; font-size: 15px">
          <div class="card" >
            <a class="img-card" href="#">
              <img src="<?php  echo base_url() ?>public/uploads/events/<?php echo $joinedEvent['event_banner']  ?>" class="image-responsive">
            </a>
            <div class="card-content" >
                <table class="table table-responsive">
                  <tr>
                    <th>Event name</th>
                    <td ><?php echo ucwords($joinedEvent['event_name']) ?></td>
                  </tr>

                  <tr>
                    <th>Event type</th>
                    <td><?php echo ucwords($joinedEvent['event_type']) ?></td>
                  </tr>

                  <tr>
                    <th>Location</th>
                    <td><?php echo ucwords($joinedEvent['location']) ?></td>
                  </tr>

                  <tr>
                    <th>Date</th>
                    <td><?php echo $joinedEvent['event_date']?></td>
                  </tr>

                  <tr>
                    <th>Event Status</th>
                    <td>
                      <?php
                        $evendate = $joinedEvent['event_date'];
                        $evendate = strtotime($evendate);

                        $date = date('Y-m-d');
                        $date = strtotime($date);

                        $datediff = $evendate - $date;
                        $status = floor($datediff / (60 * 60 * 24));

                        if($status == 0){
                          echo "Your wait is over.";
                        } elseif($status > 0) {
                          echo $status." day/s remaining";
                        } else {
                          echo "Event finished";
                        }

                      ?>
                        
                    </td>
                  </tr>

                  <!-- <tr>
                    <th>Created By</th>
                    <td><?php //echo ucwords($res['firstname']).' '.ucwords($res['lastname']) ?></td>
                  </tr> -->
      
                </table>
            </div>
            <div class="joinevent-block">

              <?php 
                $attributes = array('method' => 'post');
                echo form_open('site/removejoinevent', $attributes);
              ?>

                <input type="hidden" name="eventjoinid" value="<?php echo $joinedEvent['id'] ?>">
                <button class="btn btn-danger  btn-block removeevent-btn" name="removeeventBtn" onclick="return confirm('Are you sure to remove the event?')" style="cursor: pointer;">
                    Remove Event
                </button>
              
             <?php echo form_close(); ?>

            </div>
            
          </div>
        </div>
        <?php endforeach; ?>

        <?php else: ?>
          <div class="col-md-12" style="text-align: center;" >
            <h4>No events joined yet.</h4>
          </div>
        <?php endif; ?>

       
      </div>
    </div>

