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
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("report_menu"); ?></li>
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("transaction_menu"); ?></li>
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
                            <h2><?php echo $this->lang->line("today_cashtransaction_menu"); ?> </h2> 
                            <div class="pull-right">
                               <a href="" data-toggle="modal" data-target="#addcontact2" class="btn btn-primary"><i class="icon-calendar"><?php echo $this->lang->line("search_menu"); ?></i></a>  
                            </div>   
                             </div>
                          <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                         <th>S/No.</th>
                                        <!--  <th>Branch</th> -->
                                         <th><?php echo $this->lang->line("employee_menu"); ?></th>
                                        <th><?php echo $this->lang->line("customer_name_menu"); ?></th>
                                        <th><?php echo $this->lang->line("deposit_menu"); ?></th>
                                        <th><?php echo $this->lang->line("withdrawal_menu"); ?></th>
                                        <th><?php echo $this->lang->line("date_menu"); ?></th>
                                        <th><?php echo $this->lang->line("date_menu"); ?> & <?php echo $this->lang->line("time_menu"); ?></th>
                                       <!--  <th>Action</th> -->
                                    </thead>
                                   
                                    <tbody>
                                        <?php $no = 1; ?>
                                <?php foreach ($cash_transaction as $cashs): ?>
                                              <tr>
                                    <td><?php echo $no++; ?>.</td>
                                    <!-- <td><?php //echo $cashs->blanch_name; ?></td> -->
                                    <td><?php echo $cashs->empl_name; ?></td>
                                    <td><?php echo $cashs->f_name; ?> <?php echo $cashs->m_name; ?> <?php echo $cashs->l_name; ?></td>
                                    <td>    <?php if ($cashs->depost == TRUE) {
                                         ?>
                                        <?php echo number_format($cashs->depost); ?>
                                    <?php }elseif ($cashs->depost == FALSE) {
                                     ?>
                                     -
                                     <?php } ?></td>
                                    <td>
                                        <?php if ($cashs->withdraw == TRUE) {
                                         ?>
                                        <?php echo number_format($cashs->loan_aprov); ?>
                                    <?php }elseif ($cashs->withdraw == FALSE) {
                                     ?>
                                     -
                                     <?php } ?>
                                    </td>
                                    <td><?php echo $cashs->lecod_day; ?></td>
                                    <td><?php echo $cashs->time_rec; ?></td>
                                  <!--   <td>
                                        <?php //if ($cashs->depost == TRUE) {
                                         ?>
                                        <a href="<?php //echo base_url("admin/delete_depost_data/{$cashs->pay_id}"); ?>" class="btn btn-primary btn-sm"  onclick="return confirm('Are you sure?')" title="Adjust"><i class="icon-pencil"></i></a>
                                    <?php //}else{ ?>
                                        <?php //} ?>
                                    </td> -->
                                    </tr>

                                    <?php endforeach; ?>
                                   
                                    </tbody>
                                     <tr>
                                        <td><b><?php echo $this->lang->line("total_menu"); ?>:</b></td>
                                        <!-- <td></td> -->
                                        <td></td>
                                        <td></td>
                                        <td><b><?php echo number_format($sum_cashTransaction->total_deposit); ?></b></</td>
                                        <td><b><?php echo number_format($sum_cashTransaction->total_aprove); ?></b></td>
                                        <td></td>
                                        <td></td>
                                       <!--  <td></td> -->
                                    </tr>
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
                <h6 class="title" id="defaultModalLabel"><?php echo $this->lang->line("search_menu") ?> <?php echo $this->lang->line("today_cashtransaction_menu") ?></h6>
            </div>
            <?php echo form_open("oficer/filter_cashTransaction"); ?>
            <div class="modal-body">
                <div class="row clearfix">

                                <div class="col-md-6 col-6 ">
                                    <?php $date = date("Y-m-d"); ?>
                                    <span>*<?php echo $this->lang->line("from_menu") ?>:</span>
                                    <input type="date" name="from" autocomplete="off" value="<?php echo $date; ?>" class="form-control" required>
                                </div>
                                <div class="col-md-6 col-6 ">
                                    <span>*<?php echo $this->lang->line("to_menu") ?>:</span>
                                    <input type="date" name="to" autocomplete="off" value="<?php echo $date; ?>" class="form-control" required>
                                </div>
                                <input type="hidden" name="blanch_id" value="<?php echo $empl_data->blanch_id; ?>">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line("search_menu") ?></button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line("close_menu") ?></button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


