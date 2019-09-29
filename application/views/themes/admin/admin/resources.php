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
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Meta Tags</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Meta Desc</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Parent</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($results as $category) : ?>
                            <tr role="row" class="odd">
                              <td class="sorting_1"><?php echo $category->id; ?></td>
                              <td class=""><?php echo $category->name; ?></td>
                              <td><?php echo $category->meta_tag; ?></td>
                              <td><?php echo $category->meta_desc; ?></td>
                              <td><?php echo $category->parent_id; ?></td>
                              <td>
                                  <a href="/admin/category/<?php echo $category->id; ?>/edit" class="btn btn-success">Edit</a>
                                  <a href="/admin/category/<?php echo $category->id; ?>/delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete? (<?php echo $category->name;?>)')">Delete</a>
                                  <a href="/admin/category/<?php echo $category->id; ?>/in-active" class="btn btn-info" onclick="return confirm('Are you sure you want to In-active? (<?php echo $category->name;?>)')">In-Active</a>  
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th rowspan="1" colspan="1">id</th>
                            <th rowspan="1" colspan="1">Name</th>
                            <th rowspan="1" colspan="1">Meta Tags</th>
                            <th rowspan="1" colspan="1">Meta Desc</th>
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
                         <a href="/admin/category/add" class="btn btn-primary">Add new</a>
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