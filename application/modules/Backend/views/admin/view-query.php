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
                        <li class="breadcrumb-item active">Query view</li>

                    </ol>
                </div>

            </div>
           
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <table class="container-fluid table table-borderless box1" >
                        <tr>
                            <td>ID</td>
                            <td><?php echo $record->id; ?></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><?php echo  $record->name; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $record->email; ?></td>
                        </tr>
                        <tr>
                            <td>Mobile number</td>
                            <td><?php echo  $record->mobile_number; ?></td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td><?php echo $record->message; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td><?php echo $record->status; ?></td>
                        </tr>                      
                        <tr>
                            <td>Submited at</td>
                            <td><?php echo  $record->created_at; ?></td>
                        </tr>                     
                        <tr>
                            <td>Settled by</td>
                            <td><?php echo  $record->ufname .' '.$record->ulname; ?></td>
                        </tr>
                        <tr>
                            <td>Settled at</td>
                            <td><?php echo  $record->updated_at; ?></td>
                        </tr>
                        <tr>
                            <td>Settled Description</td>
                            <td><?php echo  $record->settled_desc; ?></td>
                        </tr>
                        <tr>
                            <?php
                            if($record->status == "Settled")
                            {
                                $exit = base_url('settled-query-list');
                            }else{
                                $exit = base_url('unsettled-query-list');
                            }
                            ?>
                            <td></td>
                            <td style=" color:white"><a href="<?php echo $exit ?>" class="btn btn-secondary">Exit</a></td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>