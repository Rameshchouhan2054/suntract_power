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

#add_row_for_charges,
#add_row_for_posts {
    position: absolute;
    bottom: 0;
    margin-bottom: 30px;
}
</style>
<!-- <link href="<?php echo base_url() ?>/assets/dist/css/datepicker.min.css" rel="stylesheet"> -->
<script src="<?php echo base_url() ?>/assets/dist/jquery-validation/jquery.validate.min.js"></script>
    <!-- The Modal -->
<?php
if (!empty($slider_image_address)) {
?>
    <div class="modal fade" id="slider_image_preview" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <img id="myImg" src="<?php echo base_url('assets/img/slider-image/') . $slider_image_address ?>" alt="Icon">
            </div>
        </div>
    </div>
<?php } ?>
<div class="content-wrapper" style="margin-top:60px">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo  empty($form_card_heading) ? "" : $form_card_heading; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="admin">Home</a></li>
                        <li class="breadcrumb-item active">
                            <?php echo  empty($form_card_heading) ? "" : $form_card_heading; ?></li>
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
                    ?>
                     <div class="row">
                <div class="col mt-1">
                    <?php
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
                </div>
            </div>
                    <div class="col-md-8 offset-md-2 pt-5">
                        <span class="anchor" id="formAddCategory"></span>                        
                        <div class="card card-outline-secondary">
                            <div class="card-header d-flex">
                                <h3 class="mb-0"><?php echo empty($form_caption) ? "" : $form_caption; ?> </h3>

                                <a class="btn btn-secondary mr-3" href="<?php echo base_url(empty($back_button) ? "" : $back_button) ?>"
                                    style="position:absolute;right:0">Back </a>

                            </div>
                            <div class="card-body">

                                <?php
                                $attributes = array('id' => 'slider_form', 'class' => 'form-horizontal');
                                echo form_open_multipart($form_action, $attributes);
                                ?>
                                <input type="hidden" name="id" id="id" value="<?php echo empty($id) ? NULL : $id; ?>">
                                <input type="hidden" name="for_form_vaidation" id="for_form_vaidation" value="filled">
                                <div class="form-group ">
                                    <label for="slider_image">Slider Image<font color="red">*</font></label>
                                    <div class="custom-file">
                                        <?php
                                    $data = array(
                                        'type'=>'file',
                                        'name' => 'slider_image',
                                        'id' => 'customFile',                                        
                                        'class' => 'form-control custom-file-input',                                                                           
                                    );
                                    echo form_input($data);
                                    ?>                                      
                                        <label class="custom-file-label" for="customFile">
                                            Choose slider image
                                        </label>
                                    </div>
                                </div>
                                <?php 
                                if(!empty($slider_image_address))
                                {
                                ?>
                                <div class="row pt-2">
                                                <div class="form-group col-md-12 border p-3">                                                  
                                                        <label class="col-md-5 ">Uploaded Image:</label>                                                                                                       
                                                        <img id="upload_preview" class="shadow" src="<?php echo base_url('assets/img/slider-image/'.$slider_image_address) ?>" data-toggle="modal" data-target="#slider_image_preview" alt="Icon" style="width:50%;max-width:100px"/>                                                
                                                </div>
                                            </div>
                                            <?php
                                } 
                                            ?>
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
<script>
$("document").ready(function() {
    var message;
    $("#slider_form").validate({
        rules: {         
            slider_image: {
                "required": true                
            },          
        },
        messages: {        
            slider_image: {
                "required": "Please select slider image"
            },          
        },
    });

    $('input[type="file"]').on("change", function() {
            let filenames = [];
            let files = this.files;
            if (files.length > 1) {
                filenames.push("Total Files (" + files.length + ")");
            } else {
                for (let i in files) {
                    if (files.hasOwnProperty(i)) {
                        filenames.push(files[i].name);
                    }
                }
            }
            $(this)
                .next(".custom-file-label")
                .html(filenames.join(","));
        });
});
</script>