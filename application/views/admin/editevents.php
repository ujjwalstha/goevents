<div class="container-fluid">
    <div class="content">
        <h2><i class="fa fa-edit"></i> Edit Event Type</h2>
    <hr>
            <div class="row">
              <?php //while($res = $result->fetch_assoc()) : ?>
                <div class="col-md-12" style="margin-top: 15px;">
                    <div class="col-md-5">

                      <label style="font-size: 20px">Change event image:</label>
                      <img class="img-responsive thumbnail" src="<?php  echo base_url() ?>public/uploads/events/<?php echo $getEventsById['event_banner']  ?>"
                             style="width: 90%; min-height: 240px; max-height: 200px" alt="Image Not Found.">


                        <?php 
                            $attributes = array('id' => 'editImg', 'method' => 'post', 'name' => 'editImg');
                            echo form_open_multipart('admin/editeventimg', $attributes);
                        ?>
                        <input type="hidden" name="eventid" value="<?php echo $getEventsById['id'] ?>">
                        <input type="file" name="banner" id="banner" class="btn btn-default btn-sm form-control" style="width: 90%">
                        <input type="submit" class="btn btn-success btn-sm form-control" name="imgBtn" id="imgBtn" value="Save Image" style="margin-top: 5px; width: 90%" >

                      <?php echo form_close(); ?>

                    </div>

                    <div class="col-md-2">
                    </div>

                    <div class="col-md-5">

                        <?php 
                            $attributes = array('id' => 'editEvent', 'method' => 'post', 'name' => 'editEvent');
                            echo form_open('admin/editeventaction', $attributes);
                        ?>
                             
                            <input type="hidden" name="eventid" value="<?php echo $getEventsById['id'] ?>">

                            <div class="control-group">
                              <div class="form-group ">
                                <label>Event Name</label>
                                <input type="text" class="form-control" placeholder="Event Name" name="eventname" id="eventname" value="<?php echo $getEventsById['event_name']?>">
                              </div>
                            </div>

                            <div class="control-group" >
                              <div class="form-group ">
                                <label>Select Event Type</label>
                                <select class="form-control event-type " name="eventtype" id="eventtype" required>
                                    <?php
                                      foreach ($getEventType as $eventtype):
                                    ?>
                                      <option value="<?php echo $eventtype['eventtype']?>" <?php if($eventtype['eventtype'] == $getEventsById['event_type']) echo "selected='selected'"?> ><?php echo ucwords($eventtype['eventtype']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                              </div>
                            </div>

                            <div class="control-group">
                              <div class="form-group">
                                <label>Location</label>
                                <input type="text" class="form-control" placeholder="Location" name="location" id="location"  value="<?php echo $getEventsById['location'] ?>">
                              </div>
                            </div>

                            <div class="control-group">
                              <div class="form-group ">
                                <label>Event Date</label>
                                <input type="date" class="form-control text-muted" placeholder="Event Date " name="eventdate" id="eventdate" min="<?php echo date('Y-m-d');?>" value="<?php echo date('Y-m-d',strtotime($getEventsById["event_date"])) ?>" >
                              </div>
                            </div>

                            <!-- <div class="control-group">
                              <div class="form-group ">
                                <label>Event Banner</label>
                                <input type="file" class="form-control" placeholder="Event Banner" name="banner" id="banner" required data-validation-required-message="Please enter event banner.">                                              </div>
                            </div> -->

                            <br>
    
                            <div class="form-group">
                              <button type="submit" class="btn btn-success" name="editBtn" id="editBtn"><i class="fa fa-edit"></i> Edit Event</button>
                            </div>
                         
                        <?php echo form_close(); ?>

                    </div>
                </div>
                <?php// endwhile; ?>
            </div>
    </div>
</div>


<script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>

<script>

$(document).ready(function(){

  $(document).off("click", "#imgBtn").on("click", "#imgBtn", function(){

    $("form[name='editImg']").validate({
      // Specify validation rules
      rules: {
        
        banner: {
          required: true,
        },
      },

      // Specify validation error messages
      messages: {

        banner: {
          required: "Please choose an image" ,
        },
      },
       
    });

  });

  $(document).off("click", "#editBtn").on("click", "#editBtn", function(){

    $("form[name='editEvent']").validate({
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
      },
       
    });

  });



});

</script>
