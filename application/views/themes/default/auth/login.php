<div class="container">
  <div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6">
    <h4><?php echo $this->lang->line('welcome_msg'); ?></h4>
  </div>
  </div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
    <?php echo anchor($facebook_login_url, 'Facebook', 'class="btn btn-lg btn-primary btn-block", title="facebook login"'); ?>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
    <?php echo anchor($google_login_url, 'Google', 'class="btn btn-lg btn-info btn-block", title="google login"'); ?>
    </div>
  </div>
</div>



