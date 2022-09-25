
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $compdata->comp_name; ?> | CASH TRANSACTION REPORT</title>
</head>
<body>

<div id="container">
<div style='width: 100%;align-items: center; display: flex;justify-content:space-between;flex-direction: row;'>
</div>
<style>
.pull{
text-align: center;
/*  margin-top: 100px;
margin-bottom: 0px;
margin-right: 150px;
margin-left: 80px;*/

}
</style>
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

<!-- <div class="pull">
<img src="<?php //echo base_url().'assets/img/'.$compdata->comp_logo ?>" style="width: 50px;height: 50px;">
<p style="font-size:14px;" class="c"> <?php //echo $compdata->comp_name; ?><br>
<?php //echo $compdata->adress; ?> <br>
<?php //$day = date("d-m-Y"); ?>
</p>
<p style="font-size:12px;">BRANCH LIST</p>
</div>  -->


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
<?php if ($blanch_data == FALSE) {
 ?>
 <p style="font-size:12px;text-align:center;" class="c">ALL BRANCH -EXPENSES REPORT From: <?php echo $from; ?> To: <?php echo $to; ?></p>
<?php }else{ ?>
<p style="font-size:12px;text-align:center;" class="c"><?php echo $blanch_data->blanch_name ?> -CASH TRANSACTION REPORT From: <?php echo $from; ?> To: <?php echo $to; ?></p>
<?php } ?>
</div>
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
padding: 2px;
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
                                              <tr>
                                                <th>Branch</th>
                                                 <th>Employee</th>
                                                <th>Customer Name</th>
                                                <th>Deposit</th>
                                                <th>Withdrawal</th>
                                                <th>Date</th>
                                                <th>Date & Time</th>
                                                    
                                                    
                                                 </tr>
                                                 <?php foreach ($data_blanch as $cashs): ?>
                                              <tr>

                                    <td><?php echo $cashs->blanch_name; ?></td>
                                    <td><?php //echo $cashs->empl_name; ?></td>
                                    <td><?php //echo $cashs->f_name; ?> <?php //echo $cashs->m_name; ?> <?php //echo $cashs->l_name; ?></td>
                                    <td>    <?php //if ($cashs->depost == TRUE) {
                                         ?>
                                        <?php //echo number_format($cashs->depost); ?>
                                    <?php //}elseif ($cashs->depost == FALSE) {
                                     ?>
                                     
                                     <?php //} ?></td>
                                    <td>
                                        <?php //if ($cashs->withdraw == TRUE) {
                                         ?>
                                        <?php //echo number_format($cashs->loan_aprov); ?>
                                    <?php //}elseif ($cashs->withdraw == FALSE) {
                                     ?>
                                     
                                     <?php //} ?>
                                    </td>
                                    <td><?php //echo $cashs->lecod_day; ?></td>
                                    <td><?php //echo $cashs->time_rec; ?></td>
                                    </tr>

                         <?php $blanch_customer = $this->queries->get_blanchTransaction_employee($from,$to,$cashs->blanch_id); ?>

                         <?php //print_r($blanch_customer); ?>
                         <?php foreach ($blanch_customer as $blanch_customers): ?>
                                              <tr>

                                    <td><?php //echo $cashs->blanch_name; ?></td>
                                    <td><?php echo $blanch_customers->empl_name; ?></td>
                                    <td><?php echo $blanch_customers->f_name; ?> <?php echo $blanch_customers->m_name; ?> <?php echo $blanch_customers->l_name; ?></td>
                                    <td>    <?php if ($blanch_customers->depost == TRUE) {
                                         ?>
                                        <?php echo number_format($blanch_customers->depost); ?>
                                    <?php }elseif ($blanch_customers->depost == FALSE) {
                                     ?>
                                     -
                                     <?php } ?></td>
                                    <td>
                                        <?php if ($blanch_customers->withdraw == TRUE) {
                                         ?>
                                        <?php echo number_format($blanch_customers->loan_aprov); ?>
                                    <?php }elseif ($blanch_customers->withdraw == FALSE) {
                                     ?>
                                     -
                                     <?php } ?>
                                    </td>
                                    <td><?php echo $blanch_customers->lecod_day; ?></td>
                                    <td><?php echo $blanch_customers->time_rec; ?></td>
                                    </tr>
                               <?php endforeach; ?>

                               <?php $total_blanch = $this->queries->get_blanchTransaction_employeetotal($from,$to,$cashs->blanch_id) ?>
                               <?php //print_r($total_blanch) ?>
                                <?php foreach ($total_blanch as $total_blanchs): ?>
                                          <tr>
                                    <td>TOTAL BRANCH:</td>
                                    <td><?php //echo $blanch_customers->empl_name; ?></td>
                                    <td><?php //echo $blanch_customers->f_name; ?> <?php //echo $blanch_customers->m_name; ?> <?php //echo $blanch_customers->l_name; ?></td>
                                    <td><b> <?php echo number_format( $total_blanchs->total_depost_empl); ?> </b></td>
                                    <td>
                                       <b><?php echo number_format( $total_blanchs->total_with); ?></b>
                                    </td>
                                    <td><?php //echo $blanch_customers->lecod_day; ?></td>
                                    <td><?php //echo $blanch_customers->time_rec; ?></td>
                                    </tr>
                               <?php endforeach; ?>
                                    <?php endforeach; ?>
                                          </thead>
            
                                       
                    <tfoot>
                    <tr>
                    <td><b>TOTAL:</b></td>
                      <td></td>
                      <td></td>
                      <td><b><?php echo number_format($total_comp_data->total_depost_com); ?></b></td>
                      <td><b><?php echo number_format($total_comp_data->total_comp_aprov); ?></b></td>
                      <td></td>
                      <td></td>
                    </tr>
                   </tfoot>
                   </table>
</div>

</div>

</body>
</html>




