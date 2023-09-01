<?php include('incs/header.php'); ?>
<?php include('incs/nav.php'); ?>
<?php include('incs/side.php'); ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url("admin/index"); ?>"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("loan") ?></li>
                            <li class="breadcrumb-item active"><?php echo $this->lang->line("local_government_menu"); ?></li>
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
                <?php if ($local_gov == TRUE) {
            ?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $this->lang->line("local_government_menu"); ?></h2>
                        </div>
                        <div class="body">
                            <?php echo form_open_multipart("oficer/Update_local_govDetails/{$loan_attach->loan_id}/{$local_gov->attach_id}") ?>
                            <div class="row">
                            <div class="col-lg-6 form-group-sub">
                                    <label class="form-control-label">*<?php echo $this->lang->line("name_oficer_menu"); ?>:</label>
                            <input type="text" name="oficer" placeholder="<?php echo $this->lang->line("name_oficer_menu"); ?>" autocomplete="off" class="form-control input-sm" value="<?php echo $local_gov->oficer; ?>" required >
                                </div>
                                
                                    <div class="col-lg-6 form-group-sub">
                                    <label class="form-control-label">*<?php echo $this->lang->line("phone_oficer_menu"); ?>:</label>
                            <input type="number" name="phone_oficer" placeholder="<?php echo $this->lang->line("name_oficer_menu"); ?>" autocomplete="off" class="form-control input-sm" value="<?php echo $local_gov->phone_oficer; ?>" required>
                                </div>

                        <input type="hidden" name="loan_id" value="<?php echo $loan_attach->loan_id; ?>">
                               
                                </div>
                                 <br>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="icon-drawer"><?php echo $this->lang->line("update_menu"); ?></i></button>
                                <a href="<?php echo base_url("oficer/loan_pending"); ?>" class="btn btn-primary"><?php echo $this->lang->line("finish_menu"); ?></a>
                                </div>
                            <?php echo form_close();  ?>
                        </div>
                    </div>
                </div>

            <?php }elseif ($local_gov == FALSE) {
             ?>

             <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><?php echo $this->lang->line("local_government_menu"); ?></h2>
                        </div>
                        <div class="body">
                            <?php echo form_open_multipart("oficer/create_local_govDetails/{$loan_attach->loan_id}") ?>
                            <div class="row">
                            <div class="col-lg-6 form-group-sub">
                                    <label class="form-control-label">*<?php echo $this->lang->line("name_oficer_menu"); ?>:</label>
                            <input type="text" name="oficer" placeholder="<?php echo $this->lang->line("name_oficer_menu"); ?>" autocomplete="off" class="form-control input-sm"  required >
                                </div>
                                
                                    <div class="col-lg-6 form-group-sub">
                                    <label class="form-control-label">*<?php echo $this->lang->line("phone_oficer_menu"); ?>:</label>
                            <input type="number" name="phone_oficer" placeholder="<?php echo $this->lang->line("phone_oficer_menu"); ?>" autocomplete="off" class="form-control input-sm"  required>
                                </div>

                           <input type="hidden" name="loan_id" value="<?php echo $loan_attach->loan_id; ?>">
                               
                                </div>
                                 <br>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="icon-drawer"><?php echo $this->lang->line("save_menu"); ?></i></button>
                                </div>
                            <?php echo form_close();  ?>
                        </div>
                    </div>
                </div>

             <?php } ?>


             
            </div>
        </div>
    </div>
</div>

<?php include('incs/footer.php'); ?>


