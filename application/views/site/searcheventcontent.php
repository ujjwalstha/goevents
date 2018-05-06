
<div class="row">
  <?php 
  if(is_array($getEvents)) :
    foreach ($getEvents as $events) : 
      ?>
      <div class="col-md-4" style="margin-top: 30px; font-size: 15px;">
        <div class="card" >
          <a class="img-card" href="#">
            <img src="<?php  echo base_url() ?>public/uploads/events/<?php echo $events['event_banner']  ?>" class="image-responsive">
          </a>
          <div class="card-content" >
            <table class="table table-responsive">
              <tr>
                <th>Event name</th>
                <td><?php echo ucwords($events['event_name']) ?></td>
              </tr>

              <tr>
                <th>Event type</th>
                <td><?php echo ucwords($events['event_type']) ?></td>
              </tr>

              <tr>
                <th>Location</th>
                <td><?php echo ucwords($events['location']) ?></td>
              </tr>

              <tr>
                <th>Date</th>
                <td><?php echo $events['event_date']?></td>
              </tr>

              <tr>
                <th>Event Status</th>
                <td>
                  <?php
                  $evendate = $events['event_date'];
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

            </table>
          </div>  



            <div class="joinevent-block">

              <?php
                $eventid = $events['id'];
                $userid = $this->session->userdata('userid');
                $where = array('user_id' => $userid, 'event_id' => $eventid);
                $result = $this->db->get_where('tbl_event_join', $where);             
               
                if($result->row()) :
              ?>  

              <a href="<?php echo base_url('site/eventjoined'); ?>" style="text-decoration: none;"><button class="btn btn-success btn-block eventjoined-btn" style="cursor: pointer;"><i class="fa fa-check-circle"></i> Event Joined</button></a> 

              <?php elseif( ($status == 0 ) || ($status < 0) ) : ?>

                <button class="btn btn-danger btn-block"><i class="fa fa-check-circle"></i> Event Finished</button>

              <?php elseif( ($this->session->userdata('adminid') != null) && ($this->session->userdata('adminname') != null) ) : ?>

              <?php else: ?>
              
              <?php 
                $attributes = array('method' => 'post');
                echo form_open('site/joinevent', $attributes);
              ?>

               <input type="hidden" name="eventid" value="<?php echo $events['id'] ?>">
               <button class="btn btn-primary btn-link btn-block joinevent-btn" name="joineventBtn" onclick="return confirm('Are you sure to join the event?')" style="cursor: pointer;">
                 <i class="fa fa-plus-circle"></i> Join Event
               </button>

             <?php echo form_close(); ?>

            <?php endif; ?>

           </div>

           

       </div>
     </div>

   <?php endforeach; ?>
 <?php else: ?>
  <div class="col-md-12" style="text-align: center;" >
    <h4>No Event Found.</h4>
  </div>
<?php endif; ?>

</div>