<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/simple-line-icons.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/loginstyle.css">
    <link rel="shortcut icon" href="#">
</head>
<section class="showcase">
    <div class="container" style="margin-top:100px">      
        <form action="<?php echo base_url(); ?>login" class="" id="register" method="post" accept-charset="utf-8">

            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 pb-5">
                    <div class="row"><?php echo validation_errors('<div class="col-12 col-md-12 "><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>', '</div></div>'); ?></div>
                    <!--Form with header-->
                    <div class="card border-info rounded-0">
                        <div class="card-header p-0">
                            <div class="bg-login-page text-white text-center py-2">
                                <h3><i class="icon-user"></i> Login</h3>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <!--Body-->
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon-user text-info"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username *" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon-key text-info" aria-hidden="true"></i></div>
                                    </div>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password *" value="">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="contact-send-a" class="btn btn-info btn-block rounded-0 py-2">Login</button>
                            </div>
                            <br>
                            <!-- <span>Not a user? <a href="<?php echo base_url() ?>Registration">Register Now</a></span> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="<?php  echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url() ?>assets/dist/jquery-validation/jquery.validate.min.js"></script>
<script>
    $("document").ready(function() {
        $("#register").validate({
            rules: {
                username: {
                    required: true,
                },
                password: "required"
            },
            messages: {
                username: "Please Enter a valid Username",
                password: "Please Enter your password",
            },
        });
    });
</script>