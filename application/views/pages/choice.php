<script>
$(document).ready(function(e) {
    $('#footer').hide();
});
</script>
<?php $this->load->view('pages/script');?>
<div class="col-sm-6 col-md-offset-3">
	<div style="margin-top: 20%" class="panel panel-info">
      <div class="panel-heading" style="font-size: 16px">Action</div>
      <div class="panel-body">
      	<ul class="list-group">
        	<li class="list-group-item">
            	<i class="glyphicon glyphicon-plus"></i>
                <a href="<?php echo base_url();?>welcome/add_section">Add Data</a>
            </li>
        </ul>
        <ul class="list-group">
        	<li class="list-group-item">
            	<i class="glyphicon glyphicon-search"></i>
                <a href="<?php echo base_url();?>welcome/search_section">Search Data</a>
            </li>
        </ul>
        <ul class="list-group">
        	<li class="list-group-item">
            	<i class="glyphicon glyphicon-list"></i>
                <a href="<?php echo base_url();?>welcome/view_data">View All Data</a>
            </li>
        </ul>
        
      </div>
  </div>
</div>
</div>
