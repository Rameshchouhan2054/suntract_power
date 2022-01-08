<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    $CI = & get_instance();
    $CI->load->library('session'); //if it's not autoloaded in your CI setup
    $site_lang = $CI->session->userdata('site_lang');


    // $config['public_default_css'] = array(
    // );

    // $config['public_default_js'] = array(
    // );

//----- Admin Assets -----

    $config['admin_default_css'] = array(
        'bootstrap-min' => array('name' => 'assets/dist/css/bootstrap.min.css'),
        'all.min' => array('name' => 'assets/plugins/fontawesome-free/css/all.min.css'),
        'icheck-bootstrap.min' => array('name' => 'assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'),
        'adminlte.min' => array('name' => 'assets/dist/css/adminlte.min.css'),        
    );
    $config['admin_default_js'] = array(
        'jquery.min' => array('name' => 'assets/plugins/jquery/jquery.min.js'),
        'jquery-ui.min' => array('name' => 'assets/plugins/jquery-ui/jquery-ui.min.js'),
        'bootstrap.bundle.min' => array('name' => 'assets/plugins/bootstrap/js/bootstrap.bundle.min.js'),
        'jquery.knob.min' => array('name' => 'assets/plugins/jquery-knob/jquery.knob.min.js'),
        'moment.min' => array('name' => 'assets/plugins/moment/moment.min.js'),
        'tempusdominus-bootstrap-4.min' => array('name' => 'assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'),
        'adminlte' => array('name' => 'assets/dist/js/adminlte.js'),
    );

    $config['css_arr'] = array(    
        'jquery.dataTables.min' => array('name' => '/assets/dist/datatables/css/jquery.dataTables.min.css'),
        'datepicker.min' => array('name' => 'assets/dist/css/datepicker.min.css'),        
        'all.min' => array('name' => 'assets/plugins/fontawesome-free/css/all.min.css'),
        'ionicons.min'=> array('name' => 'assets/plugins/ionicons/css/ionicons.min.css'),
    );

    $config['js_arr'] = array(
        
        'jquery.dataTables.min' => array('name' => '/assets/dist/datatables/js/jquery.dataTables.min.js'),
        'general' => array('name' => '/assets/js/general.js'),
        'dataTables.FilterOnReturn' => array('name' => '/assets/js/dataTables.FilterOnReturn.js'),
        'jquery.validate.min' => array('name' => 'assets/dist/jquery-validation/jquery.validate.min.js'),
        'datepicker.min' => array('name' => 'assets/dist/js/datepicker.min.js'),
        'moment.min' => array('name' => 'assets/dist/js/moment.min.js'),
        'ckeditor' => array('name' => 'assets/plugins/ckeditor/ckeditor.js'),
        'subscription_function' => array('name' => 'assets/dist/js/subscription_function.js'),
        'query.blockUI' => array('name' => 'assets/dist/js/jquery.blockUI.js'),
        'jquery-ui.min' => array('name' => 'assets/dist/js/jquery-ui.min.js'),
        'subscription_function' => array('name' => 'assets/dist/js/subscription_function.js'),
    );

//----- Login Assets -----

    // $config['login_register_css'] = array(
    //     'font-awesome' => array('name' => 'assets/css/font-awesome.min.css'),
    //     'bootstrap' => array('name' => 'assets/bootstrap/css/bootstrap.min.css'),
    //     'prettyPhoto' => array('name' => 'assets/css/prettyPhoto.css'),
    //     'animate' => array('name' => 'assets/css/animate.css'),
    //     'responsive' => array('name' => 'assets/css/responsive.css'),
    //     'custom' => array('name' => 'assets/css/custom.css'),
    //     '_left-menu' => array('name' => 'assets/css/_left-menu.scss'),
    //     '_page-head' => array('name' => 'assets/css/_page-head.scss'),
    //     '_topbar' => array('name' => 'assets/css/_topbar.scss'),
    // );

    // $config['login_register_js'] = array(
    //     'jquery' => array('name' => 'assets/plugins/jQuery/jQuery-2.1.4.min.js'),
    //     'bootstrap' => array('name' => 'assets/bootstrap/js/bootstrap.min.js'),
    //     'jquery.validate' => array('name' => 'assets/plugins/validation/jquery.validate.min.js'),
    //     'fastclick' => array('name' => 'assets/plugins/fastclick/fastclick.min.js'),
    //     'app' => array('name' => 'assets/js/app.min.js'),
    //     'bootbox' => array('name' => 'assets/js/bootbox.js'),
    //     'general' => array('name' => 'assets/js/general.js'),
    //     'custom' => array('name' => 'assets/js/custom.js'),
    //     'blockUI' => array('name' => 'assets/js/jquery-block-ui.js'),
    // );

// ------ public or forntent view files ------
$config['public_default_css'] = array(   
    // 'style.min080f' => array('name' => 'assets/css/dist/block-library/style.min080f.css'),
    // 'extendify-utilitiesef31' => array('name' => 'assets/plugins/redux-framework/redux-core/extendify-sdk/public/build/extendify-utilitiesef31.css'),
    // 'styles5697' => array('name' => 'assets/plugins/contact-form-7/includes/css/styles5697.css'),
    // 'elementor-icons.min05c8' => array('name' => 'assets/plugins/elementor/assets/lib/eicons/css/elementor-icons.min05c8.css'),
    // 'frontend-legacy.min49eb' => array('name' => 'assets/plugins/elementor/assets/css/frontend-legacy.min49eb.css'),
    // 'frontend.min49eb' => array('name' => 'assets/plugins/elementor/assets/css/frontend.min49eb.css'),
    // 'post-7228a55' => array('name' => 'assets/uploads/elementor/css/post-7228a55.css'),
    // 'global8a55' => array('name' => 'assets/uploads/elementor/css/global8a55.css'),
    // 'post-68a55' => array('name' => 'assets/uploads/elementor/css/post-68a55.css'),
    // 'owl68b3' => array('name' => 'assets/themes/strnix/assets/css/owl68b3.css'),    
    // 'owl68b3' => array('name' => 'assets/themes/strnix/assets/css/bootstrap68b3'),
    // 'owl68b3' => array('name' => 'assets/themes/strnix/assets/css/stroke-gap-icons68b3.css'),
    // 'owl68b3' => array('name' => 'assets/themes/strnix/assets/css/fontawesome-all68b3.css'),
    // 'owl68b3' => array('name' => 'assets/themes/strnix/assets/css/flaticon68b3.css'),
    // 'owl68b3' => array('name' => 'assets/themes/strnix/assets/css/animate68b3.css'),
    // 'owl68b3' => array('name' => 'assets/themes/strnix/assets/css/jquery.fancybox.min68b3.css'),
    // 'owl68b3' => array('name' => 'assets/themes/strnix/assets/css/scrollbar68b3.css'),
    // 'owl68b3' => array('name' => 'assets/themes/strnix/assets/css/hover68b3.css'),
    // 'owl68b3' => array('name' => 'assets/themes/strnix/assets/css/custom-animate68b3.css'),
    // 'owl68b3' => array('name' => 'assets/themes/strnix/style080f.css'),
    // 'owl68b3' => array('name' => 'assets/themes/strnix/assets/css/color68b3.css'),
    // 'owl68b3' => array('name' => 'assets/themes/strnix/assets/css/responsive68b3.css'),
    // 'owl68b3' => array('name' => 'assets/themes/strnix/assets/css/sass/strnix-base68b3.css'),
    // 'owl68b3' => array('name' => 'assets/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min52d5.css'),
    // 'owl68b3' => array('name' => 'assets/plugins/elementor/assets/lib/font-awesome/css/solid.min52d5.css'),   
    // 'owl68b3' => array('name' => 'assets/plugins/strnix-core/elementor-addons/assets/icon/strnix-iconad76.css'),   
    // 'owl68b3' => array('name' => ''),    
);

$config['public_default_js'] = array(
    // 'jquery.min' => array('name' => 'assets/vendor/jquery/jquery.min.js'),
    // 'bootstrap.bundle.min' => array('name' => 'assets/vendor/bootstrap/js/bootstrap.bundle.min.js'),
    // 'jquery.easing.min' => array('name' => 'assets/vendor/jquery.easing/jquery.easing.min.js'),
    // 'validate' => array('name' => 'assets/vendor/php-email-form/validate.js'),
    // 'jquery.waypoints.min' => array('name' => 'assets/vendor/waypoints/jquery.waypoints.min.js'),
    // 'counterup.min' => array('name' => 'assets/vendor/counterup/counterup.min.js'),
    // 'owl.carousel.min' => array('name' => 'assets/vendor/owl.carousel/owl.carousel.min.js'),
    // 'isotope.pkgd.min' => array('name' => 'assets/lib/isotope/isotope.pkgd.min.js'),
    // 'venobox.min' => array('name' => 'assets/vendor/venobox/venobox.min.js'),
    // 'aos' => array('name' => 'assets/vendor/aos/aos.js'),
    // 'bootstrap-notify.min' => array('name' => 'assets/dist/js/bootstrap-notify.min.js'),
    // 'notify' => array('name' => 'assets/dist/js/notify.js'),
    // 'main' => array('name' => 'assets/dist/js/main.js'),    
);
    