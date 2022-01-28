<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Suntract Power</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- App favicon -->
    <link href="<?php echo base_url('assets/img/logo/logo.png'); ?>" rel="icon">

    <?php echo $template_css; ?>
    <!-- <script type="text/javascript" charset="UTF-8" src=<?php echo base_url(); ?>assets/js/vendor.min.js?1554960401"></script> -->
    <!--           <script type="text/javascript" charset="UTF-8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" charset="UTF-8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        -->
    <?php echo $template_js; ?>
    <script>
        var base_url = '<?php echo base_url(); ?>';

        // $(document).ready(function() {
        //     make_nav_link_active();

        //     $('.header_navbar_ul > .nav-item > .nav-link').click(function(e) {
        //         $.ajax({
        //             url: base_url + 'store-active-nav-link-id',
        //             type: 'POST',
        //             data: {
        //                 'selected_id': this.id
        //             },
        //         });
        //     });
        // });

        // function make_nav_link_active() {
        //     $('.header_navbar_ul > .nav-item > .nav-link').removeClass('active');
        //     $('#<?php echo empty($_SESSION['selected_id']) ? "main" : $_SESSION['selected_id'] ?>').addClass("active");
        // }
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php echo $template_header; ?>
    <div class="wrapper">
        <div class="container-fluid" style="margin-top:60px">
            <?php echo $template_content; ?>

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
    <?php echo $template_footer; ?>
</body>

</html>