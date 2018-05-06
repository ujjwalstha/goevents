<div class="container-fluid">
    <div class="content">
        <h2><i class="fa fa-calendar-plus-o"></i> Manage Event Types</h2>
    <hr>
            <div class="row">

                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <?php if ($this->session->flashdata('addeventtype_success')): ?>
                      <div class="alert alert-success" style="text-align: center;font-size: 12px">
                        <i class="fa fa-check-circle"></i>
                        <?= $this->session->flashdata('addeventtype_success'); ?>
                      </div>
                    <?php endif; ?>
                  
                    <?php if ($this->session->flashdata('addeventtype_fail')): ?>
                      <div class="alert alert-danger" style="text-align: center;font-size: 12px">
                        <i class="fa fa-times-circle"></i>
                        <?= $this->session->flashdata('addeventtype_fail'); ?>
                      </div>
                    <?php endif; ?>

                </div>
                <div class="col-md-4"></div>

                <div class="col-md-12" style="margin-top: 20px;">
                    <div class="col-md-4">

                       	<?php 
                            $attributes = array('id' => 'addEventtype', 'method' => 'post', 'name' => 'addEventtype');
                            echo form_open_multipart('admin/addeventtype', $attributes);
                        ?>
                            <div class="control-group">
                              <div class="form-group">
                                <label><h4 style="font-weight: bold;">Add event type:</h4></label>
                                <input type="text" class="form-control" placeholder="Enter event type here " name="eventtype" id="eventtype">
                              </div>
                               <button type="submit" class="btn btn-success" name="addBtn" id="addBtn"><i class="fa fa-plus"></i> Add</button>
                            </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
                
            <hr>    

            <div class="row">

                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <?php if ($this->session->flashdata('typedelete_success')): ?>
                      <div class="alert alert-success" style="text-align: center;font-size: 12px">
                        <i class="fa fa-check-circle"></i>
                        <?= $this->session->flashdata('typedelete_success'); ?>
                      </div>
                    <?php endif; ?>
                  
                    <?php if ($this->session->flashdata('typedelete_fail')): ?>
                      <div class="alert alert-danger" style="text-align: center;font-size: 12px">
                        <i class="fa fa-times-circle"></i>
                        <?= $this->session->flashdata('typedelete_fail'); ?>
                      </div>
                    <?php endif; ?>

                   <?php if ($this->session->flashdata('typeupdate_success')): ?>
                      <div class="alert alert-success" style="text-align: center;font-size: 12px">
                        <i class="fa fa-check-circle"></i>
                        <?= $this->session->flashdata('typeupdate_success'); ?>
                      </div>
                    <?php endif; ?>
                  
                    <?php if ($this->session->flashdata('typeupdate_fail')): ?>
                      <div class="alert alert-danger" style="text-align: center;font-size: 12px">
                        <i class="fa fa-times-circle"></i>
                        <?= $this->session->flashdata('typeupdate_fail'); ?>
                      </div>
                    <?php endif; ?>

                </div>
                <div class="col-md-4"></div>

                <div class="col-md-12" style="margin-top: 20px;">
                    <h4 style="font-weight: bold;">Event types:</h4><br>
                    
                    <table class="table table-responsive">
                        <tr style="background-color: gray; color: white">
                            <th>S.N.</th>
                            <th>Event Types</th>
                            <th>Action</th>  
                        </tr>

                        <?php 
	                        $i = 1; 
	                        if($eventTypeCount > 0) :
	                        foreach ($getEventType as $eventType):
                        ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo ucwords($eventType['eventtype']) ?></td>
                                <td>
                                  <ul style="list-style-type: none; ">
                                  	
                                    <li style="display: inline;">
                                      <a href="<?php echo base_url('admin/editeventtype') ?>?typeid=<?php echo urlencode($eventType['typeid'])?>"><button type="button" class="btn btn-warning btn-xs"><span class="fa fa-edit" ></span>
                                      </button></a><br/><br/>
                                    </li>

                                    <li style="display: inline;">
                                    
										<?php 
				                            $attributes = array('method' => 'post');
				                            echo form_open('admin/deleventtype', $attributes);
				                        ?>
											<input type="hidden" name="typeid" value="<?php echo $eventType['typeid'] ?>">
											<button type="submit" class="btn btn-danger btn-xs" id="deleteBtn" name="deleteBtn" onclick="return confirm('Confirm delete?')"><span class="fa fa-trash-o"></span>
											</button>
                                      	<?php echo form_close(); ?>
                                    </li>
                                  </ul>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <tr style="text-align: center;" >
                              <td colspan ="3">No Data Found.</td>
                            </tr>
                          <?php endif; ?>
                    </table>
                </div>
            </div>
    </div>
</div>

<script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>

<script>

$(document).ready(function(){

  $(document).off("click", "#addBtn").on("click", "#addBtn", function(){

    $("form[name='addEventtype']").validate({
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