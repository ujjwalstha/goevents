<div class="container-fluid">
    <div class="content">
        <h2><i class="fa fa-calendar"></i> Manage Events</h2>
    <hr>
            <div class="row">

                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <?php if ($this->session->flashdata('addevent_success')): ?>
                      <div class="alert alert-success" style="text-align: center;font-size: 12px">
                        <i class="fa fa-check-circle"></i>
                        <?= $this->session->flashdata('addevent_success') ?>
                      </div>
                    <?php endif; ?>
                  
                    <?php if ($this->session->flashdata('addevent_fail')): ?>
                      <div class="alert alert-danger" style="text-align: center;font-size: 12px">
                        <i class="fa fa-times-circle"></i>
                        <?= $this->session->flashdata('addevent_fail'); ?>
                      </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('eventdelete_success')): ?>
                      <div class="alert alert-success" style="text-align: center;font-size: 12px">
                        <i class="fa fa-check-circle"></i>
                        <?= $this->session->flashdata('eventdelete_success') ?>
                      </div>
                    <?php endif; ?>
                  
                    <?php if ($this->session->flashdata('eventdelete_fail')): ?>
                      <div class="alert alert-danger" style="text-align: center;font-size: 12px">
                        <i class="fa fa-times-circle"></i>
                        <?= $this->session->flashdata('eventdelete_fail') ?>
                      </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('eventupdate_success')): ?>
                      <div class="alert alert-success" style="text-align: center;font-size: 12px">
                        <i class="fa fa-check-circle"></i>
                        <?= $this->session->flashdata('eventupdate_success'); ?>
                      </div>
                    <?php endif; ?>
                  
                    <?php if ($this->session->flashdata('eventupdate_fail')): ?>
                      <div class="alert alert-danger" style="text-align: center;font-size: 12px">
                        <i class="fa fa-times-circle"></i>
                        <?= $this->session->flashdata('eventupdate_fail'); ?>
                      </div>
                    <?php endif; ?>

                   <?php if ($this->session->flashdata('imageupdate_success')): ?>
                      <div class="alert alert-success" style="text-align: center;font-size: 12px">
                        <i class="fa fa-check-circle"></i>
                        <?= $this->session->flashdata('imageupdate_success'); ?>
                      </div>
                    <?php endif; ?>
                  
                    <?php if ($this->session->flashdata('imageupdate_fail')): ?>
                      <div class="alert alert-danger" style="text-align: center;font-size: 12px">
                        <i class="fa fa-times-circle"></i>
                        <?= $this->session->flashdata('imageupdate_fail'); ?>
                      </div>
                    <?php endif; ?>

                </div>
                <div class="col-md-4"></div>

                <div class="col-md-12">
                    <div style="float: right;">
                        <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Create Event</button>

                        <!-- Modal -->

                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #5cb85c; color: white">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title"><i class="fa fa-plus"></i> Create Event</h4>
                                    </div>
                                    <div class="modal-body">

                                        
                                    	<?php 
							              	$attributes = array('id' => 'createevent', 'method' => 'post', 'name' => 'createevent');
							              	echo form_open_multipart('admin/addevents', $attributes);
							            ?>

                                        <div class="control-group">
                                          <div class="form-group ">
                                            <label>Event Name</label>
                                            <input type="text" class="form-control" placeholder="Event Name" name="eventname" id="eventname">
                                          </div>
                                        </div>

                                        <div class="control-group" >
                                          <div class="form-group ">
                                            <label>Select Event Type</label>
                                            <select class="form-control event-type " name="eventtype" id="eventtype" required>
                                                <option text-muted selected disabled >Select Event Type...</option>
                                               <?php
									              foreach ($getEventType as $eventtype):
									            ?>
									              <option value="<?php echo $eventtype['eventtype']?>"><?php echo ucwords($eventtype['eventtype']); ?></option>
									            <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <div class="form-group">
                                            <label>Location</label>
                                            <input type="text" class="form-control" placeholder="Location " name="location" id="location" required data-validation-required-message="Please enter event location.">
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <div class="form-group ">
                                            <label>Event Date</label>
                                            <input type="date" class="form-control text-muted" placeholder="Event Date " name="eventdate" id="eventdate" required data-validation-required-message="Please enter event date." min="<?php echo date('Y-m-d');?>">
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <div class="form-group ">
                                            <label>Event Banner</label>
                                            <input type="file" class="form-control" placeholder="Event Banner" name="banner" id="banner" required data-validation-required-message="Please enter event banner.">                                              </div>
                                        </div>

                                        <br>
                
                                        <div class="form-group">
                                          <button type="submit" class="btn btn-success" name="createBtn" id="createBtn"><i class="fa fa-plus-circle"></i> Create Event</button>
                                        </div>
                                      	<?php echo form_close(); ?>

                                    </div>
                                </div>
                              
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-12" style="margin-top: 20px">

                   
                    
                    <table class="table table-responsive" id="myTable" >
                        <tr style="background-color: gray; color: white">
                          <th>S.N</th>
                          <th>Event name</th>
                          <th>Event type</th>
                          <th>Location</th>
                          <th>Event date</th>
                          <th>Image</th>
                          <th>Event Status</th>
                          <th>Action</th>
                        </tr>
                        
                        <?php 
                        	$i = 1;
                        	foreach ($getEvents as $events):
                        ?>
                        
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo ucwords($events['event_name']) ?></td>
                                <td><?php echo ucwords($events['event_type']) ?></td>
                                <td><?php echo ucwords($events['location']) ?></td>
                                <td><?php echo $events['event_date'] ?></td>
                                <td><img class="img-responsive" src="<?php  echo base_url() ?>public/uploads/events/<?php echo $events['event_banner']  ?>" height=100; width=100; ></td>
                                <td>
                                  <?php
                                    $evendate = $events['event_date'];
                                    $evendate = strtotime($evendate);

                                    $date = date('Y-m-d');
                                    $date = strtotime($date);

                                    $datediff = $evendate - $date;
                                    $status = floor($datediff / (60 * 60 * 24));

                                    if($status == 0){
                                      echo "Today.";
                                    } elseif($status > 0) {
                                      echo $status." day/s remaining";
                                    } else {
                                      echo "Event finished";
                                    }

                                  ?>
                                    
                                </td>
                                <td>
                                    <a href="<?php echo base_url('admin/editevents') ?>?eventid=<?php echo urlencode($events['id'])?>"><button type="button" class="btn btn-warning btn-xs"><span class="fa fa-edit" ></span>
                                    </button></a><br/><br/>

                                   	<?php 
						              	$attributes = array('method' => 'post');
						              	echo form_open('admin/deleteevent', $attributes);
						            ?>
                                        <input type="hidden" name="eventid" value="<?= $events['id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-xs" id="deleteBtn" name="deleteBtn" onclick="return confirm('Confirm delete?')"><span class="fa fa-trash-o"></span>
                                        </button>
                                    <?php echo form_close(); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                
                         <?php //else: ?>
                           <!--  <tr style="text-align: center;" >
                              <td colspan ="9">No Data Found.</td>
                            </tr> -->
                          <?php //endif; ?>
                    </table>
                   
                </div>

            </div>
    </div>
</div>

<script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>

<script>

$(document).ready(function(){

  $(document).off("click", "#createBtn").on("click", "#createBtn", function(){

    $("form[name='createevent']").validate({
      // Specify validation rules
      rules: {
       
        eventname: {
          required: true,
        },
        eventtype:{
          required: true,
        },
        location: {
          required: true,
        },
        eventdate: {
          required: true,
        },
        banner: {
          required: true,
        }
      },
      // Specify validation error messages
      messages: {
        
        eventname: {
          required: "Please enter event name",
        },
        eventtype: {
          required: "Please select event type",
        },
        location: {
          required: "Please enter location name" ,
        },
        eventdate: {
          required: "Please enter event date" ,
        },
        banner: {
          required: "Please choose an image" ,
        }
      },
       
    });

  });

  // $('#myTable').DataTable();

});

</script>