<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/datatables/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="<?php echo base_url(); ?>/assets/dist/datatables/js/jquery.dataTables.min.js"></script>
<style>
@media only screen and (max-width: 600px) {
    #responsive-content {
        font-size: 12px;
    }
}
</style>
<div class="content-wrapper" style="margin-top:60px">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo  empty($table_heading) ? "" : $table_heading; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="admin">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo  empty($table_heading) ? "" : $table_heading; ?></li>
                    </ol>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <a href="<?php echo  base_url(empty($new_entry_link) ? "" : $new_entry_link) ?>"
                        class="btn btn-secondary float-sm-right "
                        id="responsive-content"><?php echo  empty($new_entry_caption) ? "" : $new_entry_caption; ?></a>
                </div>
            </div>
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
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="category_list">
                        <thead>
                            <tr>
                                <th scope="col">Serial No.</th>
                                <th scope="col">Slider image name</th>
                                <th scope="col">Slider image preview</th>                                                             
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(!empty($table_data))
                            {
                            $counter = 0;                            
                            foreach ($table_data as $row) {
                                $counter++;
                            ?>
                            <tr>
                                <td><?php echo  $counter ?></td>
                                <td><?php echo  $row->slider_image_address ?></td>
                                <td><?php echo  "image preview" ?></td>                                                           
                                <td style="display: flex; font-size:20px">
                                    <a class="ml-3" style="color:red"
                                        onclick="return confirm('Are you sure you want delete slider image  <?php echo $row->id ?>')"
                                        href="delete-slider-image/<?php echo  $row->id ?>" data-toggle="tooltip"
                                        data-placement="top" title="Delete"> <i class="fa fa-trash"
                                            aria-hidden="true"></i></a>
                                    <!-- <a class="ml-3" href="view-user/<?php echo  $row->id ?>" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                                    <a class="ml-3 text-success" href="slider-image-form/<?php echo  $row->id ?>"
                                        data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa  fa-edit"
                                            aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php
                             }  
                             }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
$("document").ready(function() {
    $("#category_list").DataTable({
        "scrollX": true,
        "scrollY": false
    });
    $('[data-toggle="tooltip"]').tooltip()
})
</script>