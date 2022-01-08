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
                        <li class="breadcrumb-item active">User view</li>

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
                            <td>First name</td>
                            <td><?php echo  $record->ufname; ?></td>
                        </tr>
                        <tr>
                            <td>Last name</td>
                            <td><?php echo $record->ulname; ?></td>
                        </tr>
                        <tr>
                            <td>username</td>
                            <td><?php echo  $record->username; ?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><?php echo $record->gender; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $record->email; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo  $record->addressLn1 .' '.$record->addressLn2; ?></td>
                        </tr>                     
                        <tr>
                            <td>Status</td>
                            <td><?php echo  $record->status; ?></td>
                        </tr>
                        <tr>
                            <td>Created at</td>
                            <td><?php echo  $record->created_at; ?></td>
                        </tr>                     
                        <tr>
                            <td>Updated by</td>
                            <td><?php echo  $record->updated_by; ?></td>
                        </tr>
                        <tr>
                            <td>Updated at</td>
                            <td><?php echo  $record->updated_at; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style=" color:white"><a href="<?php echo base_url("frontent-user-list") ?>" class="btn btn-danger">Exit</a></td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>