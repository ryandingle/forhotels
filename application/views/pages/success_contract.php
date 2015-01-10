<?php $this->load->view('pages/script');?>

<?php echo form_open_multipart('contract/add_contract/'.$this->uri->segment(3));?>
<div class="row col-md-6 col-md-offset-3">
	<?php echo $error;?>
    <div style="margin-top: 30px">
    <?php foreach($info->result() as $row):?>
        <header><h4>Add Contract to <?php echo $row->h_name;?> Hotel</h4></header>
    <?php endforeach;?>
        <div style="margin-top: 30px" class="form-group">
          <label><small>Contract File </small></label>
          <?php $h_contract = array(
                        'type'=>'file',
                        'name'=>'userfile',
                        ); 
                echo form_input($h_contract)
          ;?>
        </div>
        <div class="form-group">
          <label><small>Published Rate </small></label>
          <?php $h_p_rate = array(
                        'name'=>'h_p_rate',
                        'autocomplete'=>'off',
                        'value'=>$row->h_p_rate,
                        'id'=>'h_p_rate',
                        'class'=>'form-control'
                        ); 
                echo form_input($h_p_rate)
          ;?>
        </div>
        <div class="form-group">
          <label><small>Discount %</small></label>
          <?php $h_d_rate = array(
                        'style'=>'width: 30%',
                        'name'=>'h_d_rate',
                        'autocomplete'=>'off',
                        'value'=>$row->h_d_rate,
                        'id'=>'h_d_rate',
                        'class'=>'form-control'
                        ); 
                echo form_input($h_d_rate) 
         ;?>
         <label style="margin-top: -11%;float: right; width: 50%"><small>Contracted Rate</small></label>
         <?php $h_show_rate = array(
                        'style'=>'margin-top: -7%;float: right; width: 50%',
                        'name'=>'h_c_rate',
                        'autocomplete'=>'off',
                        'value'=>$row->h_c_rate,
                        'id'=>'h_show_c_rate',
                        'class'=>'form-control',
                        'disabled'=>'disabled'
                        ); 
                echo form_input($h_show_rate) 
         ;?>
         <label style="margin-top: 1%;float: right; width: 50%"><small>Income</small></label>
         <?php $h_show_rate = array(
                        'style'=>'margin-top: 0%;margin-bottom: 2%;margin-left: 90%;float: right; width: 50%',
                        'name'=>'h_income',
                        'autocomplete'=>'off',
                        'value'=>$row->h_income,
                        'id'=>'h_show_income',
                        'class'=>'form-control',
                        'disabled'=>'disabled'
                        ); 
                echo form_input($h_show_rate) 
         ;?>
        </div>
        </div>
        <div class="form-group">
          <label><small>No. of pax</small></label>          
		  <?php 
          $identity = 'id="h_n_payment" title="Please select pax no." class="form-control"';
            $pax = array(
                            ''=>'',
                            '1'=>'1',
                            '2'=>'2',
                            '3'=>'3',
                            '4'=>'4',
                            '5'=>'5',
                            '6'=>'6',
                            '7'=>'7',
                            '8'=>'8',
                            '9'=>'9',
                            '10'=>'10',
            );
            echo form_dropdown('h_n_payment',$pax,$row->h_n_payment,$identity);
          ;?>
        </div>
        <div class="form-group">
          <label><small>Type of Room </small></label>
          <?php
            
            $room = $this->db->get('room_types')->result();
            //$identity = 'title="Please Select Room type." class="form-control"';
//            //foreach($room as $row){
//                $row = $room->row();
//                $room_type = array(
//                                ''=>'',
//                                $row->room_name => $row->room_name,
//                );
//            //}
//            echo form_dropdown('h_t_room',$room_type,set_value('h_t_room'),$identity);
//          ;?>
            <select name="h_t_room" title="PLease select room type!" class="form-control">
                <option></option>
            <?php foreach($room as $row){
                $names = $row->room_name;
                echo '<option value="'.$names.'" "'.set_select('myselect',set_value('h_t_room'), TRUE).'">'.$names.'</option>';
				}
			;?>
            </select>
        </div>
        <div class="form-group">
    <?php foreach($info->result() as $row):?>
          <label><small>Validity Dates</small></label>
          <?php $h_val = array(
		  			'style'=>'width: 40%',
                    'name'=>'h_val',
                    'id'=>'h_val',
                    'autocomplete'=>'off',
                    'class'=>'form-control',
                    'value'=> $row->h_val,
                    'placeholder'=>'Select Validity Date Below'
                    ); 
                echo form_input($h_val) 
          ;?>
        <div>
        <div class="form-group">
        <label></label>
          <?php $h_val = array(
		  			'style'=>'width: 40%',
                    'id'=>'date1',
					'name'=>'date1',
                    'autocomplete'=>'off',
                    'class'=>'form-control',
                    'value'=> $row->val1,
                    'placeholder'=>'Not set'
                    ); 
                echo form_input($h_val) 
          ;?>
        <div>
        <div class="form-group">
        <label></label>
          <?php $h_val = array(
		  			'style'=>'width: 40%',
                    'id'=>'date2',
					'name'=>'date2',
                    'autocomplete'=>'off',
                    'class'=>'form-control',
                    'value'=> $row->val2,
                    'placeholder'=>'Not set'
                    ); 
                echo form_input($h_val) 
          ;?>
        <div>
        <div class="form-group">
        <label></label>
          <?php $h_val = array(
		  			'style'=>'width: 40%',
                    'id'=>'date3',
					'name'=>'date3',
                    'autocomplete'=>'off',
                    'class'=>'form-control',
                    'value'=> $row->val3,
                    'placeholder'=>'Not set'
                    ); 
                echo form_input($h_val) 
          ;?>
        <div>
        <div class="form-group">
        <label></label>
          <?php $h_val = array(
		  			'style'=>'width: 40%',
					'name'=>'date4',
                    'id'=>'date4',
                    'autocomplete'=>'off',
                    'class'=>'form-control',
                    'value'=> $row->val4,
                    'placeholder'=>'Not set'
                    ); 
                echo form_input($h_val) 
          ;?>
        <div>
        
        <div class="form-group">
        	<input type="hidden" name="income" id="income" value=""/>
        	<input type="hidden" name="contracted_rate" id="contracted_rate" value=""/>
        	<!--<input type="hidden" name="date1" id="date1" value=""/>
            <input type="hidden" name="date2" id="date2" value="" />
            <input type="hidden" name="date3" id="date3" value="" />
            <input type="hidden" name="date4" id="date4" value="" />-->
        </div>
        
        <div class="form-group">
            <div id="dates" style="margin-top: 5%"  class="well">
            <table style="text-align:center" class="table">
                <tr><td>Start</td><td>End</td></tr>
                <tr>
                    <td>
                        <?php $h_val = array(
                        'name'=>'start1',
                        'id'=>'dpd1',
                        'autocomplete'=>'off'
                        ); 
                            echo form_input($h_val) 
                       ;?>
                    </td>
                    <td>
                        <?php $h_val = array(
                        'name'=>'end1',
                        'id'=>'dpd2',
                        'autocomplete'=>'off',
                        ); 
                            echo form_input($h_val) 
                      ;?>      	
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php $h_val = array(
                        'name'=>'new1',
                        'id'=>'new1',
						'class'=>'date2',
                        'autocomplete'=>'off',
                        'placeholder'=>'Optional'
                        ); 
                            echo form_input($h_val) 
                      ;?>      	
                    </td>
                    <td>
                        <?php $h_val = array(
                        'name'=>'new11',
                        'id'=>'new11',
						'class'=>'date2',
                        'autocomplete'=>'off',
                        'placeholder'=>'Optional'
                        ); 
                            echo form_input($h_val) 
                      ;?>                
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php $h_val = array(
                        'name'=>'new2',
                        'id'=>'new2',
						'class'=>'date2',
                        'autocomplete'=>'off',
                        'placeholder'=>'Optional'
                        ); 
                            echo form_input($h_val) 
                      ;?>
                    </td>
                    <td>
                      <?php $h_val = array(
                        'name'=>'new22',
                        'id'=>'new22',
						'class'=>'date2',
                        'autocomplete'=>'off',
                        'placeholder'=>'Optional'
                        ); 
                            echo form_input($h_val) 
                      ;?>
                    
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php $h_val = array(
                        'name'=>'new3',
                        'id'=>'new3',
						'class'=>'date2',
                        'autocomplete'=>'off',
                        'placeholder'=>'Optional'
                        ); 
                            echo form_input($h_val) 
                      ;?>
                    </td>
                    <td>
                        <?php $h_val = array(
                        'name'=>'new33',
                        'id'=>'new33',
						'class'=>'date2',
                        'autocomplete'=>'off',
                        'placeholder'=>'Optional'
                        ); 
                            echo form_input($h_val) 
                      ;?>
    
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php $h_val = array(
                        'name'=>'new4',
                        'id'=>'new4',
						'class'=>'date2',
                        'autocomplete'=>'off',
                        'placeholder'=>'Optional'
                        ); 
                            echo form_input($h_val) 
                      ;?>
                    </td>
                    <td>
                        <?php $h_val = array(
                        'name'=>'new44',
                        'id'=>'new44',
						'class'=>'date2',
                        'autocomplete'=>'off',
                        'placeholder'=>'Optional'
                        ); 
                            echo form_input($h_val) 
                      ;?>
                    </td>
                </tr>
            </table>
            </div>
        </div>    
        <?php endforeach;?>    
        </div>
    </div>
     <div class="form-group">
		<?php echo form_submit(array('id'=>'save','class'=>'btn btn-success'),"Save");?>
        </div>
    </div>
</div>  
<?php echo form_close();?>