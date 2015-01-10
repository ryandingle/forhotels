function change(){
	$('#h_inclusion_real').val($('#h_inclusions').html());
}
function delete_data(id){
	$(document).ready(function(e) {
		var loc = config.base_url+'/welcome/delete_data/'+id
		if(confirm("Delete this Hotel Record form database ?")){
			jQuery.ajax({
					type: "POST",
					url: loc,
					cache: false,
					success: function (response){
						$('#'+id+'').slideToggle(500).remove(500);
					}, error: function () {
						alert('Unable to delete! Contact System engineer!');
					}
				});
		}
		else
		{
			return false;
		}
	});
}

function cancel(id){
	$(document).ready(function(e) {
		$('#myModal').hide();
	});
}
//loop
/*
function sub_date11(a){;
	$(document).ready(function() {		
		var start = $('#dpd1'+a+'').val();
		var end = $('#dpd2'+a+'').val();
		$('#h_val'+a+'').val(''+start+' - '+end);
	});
}

function subdate22(a){
	$('#date1'+a+'').val(''+$('#new1'+a+'').val()+' - '+$('#new11'+a+'').val()+'');
	$('#date2'+a+'').val(''+$('#new2'+a+'').val()+' - '+$('#new22'+a+'').val()+'');
	$('#date3'+a+'').val(''+$('#new3'+a+'').val()+' - '+$('#new33'+a+'').val()+'');
	$('#date4'+a+'').val(''+$('#new4'+a+'').val()+' - '+$('#new44'+a+'').val()+'');
}
//

function sub_date(){
	$(document).ready(function() {		
		var start = $('#dpd1').val();
		var end = $('#dpd2').val();
		$('#h_val').val(''+start+' - '+end);
	});
}
function subdate2(){
	$('#date1').val(''+$('#new1').val()+' - '+$('#new11').val()+'');
	$('#date2').val(''+$('#new2').val()+' - '+$('#new22').val()+'');
	$('#date3').val(''+$('#new3').val()+' - '+$('#new33').val()+'');
	$('#date4').val(''+$('#new4').val()+' - '+$('#new44').val()+'');
}

$(function (){
	var p_rate, c,new_c_rate,income,vp,np,vp_less,pr,vd,m;
	p_rate     = parseFloat($('.h_p_rate').val());
	c          = parseFloat($('.h_d_rate').val());
	np         = parseFloat($('.h_n_payment').val());
	new_c_rate = parseFloat(p_rate*(c / 100));
	income     = parseFloat(p_rate - new_c_rate);
	vd         = parseFloat((47 / 100));
	m          = parseFloat(new_c_rate*vd);
	vp         = parseFloat(m+income);
	vp_less    = parseFloat(Math.ceil(vp/np));
	pr1        = parseFloat(vp_less*np);
	prf        = vp_less*np - income;

	if(vp_less*np < income) alert('connot be devided by '+np+'.');
	
for(var i =1;i<=$('#room_count').val();i++){	
	$('#h_show_income').val('PHP '+format2(new_c_rate));
	$('#h_show_c_rate').val('PHP '+format2(income));
	$('#income').val(income);
	$('#contracted_rate').val(new_c_rate);
	
	$('#h_show_vp').val('PHP '+format2(vp));
	$('#h_show_vp_less').val('PHP '+format2(vp_less));
	$('#h_show_pr').val('PHP '+format2(prf));
	
	$('#vp_less').val(vp_less);
	$('#vp').val(vp);
	$('#pr').val(prf);
}
	/*if(isNaN(vp_less) || isNaN(prf))
	{
		$('#h_show_vp_less').val('0');
		$('#h_show_pr').val('0');
		$('#h_c_income').val('0');
		$('#h_d_rate').val('0');
		$('#h_show_c_rate').val('0');
		$('#h_show_income').val('0');
		$('#h_show_vp').val('0');
	}	
	else
	{
		$('#h_show_vp_less').val('PHP '+format2(vp_less));
		$('#h_show_pr').val('PHP '+format2(prf));
	}
	
	
});
*/
//alert($('#room_count').val());

/*$(function($){
var count = parseInt($('#room_count').val());
//alert($('#h_show_c_rate2').val());
for(var a = 1;a<=count;a++){
	if(a == 1){		
		$('#h_show_c_rate').val(format2(parseInt($('#h_show_c_rate').val())));
		$('#h_show_vp').val(format2(parseInt($('#h_show_vp').val())));
		$('#h_show_income').val(format2(parseInt($('#h_show_income').val())));
		$('#h_show_vp_less').val(format2(parseInt($('#h_show_vp_less').val())));
		$('#h_show_pr').val(format2(parseInt($('#h_show_pr').val())));
	}			
		$('#h_show_c_rate'+a+'').val(format2(parseInt($('#h_show_c_rate'+a+'').val())));
		$('#h_show_vp'+a+'').val(format2(parseInt($('#h_show_vp'+a+'').val())));
		$('#h_show_income'+a+'').val(format2(parseInt($('#h_show_income'+a+'').val())));
		$('#h_show_vp_less'+a+'').val(format2(parseInt($('#h_show_vp_less'+a+'').val())));
		$('#h_show_pr'+a+'').val(format2(parseInt($('#h_show_pr'+a+'').val())));
	
}
});
*/
function format2(n) {
	return " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}

function number_format(number, decimals, dec_point, thousands_sep) {
	var n = !isFinite(+number) ? 0 : +number, 
	prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
	sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
	dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
	s = '',
	toFixedFix = function (n, prec) {
		var k = Math.pow(10, prec);
		return '' + Math.round(n * k) / k;
	};
	// Fix for IE parseFloat(0.55).toFixed(0) = 0;
	s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
	if (s[0].length > 3) {
		s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
	}
	if ((s[1] || '').length < prec) {
		s[1] = s[1] || '';
		s[1] += new Array(prec - s[1].length + 1).join('0');
	}
	return s.join(dec);
}
/*
//for loop data
var count = $('#room_count').val();
for(var a = 2;a <=count +1;a++){
$('.format1'+a+'').html(number_format($('.format1'+a+'').html()));
$('.format2'+a+'').html(number_format($('.format2'+a+'').html()));
$('.format3'+a+'').html(number_format($('.format3'+a+'').html()));
$('.format4'+a+'').html(number_format($('.format4'+a+'').html()));
$('.format5'+a+'').html(number_format($('.format5'+a+'').html()));
}
//end
//first
$('.format1').html(number_format($('.format1').html()));
$('.format2').html(number_format($('.format2').html()));
$('.format3').html(number_format($('.format3').html()));
$('.format4').html(number_format($('.format4').html()));
$('.format5').html(number_format($('.format5').html()));
//end
$('#close, #cancel').click(function (){
	
	window.history.pushState('obj', 'Edit Data.', '/forhotels/welcome/view_data');
	return false;
	//location.href = config.base_url+'/welcome/view_data';
});
*/