<script styp="text/javascript">
function check(){
	var check_session;  
	var str="cheksession=true";          
	jQuery.ajax({                  
		type: "POST",                  
		url: config.base_url+"/ajax_checker/check_session",                  
		data: str,                  
		cache: false,                 
		success: function(res){                      
			if(res == "1") {                      
				location.reload();                     
			}               
		}         
	});
}
setInterval(check, 500);
$(document).ready(function(e) {
	$('#footer').hide(); 
});
</script>

<?php echo form_open('login/validate');?>
<div class="row col-md-12" style="margin-top: 5%;">
    <div class="row col-md-4 col-md-offset-4 form-group">
        <header><h2 id="header-text">FORHOTELS</h2></header>
    	<?php echo $error;?>
    </div>
    <div id="login-form" class="row col-md-4 col-md-offset-4">
        <div class="form-group">
          <label><small>Username</small></label>
          <div class="input-group">
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-user"></i>
            </span>
          <?php $username = array(
                        'name'=>'username',
                        'autocomplete'=>'off',
                        'id'=>'username',
                        'class'=>'form-control',
						'value'=>set_value('username')
                        ); 
                echo form_input($username)
          ;?>
          </div>
        </div>
        
        <div class="form-group">
          <label><small>Password</small></label>
          <div class="input-group">
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-lock"></i>
            </span>
          <?php $password = array(
                        'name'=>'password',
                        'autocomplete'=>'off',
                        'id'=>'password',
                        'class'=>'form-control',
						); 
                echo form_password($password)
          ;?>
          </div>
        </div>
        
        <div class="form-group">
          <?php /*$button = array(
		  				'style'=>'float:right',
                        'name'=>'submit',
                        'id'=>'submit_login',
                        'class'=>'btn btn-info pull-right'
                        ); 
                echo form_submit($button,'Login')*/
          ;?>
          <input type="checkbox" name="netid" /> Remember me?
          <button type="submit" name="submit" id="submit_login" class="btn btn-info pull-right">
          	Log in
          	<i class="glyphicon glyphicon-log-in"></i>
          </button>
        </div>
        
    </div>
    <div class="row col-md-4 col-md-offset-4 form-group">
        <p class="log-cop">&copy; Vigattin.com</p>
    </div>
</div>
<?php echo form_close();?>