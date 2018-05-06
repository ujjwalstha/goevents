 <!-- Page Header -->
    <header class="masthead" id="masthead1" style="">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>GoEvents.com</h1>
              <span class="subheading">Copyright &copy; Ujjwal Shrestha 2018</span>
            </div>
          </div>
        </div>
      </div>
    </header>


    <!-- Main Content -->
    <div class="container">
      <div >
        <h3>Some events you might be interested on:</h3>
      </div> <br/>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <form id="searchthis" style="display:inline;">
            <input id="namanyay-search-box" class="searchField" size="20" type="text" placeholder="Type your text here...">
            <input id="namanyay-search-btn" class="searchBtn" value="Search" type="submit">
          </form>
        </div>
      
        <div class="col-md-3">Select an event type:</div>

        <div class="col-md-3">
          <select class="form-control" id="eventtype">
            <option value="all" selected>All</option>
            
            <?php
              foreach ($getEventType as $eventtype):
            ?>
              <option value="<?php echo $eventtype['eventtype']?>"><?php echo ucwords($eventtype['eventtype']); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      
      </div>
    </div>

    <div class="container">
      <div class="row">

          <div class="col-md-4">
          </div>

          <div class="col-md-4">
            <?php if ($this->session->flashdata('eventjoin_success')): ?>
              <div class="alert alert-success" style="font-size: 15px; text-align: center;">
                <i class="fa fa-check-circle"></i>
                <?php echo $this->session->flashdata('eventjoin_success') ?>
              </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('eventjoin_fail')): ?>
              <div class="alert alert-danger" style="text-align: center; font-size: 15px">
                <i class="fa fa-times-circle"></i>
                <?php echo $this->session->flashdata('eventjoin_fail'); ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="col-md-4">
          </div>
          
      </div>
    </div>

    <div class="container" style="margin-top: 55px; margin-bottom: 70px;" id="eventcontent">
       <div class="loader mx-auto" id="loading"></div>
    </div>




<script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>


<script>

  
$(document).ready(function() {
    
    $(window).on('load', function(){ //for displaying all the data as the page loads(but not working -_-)
      //alert('hi');
      $("#eventtype").trigger("change");
    })

    $(document).ajaxStart(function(){  //For loader 
        $('#loading').show();
    }).ajaxStop(function(){
        $('#loading').hide();
    })

    $(document).off("change", "#eventtype").on("change", "#eventtype", function(e) {
        e.preventDefault();
        //alert('hi');
      
        var types  = $(this).val();
        var url   = "<?php echo base_url('site/sortevent') ?>" ;    

        $.ajax({
          type : "post",
          url  : url,
          cache: true,
          data : {"eventtype" : types},
          dataType : "json",
          beforeSend : function() {
              //$("#eventcontent").slideUp('slow'); //for effect
          },
          success : function(resp) {
            if(resp.status == 'success'){
              //$("#eventcontent").html(resp.data).slideDown('slow'); //for effect
              $("#eventcontent").html(resp.data);
            }
          }

          
        })
    });

     $(document).off("click", ".searchBtn").on("click", ".searchBtn", function(e){
        e.preventDefault();
         //alert($(".searchField").val());
        var searchText = $(".searchField").val();
        var url = "<?php echo base_url('site/searchevent') ?>";

        $.ajax({
          type : "post",
          url  : url,
          cache: true,
          data : {"search" : searchText},
          dataType : "json",

           success : function(resp) {
            if(resp.status == 'success'){
              $("#eventcontent").html(resp.data);
            }
          }

        })
    });

 });
</script>


