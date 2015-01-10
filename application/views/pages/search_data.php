<?php $this->load->view('pages/script');?>
<script>
$(document).ready(function(e) {
    $('#footer').hide();
});
</script>
<div class="container">
    <div id="hide_in_print" class="form-group">
          <label><h3>Search</h3></label>
          <?php $h_search = array(
                        'name'=>'h_loc',
                        'placeholder'=>'Search Hotel Name or Location',
                        'id'=>'h_search',
                        'class'=>'form-control',
						'autocomplete'=>'off'
                        ); 
                echo form_input($h_search)
          ;?>
   </div>
   
   <button style="display: none" class="print2 btn btn-default btn-sm pull-right" class="dropdown-toggle navbar-right">
     Print <i class="glyphicon glyphicon-print"></i>&nbsp;
	</button><br />

   <div class="form-group">
      <ul class="pagination pagination-centered">
        <?php
          foreach(range('A', 'Z') as $letter) {
            echo '<li>'.anchor('welcome/letter/'.$letter, $letter).'</li>';
          }
        ?>
          <label style="float: right;height: 2px;margin-left: 140px;color:#428bca">
            <span class="badge"><?php echo $datas->num_rows();?></span> results found.
          </label>
        <ul>
    </div>

    <div id="searchresults" style="display: none;margin-top: -1.5%">
    </div>


    <div style="text-align:center;margin: 0px auto;margin-bottom: 6%;display: none" class="print_header form-group row col-md-15">
        <h4>Vigattin Inc.</h4>
        <h6>Pacific Corporate Center, 131 West Ave, Quezon City</h6>
        <h6>(02) 414 3972</h6>
        <h6>Hotel Record</h6>
    </div>
   
   <button class="print btn btn-default btn-sm pull-right" class="dropdown-toggle navbar-right">
         Arrange to Print <i class="glyphicon glyphicon-print"></i>&nbsp;
   </button>
   
   <div id="results" style="display: ;margin-top: 5%;">
    <div id="smile" style="margin-top: -1%">
        <?php
		 $this->db->where('id',$this->uri->segment(3));
		 $datas = $this->db->get('hotels');
		 if($datas->num_rows() == 0){?>
        <div>
            <h5>No results Found!</h5>
        </div>
        <?php };?>
        <?php foreach($datas->result() as $row){?>
        <div id="<?php echo $row->id;?>" class="panel panel-primary">
            <input id="" type="hidden" value="<?php echo $row->id;?>" />
            <div class="panel-heading">Hotel Info
                 <a style="color: #fff;" onclick="delete_data(<?php echo $row->id;?>)" id="delete_data_<?php echo $row->id;?>" href="javascript:void();" class="dropdown-toggle navbar-right buls" data-toggle="dropdown">
            	&nbsp;Delete <i class="glyphicon glyphicon-trash">&nbsp;</i>
            </a> 
        	<a style="color: #fff;" onclick="edit(<?php echo $row->id;?>)" id="edit_data_<?php echo $row->id;?>" href="<?php echo base_url();?>welcome/get_edit/<?php echo $row->id;?>/<?php echo $this->uri->segment(2);?>/<?php echo $this->uri->segment(3);?>" class="dropdown-toggle navbar-right buls">
            	 Edit <i class="glyphicon glyphicon-edit"></i>
            </a>
            <?php if($row->h_contract == ''){ ?>
            <a style="color: #fff;" href="javascript:void(0);" onclick="alert('No file to view ! \n Kindly Upload a .pdf, .otd or .jpg and .png file to use this function.')" class="dropdown-toggle navbar-right buls">
            	 View <i class="glyphicon glyphicon-file"></i>&nbsp;
            </a>
			<?php }else{ ?>
            <a style="color: #fff;" target="_new" href="view_file/#../admin_tool/contracts/<?php echo $row->h_contract;?>" class="dropdown-toggle navbar-right buls">
            	 View <i class="glyphicon glyphicon-file"></i>&nbsp;
            </a>
                <?php };?>
            </div>
                <div class="panel-body">
                    <div class="form-group">
                          <table class="table table-bordered table-condensed table-centered">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    Hotel Name : <label id="n_name_<?php echo $row->id;?>"> <?php echo $row->h_name;?></label>
                                </li>
                                <li class="list-group-item">
                                    Location : <label id="n_location_<?php echo $row->id;?>"><?php echo $row->h_location;?></label>
                                </li>
                                <li class="list-group-item">
                                    Contact Number : <label id="n_contact_<?php echo $row->id;?>"><?php echo $row->h_contact;?></label>
                                </li>
                                <li class="list-group-item">
                                    Email Address : <label  id="n_email_<?php echo $row->id;?>"><?php echo $row->h_email;?></label>
                                </li>
                            </ul>
                        <thead  style="font-size: 12px;"id="hide_this" class="btn-default">
                            <td style="width: 19%">Type of room | Offer</td>
                            <td>No. of pax</td>
                            <td>Published Rate</td>
                            <td>Contracted Rate</td>
                            <td>Validity</td>
                            <!--<td>Income</td>-->
                            <td>VDeals Price</td>
                            <td>Rate per room<br />(VdealsPrice*NP)</td>
                            <td>Income per room<br />(VdealsPrice/NP)</td>
                            <td>Percent(%)</td>
                        </thead>
                        <thead id="hide_this">
                        	<td>
								<?php echo $row->h_t_room;?>
                            </td>
                            <td  id="n_payment_<?php echo $row->id;?>">
								<?php echo $row->h_n_payment;?>
                            </td>
                            <td style="text-align: right" id="n_p_rate_<?php echo $row->id;?>">
								<?php echo number_format($row->h_p_rate);?>
                            </td>
                            <td style="text-align: right" id="n_c_rate_<?php echo $row->id;?>">
								<?php echo number_format($row->h_c_rate);?>
                            </td>
                            <td id="n_val_<?php echo $row->id;?>" style="text-align:left">
                            <?php if($row->val1 == '0000-00-00' && $row->val2 == '0000-00-00' && $row->val3 == '0000-00-00' && $row->val4 == '0000-00-00' && $row->val5 == '0000-00-00' && $row->val6 == '0000-00-00' && $row->val7 == '0000-00-00' && $row->val8 == '0000-00-00' && $row->val9 == '0000-00-00' && $row->val10 == '0000-00-00' && $row->val11 == '0000-00-00' && $row->val12 == '0000-00-00' && $row->val13 == '0000-00-00' && $row->val14 == '0000-00-00' && $row->val15 == '0000-00-00' && $row->val17 == '0000-00-00' && $row->val18 == '0000-00-00' && $row->val19 == '0000-00-00' && $row->val20 == '0000-00-00' && $row->val21 == '0000-00-00' && $row->val22 == '0000-00-00' && $row->val23 == '0000-00-00' && $row->val24 == '0000-00-00' && $row->val25 == '0000-00-00' && $row->val26 == '0000-00-00' && $row->val27 == '0000-00-00' && $row->val28 == '0000-00-00' && $row->val29 == '0000-00-00' && $row->val30 == '0000-00-00') echo 'Not set.<br>';else{?>
										<?php 
											if($row->val1 == '0000-00-00' || $row->val2 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($row->val1)),'  <b> -- </b>  '.date('F/j/Y', strtotime($row->val2)).'<br/>';}
										?>
                                        
										<?php 
											if($row->val3 == '0000-00-00' || $row->val4 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($row->val3)),'  <b> -- </b>  '.date('F/j/Y', strtotime($row->val4)).'<br/>';}
										?>
                                        
										<?php 
											if($row->val5 == '0000-00-00' || $row->val6 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($row->val5)),'  <b> -- </b>  '.date('F/j/Y', strtotime($row->val6)).'<br/>';}
										?>
                                        
										<?php 
											if($row->val7 == '0000-00-00' || $row->val8 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($row->val7)),'  <b> -- </b>  '.date('F/j/Y', strtotime($row->val8)).'<br/>';}
										?>
                                        
										<?php 
											if($row->val9 == '0000-00-00' || $row->val10 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($row->val9)),'  <b> -- </b>  '.date('F/j/Y', strtotime($row->val10)).'<br/>';}
										?>
                                        <?php 
											if($row->val11 == '0000-00-00' || $row->val12 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($row->val11)),'  <b> -- </b>  '.date('F/j/Y', strtotime($row->val12)).'<br/>';}
										?>
                                        <?php 
											if($row->val13 == '0000-00-00' || $row->val14 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($row->val13)),'  <b> -- </b>  '.date('F/j/Y', strtotime($row->val14)).'<br/>';}
										?>
                                        <?php 
											if($row->val15 == '0000-00-00' || $row->val16 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($row->val15)),'  <b> -- </b>  '.date('F/j/Y', strtotime($row->val16)).'<br/>';}
										?>
                                        <?php 
											if($row->val17 == '0000-00-00' || $row->val18 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($row->val17)),'  <b> -- </b>  '.date('F/j/Y', strtotime($row->val18)).'<br/>';}
										?>
                                        <?php 
											if($row->val19 == '0000-00-00' || $row->val20 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($row->val19)),'  <b> -- </b>  '.date('F/j/Y', strtotime($row->val20)).'<br/>';}
										?>
                                        <?php 
											if($row->val21 == '0000-00-00' || $row->val22 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($row->val21)),'  <b> -- </b>  '.date('F/j/Y', strtotime($row->val22)).'<br/>';}
										?>
                                        <?php 
											if($row->val23 == '0000-00-00' || $row->val24 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($row->val23)),'  <b> -- </b>  '.date('F/j/Y', strtotime($row->val24)).'<br/>';}
										?>
                                        <?php 
											if($row->val25 == '0000-00-00' || $row->val26 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($row->val25)),'  <b> -- </b>  '.date('F/j/Y', strtotime($row->val26)).'<br/>';}
										?>
                                        <?php 
											if($row->val27 == '0000-00-00' || $row->val28 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($row->val27)),'  <b> -- </b>  '.date('F/j/Y', strtotime($row->val28)).'<br/>';}
										?>
                                        <?php 
											if($row->val29 == '0000-00-00' || $row->val30 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($row->val29)),'  <b> -- </b>  '.date('F/j/Y', strtotime($row->val30)).'<br/>';}
										?>
                                    </li>
                                    <?php };?>
                                <ul>
                            </td>
                            <td style="text-align: right" id="n_vp_less_<?php echo $row->id;?>">
								<?php echo '<b>'.number_format($row->h_vp_less);?>
                            </td>
                            
                            <td style="text-align: right" id="n_rate_per_room_<?php echo $row->id;?>">
								<?php echo '<b style="color: #09f">'.number_format($row->h_rate_per_room);?>
                            </td>                            
                            
                            <td style="text-align: right" id="n_pr_<?php echo $row->id;?>">
								<?php echo '<b style="color: red">'.number_format($row->h_pr);?>
                            </td>
                            <td style="text-align: center">
                            	<?php
									if($row->h_vp_less == 0 || $row->h_p_rate == 0){echo '';}
									else{
                                		$a = $row->h_vp_less / $row->h_p_rate;
										$b = $a*100;
										$c =  $b - 100;
										echo '<b style="color: green">'.number_format($c).' %';
									}
								;?>
                            </td>
                        </thead>
                        <?php 						
						$this->db->where('from_hotel',$row->id);
						$added = $this->db->get('added_rooms');
						$this->db->order_by("new_room","ASC");
						foreach($added->result() as $added_rooms):?>
                        <thead id="hide_this">
                            <td id="n_t_room_<?php echo $row->id;?>">
								<?php
                                    echo $added_rooms->new_room;
                                ?>
                            </td>
                            <td  id="n_payment_<?php echo $row->id;?>">
								<?php
                                    echo $added_rooms->h_n_payment;
                                ?>
                            </td>
                            <td style="text-align: right" id="n_p_rate_<?php echo $row->id;?>">
								<?php
                                    echo number_format($added_rooms->h_p_rate);
                                ?>
                            </td>
                            <td style="text-align: right" id="n_c_rate_<?php echo $row->id;?>">
								<?php
                                    echo number_format($added_rooms->h_c_rate);
                                ?>
                            </td>
                            <td id="n_val_<?php echo $row->id;?>" style="text-align:left">
                            <?php if($added_rooms->val1 == '0000-00-00' && $added_rooms->val2 == '0000-00-00' && $added_rooms->val3 == '0000-00-00' && $added_rooms->val4 == '0000-00-00' && $added_rooms->val5 == '0000-00-00' && $added_rooms->val6 == '0000-00-00' && $added_rooms->val7 == '0000-00-00' && $added_rooms->val8 == '0000-00-00' && $added_rooms->val9 == '0000-00-00' && $added_rooms->val10 == '0000-00-00' && $added_rooms->val11 == '0000-00-00' && $added_rooms->val12 == '0000-00-00' && $added_rooms->val13 == '0000-00-00' && $added_rooms->val14 == '0000-00-00' && $added_rooms->val15 == '0000-00-00' && $added_rooms->val17 == '0000-00-00' && $added_rooms->val18 == '0000-00-00' && $added_rooms->val19 == '0000-00-00' && $added_rooms->val20 == '0000-00-00' && $added_rooms->val21 == '0000-00-00' && $added_rooms->val22 == '0000-00-00' && $added_rooms->val23 == '0000-00-00' && $added_rooms->val24 == '0000-00-00' && $added_rooms->val25 == '0000-00-00' && $added_rooms->val26 == '0000-00-00' && $added_rooms->val27 == '0000-00-00' && $added_rooms->val28 == '0000-00-00' && $added_rooms->val29 == '0000-00-00' && $added_rooms->val30 == '0000-00-00') echo 'Not set.<br>';else{?>
										<?php 
											if($added_rooms->val1 == '0000-00-00' || $added_rooms->val2 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($added_rooms->val1)),'  <b> -- </b>  '.date('F/j/Y', strtotime($added_rooms->val2)).'<br/>';}
										?>
                                        
										<?php 
											if($added_rooms->val3 == '0000-00-00' || $added_rooms->val4 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($added_rooms->val3)),'  <b> -- </b>  '.date('F/j/Y', strtotime($added_rooms->val4)).'<br/>';}
										?>
                                        
										<?php 
											if($added_rooms->val5 == '0000-00-00' || $added_rooms->val6 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($added_rooms->val5)),'  <b> -- </b>  '.date('F/j/Y', strtotime($added_rooms->val6)).'<br/>';}
										?>
                                        
										<?php 
											if($added_rooms->val7 == '0000-00-00' || $added_rooms->val8 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($added_rooms->val7)),'  <b> -- </b>  '.date('F/j/Y', strtotime($added_rooms->val8)).'<br/>';}
										?>
                                        
										<?php 
											if($added_rooms->val9 == '0000-00-00' || $added_rooms->val10 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($added_rooms->val9)),'  <b> -- </b>  '.date('F/j/Y', strtotime($added_rooms->val10)).'<br/>';}
										?>
                                        <?php 
											if($added_rooms->val11 == '0000-00-00' || $added_rooms->val12 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($added_rooms->val11)),'  <b> -- </b>  '.date('F/j/Y', strtotime($added_rooms->val12)).'<br/>';}
										?>
                                        <?php 
											if($added_rooms->val13 == '0000-00-00' || $added_rooms->val14 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($added_rooms->val13)),'  <b> -- </b>  '.date('F/j/Y', strtotime($added_rooms->val14)).'<br/>';}
										?>
                                        <?php 
											if($added_rooms->val15 == '0000-00-00' || $added_rooms->val16 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($added_rooms->val15)),'  <b> -- </b>  '.date('F/j/Y', strtotime($added_rooms->val16)).'<br/>';}
										?>
                                        <?php 
											if($added_rooms->val17 == '0000-00-00' || $added_rooms->val18 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($added_rooms->val17)),'  <b> -- </b>  '.date('F/j/Y', strtotime($added_rooms->val18)).'<br/>';}
										?>
                                        <?php 
											if($added_rooms->val19 == '0000-00-00' || $added_rooms->val20 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($added_rooms->val19)),'  <b> -- </b>  '.date('F/j/Y', strtotime($added_rooms->val20)).'<br/>';}
										?>
                                        <?php 
											if($added_rooms->val21 == '0000-00-00' || $added_rooms->val22 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($added_rooms->val21)),'  <b> -- </b>  '.date('F/j/Y', strtotime($added_rooms->val22)).'<br/>';}
										?>
                                        <?php 
											if($added_rooms->val23 == '0000-00-00' || $added_rooms->val24 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($added_rooms->val23)),'  <b> -- </b>  '.date('F/j/Y', strtotime($added_rooms->val24)).'<br/>';}
										?>
                                        <?php 
											if($added_rooms->val25 == '0000-00-00' || $added_rooms->val26 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($added_rooms->val25)),'  <b> -- </b>  '.date('F/j/Y', strtotime($added_rooms->val26)).'<br/>';}
										?>
                                        <?php 
											if($added_rooms->val27 == '0000-00-00' || $added_rooms->val28 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($added_rooms->val27)),'  <b> -- </b>  '.date('F/j/Y', strtotime($added_rooms->val28)).'<br/>';}
										?>
                                        <?php 
											if($added_rooms->val29 == '0000-00-00' || $added_rooms->val30 == '0000-00-00'){echo '';}
											else{echo date('F/j/Y', strtotime($added_rooms->val29)),'  <b> -- </b>  '.date('F/j/Y', strtotime($added_rooms->val30)).'<br/>';}
										?>
                                    <?php };?>
                            </td>
                            <input type="hidden" id="room_count" value="<?php echo $added_rooms->room_count;?>" />
                            <!--<td style="text-align: right" id="n_income_<?php echo $row->id;?>">
                            	<ul class="list-group">
                                    	<?php
											//echo '<li class="format3'.$added_rooms->id.' list-group-item">';
											//echo number_format($added_rooms->h_income);
											//echo '</li>';
										?>
                                </ul>
                            </td>-->
                            <td style="text-align: right" id="n_vp_less_<?php echo $row->id;?>">
								<?php
                                    echo '<b>'.number_format($added_rooms->h_vp_less);
                                ?>
                            </td>
                            
                            <td style="text-align: right" id="n_rate_per_room_<?php echo $added_rooms->id;?>">
								<?php echo '<b style="color: #09f">'.number_format($added_rooms->h_rate_per_room);?>
                            </td>                            
                            
                            <td style="text-align: right" id="n_pr_<?php echo $row->id;?>">
								<?php
                                    echo '<b style="color: red">'.number_format($added_rooms->h_pr);
                                ?>
                            </td>
                            <td style="text-align: center">
                            	<?php
									if($added_rooms->h_vp_less == 0 || $added_rooms->h_p_rate == 0){echo '';}
									else{
                                		$a = $added_rooms->h_vp_less / $added_rooms->h_p_rate;
										$b = $a*100;
										$c =  $b - 100;
										echo '<b style="color: green">'.number_format($c).' %';
									}
								;?>
                            </td>
                        </thead>
                        <?php endforeach;?>
                	</table>
                </div>
               	<!--inclusions-->
                <div class="alert alert-info">
                	<strong>Inclusions <span class="glyphicon glyphicon-hand-down"></span></strong>
                    <p><?php echo $row->h_inclusions;?></p>
                </div>
                <!--end-->
                <!--bank-->
                <div class="form-group">
                      <table class="table table-bordered table-condensed table-centered">
                        <thead class="btn-default">
                        	<?php 
								if($row->b_name1 == '' || $row->b_acount1 == '' || $row->b_number1 == 0) echo '';
								if($row->b_name5 == '' || $row->b_acount5 == '' || $row->b_number5 == 0) echo '';
								if($row->b_name2 == '' || $row->b_acount2 == '' || $row->b_number2 == 0) echo '';
								if($row->b_name4 == '' || $row->b_acount4 == '' || $row->b_number4 == 0) echo '';
								if($row->b_name4 == '' || $row->b_acount4 == '' || $row->b_number4 == 0) echo '';
                            	else echo '<label>Bank Details</label>';
							?>
							<?php if($row->b_name1 == '' && $row->b_acount1 == '' && $row->b_number1 == 0){
                                echo '';
                            }else {?>
                            <td>1st Bank</td>
                            <?php };?>                            
							<?php if($row->b_name2 == '' && $row->b_acount2 == '' && $row->b_number2 == 0){
                                echo '';
                            }else {?>
                            <td>2nd Bank</td>
                            <?php };?>                            
							<?php if($row->b_name3 == '' && $row->b_acount3 == '' && $row->b_number3 == 0){
                                echo '';
                            }else {?>
                            <td>3rd Bank</td>
                            <?php };?>                           
							<?php if($row->b_name4 == '' && $row->b_acount4 == '' && $row->b_number4 == 0){
                                echo '';
                            }else {?>
                            <td>4th Bank</td>
                            <?php };?>                            
							<?php if($row->b_name5 == '' && $row->b_acount5 == '' && $row->b_number5 == 0){
                                echo '';
                            }else {?>
                            <td>5th Bank</td>
                            <?php };?>
                        </thead>
                        <thead>
                        <?php if($row->b_name1 == '' && $row->b_acount1 == '' && $row->b_number1 == 0){
							echo '';
						}else {?>
                            <td>
								<ul style="list-style: none;margin: 0px;padding: 0px;">
                                	<li>Bank Name : <b><?php echo $row->b_name1;?></b></li>
                                    <li>Bank Account Name : <b><?php echo $row->b_acount1;?></b></li>
                                    <li>Bank Number : <b><?php echo $row->b_number1;?></b></li>
                                </ul>
                            </td>
                        <?php };?>
                        
                        <?php if($row->b_name2 == '' && $row->b_acount2 == '' && $row->b_number2 == 0){
							echo '';
						}else {?>
                            <td>
								<ul style="list-style: none;margin: 0px;padding: 0px;">
                                	<li>Bank Name : <b><?php echo $row->b_name2;?></b></li>
                                    <li>Bank Account Name : <b><?php echo $row->b_acount2;?></b></li>
                                    <li>Bank Number : <b><?php echo $row->b_number2;?></b></li>
                                </ul>
                            </td>
                         <?php };?>
                         
                        <?php if($row->b_name3 == '' && $row->b_acount3 == '' && $row->b_number3 == 0){
							echo '';
						}else {?>
                            <td>
                            	<ul style="list-style: none;margin: 0px;padding: 0px;">
                                	<li>Bank Name : <b><?php echo $row->b_name3;?></b></li>
                                    <li>Bank Account Name : <b><?php echo $row->b_acount3;?></b></li>
                                    <li>Bank Number : <b><?php echo $row->b_number3;?></b></li>
                                </ul>
                            </td>
                        <?php };?>
                        
                        
                        <?php if($row->b_name4 == '' && $row->b_acount4 == '' && $row->b_number4 == 0){
							echo '';
						}else {?>
                            <td>
                            	<ul style="list-style: none;margin: 0px;padding: 0px;">
                                	<li>Bank Name : <b><?php echo $row->b_name4;?></b></li>
                                    <li>Bank Account Name : <b><?php echo $row->b_acount4;?></b></li>
                                    <li>Bank Number : <b><?php echo $row->b_number4;?></b></li>
                                </ul>
                            </td>
                            
                       	
                        <?php }if($row->b_name5 == '' && $row->b_acount5 == '' && $row->b_number5 == 0){
							echo '';
						}else {?>
                            <td>
								<ul style="list-style: none;margin: 0px;padding: 0px;">
                                	<li>Bank Name : <b><?php echo $row->b_name5;?></b></li>
                                    <li>Bank Account Name : <b><?php echo $row->b_acount5;?></b></li>
                                    <li>Bank Number : <b><?php echo $row->b_number5;?></b></li>
                                </ul>
                            </td>
                        <?php };?>
                        </thead>
                	</table>
                    </div>
                </div>
             </div>
        <?php };?>
    </div>
   </div>
</div>
