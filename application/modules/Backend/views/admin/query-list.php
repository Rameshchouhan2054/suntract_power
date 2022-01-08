<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/datatables/css/jquery.dataTables.min.css">
<script src="<?php echo base_url(); ?>/assets/dist/datatables/js/jquery.dataTables.min.js"></script>
<style>
    @media only screen and (max-width: 600px) {
        #responsive-content {
            font-size: 12px;
        }
    }
</style>
<div class="modal fade" id="settle_query" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Settle Query</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Settled description</p>
                <form action="settle-query" id="settle_form" method="post">
                    <input type="hidden" name="id" id="id">
                    <textarea class="form-control" placeholder="example: Settled by phone call" name="settled_desc" id="settled_desc" required></textarea>
               <div class="modal-footer">
                <input  type="submit" class="btn btn-success" value="Submit"> 
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

               </div>
                </form>
            </div>            
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
                        <li class="breadcrumb-item active">Query list</li>

                    </ol>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <a href="<?php echo empty($query_link) ? "" : $query_link ?>" class="btn btn-info " id="responsive-content"><?php echo empty($query_caption) ? "" : $query_caption ?></a>
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
                                <th scope="col">Name</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Mobile number</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 0;
                            foreach ($table_data as $row) {
                                $counter++;
                            ?>
                                <tr>
                                    <td><?php echo  $counter ?></td>
                                    <td><?php echo  $row->name ?></td>
                                    <td><?php echo  $row->email ?></td>
                                    <td><?php echo  $row->mobile_number ?></td>

                                    <td style="display: flex;font-size:22px">
                                        <?php
                                        if ($query_caption == 'Settled query list') {
                                        ?>
                                            <a class="ml-3 text-success"  onclick="return settle_query('<?php echo  $row->id ?> ')" href="#" data-toggle="tooltip" data-placement="top" title="settle now"> <i class="fa fa-check" aria-hidden="true"></i></a>
                                        <?php
                                        }
                                        ?>
                                        <a class="ml-3 text-info" href="view-query/<?php echo  $row->id ?>" data-toggle="tooltip" data-placement="top" title="View query"><i class="fa  fa-eye" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php
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
    function settle_query(id) {
        $('#id').val(id);
        $('#settle_query').modal('show');
        return false;
    }
    $("document").ready(function() {
   
        $("#query_list").DataTable({
            "scrollX": true,
            "scrollY": false
        });
    })
</script>