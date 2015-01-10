<?php $this->load->view('pages/script');?>
<?php foreach($sep->result() as $row){ ?>
<?php echo form_open_multipart('welcome/update_edit/'.$row->id.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5)) ;?>
<div style="margin-top: 5%" class="col-sm-6 col-md-offset-3">
    <div class="panel panel-info">   
        <div class="panel-heading">Edit Hotel Info
            <a href="<?php echo base_url();?>welcome/view_data"><button type="button" class="close" aria-hidden="true">&times;</button></a>
        </div>
   
		<div class="panel-body">
		<?php echo $error;?>
        <div class="form-group">
        
        
<?php 
if($this->uri->segment(3) == '101')
{
	echo '<input type="hidden" value="carmela" name="forcarmela" id="forcarmela" />';
}
else{ 
	echo '<input type="hidden" value="" name="forcarmela" id="forcarmela" />';
}
?>
          <label><small>Hotel Name</small></label>
          <?php $h_name = array(
                        'name'=>'h_name',
                        'id'=>'h_name',
                        'class'=>'form-control',
                        'value'=> $row->h_name
                        ); 
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
                            'name'=>'h_loc',
                            'id'=>'h_loc',
                            'class'=>'form-control',
                            'value'=> $row->h_location
                            ); 
                    echo form_input($h_loc)
              ;?>
           </div>
           <label style="margin-top: 3%"><small>Area | Province</small></label>
              <?php $h_area_code = array(
                            'name'=>'h_area_code',
                            'id'=>'h_area_code',
                            'class'=>'form-control',
                            'value'=> $row->h_area_code,
                            'placeholder'=> 'ex. Aklan, Naga, Bohol'
                            ); 
                    echo form_input($h_area_code)
              ;?>
         
        </div>
        
        <div class="form-group">
          <label><small>Contact. number </small></label>
          <div class="input-group">
              <?php $h_cont = array(
                            'name'=>'h_cont',
                            'id'=>'h_cont',
                            'class'=>'form-control',
                            'value'=> $row->h_contact,
							'cols'=>'100',
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
                        'id'=>'h_email',
                        'class'=>'form-control',
                        'value'=> $row->h_email
                        ); 
                echo form_input($h_email) 
          ;?>
          </div>
        </div>
        
        <div class="form-group">
          <label><small>Inclusions </small></label>
          <div class="input-group">
              <ul class="pagination pagination-centered" style="margin-bottom: -0.1%;width: 100%">
                    <li>
                        <button title="Bold" type="button" onclick="iBold()">
                        <i class="fa fa-bold"></i>
                        </button>
                    </li>
                    <li style="margin-left: -.9%;">
                        <button id="u" title="Underline" type="button" onclick="iUnderline()">
                        <i class="fa fa-underline"></i>
                        </button>
                    </li>
                    <!--<li>
                        <button id="hr" title="Horizontal Rule(hr)" type="button" onclick="iHorizontalRule()">
                        <i class="glyphicon glyphicon-ruller"></i>
                        </button>
                    </li>-->
                    <li style="margin-left: -.9%;">
                        <button id="ul" title="Unbulleted | UnOrderedList" type="button" onclick="iUnorderedList()">
                        <i class="fa fa-list-ol"></i>
                        </button>
                    </li>
                    <li style="margin-left: -.9%;">
                        <button id="ol" title="bulleted | OrderedList" type="button" onclick="iOrderedList()">
                        <i class="fa fa-list-ul"></i>
                        </button>
                    </li>
                    <li style="margin-left: -.9%;">
                        <button id="hyperlink" title="Hyperlink | Link" type="button" onclick="iLink()">
                        <i class="fa fa-link"></i>
                        </button>
                    </li>
                    <!--<li style="margin-left: -.9%;">
                        <button id="unlink" title="Unlink" type="button" onclick="iUnLink()">
                        <i class="glyphicon glyphicon-link"></i>
                        </button>
                    </li>-->
                </ul>
            <div onkeyup="change()" name="h_inclusions" id="h_inclusions" class="form-control" contenteditable="true" tabindex="0" role="textbox" aria-multiline="true" style="overflow: hidden;height: 100px;width: 505px;padding: 5px;">
                <?php echo $row->h_inclusions;?>
            </div>
              <?php $b_name = array(
                            'name'=>'h_inclusions',
                            'id'=>'h_inclusion_real',
                            'class'=>'form-control',
                            'value'=>$row->h_inclusions,
                            'style'=>'display: none'
                            ); 
                    echo form_textarea($b_name) 
              ;?>
          </div>
        </div>
        
        <div class="form-group" id="b-offset">
            <header>
                <h4>Bank Details
                <a title="Edit Bank Details" id="click_bank" style="float: right" href="javascript:void(0);"><i class="glyphicon glyphicon-edit"></i></a></h4>
            </header>
        </div>
        
        <div id="banks_edit" style="display: none;">
            <header><h4>Bank 1</h4></header>
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
                            'class'=>'form-control',
                            'value'=>$row->b_name1,
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
                            'class'=>'form-control',
                            'value'=>$row->b_number1,
                            ); 
                    echo form_input($b_number) 
              ;?>
              </div>
            </div>
        
            <div style="margin-bottom: 10%;" class="form-group">
              <label><small>Account Name </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">&nbsp;</i>
                </span>
              <?php $b_account = array(
                            'name'=>'b_acount1',
                            'autocomplete'=>'off',
                            'id'=>'b_acount1',
                            'class'=>'form-control',
                            'value'=>$row->b_acount1,
                            ); 
                    echo form_input($b_account) 
              ;?>
              </div>
            </div>
        
            <header><h4>Bank 2</h4></header>
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
                            'class'=>'form-control',
                            'value'=>$row->b_name2,
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
                            'class'=>'form-control',
                            'value'=>$row->b_number2,
                            ); 
                    echo form_input($b_number) 
              ;?>
              </div>
            </div>
        
            <div style="margin-bottom: 10%;" class="form-group">
              <label><small>Account Name </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">&nbsp;</i>
                </span>
              <?php $b_account = array(
                            'name'=>'b_acount2',
                            'autocomplete'=>'off',
                            'id'=>'b_acount2',
                            'class'=>'form-control',
                            'value'=>$row->b_acount2,
                            ); 
                    echo form_input($b_account) 
              ;?>
              </div>
            </div>
        
            <header><h4>Bank 3</h4></header>
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
                            'class'=>'form-control',
                            'value'=>$row->b_name3,
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
                            'class'=>'form-control',
                            'value'=>$row->b_number3,
                            ); 
                    echo form_input($b_number) 
              ;?>
              </div>
            </div>
        
            <div style="margin-bottom: 10%;" class="form-group">
              <label><small>Account Name </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">&nbsp;</i>
                </span>
              <?php $b_account = array(
                            'name'=>'b_acount3',
                            'autocomplete'=>'off',
                            'id'=>'b_acount3',
                            'class'=>'form-control',
                            'value'=>$row->b_acount3,
                            ); 
                    echo form_input($b_account) 
              ;?>
              </div>
            </div>
        
            <header><h4>Bank 4</h4></header>
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
                            'class'=>'form-control',
                            'value'=>$row->b_name4,
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
                            'class'=>'form-control',
                            'value'=>$row->b_number4,
                            ); 
                    echo form_input($b_number) 
              ;?>
              </div>
            </div>
        
            <div style="margin-bottom: 10%;" class="form-group">
              <label><small>Account Name </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">&nbsp;</i>
                </span>
              <?php $b_account = array(
                            'name'=>'b_acount4',
                            'autocomplete'=>'off',
                            'id'=>'b_acount4',
                            'class'=>'form-control',
                            'value'=>$row->b_acount4,
                            ); 
                    echo form_input($b_account) 
              ;?>
              </div>
            </div>
            
            <header><h4>Bank 5</h4></header>
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
                            'class'=>'form-control',
                            'value'=>$row->b_name5,
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
                            'class'=>'form-control',
                            'value'=>$row->b_number5,
                            ); 
                    echo form_input($b_number) 
              ;?>
              </div>
            </div>
            
            <div style="margin-bottom: 10%;" class="form-group">
              <label><small>Account Name </small></label>
              <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-">&nbsp;</i>
                </span>
              <?php $b_account = array(
                            'name'=>'b_acount5',
                            'autocomplete'=>'off',
                            'id'=>'b_acount5',
                            'class'=>'form-control',
                            'value'=>$row->b_acount5,
                            ); 
                    echo form_input($b_account) 
              ;?>
              </div>
            </div>
        </div>
        
        <div class="form-group">
            <header>
                <h4>Contracted Rates</h4>
            </header>
        </div>
        
        <div style="margin-top: 30px" class="form-group">
          <label><small>Contract File </small></label>
          <?php $h_contract = array(
                        'type'=>'file',
                        'name'=>'userfile',
                        ); 
                echo form_input($h_contract)
          ;?>
        </div>
        
        <div class="form-group" id="rooms">
            <label style="display: block"><small>Type of Room </small></label>
              <?php
			  $this->db->order_by('room_name',"ASC");
              $room = $this->db->get('room_types')->result();
              
              
              $this->db->where('from_hotel',$this->uri->segment(3));
              $added_room = $this->db->get('added_rooms')->result();
              $this->db->order_by('new_room',"ASC");
              
              $this->db->where('from_hotel',$this->uri->segment(3));
              $room_count = $this->db->get('added_rooms');
              $this->db->order_by('new_room',"ASC");
              ;?>
              
            <input type="text" value="<?php echo $row->h_t_room;?>" data-count="" name="h_t_room1" id="h_t_room" title="PLease select room type!" class="form-control">
            
            <!--<div style="width: 90%;margin-top: 1%;float:left;">
            	<input style="display: block;" type="text" id="add_room_type1" data-count="1" class="form-control n_r" placeholder="Add new type of room."/>
            </div>-->
            <input type="hidden" name="room_count"data-count="" id="room_count" value="<?php echo $row_last;?>"  />
            <input type="hidden" name="before_count" data-count="" id="before_count" value="<?php echo $row_last;?>"  />
            <!--<a id="add_r_cat" data-count="1" href="javascript:void(0);" style="float: right;margin-top: 1%">Add&nbsp;<i class="glyphicon glyphicon-plus"></i>
            </a>-->
        </div>
        
        
        <div class="form-group">
              <label><small>Published Rate </small></label>
              <?php $h_p_rate = array(
                            'name'=>'h_p_rate',
                            'autocomplete'=>'off',
                            'value'=>$row->h_p_rate,
                            'id'=>'h_p_rate',
                            'class'=>'form-control h_p_rate',
                            'data-count'=>''
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
                        'class'=>'form-control h_d_rate',
                        'data-count'=>''
                        ); 
                echo form_input($h_d_rate) 
         ;?>
         <label style="margin-top: -11%;float: right; width: 50%"><small>Contracted Rate(CR)</small></label>
         <?php //$h_show_income = array(
//                        'style'=>'margin-top: -7%;float: right; width: 50%',
//                        'name'=>'h_c_rate',
//                        'autocomplete'=>'off',
//                        'value'=>$row->h_income,
//                        'id'=>'h_show_c_rate',
//                        'class'=>'form-control',
//                        'disabled'=>'disabled',
//                        'data-count'=>''
//                        ); 
//                echo form_input($h_show_income) 
//         ;?>	
		 	<input type="text" name="h_c_rate" style="margin-top: -7%;float: right; width: 50%" autocomplete="off" value="<?php echo $row->h_c_rate;?>" id="h_show_c_rate" class="form-control" data-count="" disabled="disabled" />
            
         <!--<label style="margin-top: 1%;float: right; width: 50%"><small>Income(I)</small></label>
         <?php //$h_show_rate = array(
//                        'style'=>'margin-top: 0%;margin-bottom: 2%;margin-left: 90%;float: right; width: 50%',
//                        'name'=>'h_income',
//                        'autocomplete'=>'off',
//                        'value'=>$row->h_c_rate,
//                        'id'=>'h_show_income',
//                        'class'=>'form-control',
//                        'disabled'=>'disabled',
//                        'data-count'=>''
//                        ); 
//                echo form_input($h_show_rate) 
//         ;?>

			<input type="text" name="h_income" style="margin-top: 0%;margin-bottom: 2%;margin-left: 90%;float: right; width: 50%" autocomplete="off" value="<?php echo $row->h_c_rate;?>" id="h_show_income" class="form-control" data-count="" disabled="disabled" />-->
        </div>
        
        <div class="form-group">
        <label style="margin-top: 1%;"><small>VP = M * CR (Where M = 47%)</small></label>
         <?php $h_show_vp = array(
                        'style'=>'margin-top: 0%;margin-bottom: 2%; width: 50%',
                        'name'=>'h_vp',
                        'autocomplete'=>'off',
                        'value'=>$row->h_vp,
                        'id'=>'h_show_vp',
                        'class'=>'form-control',
                        'disabled'=>'disabled',
                        'data-count'=>''
                        ); 
                echo form_input($h_show_vp) 
         ;?>
        </div>
        
        <div class="form-group">
          <label><small>No. of pax(NP)</small></label>          
          <?php 
          $identity = 'id="h_n_payment" data-count="" title="Please select pax no." style="width: 50%" class="form-control h_n_payment"';
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
            echo form_dropdown('h_n_payment1',$pax,$row->h_n_payment,$identity);
          ;?>
        </div>
        
        <div class="form-group">
        <label style="margin-top: 1%;"><small>VP_less = VP / NP</small></label>
         <?php $h_show_vp_less = array(
                        'style'=>'width: 40%',
                        'name'=>'h_vp_less',
                        'autocomplete'=>'off',
                        'value'=>$row->h_vp_less,
                        'id'=>'h_show_vp_less',
                        'class'=>'form-control',
                        'disabled'=>'disabled',
                        'data-count'=>''
                        ); 
                echo form_input($h_show_vp_less) 
         ;?>
         <label style="float: right; width: 50%"><small>Per Room = ((VP_Less * NP) -  CR)</small></label>
         <?php $h_show_per_room = array(
                        'style'=>'margin-top: 0%;margin-bottom: 2%;margin-left: 90%;float: right; width: 50%',
                        'name'=>'h_pr',
                        'autocomplete'=>'off',
                        'value'=>$row->h_pr,
                        'id'=>'h_show_pr',
                        'class'=>'form-control',
                        'disabled'=>'disabled',
                        'data-count'=>''
                        ); 
                echo form_input($h_show_per_room) 
         ;?>
        </div>
        
            
        <div class="form-group">
            <!--<input type="hidden" data-count="" name="income" id="income" value="<?php echo $row->h_c_rate;?>"/>-->
            <input type="hidden" data-count="" name="rate_per_room" id="rate_per_room" value="<?php echo $row->h_rate_per_room;?>"/>
            <input type="hidden" data-count="" name="contracted_rate" id="contracted_rate" value="<?php echo $row->h_c_rate;?>"/>
            <input type="hidden" data-count="" name="vp" id="vp" value="<?php echo $row->h_vp;?>" />
            <input type="hidden" data-count="" name="vp_less" id="vp_less"value="<?php echo $row->h_vp_less;?>" />
            <input type="hidden" data-count="" name="pr" id="pr" value="<?php echo $row->h_pr;?>" />
        </div>
            
            
        <div class="form-group">
            <label style="margin-top: 5%"><small>Validity Dates</small></label>
            <div id="dates" class="well from_">
            <table style="text-align:center" class="table">
                <tr><td>Start</td><td>End</td></tr>
                <tr>
                    <td>
                        <input name="val1" type="date"  class="form-control" value="<?php echo $row->val1;?>"/>
                    </td>
                    <td>
                        <input name="val2" id="" type="date"  class="form-control" value="<?php echo $row->val2;?>"/>      	
                    </td>
                </tr>
                    
                <tr>
                    <td>
                        <input name="val3" type="date" class="form-control" value="<?php echo $row->val3;?>"/>
                    </td>
                    <td>
                        <input name="val4" type="date" class="form-control" value="<?php echo $row->val4;?>"/>      	
                    </td>
                </tr>
                    
                <tr>
                    <td>
                        <input name="val5" type="date"  class="form-control" value="<?php echo $row->val5;?>"/>
                    </td>
                    <td>
                        <input name="val6" id="" type="date"  class="form-control" value="<?php echo $row->val6;?>"/>      	
                    </td>
                </tr>
                    
                <tr>
                    <td>
                        <input name="val7" type="date"  class="form-control" value="<?php echo $row->val7;?>"/>
                    </td>
                    <td>
                        <input name="val8" id="" type="date"  class="form-control" value="<?php echo $row->val8;?>"/>      	
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <input name="val9" type="date"  class="form-control" value="<?php echo $row->val9;?>"/>
                    </td>
                    <td>
                        <input name="val10" type="date"  class="form-control" value="<?php echo $row->val10;?>"/>      	
                    </td>
                </tr>
                <tr id="d2" style="display: none">
                    <td>
                        <input name="val11" type="date" class="form-control" value="<?php echo $row->val11;?>"/>
                    </td>
                    <td>
                        <input name="val12" type="date" class="form-control" value="<?php echo $row->val12;?>"/>      	
                    </td>
                </tr>
                <tr id="d2" style="display: none">
                    <td>
                        <input name="val13" type="date"  class="form-control" value="<?php echo $row->val13;?>"/>
                    </td>
                    <td>
                        <input name="val14" type="date"  class="form-control" value="<?php echo $row->val14;?>"/>      	
                    </td>
                </tr>
                <tr id="d2" style="display: none">
                    <td>
                        <input name="val15" type="date"  class="form-control" value="<?php echo $row->val15;?>"/>
                    </td>
                    <td>
                        <input name="val16" id="" type="date"  class="form-control" value="<?php echo $row->val16;?>"/>      	
                    </td>
                </tr>
                <tr id="d2" style="display: none">
                    <td>
                        <input name="val17" type="date"  class="form-control" value="<?php echo $row->val17;?>"/>
                    </td>
                    <td>
                        <input name="val18" id="" type="date"  class="form-control" value="<?php echo $row->val18;?>"/>      	
                    </td>
                </tr>
                <tr id="d2" style="display: none">
                    <td>
                        <input name="val19" type="date"  class="form-control" value="<?php echo $row->val19;?>"/>
                    </td>
                    <td>
                        <input name="val20" id="" type="date"  class="form-control" value="<?php echo $row->val20;?>"/>      	
                    </td>
                </tr>
                <tr id="d3" style="display: none">
                    <td>
                        <input name="val21" type="date"  class="form-control" value="<?php echo $row->val21;?>"/>
                    </td>
                    <td>
                        <input name="val22" type="date"  class="form-control" value="<?php echo $row->val22;?>"/>      	
                    </td>
                </tr>
                <tr id="d3" style="display: none">
                    <td>
                        <input name="val23" type="date"  class="form-control" value="<?php echo $row->val23;?>"/>
                    </td>
                    <td>
                        <input name="val24" id="" type="date"  class="form-control" value="<?php echo $row->val24;?>"/>      	
                    </td>
                </tr>
                <tr id="d3" style="display: none">
                    <td>
                        <input name="val25" type="date"  class="form-control" value="<?php echo $row->val25;?>"/>
                    </td>
                    <td>
                        <input name="val26" id="" type="date"  class="form-control" value="<?php echo $row->val26;?>"/>      	
                    </td>
                </tr>
                <tr id="d3" style="display: none">
                    <td>
                        <input name="val27" type="date"  class="form-control" value="<?php echo $row->val27;?>"/>
                    </td>
                    <td>
                        <input name="val28" id="" type="date"  class="form-control" value="<?php echo $row->val28;?>"/>      	
                    </td>
                </tr>
                <tr id="d3" style="display: none">
                    <td>
                        <input name="val29" type="date"  class="form-control" value="<?php echo $row->val29;?>"/>
                    </td>
                    <td>
                        <input name="val30" id="" type="date"  class="form-control" value="<?php echo $row->val30;?>"/>      	
                    </td>
                </tr>
                <tr id="date_append">
                	<td colspan="2">
						<input type="hidden" name="date_count1" data-count="1" id="date_count1" value="10"  />
                    	<a  data-count="" data-show="2" data-from="<?php echo $row->id;?>" id="add_new_date" href="javascript:;" style="float: right">Show More <i class="fa fa-plus"></i></a>
                        <a data-count=""  data-show="3" data-from="<?php echo $row->id;?>" id="add_new_date" class="add_new_date" href="javascript:;" style="float: right;display: none">Show More <i class="fa fa-plus"></i></a>
                    </td>
            </table>
            </div>
        </div>
        
        <!--get the new room type-->
        
         <div id="view-hotels" class="form-group">
         	<label>Other Room Details</label>
         </div>
        <?php
         
		 $this->db->where('from_hotel',$this->uri->segment(3));
         $p = $this->db->get('added_rooms');
         foreach($p->result() as $getme){?>
         <div id="view-hotels" class="form-group">
         	<div class="alert alert-warning seperate<?php echo $getme->room_count;?>">
            	<strong class="seperate_hotel_<?php echo $getme->room_count;?>"><?php echo $getme->new_room;?></strong>
                <a id="slide-hotel" data-count="<?php echo $getme->room_count;?>" class="slide-hotel<?php echo $getme->room_count;?>" href="javascript:;" style="float: right">
                <strong>Edit</strong>
                <i class="glyphicon glyphicon-edit"></i>
                </a>
                
                <a style="display:none" id="close-hotel" class="close-hotel<?php echo $getme->room_count;?>" data-count="<?php echo $getme->room_count;?>" href="javascript:;" style="float: right">
                <strong>Close</strong>
                <i class="glyphicon glyphicon-open"></i>
                </a>
                
                <a id="delete-hotel" data-from="<?php echo $getme->from_hotel;?>" data-count="<?php echo $getme->room_count;?>" class="delete-hotel<?php echo $getme->room_count;?>" href="javascript:;" style="float: right">
                <strong>Delete</strong>
                <i class="glyphicon glyphicon-trash">&nbsp;</i>
                </a>
            </div>
         </div>
         
         <!--<div style="position: fixed;height: 100%;width: 100%;border: 1px solid gray" id="loader">Loading..</div>-->
         
         <div id="new_sec0<?php echo $getme->room_count;?>" data-count="<?php echo $getme->room_count;?>" style="border-top: 1px solid #ccc;padding-top: 3%;display: none;">
           <input type="text" name="h_t_room<?php echo $getme->room_count;?>" data-count="<?php echo $getme->room_count;?>" id="h_t_room" title="PLease select room type!" class="form-control h_t_room<?php echo $getme->room_count;?>" value="<?php echo $getme->new_room;?>" placeholder="Type of room"/>
                
           <div style="margin-top: 1%;" class="form-group">
               <label><small>Published Rate </small></label>
                  <?php $h_p_rate = array(
                                'name'=>'h_p_rate'.$getme->room_count.'',
                                'autocomplete'=>'off',
                                'value'=>$getme->h_p_rate,
                                'id'=>'h_p_rate',
                                'class'=>'form-control h_p_rate'.$getme->room_count.'',
                                'data-count'=>$getme->room_count
                                ); 
                        echo form_input($h_p_rate)
                  ;?>
            </div>
    
            <div class="form-group">
              <label><small>Discount %</small></label>
              <?php $h_d_rate = array(
                            'style'=>'width: 30%',
                            'name'=>'h_d_rate'.$getme->room_count.'',
                            'autocomplete'=>'off',
                            'value'=>$getme->h_d_rate,
                            'id'=>'h_d_rate',
                            'class'=>'form-control h_d_rate'.$getme->room_count.'',
                            'data-count'=>$getme->room_count
                            ); 
                    echo form_input($h_d_rate) 
             ;?>
             <label style="margin-top: -11%;float: right; width: 50%"><small>Contracted Rate(CR)</small></label>
             <?php $h_show_rate = array(
                            'style'=>'margin-top: -7%;float: right; width: 50%',
                            'name'=>'h_c_rate'.$getme->room_count.'',
                            'autocomplete'=>'off',
                            'value'=>$getme->h_c_rate,
                            'id'=>'h_show_c_rate'.$getme->room_count.'',
                            'class'=>'form-control',
                            'disabled'=>'disabled',
                            'data-count'=>$getme->room_count
                            ); 
                    echo form_input($h_show_rate) 
             ;?>	
             <!--<label style="margin-top: 1%;float: right; width: 50%"><small>Income(I)</small></label>
             <?php $h_show_rate = array(
                            'style'=>'margin-top: 0%;margin-bottom: 2%;margin-left: 90%;float: right; width: 50%',
                            'name'=>'h_income'.$getme->room_count.'',
                            'autocomplete'=>'off',
                            'value'=>$getme->h_income,
                            'id'=>'h_show_income'.$getme->room_count.'',
                            'class'=>'form-control',
                            'disabled'=>'disabled',
                            'data-count'=>$getme->room_count
                            ); 
                    echo form_input($h_show_rate) 
             ;?>-->
            </div>

            <div class="form-group">
            <label style="margin-top: 1%;"><small>VP = M * CR (Where M = 47%)</small></label>
             <?php $h_show_vp = array(
                            'style'=>'margin-top: 0%;margin-bottom: 2%; width: 50%',
                            'name'=>'h_vp'.$getme->room_count.'',
                            'autocomplete'=>'off',
                            'value'=>$getme->h_vp,
                            'id'=>'h_show_vp'.$getme->room_count.'',
                            'class'=>'form-control',
                            'disabled'=>'disabled',
                            'data-count'=>$getme->room_count
                            ); 
                    echo form_input($h_show_vp) 
             ;?>
            </div>
            
            <div class="form-group">
              <label><small>No. of pax(NP)</small></label>          
              <?php 
              $identity = 'id="h_n_payment" data-count="'.$getme->room_count.'"" title="Please select pax no." style="width: 50%" class="form-control h_n_payment'.$getme->room_count.'"';
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
                echo form_dropdown('h_n_payment'.$getme->room_count.'',$pax,$getme->h_n_payment,$identity);
              ;?>
            </div>
            
            <div class="form-group">
            <label style="margin-top: 1%;"><small>VP_less = VP / NP</small></label>
             <?php $h_show_vp_less = array(
                            'style'=>'width: 40%',
                            'name'=>'h_vp_less'.$getme->room_count.'',
                            'autocomplete'=>'off',
                            'value'=>$getme->h_vp_less,
                            'id'=>'h_show_vp_less'.$getme->room_count.'',
                            'class'=>'form-control',
                            'disabled'=>'disabled',
                            'data-count'=>$getme->room_count
                            ); 
                    echo form_input($h_show_vp_less) 
             ;?>
             <label style="float: right; width: 50%"><small>Per Room = ((VP_Less * NP) -  CR)</small></label>
             <?php $h_show_per_room = array(
                            'style'=>'margin-top: 0%;margin-bottom: 2%;margin-left: 90%;float: right; width: 50%',
                            'name'=>'h_pr'.$getme->room_count.'',
                            'autocomplete'=>'off',
                            'value'=>$getme->h_pr,
                            'id'=>'h_show_pr'.$getme->room_count.'',
                            'class'=>'form-control',
                            'disabled'=>'disabled',
                            'data-count'=>$getme->room_count
                            ); 
                    echo form_input($h_show_per_room) 
             ;?>
            </div>
            
            <div class="form-group">
                <!--<input type="hidden" data-count="<?php echo $getme->room_count;?>" name="income<?php echo $getme->room_count;?>" id="income<?php echo $getme->room_count;?>" value="<?php echo $getme->h_c_rate;?>"/>-->
                <input type="hidden" data-count="<?php echo $getme->room_count;?>" name="contracted_rate<?php echo $getme->room_count;?>" id="contracted_rate<?php echo $getme->room_count;?>" value="<?php echo $getme->h_c_rate;?>" class="contracted_rate<?php echo $getme->room_count;?>"/>
                <input type="hidden" data-count="<?php echo $getme->room_count;?>" name="rate_per_room<?php echo $getme->room_count;?>" id="rate_per_room<?php echo $getme->room_count;?>" value="<?php echo $getme->h_rate_per_room;?>" class="h_rate_per_room<?php echo $getme->room_count;?>" />
                <input type="hidden" data-count="<?php echo $getme->room_count;?>" name="vp<?php echo $getme->room_count;?>" id="vp<?php echo $getme->room_count;?>" value="<?php echo $getme->h_vp;?>" class="h_vp<?php echo $getme->room_count;?>" />
                <input type="hidden" data-count="<?php echo $getme->room_count;?>" name="vp_less<?php echo $getme->room_count;?>" id="vp_less<?php echo $getme->room_count;?>" value="<?php echo $getme->h_vp_less;?>" class="h_vp_less<?php echo $getme->room_count;?>" />
                <input type="hidden" data-count="<?php echo $getme->room_count;?>" name="pr<?php echo $getme->room_count;?>" id="pr<?php echo $getme->room_count;?>" value="<?php echo $getme->h_pr;?>" class="h_pr<?php echo $getme->room_count;?>" />
            </div>
            
            
            <div class="form-group">
                <label style="margin-top: 5%"><small>Validity Dates</small></label>
                <div id="dates"  class="well from_<?php echo $getme->room_count;?>">
                <table style="text-align:center" class="table">
                    <tr><td>Start</td><td>End</td></tr>
                    <tr>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>1<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>1<?php echo $getme->room_count;?>" value="<?php echo $getme->val1;?>"/>
                        </td>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>2<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>2<?php echo $getme->room_count;?>" value="<?php echo $getme->val2;?>"/>      	
                        </td>
                    </tr>
                        
                    <tr>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>3<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>3<?php echo $getme->room_count;?>" value="<?php echo $getme->val3;?>"/>
                        </td>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>4<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>4<?php echo $getme->room_count;?>" value="<?php echo $getme->val4;?>"/>      	
                        </td>
                    </tr>
                        
                    <tr>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>5<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>5<?php echo $getme->room_count;?>" value="<?php echo $getme->val5;?>"/>
                        </td>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>6<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>6<?php echo $getme->room_count;?>" value="<?php echo $getme->val6;?>"/>      	
                        </td>
                    </tr>
                        
                    <tr>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>7<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>7<?php echo $getme->room_count;?>" value="<?php echo $getme->val7;?>"/>
                        </td>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>8<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>8<?php echo $getme->room_count;?>" value="<?php echo $getme->val8;?>"/>      	
                        </td>
                    </tr>
                        
                    <tr>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>9<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>9<?php echo $getme->room_count;?>" value="<?php echo $getme->val9;?>"/>
                        </td>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>10<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>10<?php echo $getme->room_count;?>" value="<?php echo $getme->val10;?>"/>      	
                        </td>
                    </tr>
                    <tr id="d2" style="display: none">
                        <td>
                            <input name="val<?php echo $getme->room_count;?>11<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>11<?php echo $getme->room_count;?>" value="<?php echo $getme->val11;?>"/>
                        </td>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>12<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>12<?php echo $getme->room_count;?>" value="<?php echo $getme->val12;?>"/>      	
                        </td>
                    </tr>
					<tr id="d2" style="display: none">
                        <td>
                            <input name="val<?php echo $getme->room_count;?>13<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>13<?php echo $getme->room_count;?>" value="<?php echo $getme->val13;?>"/>
                        </td>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>14<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>14<?php echo $getme->room_count;?>" value="<?php echo $getme->val14;?>"/>      	
                        </td>
                    </tr>
					<tr id="d2" style="display: none">
                        <td>
                            <input name="val<?php echo $getme->room_count;?>15<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>15<?php echo $getme->room_count;?>" value="<?php echo $getme->val15;?>"/>
                        </td>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>16<?php echo $getme->room_count;?>" id="" type="date"  class="form-control val<?php echo $getme->room_count;?>16<?php echo $getme->room_count;?>" value="<?php echo $getme->val16;?>"/>      	
                        </td>
                    </tr>
					<tr id="d2" style="display: none">
                        <td>
                            <input name="val<?php echo $getme->room_count;?>17<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>17<?php echo $getme->room_count;?>" value="<?php echo $getme->val17;?>"/>
                        </td>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>18<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>18<?php echo $getme->room_count;?>" value="<?php echo $getme->val18;?>"/>      	
                        </td>
                    </tr>
					<tr id="d2" style="display: none">
                        <td>
                            <input name="val<?php echo $getme->room_count;?>19<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>19<?php echo $getme->room_count;?>" value="<?php echo $getme->val19;?>"/>
                        </td>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>20<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>20<?php echo $getme->room_count;?>" value="<?php echo $getme->val20;?>"/>      	
                        </td>
                    </tr>
					<tr id="d3" style="display: none">
                        <td>
                            <input name="val<?php echo $getme->room_count;?>21<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>21<?php echo $getme->room_count;?>" value="<?php echo $getme->val22;?>"/>
                        </td>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>22<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>22<?php echo $getme->room_count;?>" value="<?php echo $getme->val22;?>"/>      	
                        </td>
                    </tr>
					<tr id="d3" style="display: none">
                        <td>
                            <input name="val<?php echo $getme->room_count;?>23<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>23<?php echo $getme->room_count;?>" value="<?php echo $getme->val23;?>"/>
                        </td>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>24<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>24<?php echo $getme->room_count;?>" value="<?php echo $getme->val24;?>"/>      	
                        </td>
                    </tr>
					<tr id="d3" style="display: none">
                        <td>
                            <input name="val<?php echo $getme->room_count;?>25<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>25<?php echo $getme->room_count;?>" value="<?php echo $getme->val25;?>"/>
                        </td>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>26<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>26<?php echo $getme->room_count;?>" value="<?php echo $getme->val26;?>"/>      	
                        </td>
                    </tr>
					<tr id="d3" style="display: none">
                        <td>
                            <input name="val<?php echo $getme->room_count;?>27<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>27<?php echo $getme->room_count;?>" value="<?php echo $getme->val27;?>"/>
                        </td>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>28<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>28<?php echo $getme->room_count;?>" value="<?php echo $getme->val28;?>"/>      	
                        </td>
                    </tr>
					<tr id="d3" style="display: none">
                        <td>
                            <input name="val<?php echo $getme->room_count;?>29<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>29<?php echo $getme->room_count;?>" value="<?php echo $getme->val29;?>"/>
                        </td>
                        <td>
                            <input name="val<?php echo $getme->room_count;?>30<?php echo $getme->room_count;?>" type="date"  class="form-control val<?php echo $getme->room_count;?>30<?php echo $getme->room_count;?>" value="<?php echo $getme->val30;?>"/>      	
                        </td>
                    </tr>                
                    <tr id="date_append<?php echo $getme->room_count;?>">
                        <td colspan="2">
            				<input type="hidden" name="date_count<?php echo $getme->room_count;?>" data-count="<?php echo $getme->room_count;?>" id="date_count<?php echo $getme->room_count;?>" value="10"  />
                            <a data-show="2" data-count="<?php echo $getme->room_count;?>"  data-from="<?php echo $getme->from_hotel;?>" id="add_new_date" href="javascript:;" style="float: right">Show More <i class="fa fa-plus"></i></a>
                            <a data-show="3" data-count="<?php echo $getme->room_count;?>"  data-from="<?php echo $getme->from_hotel;?>" id="add_new_date" class="add_new_date" href="javascript:;" style="float: right;display: none">Show More <i class="fa fa-plus"></i></a>
                        </td>
                    </tr>
                </table>
                <button data-action="update_hotel" data-count="<?php echo $getme->room_count;?>" data-newaction="none" data-from="<?php echo $this->uri->segment(3);?>" type="button" class="btn btn-primary update_seperate_hotel">Update this record.</button>
                <a style="display:none" id="close-hotel" class="close-hotel<?php echo $getme->room_count;?>" data-count="<?php echo $getme->room_count;?>" data-newaction="none" href="javascript:;" style="float: right">
                <strong>Close</strong>
                <i class="glyphicon glyphicon-open"></i>
                </a>
            </div>
        </div>
        </div>
        <?php 
        }
        ;?>
        <!--end-->
        <!--new-->
        
        <input type="hidden" value="<?php echo $this->uri->segment(3);?>"  class="from-hotel"/>
        <div id="new_sec1">
        </div>
        
                    
        <!--end-->
        <div class="form-group" style="border-top: 1px solid #ccc; margin-top: 0%;padding-top: 5px;">
            <a id="add_room" href="javascript:void(0);" style="float: right;margin-top: 1%">Add new rooms&nbsp;<i class="glyphicon glyphicon-plus"></i></a>
            <button type="submit" class="btn btn-primary">Save changes</button>
            <a href="<?php echo base_url();?>welcome/view_data"><button type="button" class="btn btn-default" >Cancel</button></a>
        </div>
	</div>
</div>
<?php echo form_close();?>
<?php };?>