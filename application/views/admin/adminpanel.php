<div class="container-fluid">
    <div class="content">
        <h2><i class="fa fa-th"></i> Admin Panel</h2>
    <hr>
            <div class="row">
                <div class="col-md-12" style="margin-top: 20px">

                    <div class="col-md-3 ">
                        <div class="offer offer-danger">
                            <div class="shape">
                                <div class="shape-text" style="margin-left: 13px; ">
                                    <h1> <span class="fa fa-user"></span></h1>
                                </div>
                            </div>
                            <div class="offer-content">

                                <h3 class="lead">
                                    Users : <label class="label label-danger"><?php echo $userCount; ?></label>
                                </h3>
                                <p>
                                    <a href="<?php echo base_url('admin/manageusers'); ?>">View More <span class="fa fa-chevron-right"></span><span class="fa fa-chevron-right"></span></a>

                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="offer offer-danger">
                            <div class="shape">
                                <div class="shape-text" style="margin-left: 13px;">
                                    <h1> <span class="fa fa-calendar"></span></h1>
                                </div>
                            </div>
                            <div class="offer-content">

                                <h3 class="lead">
                                    Events : <label class="label label-danger"><?php echo $eventCount; ?></label>
                                </h3>
                                <p>
                                    <a href="<?php echo base_url('admin/manageevents'); ?>">View More <span class="fa fa-chevron-right"></span><span class="fa fa-chevron-right"></span></a>

                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="offer offer-danger">
                            <div class="shape">
                                <div class="shape-text" style="margin-left: 13px;">
                                    <h1> <span class="fa fa-calendar-plus-o"></span></h1>
                                </div>
                            </div>
                            <div class="offer-content">

                                <h3 class="lead">
                                    Event Types : <label class="label label-danger"><?php echo $eventTypeCount; ?></label>
                                </h3>
                                <p>
                                    <a href="<?php echo base_url('admin/manageeventtypes'); ?>">View More <span class="fa fa-chevron-right"></span><span class="fa fa-chevron-right"></span></a>

                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="offer offer-danger">
                            <div class="shape">
                                <div class="shape-text" style="margin-left: 13px;">
                                    <h1> <span class="fa fa-envelope"></span></h1>
                                </div>
                            </div>
                            <div class="offer-content">

                                <h3 class="lead">
                                    User Feedback : <label class="label label-danger"><?php echo $userMsgCount; ?></label>
                                </h3>
                                <p>
                                    <a href="<?php echo base_url('admin/userfeedback'); ?>">View More <span class="fa fa-chevron-right"></span><span class="fa fa-chevron-right"></span></a>

                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </div>
</div>