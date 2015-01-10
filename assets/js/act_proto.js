;(function(){
	var hotelConf = {
		print1 : function (){
			return this.delegate(addelem.print,'click',function(){
				$('.print,#hide_in_print,.pagination,.buls').hide();
				$('.print_header,.print2').show();
			});
		},
		print2 : function (){
			return this.delegate(addelem.print2,'click',function(){
				$($(this)).hide();
					window.print();
				$('.print_header').hide();
				$('.pagination,.print,#hide_in_print,.buls').show(200);
			});
		},
		slide_sep_hotel : function(){
			return this.delegate(addelem.view_hotels,'click',function(){
				$('#loader').show().hide(2000)
				$('#new_sec0'+$(this).attr('data-count')+'').fadeIn();
				$($(this)).hide();
				$('.close-hotel'+$(this).attr('data-count')+'').css("float","right").show();
			});
		},
		close_sep_hotel : function(){
			return this.delegate(addelem.close_hotels,'click',function(){
				
				$($(this)).hide();
				$('.slide-hotel'+$(this).attr('data-count')+'').show();
				$('.close-hotel'+$(this).attr('data-count')+'').hide();
				$('#new_sec0'+$(this).attr('data-count')+'').slideToggle();
			});
		},
		
		ad_n_r_n : function(){
			return this.delegate(addelem.ad_r_cat,'click',function(){
				if($('#add_room_type'+$(this).attr('data-count')+'').val() == ''){
					alert('Please fill out the field.');
					$('#add_room_type'+$(this).attr('data-count')+'').focus();
				}
				else{
					var getme = $('#add_room_type'+$(this).attr('data-count')+'').val();
					jQuery.ajax({
						type : "POST",
						url  : config.base_url+'/welcome/insert_room/'+getme+'',
						data : {
								'new_room' : getme,
						},
						success :function(data){
							$('.n_r').val('');
							alert('added');
							
							$.getJSON(config.base_url+'/welcome/getinserted_room/'+getme+'',function(data){
								var newselect = '';
								$.each(data,function(key, val){
									newselect += '<option value="'+val.room_name+'">'+val.room_name+'</option>';
								});
								$('select#h_t_room').append(newselect);
								$('select#h_t_room'+$(this).attr('data-count')+'').val(val.room_name);
							});
						}
					});
				 }
			});
		},
		
		addroom : function(){
			return this.delegate(addelem.add_room,'click',function(event){
				//var current = $('select#h_t_room').length;
				var current = parseInt($('#room_count').val());
				var next_count = current + 1;
				var from = $('.from-hotel').val();
				$.getJSON(config.base_url+'/welcome/get_rooms',function(data){
					var output = '<div id="last'+next_count+'" class="form-group" style="margin-top: 10%;" id="rooms">';
      					output += '<label><small>Type of room </small></label>';
						output += '<input type="text" id="h_t_room" name="h_t_room'+next_count+'" title="PLease select room type!" class="form-control h_t_room'+next_count+'">';
						//output += '<option></option>';
					//$.each(data,function(key, val){
						//output += '<option value="'+val.room_name+'">'+val.room_name+'</option>';
					//});
						//output += '</select>';
						//output += '<div style="width: 90%;margin-top: 1%;margin-bottom:20px;float:left;">';
            			//output += '<input style="display: block;" data-count="'+next_count+'" type="text" id="add_room_type'+next_count+'" class="form-control n_r" placeholder="Add new type of room."/>';
            			//output += '</div>';
						//output += '<a id="add_r_cat" data-count="'+next_count+'" href="javascript:void(0);" style="float: right;margin-top: 1%">Add&nbsp;<i class="glyphicon glyphicon-plus"></i></a>';
						
						output += '<div class="form-group">';
      					output += '<label><small>Published Rate </small></label>';
						output += '<input id="h_p_rate" data-count="'+next_count+'" name="h_p_rate'+next_count+'" type="text" class="form-control h_p_rate'+next_count+'"'; 					 						
						output += 'autocomplete="off">';
						output += '</div>';
						
						
						output += '<div class="form-group">';
          				output += '<label><small>Discount %</small></label>';
						output += '<input style="width: 30%" data-count="'+next_count+'" id="h_d_rate" name="h_d_rate'+next_count+'" type="text" class="form-control h_d_rate'+next_count+'"'; 					 						
						output += 'autocomplete="off">';
						output += '<label style="margin-top: -11%;float: right; width: 50%"><small>Contracted Rate(CR)</small></label>';
						output += '<input style="margin-top: -7%;float: right; width: 50%" disabled="disabled" data-count="'+next_count+'" id="h_show_c_rate'+next_count+'" name="h_c_rate'+next_count+'" type="text" class="form-control h_show_c_rate'+next_count+'"';
						output += 'autocomplete="off">';
						
          				//output += '<label style="margin-top: 1%;float: right; width: 50%"><small>Income %</small></label>';
						//output += '<input style="margin-top: 0%;margin-bottom: 2%;margin-left: 90%;float: right; width: 50%" disabled="disabled" data-count="'+next_count+'" id="h_show_income'+next_count+'" name="h_income'+next_count+'" type="text" class="form-control h_show_income'+next_count+'"';
						//output += 'autocomplete="off">';
						output += '</div>';
						
						output += '<div class="form-group">';
        				output += '<label style="margin-top: 0%;margin-bottom: 2%; width: 50%"><small>VP = M * CR (Where M = 47%)</small></label>';
						output += '<input style="margin-top: 0%;margin-bottom: 2%; width: 50%" disabled="disabled" data-count="'+next_count+'" id="h_show_vp'+next_count+'" name="h_vp'+next_count+'" type="text" class="form-control"';
						output += 'autocomplete="off">';
						output += '</div>';
						
						output += '<div class="form-group">';
        				output += '<label style="margin-top: 1%;"><small>No. of pax(NP)</small></label>';
						output += '<select data-count="'+next_count+'" id="h_n_payment" title="Please select pax no." style="width: 50%" class="form-control h_n_payment'+next_count+'" name="h_n_payment'+next_count+'">';
						output += '<option></option>';
						for(var i=1;i<=10;i++){output += '<option value='+i+'>'+i+'</option>';}
						output += '</select>';
						output += '</div>';
						
						output += '<div class="form-group">';
        				output += '<label style="margin-top: 1%;"><small>VP_less = VP / NP</small></label>';
						output += '<input style="width: 40%" disabled="disabled" data-count="'+next_count+'" id="h_show_vp_less'+next_count+'" name="h_vp_less'+next_count+'" type="text" class="form-control"';
						output += 'autocomplete="off">';
						
        				output += '<label style="float: right; width: 50%"><small>Per Room = ((VP_Less * NP) -  CR)</small></label>';
						output += '<input style="margin-top: 0%;margin-bottom: 2%;margin-left: 90%;float: right; width: 50%" disabled="disabled" data-count="'+next_count+'" id="h_show_pr'+next_count+'" name="h_pr'+next_count+'" type="text" class="form-control"';
						output += 'autocomplete="off">';
						output += '</div>';
						
        				output += '<div class="form-group" style="margin-top: 20%">';
          				output += '<label style="display: block;width: 100%;float: left;margin-top: 4%;"><small></small></label>';
						output += '</div>';
												
        				output += '<div class="form-group">';
						//output += '<input type="hidden" data-count="'+next_count+'" name="income'+next_count+'" id="income'+next_count+'" value=""/>';
						output += '<input type="hidden" data-count="'+next_count+'" name="contracted_rate'+next_count+'" id="contracted_rate'+next_count+'" value="" class="contracted_rate'+next_count+'" />';
						output += '<input type="hidden" data-count="'+next_count+'" name="rate_per_room'+next_count+'" id="rate_per_room'+next_count+'" class="h_rate_per_room'+next_count+'" />';
						
						output += '<input type="hidden" data-count="'+next_count+'" name="vp'+next_count+'" id="vp'+next_count+'" class="h_vp'+next_count+'" />';
						output += '<input type="hidden" data-count="'+next_count+'" name="vp_less'+next_count+'" id="vp_less'+next_count+'" class="h_vp_less'+next_count+'" />';
						output += '<input type="hidden" data-count="'+next_count+'" name="pr'+next_count+'" id="pr'+next_count+'" class="h_pr'+next_count+'" />';
						output += '</div>';
						
        				output += '<div class="form-group">';
          				output += '<label style="margin-top: 5%"><small>Validity Dates</small></label>';
            			output += '<div id="dates" class="well from_'+next_count+'">';
						output += '<table style="text-align:center" class="table">';
						
						output += '<tr><td>Start</td><td>End</td></tr>';
						output += '<tr>';
						output += '<td>';
						output += '<input name="val'+next_count+'1'+next_count+'" type="date" data-count="'+next_count+'"  class="form-control val'+next_count+'1'+next_count+'" value=""/>';
						output += '</td>';
						output += '<td>';
						output += '<input name="val'+next_count+'2'+next_count+'" type="date" data-count="'+next_count+'"  class="form-control val'+next_count+'2'+next_count+'" value=""/>';    	
						output += '</td>';
						output += '</tr>';
						output += '<tr>';
						
						output += '<tr>';
						output += '<td>';
						output += '<input name="val'+next_count+'3'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'3'+next_count+'" value=""/>';
						output += '</td>';
						output += '<td>';
						output += '<input name="val'+next_count+'4'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'4'+next_count+'" value=""/>';      	
						output += '</td>';
						output += '</tr>';
						output += '</tr>';
						output += '<tr>';
						
						output += '<tr>';
						output += '<td>';
						output += '<input name="val'+next_count+'5'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'5'+next_count+'" value=""/>';
						output += '</td>';
						output += '<td>';
						output += '<input name="val'+next_count+'6'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'6'+next_count+'" value=""/>';      	
						output += '</td>';
						output += '</tr>';
						output += '</tr>';
						output += '<tr>';
						
						output += '<tr>';
						output += '<td>';
						output += '<input name="val'+next_count+'7'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'7'+next_count+'" value=""/>';
						output += '</td>';
						output += '<td>';
						output += '<input name="val'+next_count+'8'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'8'+next_count+'" value=""/>';      	
						output += '</td>';
						output += '</tr>';
						output += '</tr>';
						output += '<tr>';
						
						output += '<tr>';
						output += '<td>';
						output += '<input name="val'+next_count+'9'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'9'+next_count+'" value=""/>';
						output += '</td>';
						output += '<td>';
						output += '<input name="val'+next_count+'10'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'10'+next_count+'" value=""/>';      	
						output += '</td>';
						output += '</tr>';
						
						output += '<tr id="d2" style="display: none">';
						output += '<td>';
						output += '<input name="val'+next_count+'11'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'11'+next_count+'" value=""/>';
						output += '</td>';
						output += '<td>';
						output += '<input name="val'+next_count+'12'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'12'+next_count+'" value=""/>';      	
						output += '</td>';
						output += '</tr>';
						
						output += '<tr id="d2" style="display: none">';
						output += '<td>';
						output += '<input name="val'+next_count+'13'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'13'+next_count+'" value=""/>';
						output += '</td>';
						output += '<td>';
						output += '<input name="val'+next_count+'14'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'14'+next_count+'" value=""/>';      	
						output += '</td>';
						output += '</tr>';
						
						output += '<tr id="d2" style="display: none">';
						output += '<td>';
						output += '<input name="val'+next_count+'15'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'15'+next_count+'" value=""/>';
						output += '</td>';
						output += '<td>';
						output += '<input name="val'+next_count+'16'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'16'+next_count+'" value=""/>';      	
						output += '</td>';
						output += '</tr>';
						
						output += '<tr id="d2" style="display: none">';
						output += '<td>';
						output += '<input name="val'+next_count+'17'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'17'+next_count+'" value=""/>';
						output += '</td>';
						output += '<td>';
						output += '<input name="val'+next_count+'18'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'18'+next_count+'" value=""/>';      	
						output += '</td>';
						output += '</tr>';
						
						output += '<tr id="d2" style="display: none">';
						output += '<td>';
						output += '<input name="val'+next_count+'19'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'19'+next_count+'" value=""/>';
						output += '</td>';
						output += '<td>';
						output += '<input name="val'+next_count+'20'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'20'+next_count+'" value=""/>';      	
						output += '</td>';
						output += '</tr>';
						
						output += '<tr id="d3" style="display: none">';
						output += '<td>';
						output += '<input name="val'+next_count+'21'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'21'+next_count+'" value=""/>';
						output += '</td>';
						output += '<td>';
						output += '<input name="val'+next_count+'22'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'22'+next_count+'" value=""/>';      	
						output += '</td>';
						output += '</tr>';
						
						output += '<tr id="d3" style="display: none">';
						output += '<td>';
						output += '<input name="val'+next_count+'23'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'23'+next_count+'" value=""/>';
						output += '</td>';
						output += '<td>';
						output += '<input name="val'+next_count+'24'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'24'+next_count+'" value=""/>';      	
						output += '</td>';
						output += '</tr>';
						
						output += '<tr id="d3" style="display: none">';
						output += '<td>';
						output += '<input name="val'+next_count+'25'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'25'+next_count+'" value=""/>';
						output += '</td>';
						output += '<td>';
						output += '<input name="val'+next_count+'26'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'26'+next_count+'" value=""/>';      	
						output += '</td>';
						output += '</tr>';
						
						output += '<tr id="d3" style="display: none">';
						output += '<td>';
						output += '<input name="val'+next_count+'27'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'27'+next_count+'" value=""/>';
						output += '</td>';
						output += '<td>';
						output += '<input name="val'+next_count+'28'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'28'+next_count+'" value=""/>';      	
						output += '</td>';
						output += '</tr>';
						
						output += '<tr id="d3" style="display: none">';
						output += '<td>';
						output += '<input name="val'+next_count+'29'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'29'+next_count+'" value=""/>';
						output += '</td>';
						output += '<td>';
						output += '<input name="val'+next_count+'30'+next_count+'" type="date"  data-count="'+next_count+'" class="form-control val'+next_count+'30'+next_count+'" value=""/>';      	
						output += '</td>';
						output += '</tr>';
						
						output += '<tr id="date_append'+next_count+'">';
						output += '<td colspan="2">';
						output += '<input type="hidden" name="date_count'+next_count+'" data-count="'+next_count+'" id="date_count'+next_count+'" value="10"  />';
						output += '<a data-count="'+next_count+'" data-show="2" data-from="" id="add_new_date" href="javascript:;" style="float: right">Show More <i class="fa fa-plus"></i></a>';
						output += '<a data-count="'+next_count+'" data-show="3" data-from="" class="add_new_date" id="add_new_date" href="javascript:;" style="float: right;display: none">Show More <i class="fa fa-plus"></i></a>';
						output += '</td>';
						output += '</tr>';
						
						output += '</table>';
						output += '<button data-action="add_hotel" data-count="'+next_count+'" data-newaction="none" data-from="'+from+'" type="button" class="btn btn-primary update_seperate_hotel old-button'+next_count+'">Add Record.</button>';
						output += '<button style="display: none;" data-action="update_hotel" data-newaction="update" data-count="'+next_count+'" data-from="'+from+'" type="button" class="btn btn-primary update_seperate_hotel new-button'+next_count+'">Update Record.</button>';
						output += '</div>';
						output += '</div>';
						
						output += '</div>';	
					$('#new_sec1').append(output);
					$('html, body').animate({
						scrollTop: $('#last'+next_count+'').offset().top
					},500);
					$('#room_count').val(next_count);
				});
				//alert($('#room_count').val());
				/*
				var fnum  = 0;
				var snum  = 1;
				var num   = 20;
				document.writeln(fnum+'<br>');
				for(var a = 1;a <= num - 1; a++){
					var final = fnum + snum;
					var fnum  = snum;
					var snum  = final;
					document.writeln(final+'<br>');
				}
				*/
			});
		},
		
		compute : function(){
			return this.delegate(addelem.h_rate,'keyup',function (){
				var carmela = $('#forcarmela').val();
				
				var p_rate, c,new_c_rate,income,vp,np,vp_less,pr,vd,m;
				if(carmela == 'carmela' ){
					p_rate     = parseFloat($('.h_p_rate'+$($(this)).attr('data-count')+'').val() - 300);
				}
				else{
					p_rate     = parseFloat($('.h_p_rate'+$($(this)).attr('data-count')+'').val());
				}
				c          = parseFloat($('.h_d_rate'+$($(this)).attr('data-count')+'').val());
				np         = parseFloat($('.h_n_payment'+$($(this)).attr('data-count')+'').val());
				new_c_rate = parseFloat(p_rate*(c / 100));
			    income     = parseFloat(p_rate - new_c_rate);
				vd         = parseFloat((47 / 100));
				m          = parseFloat(new_c_rate*vd);
				vp         = parseFloat(m+income);
				vp_less    = parseFloat(Math.ceil(vp/np));
				pr1        = parseFloat(vp_less*np);
				prf        = vp_less*np - income;
				rate_per_room = vp_less*np;
				
				//if(pr1 < income) alert('connot be devided by '+np+'.');
				
				function format2(n) {
					return " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
				}
				
				$('#h_show_income'+$($(this)).attr('data-count')+'').val(format2(new_c_rate));
				$('#h_show_c_rate'+$($(this)).attr('data-count')+'').val(format2(income));
				
				$('#income'+$($(this)).attr('data-count')+'').val(new_c_rate);
				$('#contracted_rate'+$($(this)).attr('data-count')+'').val(income);
				$('#rate_per_room'+$($(this)).attr('data-count')+'').val(rate_per_room);
				
				
				$('#vp_less'+$($(this)).attr('data-count')+'').val(vp_less);
				$('#vp'+$($(this)).attr('data-count')+'').val(vp);
				$('#pr'+$($(this)).attr('data-count')+'').val(prf);
				$('#h_show_vp'+$($(this)).attr('data-count')+'').val(format2(vp));
				
				if(isNaN(vp_less) || isNaN(prf))
				{
					$('#h_show_vp_less'+$($(this)).attr('data-count')+'').val('0.00');
					$('#h_show_pr'+$($(this)).attr('data-count')+'').val('0.00');
				}	
				else
				{
					$('#h_show_vp_less'+$($(this)).attr('data-count')+'').val(format2(vp_less));
					$('#h_show_pr'+$($(this)).attr('data-count')+'').val(format2(prf));
				}				
					
				
				if(p_rate == '' && c == ''){
					$('#h_show_c_rate'+$($(this)).attr('data-count')+'').val('0.00');
					$('#h_show_income'+$($(this)).attr('data-count')+'').val('0.00');
				}
				if(new_c_rate > p_rate){
					$('#h_show_c_rate'+$($(this)).attr('data-count')+'').val('0.00');
					$('#h_show_income'+$($(this)).attr('data-count')+'').val('0.00');
					alert('Discount cannot be greater than published rate.');
				}
				if(isNaN(c))
				{
					//alert('PLease input no.');
					$('#h_show_c_rate'+$($(this)).attr('data-count')+'').val('0.00');
					$('#h_show_income'+$($(this)).attr('data-count')+'').val('0.00');
					return false;
				}
				
			});
		},
		
		remove : function(){
			return this.delegate(addelem.remove_box,'click', function (e){
				var id = $(this).attr('data-id');
				$('.'+id+'').hide();
				$(this).hide();
			});
		},
		
		option_click : function(){
			return this.delegate(addelem.option,'change',function(){
				var carmela = $('#forcarmela').val();
				
				var p_rate, c,new_c_rate,income,vp,np,vp_less,pr,vd,m;
				if(carmela == 'carmela' ){
					p_rate     = parseFloat($('.h_p_rate'+$($(this)).attr('data-count')+'').val() - 300);
				}
				else{
					p_rate     = parseFloat($('.h_p_rate'+$($(this)).attr('data-count')+'').val());
				}
				c          = parseFloat($('.h_d_rate'+$($(this)).attr('data-count')+'').val());
				np         = parseFloat($('.h_n_payment'+$($(this)).attr('data-count')+'').val());
				new_c_rate = parseFloat(p_rate*(c / 100));
			    income     = parseFloat(p_rate - new_c_rate);
				vd         = parseFloat((47 / 100));
				m          = parseFloat(new_c_rate*vd);
				vp         = parseFloat(m+income);
				vp_less    = parseFloat(Math.ceil(vp/np));
				pr1        = parseFloat(vp_less*np);
				prf        = vp_less*np - income;
				rate_per_room = vp_less*np;
				
				//if((vp_less%np) == 0){
					//alert('connot be devided by '+np+'.');
				//}
			
				$('#h_show_vp_less'+$($(this)).attr('data-count')+'').val(format2(vp_less));
				$('#h_show_pr'+$($(this)).attr('data-count')+'').val(format2(prf));
				$('#rate_per_room'+$($(this)).attr('data-count')+'').val(rate_per_room);
				
				$('#vp_less'+$($(this)).attr('data-count')+'').val(vp_less);
				$('#vp'+$($(this)).attr('data-count')+'').val(vp);
				$('#pr'+$($(this)).attr('data-count')+'').val(prf);
			});
		},
		
		viewv : function(){
			return this.delegate(addelem.contract,'click' ,function(){
				$('#contracts_edit').slideDown();
				$(this).hide();
			});
		},
		
		viewb : function(){
			return this.delegate(addelem.bank,'click',function(){
				$('#banks_edit').fadeIn();
				$(this).hide();
			});
		},
		
		viewbanks : function(){
			return this.delegate(elem.b_more,'click',function(){
				$('#banks').fadeIn();
				$('#b').hide();
			});
		},
		
		insert_hotel : function(){
			return this.delegate(addelem.add_hotel,'click', function(){
				var location = config.base_url+'/welcome/insert_data';
				var get = config.base_url+'/welcome/get_inserted/'+$('#h_name').val();
				var to_add = config.base_url+'/contract/view_contract/';
				var to_view = config.base_url+'/welcome/view_data/';
				
				if($('#h_name').val() == '' || $('#h_location').val() == '' || $('#h_contact').val() == '' || $('#h_email').val() == '')
				{
					window.history.pushState('Obj','Success Added',''+config.base_url+'/welcome/add_section?add_data=?new_data=false');
					alert('Please complete required fields fields.');
					return false;
				}
				else
				{
					
					/*filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					var email = $('#h_email').val();
					if(filter.test(email))
					{*/
						jQuery.ajax({
							type    : "POST",
							url     : location,
							data    : {
									'h_name'    :$('#h_name').val(),
									'h_location':$('#h_location').val(),
									'h_area_code':$('#h_area_code').val(),
									'h_email'   :$('#h_email').val(),
									'h_contact' :$('#h_contact').val(),
									
									//banks
									'b_acount1'  :$('#b_acount1').val(),
									'b_number1'  :$('#b_number1').val(),
									'b_name1'    :$('#b_name1').val(),
									'b_count1'   :1,
									
									'b_acount2'  :$('#b_acount2').val(),
									'b_number2'  :$('#b_number2').val(),
									'b_name2'    :$('#b_name2').val(),
									'b_count2'   :2,
									
									'b_acount3'  :$('#b_acount3').val(),
									'b_number3'  :$('#b_number3').val(),
									'b_name3'    :$('#b_name3').val(),
									'b_count3'   :3,
									
									'b_acount4'  :$('#b_acount4').val(),
									'b_number4'  :$('#b_number4').val(),
									'b_name4'    :$('#b_name4').val(),
									'b_count4'   :4,
									
									'b_acount5'  :$('#b_acount5').val(),
									'b_number5'  :$('#b_number5').val(),
									'b_name5'    :$('#b_name5').val(),
									'b_count5'   :5,

							},
							cache   : false,
							success : function(data){
									$.getJSON(get, function(get){								
										$.each(get, function(key,val){
											if(confirm("Would you like to add contracts ?")){
												window.location = ''+to_add+val.id+'';
											}
											else{
												window.location = ''+to_view+'?added=true';
												window.history.pushState('Obj','Success Added',''+config.base_url+'/welcome/add_section?add_data='+$('#h_name').val()+'?new_data=true');
												$('#alert-success').show().fadeOut(2300);
												$('#h_name').val('');
												$('#h_location').val('');
												$('#h_email').val('');
												$('#h_contact').val('');
												return false;
											}
										});
									});
							},
							error   : function(){
								alert('Something went wrong while adding data. Please contact system administrator.');
								console.log('Something went wrong while adding data. Please contact system administrator.');
							}
						});
					/*}
					else
					{
						$('#h_email').focus();
						alert('Please put a valid email address.');
						return false;
					}*/
				}
			});
		},
		
		add_all : function (e){
			return this.delegate(elem.h_search,'keyup', function(){
				var value = $('#h_search').val();
				var start = $('#start').val();
				var end = $('#end').val();
				var location = config.base_url+'/welcome/get_search/'+value+'/'+start+'/'+end;
				var searchField = value;
				var loop = new RegExp(searchField,'i');
				$.getJSON(location,function(data){
					if(value.length == 0){
						$('#smile,.pagination,.print,#results').show();
						$('#searchresults').hide();
					}
					else{
							var output = '<div>';
								//output += '<ul class="list-group">';
						$.each(data, function(key,val){
							if(val.h_name.search(loop) != -1 || val.h_location.search(loop) != -1){
									output += '<a href="'+config.base_url+'/welcome/search_section/'+val.id+'">';
									output += '<li class="list-group-item">';
									output += '<label id="n_name_'+val.id+'">'+val.h_name+'  <small style="color: #555">located in '+val.h_location+'</small></label>';
									output += '</li>';
									output += '</a>';
							}
							else if(val.h_name.search(loop) == 0 || val.h_location.search(loop) == 0){
								output += '<a href="'+config.base_url+'/welcome/search_section/'+val.id+'">';
								output += '<li class="list-group-item">';
								output += '<label id="n_name_'+val.id+'">No results found.</label>';
								output += '</li>';
								output += '</a>';
							}
								//output += '</ul>';
								output += '</div>';
								$('#smile,.print,.pagination,#searchresults,#results').hide();
								$('#searchresults').slideDown(100).html(output);
						});	
					}
				});
			});
		},
		add_new_date : function(){
			return this.delegate(addelem.add_new_date,'click',function(){
				var count = $('.from_'+$(this).attr('data-count')+' input[type="date"]').length;
				var first_count = count + 1;
				var second_count = count + 2;
				//if(first_count > 30){ 
					//alert('Maximum validity is 15 dates only.');
					//return false;
				//}
				//else{
					//$('#date_count'+$(this).attr('data-count')+'').val(second_count);
					//$('#date_count').val(next_count);
					/*var date = '<tr>';
						date += '<td>';
						date += '<input name="val'+first_count+$(this).attr('data-count')+'" type="date"  class="form-control" />';
						date += '</td>';
						date += '<td>';
						date += '<input name="val'+second_count+$(this).attr('data-count')+'" type="date"  class="form-control" />';      	
						date += '</td>';
						date += '</tr>';
					$('#date_append'+$(this).attr('data-count')+'').before(date);*/
					
				$('.from_'+$(this).attr('data-count')+' #d'+$(this).attr('data-show')+'').show();
				$('.from_'+$(this).attr('data-count')+' .add_new_date').show();
				$(this).hide();
			});
		},
		delete_added_hotel :  function(){
			return this.delegate(addelem.delete_added_hotel,'click',function(){
				var count = $(this).attr('data-count');
				var from = $(this).attr('data-from');
				if(confirm("are you sure want to delete this room ?")){					
					$.getJSON(config.base_url+'/welcome/delete_added_room/'+count+'/'+from+'',function(success){});
					alert('Delete Successfully !');
					$('.seperate'+count+'').hide();
				}
				else{
					return false;
				}
			});
		},
		update_seperate_hotel : function(){
			return this.delegate(addelem.update_seperate_hotel,'click',function(){
				var location = config.base_url+'/welcome/update_seperate/'+$(this).attr('data-count')+'/'+$(this).attr('data-from')+'/'+$(this).attr('data-action');
				var a = $(this).attr('data-count');
				var b = $(this).attr('data-from');
				var c = $(this).attr('data-action');
				if($(this).attr('data-newaction') == 'update'){
					alert('We"ve detected that this data has been added before. So your action should be update this current data.');
				}
				$('.old-button'+$(this).attr('data-count')+'').hide();
				$('.new-button'+$(this).attr('data-count')+'').show();
				jQuery.ajax({
						type    : "POST",
						url     : location,
						data    : {
								'h_t_room'		 :$('.h_t_room'+$(this).attr('data-count')+'').val(),
								'h_p_rate'		 :$('.h_p_rate'+$(this).attr('data-count')+'').val(),
								'contracted_rate':$('.contracted_rate'+$(this).attr('data-count')+'').val(),
								'h_d_rate'		 :$('.h_d_rate'+$(this).attr('data-count')+'').val(),
								'h_vp'			 :$('.h_vp'+$(this).attr('data-count')+'').val(),
								'h_vp_less'		 :$('.h_vp_less'+$(this).attr('data-count')+'').val(),
								'h_pr'			 :$('.h_pr'+$(this).attr('data-count')+'').val(),
								'h_n_payment'	 :$('.h_n_payment'+$(this).attr('data-count')+'').val(),
								'h_rate_per_room':$('.h_rate_per_room'+$(this).attr('data-count')+'').val(),
								//dates
								'val1'            : $('.val'+$(this).attr('data-count')+'1'+$(this).attr('data-count')+'').val(),
								'val2'            : $('.val'+$(this).attr('data-count')+'2'+$(this).attr('data-count')+'').val(),
								'val3'            : $('.val'+$(this).attr('data-count')+'3'+$(this).attr('data-count')+'').val(),
								'val4'            : $('.val'+$(this).attr('data-count')+'4'+$(this).attr('data-count')+'').val(),
								'val5'            : $('.val'+$(this).attr('data-count')+'5'+$(this).attr('data-count')+'').val(),
								'val6'            : $('.val'+$(this).attr('data-count')+'6'+$(this).attr('data-count')+'').val(),
								'val7'            : $('.val'+$(this).attr('data-count')+'7'+$(this).attr('data-count')+'').val(),
								'val8'            : $('.val'+$(this).attr('data-count')+'8'+$(this).attr('data-count')+'').val(),
								'val9'            : $('.val'+$(this).attr('data-count')+'9'+$(this).attr('data-count')+'').val(),
								'val10'           : $('.val'+$(this).attr('data-count')+'10'+$(this).attr('data-count')+'').val(),
								'val11'           : $('.val'+$(this).attr('data-count')+'11'+$(this).attr('data-count')+'').val(),
								'val12'           : $('.val'+$(this).attr('data-count')+'12'+$(this).attr('data-count')+'').val(),
								'val13'           : $('.val'+$(this).attr('data-count')+'13'+$(this).attr('data-count')+'').val(),
								'val14'           : $('.val'+$(this).attr('data-count')+'14'+$(this).attr('data-count')+'').val(),
								'val15'           : $('.val'+$(this).attr('data-count')+'15'+$(this).attr('data-count')+'').val(),
								'val16'           : $('.val'+$(this).attr('data-count')+'16'+$(this).attr('data-count')+'').val(),
								'val17'           : $('.val'+$(this).attr('data-count')+'17'+$(this).attr('data-count')+'').val(),
								'val18'           : $('.val'+$(this).attr('data-count')+'18'+$(this).attr('data-count')+'').val(),
								'val19'           : $('.val'+$(this).attr('data-count')+'19'+$(this).attr('data-count')+'').val(),
								'val20'           : $('.val'+$(this).attr('data-count')+'20'+$(this).attr('data-count')+'').val(),
								'val21'           : $('.val'+$(this).attr('data-count')+'21'+$(this).attr('data-count')+'').val(),
								'val22'           : $('.val'+$(this).attr('data-count')+'22'+$(this).attr('data-count')+'').val(),
								'val23'           : $('.val'+$(this).attr('data-count')+'23'+$(this).attr('data-count')+'').val(),
								'val24'           : $('.val'+$(this).attr('data-count')+'24'+$(this).attr('data-count')+'').val(),
								'val25'           : $('.val'+$(this).attr('data-count')+'25'+$(this).attr('data-count')+'').val(),
								'val26'           : $('.val'+$(this).attr('data-count')+'26'+$(this).attr('data-count')+'').val(),
								'val27'           : $('.val'+$(this).attr('data-count')+'27'+$(this).attr('data-count')+'').val(),
								'val28'           : $('.val'+$(this).attr('data-count')+'28'+$(this).attr('data-count')+'').val(),
								'val29'           : $('.val'+$(this).attr('data-count')+'29'+$(this).attr('data-count')+'').val(),
								'val30'           : $('.val'+$(this).attr('data-count')+'30'+$(this).attr('data-count')+'').val()
						},
						cache   : false,
						success : function(data){
								if(c == 'add_hotel'){
									alert('Succcesfully Added!');
								}
								else{
									alert('Succcesfully updated!');
								}
								var location2 = config.base_url+'/welcome/get_seperate/'+a+'/'+b;
								$.getJSON(location2,function(data){
									$.each(data, function(key,val){
										$('.seperate_hotel_'+val.room_count+'').html(val.new_room);
										$('.slide-hotel'+val.room_count+'').show();
									});
								});
						},
						error   : function(){
							alert('Something went wrong while updating data. Please contact system administrator.');
							console.log('Something went wrong while adding data. Please contact system administrator.');
						}
					});
			});
		},
		update_acount : function(){
			return this.delegate(addelem.update_acount,'click',function(){					
				if($('#fullname').val() == '' | $('#username').val() == '' | $('#password').val() == ''){
					$('#alert_me').html('Fields are required!').show();
					$($(this)).focus();
				}
				else if($('#fullname').val() == ''){
					$('#alert_me').html('Fields are required!').show();
					$($(this)).focus();
				}
				else if($('#username').val() == ''){
					$('#alert_me').html('Fields are required!').show();
					$($(this)).focus();
				}
				else if($('#password').val() == ''){
					$('#alert_me').html('Fields are required!').show();
					$($(this)).focus();
				}
				else if($('#password2').val() != $('#password').val()){
					$('#alert_me').html('Password not match!').show();
					$('#password2').focus();
				}
				else{
					jQuery.ajax({
						url: config.base_url+'/welcome/update_acount/'+$(this).attr('data-user-id'),
						type : "POST",
						data: {
							'fullname': $('#fullname').val(),
							'username': $('#username').val(),
							'password': $('#password').val(),
						},
						cache : false,
						success : function(data){
							$('#myModal').modal('hide');
							location.reload();
						}
					
					});
				}
				
				var btn = $(this)
				btn.button('loading')
				$.ajax().always(function () {
				  btn.button('reset')
				});
				})
				alert('lol');
		}
	}
	
	$.extend(config.doc,hotelConf);
	config.doc.print1();
	config.doc.print2();
	config.doc.slide_sep_hotel();
	config.doc.close_sep_hotel();
	config.doc.ad_n_r_n();
	config.doc.addroom();
	config.doc.remove();
	config.doc.compute();
	config.doc.option_click();
	config.doc.viewv();
	config.doc.viewb();
	config.doc.viewbanks();
	config.doc.insert_hotel();
	config.doc.add_all();
	config.doc.add_new_date();
	config.doc.delete_added_hotel();
	config.doc.update_seperate_hotel();
	config.doc.update_acount();
}(jQuery, window, document));