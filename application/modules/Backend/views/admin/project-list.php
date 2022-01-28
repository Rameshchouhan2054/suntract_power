<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/datatables/css/jquery.dataTables.min.css">
<script src="<?php echo base_url(); ?>/assets/dist/datatables/js/jquery.dataTables.min.js"></script>
<style>
    @media only screen and (max-width: 600px) {
        #responsive-content {
            font-size: 12px;
        }
    }
</style>

<div class="modal fade modal-md" id="image_preview" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <img id="selected_image" src="" alt="Icon">
            </div>
        </div>
    </div>
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
                        <li class="breadcrumb-item active">Project list</li>
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

                        <div class="alert alert-<?php echo empty($_SESSION['operation_msg_type']) ? "danger" : $_SESSION['operation_msg_type'] ?> alert-dismissible" id="responsive-content">
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
                    <table class="table" id="query_list">
                        <thead>
                            <tr>
                                <th scope="col">Serial No.</th>
                                <th scope="col">Project Name</th>
                                <th scope="col">Description</th>            
                                <th scope="col">Uploaded Image</th>                                
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 0;
                            if(!empty($table_data))
                            {
                            foreach ($table_data as $row) {
                                $counter++;
                            ?>
                                <tr>
                                    <td><?php echo  $counter ?></td>
                                    <td><?php echo  $row->project_name ?></td>
                                    <td><?php echo  $row->description ?></td>
                                    <td>  <img onclick="image_preview('<?php echo 'assets/img/project-image/'.$row->image_address ?>')" class="shadow" src="<?php echo base_url('assets/img/project-image/'.$row->image_address) ?>"  alt="Icon" style="width:50%;max-width:100px"/> </td>                                                           
                                    <td style="display: flex;font-size:22px">
                                        <a class="ml-3 text-danger" href="delete-project/<?php echo  $row->id ?>" data-toggle="tooltip" data-placement="top" title="delete"><i class="fa  fa-trash" aria-hidden="true"></i></a>
                                        <a class="ml-3 text-success" href="add-project/<?php echo  $row->id ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa  fa-edit" aria-hidden="true"></i></a>
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
   
        $("#query_list").DataTable({
            "scrollX": true,
            "scrollY": false
        });
    })
    function image_preview(image_name)
{
    console.log(image_name);
    var file = base_url+image_name
    $("#selected_image").attr('src',file);
    $("#image_preview").modal("show");
}
</script>