<div class="top-time">
    <div class="container-fluid">
<!--        <h2>--><?//= date('d-m-Y l') ?><!--</h2>-->
        <h2><div id="clockbox"></div></h2>


        <div class="user-setting">
            <div class="dropdown">
                <button id="dLabel" type="button" class="btn btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-cog"></i> Administrator Settings
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dLabel" style="width: 100%">
                    <!-- <li><a href="#"><i class="glyphicon glyphicon-user"></i> View Profile</a></li> -->
                    <li><a href="<?php echo base_url('admin/changepassword'); ?>"><i class="fa fa-lock"></i> Change Password</a></li>
                    <li><a href="<?php echo base_url('admin/logout'); ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
                </ul>
            </div>
        </div>

    </div>

</div><!--end of top-time-->