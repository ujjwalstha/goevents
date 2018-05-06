
<div class="container-fluid">
    <div class="content">
        <h2><i class="fa fa-window-restore"></i> Manage Event Types</h2>
    <hr>
            <div class="row">

                <div class="col-md-12" style="margin-top: 20px;">
                    <div class="col-md-4">

                        <?php 
                            $attributes = array('id' => 'editEventtype', 'method' => 'post', 'name' => 'editEventtype');
                            echo form_open_multipart('admin/editeventtypeaction', $attributes);
                        ?>
                            <div class="control-group">
                              <div class="form-group">
                                <label><h4>Edit event type:</h4></label>
                                <input type="text" class="form-control" placeholder="Enter event type here " name="eventtype" id="eventtype" value="<?php echo $getEventTypeById['eventtype'] ?>">
                                 <input type="hidden" name="typeid" value="<?php echo $getEventTypeById['typeid'] ?>">
                              </div>
                               <button type="submit" class="btn btn-warning" name="editBtn" id="editBtn"><i class="fa fa-edit"></i> Edit</button>
                            </div>
                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
    </div>
</div>

<script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>

<script>

$(document).ready(function(){

  $(document).off("click", "#editBtn").on("click", "#editBtn", function(){

    $("form[name='editEventtype']").validate({
      // Specify validation rules
      rules: {
       
        eventtype: {
          required: true,
        }, 
      },
      // Specify validation error messages
      messages: {
        
        eventtype: {
          required: "Please enter an event type",
        },
      },
       
    });

  });

});

</script>


