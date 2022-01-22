<style>
    form {
        background-color: white;
        padding: 0.50rem !important;
        color: black;
    }

    label {
        font-weight: 500;
    }

    label.error {
        color: #E53935 !important;
    }

    input.error,
    select.error,
    textarea.error {
        border: 1px solid red !important;
    }
</style>
<script src="<?php echo base_url() ?>/assets/dist/jquery-validation/jquery.validate.min.js"></script>
<?php
if (!empty($id)) {
?>
    <!-- The Modal -->
    <div class="modal fade" id="client_image_preview" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <img id="myImg" src="<?php echo base_url('assets/img/team/team_member_') . $id . '.jpg' ?>" alt="Icon">
            </div>
        </div>
    </div>
<?php } ?>
<div class="content-wrapper" style="margin-top:60px">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo  empty($form_catd_heading) ? "" : $form_catd_heading; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="admin">Home</a></li>
                        <li class="breadcrumb-item active">
                            <?php echo  empty($form_catd_heading) ? "" : $form_catd_heading; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <?php
                    $validation_errors = validation_errors();
                    if (!empty($validation_errors)) {
                    ?>
                        <div class="col-xs-12 alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                &times;
                            </button>
                            <?php echo $validation_errors; ?>
                        </div>
                    <?php
                    }
                      if (!empty($_SESSION['operation_msg'])) {
                        ?>
    
                        <div class="alert alert-<?php echo empty($_SESSION['operation_msg_type']) ? "danger" : $_SESSION['operation_msg_type'] ?> alert-dismissible"
                            id="responsive-content">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $_SESSION['operation_msg'];
                                ?>
                        </div>
                        <?php
                        }
                     
                    ?>
                    <div class="col-md-8 offset-md-2 pt-5">
                        <span class="anchor" id="formAddCategory"></span>
                        <div class="card card-outline-secondary">
                            <div class="card-header d-flex">
                                <h3 class="mb-0"><?php echo empty($form_caption) ? "" : $form_caption; ?> </h3>
                                <a class="btn btn-secondary mr-3" href="<?php echo base_url('team-member-list') ?>" style="position:absolute;right:0">Back </a>
                            </div>
                            <div class="card-body">
                                <?php
                                $attributes = array('id' => 'testimonial-form', 'class' => 'form-horizontal');
                                echo form_open_multipart($form_action, $attributes);
                                ?>
                                <input type="hidden" name="id" id="id" value="<?php echo empty($id) ? NULL : $id; ?>">
                                <input type="hidden" name="for_form_validation" id="for_form_validation" value="<?php echo empty($for_form_validation) ? NULL : $for_form_validation; ?>">
                                <div class="form-group ">
                                    <label for="exprience">Experience<font color="red">*</font></label>
                                    <?php
                                    $data = array(
                                        'name' => 'exprience',
                                        'id' => 'exprience',
                                        'value' => set_value('exprience', empty($exprience) ? NULL : $exprience),
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter exprience of your company',
                                        'autofocus' => 'autofocus'
                                    );
                                    echo form_input($data);
                                    ?>
                                </div>                            
                                <div class="form-group ">
                                    <label for="system_installed">System installs</label>
                                    <?php
                                    $data = array(
                                        'name' => 'system_installed',
                                        'id' => 'system_installed',
                                        'value' => set_value('system_installed', empty($system_installed) ? NULL : $system_installed),
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter the member position in your company',
                                        
                                    );
                                    echo form_input($data);
                                    ?>
                                </div>
                                <div class="form-group ">
                                    <label for="energy_financiing_done">Energy Financing Done<font color="red">*</font></label>
                                    <?php
                                    $data = array(
                                        'name' => 'energy_financiing_done',
                                        'id' => 'energy_financiing_done',
                                        'value' => set_value('energy_financiing_done', empty($energy_financiing_done) ? NULL : $energy_financiing_done),
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter the total no. financing done ',
                                        
                                    );
                                    echo form_input($data);
                                    ?>
                                </div>
                                <div class="form-group ">
                                    <label for="hours_of_inspection">Hours Of Inspection<font color="red">*</font></label>
                                    <?php
                                    $data = array(
                                        'name' => 'hours_of_inspection',
                                        'id' => 'hours_of_inspection',
                                        'value' => set_value('hours_of_inspection', empty($hours_of_inspection) ? NULL : $hours_of_inspection),
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter the total no. financing done ',
                                        
                                    );
                                    echo form_input($data);
                                    ?>
                                </div>
                                <div class="form-group ">
                                    <div class="col-md-6 offset-sm-4">
                                        <button type="submit" class="btn btn-secondary mr-2"> Save</button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                    <br /><br />
                </div>
            </div>
        </div>
    </section>
</div>
