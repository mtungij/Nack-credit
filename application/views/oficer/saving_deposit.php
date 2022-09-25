<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("oficer/index"); ?>"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active">Menu</li>
                            <li class="breadcrumb-item active">Saving Deposit</li>
                        </ul>
                    </div>            
                 
                </div>
            </div>
                  <?php if ($das = $this->session->flashdata('massage')): ?> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="alert alert-dismisible alert-success"> <a href="" class="close">&times;</a> 
                                    <?php echo $das;?> </div> 
                            </div> 
                        </div> 
                    <?php endif; ?>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                         <div class="header">
                            <h2>Saving Deposit </h2> 
                            <div class="pull-right">
                               <a href="" data-toggle="modal" data-target="#addcontact2" class="btn btn-primary"><i class="icon-pencil">Add</i></a>  
                            </div>   
                             </div>
                          <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                         <th>S/No.</th>
                                         <th>Provider</th>
                                        <th>Agent Name</th>
                                        <th>Amount</th>
                                        <th>Reference number</th>
                                        <th>Time</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                   
                                    <tbody>
                                        <?php $no = 1; ?>
                                <?php foreach ($saving_deposit as $saving_deposits): ?>
                                              <tr>
                                    <td><?php echo $no++; ?>.</td>
                                    
                                    <td><?php echo $saving_deposits->account_name; ?></td>
                                    <td><?php echo $saving_deposits->agent; ?></td>
                                    <td><?php echo number_format($saving_deposits->amount); ?> </td> 
                                      
                                    <td><?php echo $saving_deposits->ref_no; ?></td>
                                        
                                   
                                    <td><?php echo $saving_deposits->time; ?></td>
                                    <td><?php echo $saving_deposits->date; ?></td>
                                    <td>
                                        <?php if ($saving_deposits->status =='open') {
                                         ?>
                                        <span class="badge badge-danger">Not Chacked</span>
                                    <?php }elseif ($saving_deposits->status =='close') {
                                     ?>
                                        <span class="badge badge-success">Chacked</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($saving_deposits->status =='close') {
                                         ?>
                                         <a href="<?php echo base_url("oficer/uncheck_miamala/{$saving_deposits->id}"); ?>" class="btn btn-success btn-sm"><i class="icon-pencil"></i></a>
                                     <?php }elseif ($saving_deposits->status =='open') {
                                     ?>
                                     <a href="<?php echo base_url("oficer/check_miamala/{$saving_deposits->id}"); ?>" class="btn btn-primary btn-sm"><i class="icon-pencil"></i></a>
                                     <?php  } ?>
                                        
                                        <?php $date = date("Y-m-d"); ?>
                                    <?php if($saving_deposits->date == $date){
                                         ?>
                                        <a href="<?php echo base_url("oficer/remove_saving_deoposit/{$saving_deposits->id}"); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure?')"><i class="icon-trash"></i>
                                        </a>
                                     <?php }else{ ?>
                                        
                                        <?php } ?>
                                    </td>
                                 
                                    </tr>

                                    <?php endforeach; ?>
                                    <tr>
                                        <td><b>TOTAL:</b></td>
                                        <!-- <td></td> -->
                                        <td></td>
                                        <td></td>
                                        <td><b><?php echo number_format($total_saving->total_amount_saving); ?></b></</td>
                                        <td><b><?php //echo number_format($sum_cashTransaction->total_aprove); ?></b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div> 


             
            </div>
        </div>
    </div>
</div>

<?php include('incs/footer.php'); ?>


 <div class="modal fade" id="addcontact2<?php //echo $employees->empl_id; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Add Saving Deposit</h6>
            </div>
            <?php echo form_open("oficer/create_saving_deposit"); ?>
            <div class="modal-body">
                <div class="row clearfix">
                                <div class="col-md-12 col-12 ">
                                    
                                    <span>Select Account Provider</span>
                                    <select type="number" class="form-control" name="provider" required>
                                        <option value="">Select</option>
                                        <?php foreach ($acount as $accounts): ?>
                                        <option value="<?php echo $accounts->receive_trans_id; ?>"><?php echo $accounts->account_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                 <div class="col-md-6 col-6 ">
                                   
                                    <span>*Agent:</span>
                                    <input type="text" name="agent" autocomplete="off" placeholder="Enter Agent Name" class="form-control" required>
                                </div>
                                <div class="col-md-6 col-6 ">
                                    <span>*Amount</span>
                                    <input type="number" name="amount" autocomplete="off" placeholder="Enter Amount" class="form-control" required>
                                </div>
                                 <div class="col-md-6 col-6 ">
                                    <span>*Reference Number</span>
                                    <input type="text" name="ref_no" autocomplete="off" placeholder="Enter Amount" class="form-control">
                                </div>
                                 <div class="col-md-6 col-6 ">
                                    <span>*Time</span>
                                    <input type="time" name="time" autocomplete="off" placeholder="Enter Amount" class="form-control" required>
                                </div>
                                <?php $date = date("Y-m-d"); ?>
                                <input type="hidden" name="blanch_id" value="<?php echo $empl_data->blanch_id; ?>">
                                <input type="hidden" name="comp_id" value="<?php echo $empl_data->comp_id; ?>">
                                <input type="hidden" name="date" value="<?php echo $date; ?>">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


