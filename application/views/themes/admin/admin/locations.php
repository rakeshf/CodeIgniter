      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $admin_card_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                          <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">id</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Latitude</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Longitude</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Parent</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($results as $location) : ?>
                            <tr role="row" class="odd">
                              <td class="sorting_1"><?php echo $location->id; ?></td>
                              <td class=""><?php echo $location->name; ?></td>
                              <td><?php echo $location->latitude; ?></td>
                              <td><?php echo $location->longitude; ?></td>
                              <td><?php echo $location->parent_id; ?></td>
                              <td>
                                  <a href="/admin/locations/<?php echo $location->id; ?>/edit" class="btn btn-success">Edit</a>
                                  <a href="/admin/locations/<?php echo $location->id; ?>/delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete? (<?php echo $location->name;?>)')">Delete</a>
                                  <?php if(empty($location->is_active)): ?>
                                    <a href="/admin/locations/<?php echo $location->id; ?>/active" class="btn btn-info" onclick="return confirm('Are you sure you want to A ctive? (<?php echo $location->name;?>)')">Active</a>
                                  <?php else: ?>
                                    <a href="/admin/locations/<?php echo $location->id; ?>/inactive" class="btn btn-info" onclick="return confirm('Are you sure you want to In-active? (<?php echo $location->name;?>)')">In-Active</a>
                                  <?php endif; ?>  
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th rowspan="1" colspan="1">id</th>
                            <th rowspan="1" colspan="1">Name</th>
                            <th rowspan="1" colspan="1">Latitude</th>
                            <th rowspan="1" colspan="1">Longitude</th>
                            <th rowspan="1" colspan="1">Parent</th>
                            <th rowspan="1" colspan="1">Action</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-5">
                      <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                         <a href="/admin/locations/add" class="btn btn-primary">Add new</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                      <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                        <?php echo $pager; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->