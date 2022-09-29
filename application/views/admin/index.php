<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>
<?php $comp_id = $this->session->userdata('comp_id'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">

                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a><?php echo $_SESSION['comp_name']; ?></h2>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("admin/index"); ?>"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("dashboard_menu"); ?></li>  

                        </ul>
                    </div>

                    <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                        <?php foreach ($account_capital as $account_capitals): ?>
                        <div class="bh_chart hidden-xs">
                            <div class="float-left m-r-15">
                                <small><?php echo $account_capitals->account_name; ?></small>
                                <h6 class="mb-0 mt-1"><i class="icon-wallet"></i><?php echo number_format($account_capitals->comp_balance); ?></h6>
                            </div>
                            
                        </div>
                       <?php endforeach; ?>
                       
                    </div>
                </div>
            </div>
           <?php if ($das = $this->session->flashdata('massage')): ?> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                                <div class="alert alert-dismisible alert-success"> <a href="" class="close">&times;</a> <?php echo $das;?> </div> 
                            </div> 
                        </div> 
                    <?php endif; ?>
            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $this->lang->line("revenue_menu"); ?></h2>
                            <ul class="header-dropdown">
                                <!-- <li><a class="tab_btn" href="javascript:void(0);" title="Weekly">W</a></li>
                                <li><a class="tab_btn" href="javascript:void(0);" title="Monthly">M</a></li>
                                <li><a class="tab_btn active" href="javascript:void(0);" title="Yearly">Y</a></li> -->
                              <!--   <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li> -->
                            </ul>

                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <div class="body bg-success text-light">
                                        <h4><i class="icon-wallet"></i><?php echo number_format($sum_comp_capital->total_comp_balance); ?></h4>
                                        <span><?php echo $this->lang->line("main_account_menu"); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="body bg-warning text-light">
                                        <h4><i class="icon-wallet"></i><?php echo number_format($principal_loan->loan_aproved); ?></h4>
                                        <span><?php echo $this->lang->line("disburse_loan_menu"); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="body bg-primary text-light">
                                        <h4><i class="icon-wallet"></i><?php echo number_format($total_expect->loan_interest); ?></h4>
                                        <span><?php echo $this->lang->line("expectation_menu"); ?></span>
                                    </div>
                                </div>
                                 <div class="col-md-3">

                                <?php $loan_out = $this->queries->get_total_outStandcomp($comp_id); ?>
                                <?php //print_r($loan_out); ?>
                                    <div class="body bg-danger text-light">
                                        <h4><i class="icon-wallet"></i> <?php echo number_format($loan_out->total_remain); ?></h4>
                                        <span><?php echo $this->lang->line("outstand_menu"); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div id="total_revenue" class="ct-chart m-t-20"></div>
                        </div>
                    </div>
                </div>

            

                <!-- <div class="col-lg-12 col-md-12">
                    <div class="row clearfix">
                          <div class="col-lg-4 col-6">
                            <div class="card top_counter">
                                <div class="body">
                                    <div class="icon"><i class="fa fa-thumbs-o-up"></i> </div>
                                    <div class="content">
                                        <div class="text">Total Income</div>
                                        <h5 class="number"><?php //echo number_format($total_non->total_nondeducted + $total_deducted_balance->total_deducted)?></h5>
                                    </div>
                                    <hr>
                                    <div class="icon"><i class="fa fa-smile-o"></i> </div>
                                    <div class="content">
                                        <div class="text">Total Expenses</div>
                                        <h5 class="number"><?php //echo number_format($request_expences->total_exp); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="card top_counter">
                                <div class="body">
                                    <div class="icon"><i class="fa fa-thumbs-o-up"></i> </div>
                                    <div class="content">
                                        <div class="text">Total Defaul Loan</div>
                                        <h5 class="number"><?php //echo number_format($total_remain->total_out); ?></h5>
                                    </div>
                                    <hr>
                            <?php 
                            $comp_id = $this->session->userdata('comp_id');
                            $customer = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id'");
                            $male = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND gender = 'male'");
                            $female = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND gender = 'female'");
                            $active = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND customer_status = 'open'");
                            $pendin = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND customer_status = 'pending'");
                            $closed = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND customer_status = 'close'");
                             ?>
                                    <div class="icon"><i class="fa fa-smile-o"></i> </div>
                                    <div class="content">
                                        <div class="text">Total Customer</div>
                                        <h5 class="number"><?php //echo $customer->num_rows(); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-lg-4 col-12">
                            <div class="card top_counter">
                                <div class="body">
                                    <div id="top_counter3" class="carousel vert slide" data-ride="carousel" data-interval="2300">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="icon"><i class="fa fa-eye"></i> </div>
                                                <div class="content">
                                                    <div class="text">Male</div>
                                                    <h5 class="number"><?php echo $male->num_rows(); ?></h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="icon"><i class="fa fa-eye"></i> </div>
                                                <div class="content">
                                                    <div class="text">Female</div>
                                                    <h5 class="number"><?php echo $female->num_rows(); ?></h5>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="icon"><i class="fa fa-eye"></i> </div>
                                                <div class="content">
                                                    <div class="text">Active</div>
                                                    <h5 class="number"><?php echo $active->num_rows() ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <hr>
                                    <div class="icon"><i class="fa fa-university"></i> </div>
                                    <div class="content">
                                        <div class="text">Pending</div>
                                        <h5 class="number"><?php //echo $pendin->num_rows(); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div> -->
            </div>

             <div class="row clearfix w_social3">
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/customer"); ?>"><div class="card facebook-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/user.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color: black;">Customer </div>
                            <!-- <div class="number">123</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/loan_application"); ?>"><div class="card instagram-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/request.jpg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;">Loan Aplication</div>
                            <!-- <div class="number">231</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/teller_dashboard") ?>"><div class="card twitter-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/deposit.jpg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text"style="color:black;">Deposit</div>
                            <!-- <div class="number">31</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/teller_dashboard") ?>"><div class="card google-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/withdrawal.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;">Withdrawal</div>
                            <!-- <div class="number">254</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/daily_report"); ?>"><div class="card linkedin-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/daily.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black">Daily Report</div>
                            <!-- <div class="number">2510</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/expnses_requisition_form"); ?>"><div class="card behance-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/expenses.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black">Expenses</div>
                            <!-- <div class="number">121</div> -->
                        </div>
                    </div></a>
                </div>
            </div>



              <div class="row clearfix w_social3">
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/cash_transaction"); ?>">
                        <div class="card facebook-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/transaction.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;">Cash Transaction</div>
                            <!-- <div class="number">123</div> -->
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/loan_pending_time"); ?>"><div class="card instagram-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/default.jpeg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;">Loan Pending(40)</div>
                            <!-- <div class="number">231</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/get_today_receivable"); ?>">
                        <div class="card twitter-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/receivable.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;">Receivable</div>
                            <!-- <div class="number">31</div> -->
                        </div>
                    </div></a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/today_received"); ?>">
                        <div class="card google-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/received.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;">Received(10) &nbsp;&nbsp;&nbsp;</div>
                            <!-- <div class="number" style="color:green;">1,000,000,000</div> -->
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/get_loan_withdrawal_data"); ?>">
                        <div class="card linkedin-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/withdrawal.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;">Loan Withdrawal</div>
                            <!-- <div class="number">2510</div> -->
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/oustand_loan"); ?>">
                        <div class="card behance-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/default.jpeg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;">Outstand Loan(10)</div>
                            <!-- <div class="number">121</div> -->
                        </div>
                    </div>
                    </a>
                </div>
            </div>


             <div class="row clearfix w_social3">
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/loan_pending"); ?>">
                        <div class="card facebook-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/aplication.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;">Loan Requested(1)</div>
                            <!-- <div class="number">123</div> -->
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/disburse_loan"); ?>">
                        <div class="card instagram-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/aproveds.jpg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black">Loan Aproved(1)</div>
                            <!-- <div class="number">231</div> -->
                        </div>
                    </div>
                </a>
                </div>
               
               

                <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/deposit_stoo"); ?>"><div class="card twitter-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/stoo.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black">Store</div>
                            <!-- <div class="number">1</div> -->
                        </div>
                    </div></a>
                </div>

                  <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/income_dashboard"); ?>">
                        <div class="card twitter-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/income.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;">Income</div>
                            <!-- <div class="number">31</div> -->
                        </div>
                    </div>
                    </a>
                </div>
                

                 <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/loan_rejected"); ?>">
                        <div class="card twitter-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/rejected.jpg" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;">Rejected Loan</div>
                            <!-- <div class="number">31</div> -->
                        </div>
                    </div>
                    </a>
                </div>
                 <div class="col-lg-2 col-md-4 col-6">
                    <a href="<?php //echo base_url("oficer/saving_deposit"); ?>">
                        <div class="card twitter-widget">
                        <div class="icon"><img src="<?php echo base_url() ?>assets/img/saving.png" style="width: 44px; height: 44px;"></div>
                        <div class="content">
                            <div class="text" style="color:black;">Saving Dposit</div>
                            <!-- <div class="number">31</div> -->
                        </div>
                    </div>
                    </a>
                </div>

        </div>
    </div>
    
</div>

<?php include('incs/footer.php'); ?>