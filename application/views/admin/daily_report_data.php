
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $compdata->comp_name; ?> |DAILY REPORT
 </title>
</head>
<body>

<div id="container">
  <style>
    .display{
      display: flex;
      
    }
  </style>
     <style>
             .c {
               text-transform: uppercase;
               }
                
      </style>
<table  style="border: none">
<tr style="border: none">
<td style="border: none">


<div style="width: 20%;">
<img src="<?php echo base_url().'assets/img/'.$compdata->comp_logo ?>" style="width: 100px;height: 80px;">
</div> 

</td>
<td style="border: none">
<div class="pull">
<p style="font-size:14px;" class="c"><b> <?php echo $compdata->comp_name; ?></b><br>
<b><?php echo $compdata->adress; ?></b> <br>
<?php $day = date("d-m-Y"); ?>
</p>
<p style="font-size:12px;text-align:center;" class="c">ALL BRANCH - DAILY REPORT <?php echo $day; ?></p>
<!-- <p style="font-size:12px;text-align:center;" class="c"> <?php //echo $from; ?></p>
 --></div>
</td>
</tr>
</table>

    
 
  <div id="body">
  <style> 
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 1px;
}

tr:nth-child(even) {
  background-color: ;
}

</style>
</head>
<body>
 <hr>


                                    <table>
                                    <thead>
                                        <tr>    <!-- <th>Branch Name</th> -->
                                                <th>Maelezo</th>
                                                <th>Kiasi</th>
                                        </tr>

                                    </thead>
                                   
                                    <tbody>
                                    <tr>
                                   
                                    <td>ONGEZEKO KUTOKA AKAUNTI KUU</td>
                                    
                                    <td><?php echo number_format(@$cash_transfor->total_float); ?></td>                                                       
                                    </tr>
                                     <tr>
                                    <td>ONGEZEKO KUTOKA FOMU & FAINI</td>
                                    
                                    <td><?php echo number_format(@$income_blanch_blanch->total_transaction); ?></td>                                                     
                                    </tr>
                                    <tr>
                                    <td>ONGEZEKO KUTOKA MADENI SUGU NDANI YA MFUMO</td>
                                    <td>
                                        <?php echo number_format(@$default_insystem->total_trans_in); ?> / Makato(<?php echo number_format(@$default_insystem->total_fee_in); ?>)
                                    </td>
                                     </tr> 
                                     <tr>
                                    <td>ONGEZEKO KUTOKA MADENI SUGU NJE YA MFUMO</td>
                                    <td><?php echo number_format(@$default_outsystem->total_trans_out) ?> / Makato(<?php echo number_format(@$default_outsystem->total_fee_out); ?>)</td>
                                     </tr>                                                    
                                    

                                    <tr>
                                    <td>JANA</td>
                                    
                                    <td><?php echo number_format(@$yesterday_balance->total_yesterday_Balance); ?></td>                                                       
                                    </tr>

                                     <tr>
                                    <td>LEO</td>
                                    
                                    <td><?php echo number_format(@$today_deposit->total_deposit); ?></td>                                                       
                                    </tr>
                                      <tr>
                                    <td>BAKI</td>
                                    
                                    <td><?php echo number_format(@$remain_depost->total_restratio_today); ?></td>                                                       
                                    </tr>

                                     <tr>
                                    <td>JUMLA</td>
                                    
                                    <td><?php echo number_format(@$cash_transfor->total_float + @$income_blanch_blanch->total_transaction + @$default_insystem->total_trans_in + @$default_outsystem->total_trans_out + @$yesterday_balance->total_yesterday_Balance + @$today_deposit->total_deposit) ?></td> 
                                    <!-- <p>@$total_today_cash->today_cash</p>                                                       -->
                                    </tr>
                                        <tr>
                                    <td>GAWA</td>
                                    
                                    <td><?php echo number_format(@$loanwith->total_loan_with); ?></td>                                                       
                                    </tr>
                                       <tr>
                                    <td>CODY NO</td>
                                    
                                    <td><?php echo number_format(@$loanwith->total_loan_int - @$loanwith->total_loan_with); ?></td>                                                       
                                    </tr>
                                        <tr>
                                    <td>DOUBLE</td>
                                    
                                    <td><?php echo number_format(@$prepaid->total_prepaid); ?></td>                                                       
                                    </tr>
                                    <tr>
                                    <td>STOO</td>
                                    
                                    <td><?php echo number_format(@$stoo->total_stoo); ?></td>                                                      
                                    </tr>
                                    <?php foreach ($blanch_acount as $acounts): ?>
                                    <tr>
                                    <td>LALA <?php echo $acounts->account_name; ?></td>
                                    <td><?php echo number_format($acounts->total_blanch_comp); ?></td>                                                       
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                    <td>AKIBA AMANA</td>
                                    
                                    <td><?php echo number_format(@$saving_deposit->total_amount_saving); ?></td>                                                      
                                    </tr>
                                    <tr>
                                        <td><b>LALA JUMLA</b></td>
                                        <td><b><?php echo number_format(@$balance_blanch->today_cash); ?></b></td>
                                    </tr>
                                     
                                     <tr>
                                      <td style="text-align:center;"><b>FOMU & FAINI</b></td> 
                                      <td></td>      
                                     </tr>
                                      <tr>
                                          <td>JANA FOMU</td>
                                          <td><?php echo number_format(@$deduct_day_balance->total_balance_deduct); ?></td>
                                      </tr>
                                      <tr>
                                          <td>JANA FAINI</td>
                                          <td><?php echo number_format(@$non_balance_comp->total_non); ?></td>
                                      </tr>

                                     <tr>
                                    <td>JUMLA JANA FOMU & FAINI</td>
                                    <td><?php echo number_format(@$income_balance->total_deduction); ?></td>                                                       
                                    </tr>
                                    
                                    <tr>
                                        <td>LEO FOMU</td>
                                        <td><?php echo number_format(@$today_deducted->total_deductedtoday); ?></td>
                                    </tr>
                                    <tr>
                                        <td>LEO FAINI</td>
                                        <td><?php echo number_format(@$non_deducted_comp->total_nondata); ?></td>
                                    </tr>
                                    <tr>
                                    <td>JUMLA LEO FOMU & FAINI</td>
                                    <td><?php echo number_format(@$today_deducted->total_deductedtoday + @$non_deducted_comp->total_nondata); ?></td>                                                       
                                    </tr>

                                    <tr>
                                    <td><b>JUMLA FOMU & FAINI</b></td>
                                    <td><b><?php echo number_format(@$income_balance->total_deduction + @$today_deducted->total_deductedtoday + @$non_deducted_comp->total_nondata); ?></b></td>                                                       
                                    </tr>

                                     <tr>
                                      <td style="text-align:center"><b>MATUMIZI</b></td> 
                                      <td></td>      
                                     </tr>
                                     <?php if ($expenses_comp): ?>
                                    <?php foreach ($expenses_comp as $more_expensess): ?>
                                    <tr>
                                    <td><?php echo $more_expensess->ex_name; ?></td>
                                    <td><?php echo number_format($more_expensess->total_expenses); ?></td>                                                   
                                    </tr>
                                     <?php endforeach; ?>
                                 <?php else: ?>
                                    <tr>
                                        <td style="color:red;">Hakuna Matumizi</td>
                                        <td style="color:red;">0.00</td>
                                    </tr>
                                     <?php endif ?>

                                    <tr>
                                    <td>KOPESHA</td>
                                    <td><?php echo number_format($today_transaction_income->total_incTrans) ?></td>                                                     
                                    </tr>

                                    <tr>
                                    <td><b>JUMLA YA MATUMZI</b></td>
                                    <td><b><?php echo number_format($total_expenses_comp->tota_expes + $today_transaction_income->total_incTrans); ?></b></td>                                                       
                                    </tr>

                                    <tr>
                                    <td><b>LALA FAINI & FOMU</b></td>
                                    <td><b><?php echo number_format($total_lala_income->total_incLala); ?></b></td>                                                       
                                    </tr>

                                     <tr>
                                      <td style="text-align:center"><b>WATEJA</b></td> 
                                      <td></td>      
                                     </tr>

                                    <tr>
                                    <td>JUMALA YA WATEJA</td>
                                    <?php $comp_id = $this->session->userdata('comp_id'); ?>
                                    <?php $customer = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id'"); ?>
                                    <td><?php echo $customer->num_rows(); ?></td>                                                       
                                    </tr>

                                    <tr>
                                    <td>WATEJA HAI</td>
                                    <?php $customer_active = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND customer_status = 'open'"); ?>
                                    <td><?php echo $customer_active->num_rows(); ?></td>                                                       
                                    </tr>
                                    <tr>
                                    <td>NJE YA MAKATABA</td>
                                    <?php $customer_out = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND customer_status = 'out'"); ?>
                                    <td><?php echo $customer_out->num_rows(); ?></td>                                                       
                                    </tr>
                                     </tr>
                                    <tr>
                                    <td>WALIOLETA</td>
                                   <?php $date = date("Y-m-d"); ?>
                                    <?php $customer_deposit = $this->db->query("SELECT * FROM tbl_loans WHERE comp_id = '$comp_id'AND date_show = '$date' AND dep_status = 'close'"); ?>
                                   
                                    <td><?php echo $customer_deposit->num_rows(); ?></td>                                                       
                                    </tr>

                                     <tr>
                                    <td>WALIOLAZA</td>
                                    <?php //$date = date("Y-m-d"); ?>
                                    <?php $loan_not_dep = $this->db->query("SELECT * FROM tbl_loans WHERE comp_id = '$comp_id'AND date_show = '$date' AND dep_status = 'open'"); ?>
                                    <td><?php echo  $loan_not_dep->num_rows()?></td>                                                       
                                    </tr>
                                    <tr>
                                    <td>WATEJA WAPYA</td>

                                    <?php $customer_new = $this->db->query("SELECT * FROM tbl_customer WHERE comp_id = '$comp_id' AND reg_date = '$date'"); ?>
                                    <td><?php echo $customer_new->num_rows(); ?></td>                                                       
                                    </tr>

                                    <!--  <tr>
                                    <td>LALA NJE</td>
                                    <td><?php //echo number_format($today_recevable->total_restration); ?></td>                                                       
                                    </tr> -->
                         
                                     <tr>
                                      <td style="text-align:center"><b>MADENI SUGU NDANI YA MFUMO</div></td> 
                                      <td></td>      
                                     </tr>

                                     <tr>
                                    <td>JANA</td>
                                    <td><?php echo number_format(@$yester_day_out->total_outbalance); ?></td>                                                       
                                    </tr>
                                    <tr>
                                    <td>LEO</td>
                                    <td><?php echo number_format(@$today_out_deposit->total_out_dep); ?></td>                                                       
                                    </tr>
                                     <tr>
                                    <td>BAKI</td>
                                    <td><?php echo number_format($remain_deposit->total_out_rem); ?></td>                                                       
                                    </tr>
                                    <tr>
                                    <td><b>JUMLA</b></td>
                                    <td><b><?php echo number_format(@$yester_day_out->total_outbalance + @$today_out_deposit->total_out_dep); ?></b></td>                                                       
                                    </tr>
                                    <tr>
                                    <td>KOPESHA</td>
                                    <td><?php echo number_format(@$kopesha_out->total_trans_in + @$kopesha_out->total_fee_in); ?></td>                                                       
                                    </tr>
                                    <?php foreach ($account_out_balance as $account_out_balances): ?>
                                    <tr>
                                    <td>LALA <?php echo $account_out_balances->account_name; ?></td>
                                    <td><?php echo number_format($account_out_balances->total_outbalanceIn); ?></td>                                                       
                                    </tr>
                                    <?php endforeach; ?>

                                    <tr>
                                    <td><b>LALA JUMLA</b></td>
                                    <td><b><?php echo number_format($out_lalain->total_out_lala); ?></b></td>                                                       
                                    </tr>



                                    <tr>
                                      <td style="text-align:center"><b>MADENI SUGU NJE YA MFUMO</b></td> 
                                      <td></td>      
                                     </tr>

                                     <tr>
                                    <td>JANA</td>
                                    <td><?php echo number_format(@$outsystem_yesterday->total_outsystem); ?></td>                                                       
                                    </tr>
                                    <tr>
                                    <td>LEO</td>
                                    <td><?php echo number_format(@$total_njeleo->total_out_today); ?></td>                                                       
                                    </tr>
                                     <tr>
                                    <td>BAKI</td>
                                    <td><?php echo number_format(@$out_system_total->total_amount_njeyamfumo - @$total_deposit_out->total_out); ?></td>                                                       
                                    </tr>
                                    <tr>
                                    <td><b>JUMLA</b></td>
                                    <td><b><?php echo number_format(@$outsystem_yesterday->total_outsystem + @$total_njeleo->total_out_today); ?></b></td>                                                       
                                    </tr>
                                    <tr>
                                    <td>KOPESHA</td>
                                    <td><?php echo number_format(@$total_kopesha_out->total_trans_out + @$total_kopesha_out->total_fee_out) ?></td>                                                       
                                    </tr>
                                    <?php foreach ($nje_account as $nje_accounts): ?>
                                    <tr>
                                    <td>LALA <?php echo $nje_accounts->account_name; ?></td>
                                    <td><?php echo number_format($nje_accounts->amount_receive); ?></td>                                                       
                                    </tr>
                                    <?php endforeach; ?>

                                    <tr>
                                    <td><b>LALA JUMLA</b></td>
                                    <td><b><?php echo number_format(@$total_out_system); ?></b></td>                                                       
                                    </tr>




                                        
                                        
                                    </tbody>
                                </table>

  </div>

</div>

</body>
</html>




