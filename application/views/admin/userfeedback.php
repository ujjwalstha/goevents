<div class="container-fluid">
    <div class="content">
        <h2><i class="fa fa-envelope"></i> User's Feedback</h2>
    <hr>
            <div class="row">
                
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <?php if ($this->session->flashdata('msgdelete_success')): ?>
                      <div class="alert alert-success" style="text-align: center;font-size: 12px">
                        <i class="fa fa-check-circle"></i>
                        <?= $this->session->flashdata('msgdelete_success'); ?>
                      </div>
                    <?php endif; ?>
                  
                    <?php if ($this->session->flashdata('msgdelete_fail')): ?>
                      <div class="alert alert-danger" style="text-align: center;font-size: 12px">
                        <i class="fa fa-times-circle"></i>
                        <?= $this->session->flashdata('msgdelete_fail'); ?>
                      </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4"></div>


                <div class="col-md-12" style="margin-top: 20px">
                    
                    <table class="table ">
                        <tr style="background-color: gray; color: white">
                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>

                        <?php $i = 1; 

                        if($userMsgCount > 0) :
                       foreach ($getUserMsg as $userMsg) : ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $userMsg['name']?></td>
                                <td><?php echo $userMsg['email']?></td>
                                <td><?php echo $userMsg['subject']?></td>
                                <td><?php echo $userMsg['message']?></td>
                                <td>
                                    
                                    <?php 
                                        $attributes = array('method' => 'post');
                                        echo form_open('admin/delfeedback', $attributes);
                                    ?>  
                                        <input type="hidden" name="msgid" value="<?= $userMsg['id'] ?>">
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