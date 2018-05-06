<div class="nav">
    <div class="nav-top">
        <img src="<?php echo base_url('assets/img/icon/logo.png'); ?>">
    </div>
    <div>
        <h3 style=" font-family: Trebuchet MS;  margin-left: 15px; margin-top: 8px"><i class="fa fa-home"></i> Welcome, Admin!</h3>      
    </div>
    <br>

    <div class="navlinks">      
        <div class="menu">
            <ul>
                <li><a href="<?php echo base_url('admin/adminpanel'); ?>"><i class="fa fa-cloud"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('admin/manageusers'); ?>"><i class="fa fa-user"></i> Manage Users</a></li>
                <!-- <li><a href=""><i class="glyphicon glyphicon-ice-lolly-tasted"></i> Slider</a></li> -->
                <li class="drop-down"><a href=""><i class="fa fa-calendar"></i> Events</a>
                    <ul>
                        <li><a href="<?php echo base_url('admin/manageevents'); ?>"><i class="fa fa-plus"></i> Manage Events</a></li>
                        <li><a href="<?php echo base_url('admin/manageeventtypes'); ?>"><i class="fa fa-plus"></i> Manage Event Types</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url('admin/userfeedback'); ?>"><i class="fa fa-envelope"></i> User Feedback</a></li>
                <li><a href="<?php echo base_url('site/index'); ?>"><i class="fa fa-globe"></i> Visit Site</a></li>
                <li><a href="<?php echo base_url('admin/logout'); ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
            </ul>
        </div>
    </div>
</div><!--end of navigation-->