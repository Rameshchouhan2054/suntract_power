<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="assets/css/simple-line-icons.css" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="assets/css/loginstyle.css">
    <link rel="shortcut icon" href="#">
</head>
<!-- container -->
<section class="showcase">
    <div class="container">
        <form id="register" action="<?php echo base_url(); ?>registration" class="remember-login-frm" id="remember-login-frm" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class=" col-md-8 col-lg-6 pb-5" style="margin-left: 236px;">
                    <!--Form with header-->
                    <div class="card  " style="width: 310px;">
                        <!-- <div class="card-header p-0"> -->
                        <div class="bg-login-page text-white text-center py-2">
                            <h3><i class="icon-user-follow"></i> Registration</h3>
                        </div>
                        <!-- </div> -->
                        <div class="card-body p-3">
                            <div class="row">
                                <ul style="color: #CB0000"><?php echo validation_errors('<li>', '</li>'); ?>
                            </div>
                            <!--Body-->
                            <!-- <div class="form-group finput"> -->
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="icon-user"></i></div>
                                </div>
                                <input type="text" class="form-control" name="name" placeholder="username">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="icon-screen-smartphone"></i></div>
                                </div>
                                <input type="text" class="form-control" name="mobile" placeholder="mobile" maxlength="10">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="icon-envelope-open"></i></div>
                                </div>
                                <input type="text" class="form-control" name="email" placeholder="Email *">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="icon-key"></i></div>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Password *">
                            </div>
                        </div>
                        <div class="text-center ">
                            <button type="submit" id="contact-send-a" class="btn btn-info btn-block rounded-0 py-2">Register</button>
                        </div>
                        <div class='p-2'>
                            <span>Already Register? <a href="<?php echo base_url() ?>login">Login</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="assets/js/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="assets/js/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("document").ready(function() {
        $("#register").validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                mobile: {
                    required: true,
                    maxlength: 10
                },
                password: "required"
            },
            messages: {
                name: "Please Enter your Username",
                mobile: "Please Enter your mobile number",
                email: "Please Enter a valid email address",
                password: "Please Enter your password",
            },
        });
    });
</script>