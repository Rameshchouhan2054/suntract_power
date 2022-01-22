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
                                <div class="form-group ">
                                    <label for="member_name">Member Name<font color="red">*</font></label>
                                    <?php
                                    $data = array(
                                        'name' => 'member_name',
                                        'id' => 'member_name',
                                        'value' => set_value('member_name', empty($member_name) ? NULL : $member_name),
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter member name',
                                        'autofocus' => 'autofocus'
                                    );
                                    echo form_input($data);
                                    ?>
                                </div>                            
                                <div class="form-group ">
                                    <label for="member_position">Member Position</label>
                                    <?php
                                    $data = array(
                                        'name' => 'member_position',
                                        'id' => 'member_position',
                                        'value' => set_value('member_position', empty($member_position) ? NULL : $member_position),
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter the member position in your company',
                                        
                                    );
                                    echo form_input($data);
                                    ?>
                                </div>
                                <div class="form-group ">
                                    <label for="member_image">Member Image<font color="red">*</font></label>
                                    <div class="custom-file">
                                        <?php
                                        $data = array(
                                            'type' => 'file',
                                            'name' => 'member_image',
                                            'id' => 'customFile',
                                            'class' => 'form-control custom-file-input',
                                        );
                                        echo form_input($data);
                                        ?>
                                        <label class="custom-file-label" for="customFile">
                                            Choose image
                                        </label>
                                    </div>
                                </div>
                                <?php
                                if (!empty($id)) {
                                ?>
                                    <div class="row">
                                        <div class="form-group col-md-12 border p-3">
                                            <label class="col-md-5 ">Uploaded Image:</label>
                                            <img id="upload_preview" class="shadow" src="<?php echo base_url('assets/img/team/team_member_' . $id . '.jpg') ?>" data-toggle="modal" data-target="#client_image_preview" alt="Icon" style="width:50%;max-width:100px" />
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
        $("#testimonial-form").validate({
            rules: {
                member_name: {
                    "required": true,
                },
                member_position: {
                    "required": true
                },
                client_image: {
                    "required": function() {
                        if ($('#id').val() == "") {
                            return true;
                        }
                    }
                },
            },
            messages: {
                member_name: {
                    "required": "Please enter name of member",
                },
                member_position: {
                    "required": "Please enter postion of member"
                },
                
                client_image: {
                    "required": "Please select member image"
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