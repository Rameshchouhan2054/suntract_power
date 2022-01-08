<div class="content-wrapper" style="margin-top: 60px;">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Message</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="admin">Home</a></li>
                <li class="breadcrumb-item active">Message</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">

                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>City</th>
                        <th>Message</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($message->result() as $record) : ?>

                        <tr>
                          <td><?php echo empty($record->fname) ? NULL :  $record->fname; ?></td>
                          <td><?php echo empty($record->email) ? NULL :  $record->email; ?></td>
                          <td><?php echo empty($record->mobile) ? NULL :  $record->mobile; ?></td>
                          <td><?php echo empty($record->city) ? NULL :  $record->city; ?></td>
                          <td><?php echo empty($record->help) ? NULL :  $record->help; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>