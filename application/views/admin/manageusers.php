<div class="container-fluid">
    <div class="content">
        <h2><i class="fa fa-user"></i> Manage Users</h2>
    <hr>
            <div class="row">
                
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <?php if ($this->session->flashdata('useractivate_success')): ?>
                      <div class="alert alert-success" style="text-align: center;font-size: 12px">
                        <i class="fa fa-check-circle"></i>
                        <?= $this->session->flashdata('useractivate_success'); ?>
                      </div>
                    <?php endif; ?>
                  
                    <?php if ($this->session->flashdata('userdeactivate_success')): ?>
                      <div class="alert alert-danger" style="text-align: center;font-size: 12px">
                        <i class="fa fa-check-circle"></i>
                        <?= $this->session->flashdata('userdeactivate_success'); ?>
                      </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('userdelete_success')): ?>
                      <div class="alert alert-success" style="text-align: center;font-size: 12px">
                        <i class="fa fa-check-circle"></i>
                        <?= $this->session->flashdata('userdelete_success'); ?>
                      </div>
                    <?php endif; ?>
                  
                    <?php if ($this->session->flashdata('userdelete_fail')): ?>
                      <div class="alert alert-danger" style="text-align: center;font-size: 12px">
                        <i class="fa fa-times-circle"></i>
                        <?= $this->session->flashdata('userdelete_fail'); ?>
                      </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4"></div>


                <div class="col-md-12" style="margin-top: 20px">
                    
                    <table class="table ">
                        <tr style="background-color: gray; color: white">
                            <th>S.N.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        <?php $i = 1; 

                        if($userCount > 0) :
                       foreach ($getUsers as $users) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $users['firstname']?></td>
                                <td><?php echo $users['lastname']?></td>
                                <td><?php echo $users['email']?></td>
                                <td>
                                   
                                    <?php 
                                        $attributes = array('method' => 'post');
                                        echo form_open('admin/usersstatus', $attributes);
                                    ?>  
                                        <input type="hidden" name="userid" value="<?= $users['id'] ?>">
                                        <?php if ($users['status'] == 0): ?>
                                            <button type="submit" class="btn btn-success btn-xs" name="activate"> Activate</button>
                                        <?php else: ?>
                                            <button type="submit" class="btn btn-danger btn-xs" name="deactivate"> Deactivate</button>
                                        <?php endif;  ?>
                                    <?php echo form_close(); ?>
                                </td>
                                <td>
                                    
                                    <?php 
                                        $attributes = array('method' => 'post');
                                        echo form_open('admin/deleteuser', $attributes);
                                    ?>  
                                        <input type="hidden" name="userid" value="<?= $users['id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-xs" id="deleteBtn" name="deleteBtn" onclick="return confirm('Confirm delete?')"><span class="fa fa-trash-o"></span>
                                        </button>
                                    <?php echo form_close(); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                         <?php else: ?>
                            <tr style="text-align: center;" >
                              <td colspan ="6">No Data Found.</td>
                            </tr>
                          <?php endif; ?>
                    </table>

                </div>
            </div>
    </div>
</div>