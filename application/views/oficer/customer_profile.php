<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

    <div id="main-content" class="profilepage_2 blog-page">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("admin/index"); ?>"><i class="icon-home"></i></a></li>
                            
                            <li class="breadcrumb-item active">Customer</li>
                            <li class="breadcrumb-item active">Customer Profile</li>
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
                     <?php if ($das = $this->session->flashdata('error')): ?> 
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="alert alert-dismisible alert-danger"> <a href="" class="close">&times;</a> 
                                    <?php echo $das;?> </div> 
                            </div> 
                        </div> 
                    <?php endif; ?>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">

                    <div class="card">
                        <div class="row profile_state">
                            <div class="col-lg-6 col-6">
                                <div class="body">
                                    <i class="fa fa-thumbs-up"></i>
                                     <div class="profile-image"> <img src="<?php echo base_url().'assets/img/male.jpeg'; ?>" class="rounded-circle" alt="customer image" style="width: 135px;height: 135px;">
                                      </div>
                                    <small><?php echo $customer_profile->f_name; ?> <?php echo $customer_profile->m_name; ?> <?php echo $customer_profile->l_name; ?></small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="body">
                                    <i class="fa fa-star"></i>
                                   <div class="profile-image"> <img src="<?php echo base_url().'assets/img/sig.jpg'; ?>" class="rounded-circle" alt="Gualantors image" style="width: 135px;height: 135px;">
                                      </div>
                                    <small>Gualantors Picture</small>
                                </div>
                            </div>
                           
                            
                        </div>
                    </div>

                  

                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs-new">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Basic">Basic</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Account">Guarantors </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#General">All Loans</a></li>
                                <li class="nav-item"><a class="nav-link"href="<?php echo base_url("oficer/all_customer"); ?>">Back</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content padding-0">

                        <div class="tab-pane active" id="Basic">
                            <div class="card">
                                <div class="body">
                                    <h6>Basic Information</h6>
                            <?php echo form_open("oficer/update_customer_info/{$customer_profile->customer_id}"); ?>
                            <div class="row">
                            <div class="col-lg-4 col-6">
                            <span>First Name:</span>
                            <input type="text" name="f_name" value="<?php echo $customer_profile->f_name; ?>" placeholder="First name" autocomplete="off" class="form-control input-sm" required>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <span>Middle name:<spanl>
                                    <input type="text" name="m_name" value="<?php echo $customer_profile->m_name; ?>" placeholder="Middle name" autocomplete="off" class="form-control input-sm" required>
                                </div>
                                
                                <div class="col-lg-4 col-6">
                                    <span>Last name:</span>
                                    <input type="text" name="l_name" placeholder="Last name" value="<?php echo $customer_profile->l_name; ?>" autocomplete="off" class="form-control input-sm" required>
                                </div>

                                <div class="col-lg-4 col-6">
                                    <span>Branch:</span>
                                <select type="number" name="blanch_id" class="form-control select2 input-sm" id="blanch" required class="form-control input-sm">
                                <option value="<?php echo $customer_profile->blanch_id ?>"><?php echo $customer_profile->blanch_name; ?></option>
                                <?php foreach ($blanch as $blanchs): ?>
                                <option value="<?php echo $blanchs->blanch_id; ?>"><?php echo $blanchs->blanch_name; ?></option>
                                <?php endforeach;?>
                            </select>
                                </div>

                                <div class="col-lg-4 col-6">
                                    <span>Employee:</span>
                                <select type="number" name="empl_id" class="form-control select2 input-sm" id="empl" required class="form-control input-sm">
                                <option value="<?php echo $customer_profile->empl_id; ?>"><?php echo $customer_profile->empl_name; ?></option>
                                
                            </select>
                                </div>
                        
                                <div class="col-lg-4 col-6">
                                    <span>Gender:</span>
                                <select type="text" name="gender" class="form-control select2 input-sm" required class="form-control input-sm">
                                <option value="<?php echo $customer_profile->gender; ?>"><?php echo $customer_profile->gender; ?></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <span>Date of Birth:</span>
                            <input type="date" name="date_birth" value="<?php echo $customer_profile->date_birth; ?>" onchange="getDate(this.value)" placeholder="Date of Birth" autocomplete="off" class="form-control input-sm" required>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <span>Year:</span>
                            <input type="" id="age" name="age" value="<?php echo $customer_profile->age; ?>" readonly class="form-control input-sm" value="" required>
                                </div>
                                    <div class="col-lg-4 col-6">
                                    <span>Phone Number:</span>
                            <input type="number" name="phone_no" value="<?php echo $customer_profile->phone_no; ?>" placeholder="Eg,7538, 6283" autocomplete="off" class="form-control input-sm" required >
                                </div>
                             <!--        <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">*Region:</label>
                            <select type="number" name="region_id" class="form-control select2 input-sm" required>
                                <option value="">Select Region</option>
                                <?php //foreach ($region as $regions): ?>
                                <option value="<?php //echo $regions->region_id; ?>"><?php //echo $regions->region_name; ?></option>
                                <?php //endforeach;?>
                            </select>
                                </div> -->
                                <input type="hidden" name="region_id" value="1">
                                    <div class="col-lg-4 col-6">
                                    <span>District:</span>
                            <input type="text" name="district" value="<?php echo $customer_profile->district; ?>" placeholder="district" autocomplete="off" class="form-control input-sm" required>
                                </div>
                                    <div class="col-lg-4 col-6">
                                    <span>Ward:</span>
                            <input type="text" name="ward" value="<?php echo $customer_profile->ward; ?>" placeholder="Ward" autocomplete="off" class="form-control input-sm" required>
                                </div>
                                        <div class="col-lg-4 col-6">
                                    <span>Street:</span>
                            <input type="text" name="street" value="<?php echo $customer_profile->street; ?>" placeholder="street" autocomplete="off" class="form-control input-sm" required>
                                </div>
                                    
                                    </div>
                                    <br>
                                    <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Update</button> &nbsp;
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="Account">
                            <div class="card">
                                <div class="body">
                                
                <div class="col-lg-12">
                    <div class="">
                         <div class="header">
                            <h2>Gualantors List </h2>    
                             </div>
                          <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>S/No.</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Phone Number</th>
                                            <th>Relationship</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($sponser as $sponsers): ?>
                                        <tr>
                                            <td><?php echo $no++; ?>.</td>
                                            <td><?php echo $sponsers->sp_name; ?></td>
                                            <td><?php echo $sponsers->sp_mname; ?></td>
                                            <td><?php echo $sponsers->sp_lname; ?></td>
                                            <td><?php echo $sponsers->sp_phone_no; ?></td>
                                             <td><?php echo $sponsers->sp_relation; ?></td>
                                        </tr>
  
                                         <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div> 
                                  
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="General">
                <div class="body">
                <div class="col-lg-12">
                    <div class="card">
                         <div class="header">
                            <h2>All Loans </h2>    
                             </div>
                          <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom">
                                    <thead class="thead-primary">
                                        <tr>
                                        <th>S/no.</th>
                                        <th>Loan Ac</th>
                                        <th>Loan Product</th>
                                        <th>Loan Interest</th>
                                        <th>Loan Withdrawal</th>
                                        <th>Principal + interest</th>
                                        <th>Duration Type</th>
                                        <th>Number of Repayment</th>
                                        <th>Restoration</th>
                                        <th>Status</th>
                                        <th>Withdrawal Date</th>
                                        <th>End Date</th>
                                       <!--  <th>Action</th> -->
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       <?php $no = 1 ?>        
                                <?php foreach($loan_customer as $loan_aproveds): ?>
                                        <tr>
                                    <td><?php echo $no++; ?>.</td>
                                    <td><?php echo $loan_aproveds->loan_code; ?></td>
                                    
                                    <td><?php echo $loan_aproveds->loan_name ?></td>
                                    <td><?php echo $loan_aproveds->interest_formular; ?>%</td>
                                    <td><?php echo number_format($loan_aproveds->loan_aprove); ?></td>
                                    <td><?php echo number_format($loan_aproveds->loan_int); ?></td>
                                    
                                    <td>
                               <?php if ($loan_aproveds->day == 1) {
                                                 echo "Daily";
                                             ?>
                                            <?php }elseif($loan_aproveds->day == 7){
                                                  echo "Weekly";
                                             ?>
                                            
                                        <?php }elseif($loan_aproveds->day == 30 || $loan_aproveds->day == 31 || $loan_aproveds->day == 29 || $loan_aproveds->day == 28){
                                                echo "Monthly"; 
                                            ?>
                                            <?php } ?>
                                    </td>
                    
                                        
                                <td><?php echo $loan_aproveds->session; ?> </td> 
                                <td><?php echo number_format($loan_aproveds->restration); ?> </td>
                                <td>
                                    <?php if ($loan_aproveds->loan_status == 'open') {
                                         ?>
                                        <a href="javascript:;" class="badge badge-warning">Pending</a>
                                        <?php }elseif($loan_aproveds->loan_status == 'aproved'){ ?>
                                          <a href="javascript:;" class="badge badge-info">Aproved</a>
                                            <?php }elseif($loan_aproveds->loan_status == 'withdrawal'){ ?>
                                             <a href="javascript:;" class="badge badge-primary">Active</a>
                                                <?php }elseif($loan_aproveds->loan_status == 'done'){ ?>
                                                <a href="javascript:;" class="badge badge-success">Done</a>
                                                    <?php }elseif ($loan_aproveds->loan_status == 'out') { ?>
                                            <a href="javascript:;" class="badge badge-danger">Default</a>
                                                        
                                                    <?php }elseif($loan_aproveds->loan_status == 'disbarsed'){ ?> 
                                                <a href="javascript:;" class="badge badge-secondary">Disbursed</a>
                                                <?php } ?>
                                </td> 
                                <td><?php echo $loan_aproveds->loan_stat_date; ?> </td>
                                <td><?php echo substr($loan_aproveds->loan_end_date, 0,10); ?></td> 
                                 </tr>

                            <?php endforeach; ?>
                               
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
            </div>
        </div>
    </div>

</div>

<?php include('incs/footer.php'); ?>

<script>
    function getDate(data){
  let now = new Date();
  let bod = (new Date(data));

  let age = now.getFullYear() - bod.getFullYear();
   let _age = document.querySelector("#age");
   _age.value = age;
 //alert(age)
}
</script>


<script>
$(document).ready(function(){
$('#blanch').change(function(){
var blanch_id = $('#blanch').val();
//alert(blanch_id)
if(blanch_id != ''){

$.ajax({
url:"<?php echo base_url(); ?>oficer/fetch_employee_blanch",
method:"POST",
data:{blanch_id:blanch_id},
success:function(data)
{
$('#empl').html(data);
//$('#district').html('<option value="">All</option>');
}
});
}
else
{
$('#empl').html('<option value="">Select Employee</option>');
//$('#district').html('<option value="">All</option>');
}
});



// $('#customer').change(function(){
// var customer_id = $('#customer').val();
//  //alert(customer_id)
// if(customer_id != '')
// {
// $.ajax({
// url:"<?php echo base_url(); ?>admin/fetch_data_vipimioData",
// method:"POST",
// data:{customer_id:customer_id},
// success:function(data)
// {
// $('#loan').html(data);
// //$('#malipo_name').html('<option value="">select center</option>');
// }
// });
// }
// else
// {
// $('#loan').html('<option value="">Select Active loan</option>');
// //$('#malipo_name').html('<option value="">chagua vipimio</option>');
// }
// });

// $('#social').change(function(){
//  var district_id = $('#social').val();
//  if(district_id != '')
//  {
//   $.ajax({
//    url:"<?php echo base_url(); ?>user/fetch_data_malipo",
//    method:"POST",
//    data:{district_id:district_id},
//    success:function(data)
//    {
//     $('#malipo_name').html(data);
//     //$('#malipo').html('<option value="">chagua malipo</option>');
//    }
//   });
//  }
//  else
//  {
//   //$('#vipimio').html('<option value="">chagua vipimio</option>');
//   $('#malipo_name').html('<option value="">chagua vipimio</option>');
//  }
// });


});
</script>