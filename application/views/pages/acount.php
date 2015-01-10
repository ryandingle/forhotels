<?php $this->load->view('pages/script');?>
<div class="row col-md-6 col-md-offset-3" style="margin-top: 10%;">
	
    <div class="panel panel-primary">
    	<div class="panel-heading">
        	<strong>My Account</strong>
            <i data-toggle="modal" data-target="#myModal" class="fa fa-edit" style="float: right;cursor: pointer"> Edit</i>
        </div>
        <div class="panel-body">
            <ul class="list-group" id="placer-info">
                <?php
                $user = $this->db->get('user');
				$this->db->where('id',$this->session->userdata('id'));
                foreach($user->result() as $row){
                ?>
                <li class="list-group-item placer-fullname">Full Name : <b><?php echo $row->fullname;?></b></li>
                <li class="list-group-item placer-username">Username : <b><?php echo $row->username;?></b></i></li>
                <li class="list-group-item placer-password">Password : <b>?</b></li>
                <?php };?>
            </ul>
      	</div>
    </div>
</div>

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Update Account</h4>
      </div>
      <div class="modal-body">
      	<div class="form-group">
        	<div style="display: none" id="alert_me" class="alert alert-warning">
           		
            </div>	
        </div>
      	<div class="form-group">
        	<label>Fullname</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-user"></i>
                </span>
                <input id="fullname" type="text" placeholder="Fullname" class="form-control" />
            </div>
        </div>
        <div class="form-group">
        	<label>Username</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-user"></i>
                </span>
                <input id="username" type="text" placeholder="Username" class="form-control" />
            </div>
        </div>
        <div class="form-group">
        	<label>Password</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-key"></i>
                </span>
                <input id="password" type="password" placeholder="Password" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-key"></i>
                </span>
                <input id="password2" type="password" placeholder="Re-type Password" class="form-control" />
            </div>
        </div>
        <div class="form-group">
        	<div class="input-group">            
			<?php
            $user = $this->db->get('user');
            foreach($user->result() as $row){
            ?>
            	<input id="update_acount" data-user-id="<?php echo $this->session->userdata('id');?>" type="button" data-loading-text="Loading..." placeholder="Password" class="btn btn-primary" value="Update" />
            </div>
            <?php };?>
        </div>
      </div>
    </div>
  </div>
</div>