<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

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
                
                <div class="col-lg-9 col-md-12">
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
                                    <div class="body bg-info text-light">
                                        <h4><i class="icon-wallet"></i> <?php echo number_format($blanch_capital_circle->total_balanch_amount); ?></h4>
                                        <span><?php echo $this->lang->line("branch_account_menu"); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div id="total_revenue" class="ct-chart m-t-20"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12">
                    <div class="row clearfix">
                          <div class="col-lg-12 col-md-12">
                            <div class="card top_counter">
                                <div class="body">
                                    <div class="icon"><i class="fa fa-thumbs-o-up"></i> </div>
                                    <div class="content">
                                        <div class="text">Total Income</div>
                                        <h5 class="number"><?php echo number_format($total_non->total_nondeducted + $total_deducted_balance->total_deducted)?></h5>
                                    </div>
                                    <hr>
                                    <div class="icon"><i class="fa fa-smile-o"></i> </div>
                                    <div class="content">
                                        <div class="text">Total Expenses</div>
                                        <h5 class="number"><?php echo number_format($request_expences->total_exp); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="card top_counter">
                                <div class="body">
                                    <div class="icon"><i class="fa fa-thumbs-o-up"></i> </div>
                                    <div class="content">
                                        <div class="text">Total Defaul Loan</div>
                                        <h5 class="number"><?php echo number_format($total_remain->total_out); ?></h5>
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
                                        <h5 class="number"><?php echo $customer->num_rows(); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-lg-12 col-md-6">
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
                                        <h5 class="number"><?php echo $pendin->num_rows(); ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>







            <div class="row clearfix">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Today Statistics</h2>
                            <!-- <ul class="header-dropdown">
                                <li><a class="tab_btn" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Weekly">W</a></li>
                                <li><a class="tab_btn" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Monthly">M</a></li>
                                <li><a class="tab_btn active" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Yearly">Y</a></li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul> -->
                        </div>
                        <div class="body">
                            <!-- <div id="Visitors_chart" class="flot-chart m-b-20"></div> -->
                            <div class="row text-center">
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div id="Visitors_chart1" class="carousel slide" data-ride="carousel" data-interval="2000">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <a href=""><div class="body xl-salmon">
                                                    <?php $new_loan = $this->db->query("SELECT * FROM tbl_loans WHERE comp_id = '$comp_id' AND loan_status = 'open'"); ?>
                                                    <h6><?php echo $new_loan->num_rows(); ?></h6>
                                                    <span>Loan Request</span>
                                                </div></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div id="Visitors_chart2" class="carousel slide" data-ride="carousel" data-interval="2200">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <?php
                                      $ap = $this->db->query("SELECT * FROM tbl_loans WHERE comp_id = '$comp_id' AND loan_status = 'aproved'");
                                               ?>
                                               <a href=""><div class="body xl-parpl">
                                                    <h6><?php echo $ap->num_rows(); ?></h6>
                                                    <span>Aproved Loan</span>
                                                </div></a> 
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <a href=""><div class="body xl-salmon"> 
                                    <?php $dis = $this->db->query("SELECT * FROM tbl_loans WHERE comp_id = '$comp_id' AND loan_status = 'disbarsed'") ?>                                       
                                        <h6><?php echo $dis->num_rows(); ?></h6>
                                        <span>Loan Disbursed</span>
                                    </div></a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <a href=""><div class="body xl-parpl">
                                        <?php $date = date('Y-m-d'); ?>
                                    <?php $today_wi = $this->db->query("SELECT * FROM tbl_loans WHERE comp_id = '$comp_id' AND loan_status = 'withdrawal' AND date(loan_day) = '$date'"); ?>                                        
                                        <h6><?php echo $today_wi->num_rows(); ?></h6>
                                        <span>Today Loan Withdrawal</span>
                                    </div></a>
                                </div> 
                                 <div class="col-lg-4 col-md-4 col-6">
                                    <a href=""><div class="body xl-salmon">                                        
                                        <h6>8630000</h6>
                                        <span>Today Loan Pending</span>
                                    </div></a>
                                </div> 
                                 <div class="col-lg-4 col-md-4 col-6">
                                    <a href=""><div class="body xl-parpl">                                        
                                        <h6>8630000</h6>
                                        <span>Today Receivable</span>
                                    </div></a>
                                </div>
                                   <div class="col-lg-4 col-md-4 col-6">
                                    <a href=""><div class="body xl-salmon">                                        
                                        <h6>8630000</h6>
                                        <span>Today Received</span>
                                    </div></a>
                                </div>
                                   <div class="col-lg-4 col-md-4 col-6">
                                    <a href=""><div class="body xl-parpl">                                        
                                        <h6>10000000</h6>
                                        <span>Today Penart</span>
                                    </div></a>
                                </div>
                                   <div class="col-lg-4 col-md-4 col-6">
                                    <a href=""><div class="body xl-salmon">                                        
                                        <h6>8630000</h6>
                                        <span>Today Deducted Income</span>
                                    </div></a>
                                </div>
                                  <div class="col-lg-4 col-md-4 col-6">
                                    <a href=""><div class="body xl-parpl">                                        
                                        <h6>8630000</h6>
                                        <span>Today Non-Deducted Income</span>
                                    </div></a>
                                </div> 

                                  <div class="col-lg-4 col-md-4 col-6">
                                    <a href=""><div class="body xl-salmon">                                        
                                        <h6>8630000</h6>
                                        <span>Today Expenses</span>
                                    </div></a>
                                </div> 

                                 <div class="col-lg-4 col-md-4 col-6">
                                    <a href=""><div class="body xl-parpl">                                        
                                        <h6>8630000</h6>
                                        <span>Daily Report</span>
                                    </div></a>
                                </div> 

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Branch List<h2>
                        </div>
                        
                          <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>S/no.</th>
                                            <th>Branch Name</th>
                                            <th>Region</th>
                                            <th>Phone Number</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php $no = 1; ?>
                                         <?php foreach ($blanch as $blanchs): ?>
                                        <tr>
                                            <td><?php echo $no++; ?>.</td>
                                            <td><a href="javascript:;"><?php echo $blanchs->blanch_name; ?></a></td>
                                            <td><?php echo $blanchs->region_name; ?></td>
                                            <td><?php echo $blanchs->blanch_no; ?></td>
                                        </tr>

                                    <?php endforeach; ?>
                                      
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Customer history</h2>
                                    <ul class="header-dropdown">
                                        <li><a class="tab_btn" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Weekly">W</a></li>
                                        <li><a class="tab_btn" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Monthly">M</a></li>
                                        <li><a class="tab_btn active" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Yearly">Y</a></li>
                                        <li class="dropdown">
                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="javascript:void(0);">Action</a></li>
                                                <li><a href="javascript:void(0);">Another Action</a></li>
                                                <li><a href="javascript:void(0);">Something else</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <div id="patient_history" class="chartist"></div>
                                </div>
                            </div>
                        </div> 

                                              
                    </div>
                </div>
             
                <div class="col-lg-12">
                    <div class="card">
                         <div class="header">
                            <h2>Group List </h2>    
                             </div>
                          <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>S/no.</th>
                                            <th>Group Name</th>
                                            <th>Branch</th>
                                            <th>Loans</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
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