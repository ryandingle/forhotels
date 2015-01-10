$(document).ready(function(){
	var count = $('#room_count').val();
	for(var a = 2;a <= count; a++){
		var p_rate, c,new_c_rate,income,vp,np,vp_less,pr,vd,m;
		p_rate     = parseFloat($('.h_p_rate'+a+'').val());
		c          = parseFloat($('.h_d_rate'+a+'').val());
		np         = parseFloat($('.h_n_payment'+a+'').val());
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
		
		$('#h_show_income'+a+'').val(format2(new_c_rate));
		$('#h_show_c_rate'+a+'').val(format2(income));
		
		$('#income'+a+'').val(new_c_rate);
		$('#contracted_rate'+a+'').val(income);
		$('#rate_per_room'+a+'').val(rate_per_room);
		
		
		$('#vp_less'+a+'').val(vp_less);
		$('#vp'+a+'').val(vp);
		$('#pr'+a+'').val(prf);
		$('#h_show_vp'+a+'').val(format2(vp));
	}
	


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
	rate_per_room = vp_less*np;
	
	//if(pr1 < income) alert('connot be devided by '+np+'.');
	
	function format2(n) {
		return " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
	}
	
	$('#h_show_income').val(format2(new_c_rate));
	$('#h_show_c_rate').val(format2(income));
	
	$('#income').val(new_c_rate);
	$('#contracted_rate').val(income);
	$('#rate_per_room').val(rate_per_room);
	
	
	$('#vp_less').val(vp_less);
	$('#vp').val(vp);
	$('#pr').val(prf);
	$('#h_show_vp').val(format2(vp));
});