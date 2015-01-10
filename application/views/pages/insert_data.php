<?php $this->load->view('pages/script');?>


<div style="margin-top: 2%" class="form-group">
    <header><h4>Add Hotel Info</h4></header>
</div>

<div class="row" style="margin-top: 0%">
    <div class="col-sm-4 col-md-offset-4">
        
        <div class="form-group">
            <div id="alert-success" style="position: absolute;width: 92%;margin-top:-15%;display: none" class="alert alert-success">Successfull Added !
            </div>
        </div>
    
        <div class="form-group">
          <label><small>Hotel Name</small></label>
          <?php $h_name = array(
                        'name'=>'h_name',
                        'autocomplete'=>'off',
                        'id'=>'h_name',
                        'class'=>'form-control
                        '); 
                echo form_input($h_name)
          ;?>
        </div>
        
        <div class="form-group">
          <label><small>Hotel Location</small></label>
          <div class="input-group">
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-road"></i>
            </span>
          <?php $h_loc = array(
                        'name'=>'h_location',
                        'autocomplete'=>'off',
                        'id'=>'h_location',
                        'class'=>'form-control
                        '); 
                echo form_input($h_loc)
          ;?>
          </div>
          <label style="margin-top: 3%"><small>Area | Province</small></label>
              <?php $h_area_code = array(
                            'name'=>'h_area_code',
                            'id'=>'h_area_code',
                            'class'=>'form-control',
                            'placeholder'=> 'ex. Aklan, Naga, Bohol'
                            ); 
                    echo form_input($h_area_code)
              ;?>
        </div>
        
        <div class="form-group">
          <label><small>Contact Number </small></label>
          <div class="input-group">
            <?php $h_cont = array(
                    'name'=>'h_contact',
                    'autocomplete'=>'off',
                    'id'=>'h_contact',
                    'class'=>'form-control',
					'cols'=>'55',
					'rows'=>'3'
                    );
                    echo form_textarea($h_cont) 
             ;?>
          </div>
        </div>
        
        <div class="form-group">
          <label><small>Email Address </small></label>
          <div class="input-group">
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-envelope"></i>
            </span>
          <?php $h_email = array(
                        'name'=>'h_email',
                        'autocomplete'=>'off',
                        'id'=>'h_email',
                        'class'=>'form-control'
                        ); 
                echo form_input($h_email) 
          ;?>
          </div>
        </div>
        
        <div class="form-group" id="b-offset">
        	<header><h4>Bank Details</h4></header>
        </div>
        
        <div class="form-group">
            <header><h4>Bank 1</h4></header>
        </div>
        
        <div class="form-group">
          <label><small>Bank Name </small></label>
          <div class="input-group">
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-">&nbsp;</i>
            </span>
          <?php $b_name = array(
                        'name'=>'b_name1',
                        'autocomplete'=>'off',
                        'id'=>'b_name1',
                        'class'=>'form-control'
                        ); 
                echo form_input($b_name) 
          ;?>
          </div>
        </div>
        
        <div class="form-group">
          <label><small>Account Number </small></label>
          <div class="input-group">
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-">#</i>
            </span>
          <?php $b_number = array(
                        'name'=>'b_number1',
                        'autocomplete'=>'off',
                        'id'=>'b_number1',
                        'class'=>'form-control'
                        ); 
                echo form_input($b_number) 
          ;?>
          </div>
        </div>
        
        <div class="form-group">
          <label><small>Account Name </small></label>
          <div class="input-group">
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-">&nbsp;</i>
            </span>
          <?php $b_account = array(
                        'name'=>'b_acount1',
                        'autocomplete'=>'off',
                        'id'=>'b_acount1',
                        'class'=>'form-control'
                        ); 
                echo form_input($b_account) 
          ;?>
          </div>
        </div>
        
        <div id="b" class="form-group">
            <i id="b_more" class="glyphicon glyphicon-plus"></i>
        	<a id="b_more" href="javascript:void(0)">Add more</a>
        </div>
        
        <div id="banks" style="display: none;">
        	<div class="form-group">
                <header><h4>Bank 2</h4></header>
            </div>
            
        	<div class="form-group">
              <label><small>Bank Name </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">&nbsp;</i>
                </span>
              <?php $b_name = array(
                            'name'=>'b_name2',
                            'autocomplete'=>'off',
                            'id'=>'b_name2',
                            'class'=>'form-control'
                            ); 
                    echo form_input($b_name) 
              ;?>
              </div>
            </div>
            
            <div class="form-group">
              <label><small>Account Number </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">#</i>
                </span>
              <?php $b_number = array(
                            'name'=>'b_number2',
                            'autocomplete'=>'off',
                            'id'=>'b_number2',
                            'class'=>'form-control'
                            ); 
                    echo form_input($b_number) 
              ;?>
              </div>
            </div>
            
            <div class="form-group">
              <label><small>Account Name </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">&nbsp;</i>
                </span>
              <?php $b_account = array(
                            'name'=>'b_acount2',
                            'autocomplete'=>'off',
                            'id'=>'b_acount2',
                            'class'=>'form-control'
                            ); 
                    echo form_input($b_account) 
              ;?>
              </div>
            </div>
            <!--end-->
            <div class="form-group">
                <header><h4>Bank 3</h4></header>
            </div>
            
        	<div class="form-group">
              <label><small>Bank Name </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">&nbsp;</i>
                </span>
              <?php $b_name = array(
                            'name'=>'b_name3',
                            'autocomplete'=>'off',
                            'id'=>'b_name3',
                            'class'=>'form-control'
                            ); 
                    echo form_input($b_name) 
              ;?>
              </div>
            </div>
            
            <div class="form-group">
              <label><small>Account Number </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">#</i>
                </span>
              <?php $b_number = array(
                            'name'=>'b_number3',
                            'autocomplete'=>'off',
                            'id'=>'b_number3',
                            'class'=>'form-control'
                            ); 
                    echo form_input($b_number) 
              ;?>
              </div>
            </div>
            
            <div class="form-group">
              <label><small>Account Name </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">&nbsp;</i>
                </span>
              <?php $b_account = array(
                            'name'=>'b_acount3',
                            'autocomplete'=>'off',
                            'id'=>'b_acount3',
                            'class'=>'form-control'
                            ); 
                    echo form_input($b_account) 
              ;?>
              </div>
            </div>
            <!--end-->
            <div class="form-group">
                <header><h4>Bank 4</h4></header>
            </div>
            
        	<div class="form-group">
              <label><small>Bank Name </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">&nbsp;</i>
                </span>
              <?php $b_name = array(
                            'name'=>'b_name4',
                            'autocomplete'=>'off',
                            'id'=>'b_name4',
                            'class'=>'form-control'
                            ); 
                    echo form_input($b_name) 
              ;?>
              </div>
            </div>
            
            <div class="form-group">
              <label><small>Account Number </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">#</i>
                </span>
              <?php $b_number = array(
                            'name'=>'b_number4',
                            'autocomplete'=>'off',
                            'id'=>'b_number4',
                            'class'=>'form-control'
                            ); 
                    echo form_input($b_number) 
              ;?>
              </div>
            </div>
            
            <div class="form-group">
              <label><small>Account Name </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">&nbsp;</i>
                </span>
              <?php $b_account = array(
                            'name'=>'b_acount4',
                            'autocomplete'=>'off',
                            'id'=>'b_acount4',
                            'class'=>'form-control'
                            ); 
                    echo form_input($b_account) 
              ;?>
              </div>
            </div>
            <!--end-->
            <div class="form-group">
                <header><h4>Bank 5</h4></header>
            </div>
            
        	<div class="form-group">
              <label><small>Bank Name </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">&nbsp;</i>
                </span>
              <?php $b_name = array(
                            'name'=>'b_name5',
                            'autocomplete'=>'off',
                            'id'=>'b_name5',
                            'class'=>'form-control'
                            ); 
                    echo form_input($b_name) 
              ;?>
              </div>
            </div>
            
            <div class="form-group">
              <label><small>Account Number </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">#</i>
                </span>
              <?php $b_number = array(
                            'name'=>'b_number5',
                            'autocomplete'=>'off',
                            'id'=>'b_number5',
                            'class'=>'form-control'
                            ); 
                    echo form_input($b_number) 
              ;?>
              </div>
            </div>
            
            <div class="form-group">
              <label><small>Account Name </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">&nbsp;</i>
                </span>
              <?php $b_account = array(
                            'name'=>'b_acount5',
                            'autocomplete'=>'off',
                            'id'=>'b_acount5',
                            'class'=>'form-control'
                            ); 
                    echo form_input($b_account) 
              ;?>
              </div>
            </div>    
        </div>
        
        <div class="form-group">
            <?php echo form_submit(array('id'=>'add_hotel_info','class'=>'btn btn-success'),"Add Data");?>
            </div>
        </div>
        
    </div>
</div>