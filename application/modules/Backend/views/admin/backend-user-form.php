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
<link href="<?php echo base_url() ?>/assets/dist/css/datepicker.min.css" rel="stylesheet">
<script src="<?php echo base_url() ?>/assets/dist/jquery-validation/jquery.validate.min.js"></script>
<div class="content-wrapper" style="margin-top:60px">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="admin">Home</a></li>
                        <li class="breadcrumb-item active">User Form</li>
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
                        <!-- form card change password -->
                        <div class="card card-outline-secondary">
                            <div class="card-header d-flex">
                                <h3 class="mb-0"><?php echo empty($form_caption) ? "" : $form_caption; ?> </h3>
                                
                                <a class="btn btn-secondary mr-3" href="<?php echo base_url('backend-user-list') ?>" style="position:absolute;right:0">Back </a>
                                
                            </div>
                            <div class="card-body">

                                <?php
                                $attributes = array('id' => 'backend-user-form', 'class' => 'form-horizontal');
                                echo form_open_multipart($form_action, $attributes);
                                ?>
                                <input type="hidden" name="id" id="id" value="<?php echo empty($id) ? NULL : $id; ?>">
                                <?php
                                $disabled = "";
                                if (!empty($id)) {
                                    $disabled = "disabled";
                                }
                                ?>

                                <div class="form-group ">
                                    <label for="username">Username<font color="red">*</font></label>
                                    <?php
                                    $data = array(
                                        'name' => 'username',
                                        'id' => 'username',
                                        'value' => set_value('username', empty($username) ? NULL : $username),
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter Username',
                                        $disabled    => '0',
                                        'autofocus' => 'autofocus'
                                    );
                                    echo form_input($data);
                                    ?>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="ufname">First name</label>
                                        <?php
                                        $data = array(
                                            'name' => 'ufname',
                                            'id' => 'ufname',
                                            'value' => set_value('ufname', empty($ufname) ? NULL : $ufname),
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter first name',
                                        );
                                        echo form_input($data);
                                        ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ulname">Last name</label>
                                        <?php
                                        $data = array(
                                            'name' => 'ulname',
                                            'id' => 'ulname',
                                            'value' => set_value('ulname', empty($ulname) ? NULL : $ulname),
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter last name',
                                        );
                                        echo form_input($data);
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="gender">Gender</label>
                                    <br>
                                    <?php

                                    echo form_label('Male', 'male', array("class" => "ml-4")) . " " . form_radio(array('name' => 'gender', 'value' => 'Male', "checked" => true),);
                                    echo form_label('Female', 'female') . " " . form_radio(array('name' => 'gender', 'value' => 'Female'));
                                    echo form_label('other', 'oeher') . " " . form_radio(array('name' => 'gender', 'value' => 'Other'));

                                    ?>
                                </div>
                                <div class="form-group ">
                                    <label for="email">Email<font color="red">*</font></label>
                                    <?php
                                    $data = array(
                                        'name' => 'email',
                                        'id' => 'email',
                                        'value' => set_value('email', empty($email) ? NULL : $email),
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter Email address',
                                        'autofocus' => 'autofocus',
                                        $disabled    => '0',
                                    );
                                    echo form_input($data);
                                    ?>
                                </div>
                                <div class="form-group ">
                                    <label for="address">Address<font color="red">*</font></label>
                                    <?php
                                    $data = array(
                                        'name' => 'address',
                                        'id' => 'address',
                                        'value' => set_value('address', empty($address) ? NULL : $address),
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter exam description',
                                        'autofocus' => 'autofocus',
                                    );
                                    echo form_input($data);
                                    ?>
                                </div>
                                <div class="form-group ">
                                    <label for="user_type">User type<font color="red">*</font></label>
                                    <?php
                                    $data = array(
                                        'name' => 'user_type',
                                        'id' => 'user_type',
                                        'value' => set_value('user_type', empty($user_type) ? NULL : $user_type),
                                        'class' => 'form-control',
                                        'placeholder' => 'Enter User type',
                                    );
                                    $option = array('Admin' => 'Admin', 'Editor' => 'Editor', 'Form-filler' => 'Form-filler');
                                    echo form_dropdown($data, $option);
                                    ?>
                                </div>
                                <?php
                                if (empty($id)) {
                                ?>
                                    <div class="form-group ">
                                        <label for="password">Password<font color="red">*</font></label>
                                        <?php
                                        $data = array(
                                            'name' => 'password',
                                            'id' => 'password',
                                            'value' => set_value('password', empty($password) ? NULL : $password),
                                            'class' => 'form-control',
                                            'type' => 'password',
                                            'placeholder' => 'Enter Password',
                                        );
                                        echo form_input($data);
                                        ?>
                                    </div>
                                    <div class="form-group ">
                                        <label for="confirm_ps">Confirm password<font color="red">*</font></label>
                                        <?php
                                        $data = array(
                                            'name' => 'confirm_ps',
                                            'id' => 'confirm_ps',
                                            'value' => set_value('confirm_ps', empty($confirm_ps) ? NULL : $confirm_ps),
                                            'class' => 'form-control',
                                            'placeholder' => 'Enter Confirm password',
                                            'type' => 'password'
                                        );
                                        echo form_input($data);
                                        ?>
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
                    <!-- /form card change password -->
                    <br /><br />
                </div>
            </div>
        </div>

    </section>
</div>
<script>
    $("document").ready(function() {
var message;
        $("#backend-user-form").validate({
            rules: {
                username: {
                    "required": true,
                    "remote": {
                        url: "<?php echo base_url('check-username-exist') ?>",
                        type: "post",
                        data: {
                            username: function() {
                                return $("#username").val();
                            },
                        },
                        dataFilter: function(response) {
                            if (response == false) 
                            {
                                return true;}
                            else {
                                message = "Username already exist";
                                return false;
                            }
                        }
                    }
                },
                address: {
                    "required": true
                },
                email: {
                    "required": true,
                    email: true,
                    "remote": {
                        url: "<?php echo base_url('check-email-exist') ?>",
                        type: "post",
                        data: {
                            email: function() {
                                return $("#email").val();
                            },
                        },
                        dataFilter: function(response) {
                            if (response == false) 
                            {
                                return true;}
                            else {
                                message = "email already exist";
                                return false;
                            }
                        }
                    }
                },
                user_type: {
                    "required": true
                },
                password: {
                    "required": true
                },
                confirm_ps: {
                    "required": true,
                    equalTo: "#password"
                }
            },
            messages: {
                username: {
                    "required": "Username name is required",
                    "remote": function() {
                        return message
                    }
                },
                address: {
                    "required": "Address is required"
                },
                email: {
                    "required": "Email is requied",
                    email: "Please enter a valid email",
                    "remote": function() {
                        return message
                    }
                },
                user_type: {
                    "required": "User type is requied"
                },
                password: {
                    "required": "Password is requied"
                },
                confirm_ps: {
                    "required": "Confirm password is requied",
                    equalTo: "password and confirm password mismatch"
                }
            },
        });
    });
</script>