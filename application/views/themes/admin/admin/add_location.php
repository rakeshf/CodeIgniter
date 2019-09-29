<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Add Location</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<?php
						$attributes = array('role' => 'form', 'id' => 'location_add'); 
						echo form_open($form_path, $attributes); 
					?>
						<div class="card-body">
							<div class="form-group">
								<label for="InputText">Name</label>
								<input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name', $form_data['name']); ?>" placeholder="Enter location name">
								<?php echo form_error('name'); ?>
							</div>
							<div class="form-group">
								<label for="InputText">Latitude</label>
								<input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo set_value('latitude', $form_data['latitude']); ?>" placeholder="Enter location latitude">
								<?php echo form_error('latitude'); ?>
							</div>
							<div class="form-group">
								<label for="InputText">Longitude</label>
								<input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo set_value('longitude', $form_data['longitude']); ?>" placeholder="Enter location longitude">
								<?php echo form_error('longitude'); ?>
							</div>
							<div class="form-group">
								<label>Has Parent?</label>
								<?php 
								$select_emptry = [0 => '--Select--'];
								$attributes = array('class' => 'custom-select', 'id' => 'parent_id'); 
								echo form_dropdown('parent', array_merge($select_emptry, $locations), set_value('parent', $form_data['parent_id']), $attributes);
								
								?>
								<?php echo form_error('parent'); ?>
							</div>
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" <?php echo !empty($form_data['is_active'])?'checked':''; ?>>
								<label class="form-check-label" for="exampleCheck1">Is active?</label>
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>

				<!-- /.card -->
			</div>
			<!--/.col (left) -->
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</section>