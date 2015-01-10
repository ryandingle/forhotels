var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var checkin = $('#dpd1').datepicker({
  onRender: function(date) {
	return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  if (ev.date.valueOf() > checkout.date.valueOf()) {
	var newDate = new Date(ev.date)
	newDate.setDate(newDate.getDate() + 1);
	checkout.setValue(newDate);
  }
  sub_date();
  checkin.hide();
  $('#dpd2')[0].focus();
}).data('datepicker');
var checkout = $('#dpd2').datepicker({
  onRender: function(date) {
	return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  sub_date();
  checkout.hide();
}).data('datepicker');


//loop
var count = parseInt($('#room_count').val());
for(var a = 2;a <= count+1;a++){
	var checkin = $('#dpd1'+a+'').datepicker({
  		onRender: function(date) {
		return date.valueOf() < now.valueOf() ? 'disabled' : '';
	}
	}).on('changeDate', function(ev) {
	  if (ev.date.valueOf() > checkout.date.valueOf()) {
		var newDate = new Date(ev.date)
		newDate.setDate(newDate.getDate() + 1);
		checkout.setValue(newDate);
	  }
	  alert(a);
	  sub_date11(a);
	  checkin.hide();
	  $('#dpd2'+a+'')[0].focus();
	}).data('datepicker');
	var checkout = $('#dpd2'+a+'').datepicker({
	  	onRender: function(date) {
		return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
	  }
	}).on('changeDate', function(ev) {
	  sub_date11(a);
	  checkout.hide();
	}).data('datepicker');
}
//end



//new
var checkin = $('#new1, #new2, #new3, #new4,#new11, #new22, #new33, #new44').datepicker({
  onRender: function(date) {
	return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  if (ev.date.valueOf() > checkout.date.valueOf()) {
	var newDate = new Date(ev.date)
	newDate.setDate(newDate.getDate() + 1);
	//checkout.setValue(newDate);
  }
  checkin.hide();
  subdate2();
  $('.row').css('margin-bottom','20%');
	$('#date1').val(''+$('#new1').val()+' - '+$('#new11').val()+'');
	$('#date2').val(''+$('#new2').val()+' - '+$('#new22').val()+'');
	$('#date3').val(''+$('#new3').val()+' - '+$('#new33').val()+'');
	$('#date4').val(''+$('#new4').val()+' - '+$('#new44').val()+'');
}).data('datepicker');


//loop
for(var a = 2;a <= count+1;a++){
	var checkin = $('#new1'+a+', #new2'+a+', #new3'+a+', #new4'+a+',#new11'+a+', #new22'+a+', #new33'+a+', #new44'+a+'').datepicker({
	  onRender: function(date) {
		return date.valueOf() < now.valueOf() ? 'disabled' : '';
	  }
	}).on('changeDate', function(ev) {
	  if (ev.date.valueOf() > checkout.date.valueOf()) {
		var newDate = new Date(ev.date)
		newDate.setDate(newDate.getDate() + 1);
		//checkout.setValue(newDate);
	  }
	  checkin.hide();
	  subdate2(a);
	  $('.row').css('margin-bottom','20%');
		$('#date1'+a+'').val(''+$('#new1'+a+'').val()+' - '+$('#new11'+a+'').val()+'');
		$('#date2'+a+'').val(''+$('#new2'+a+'').val()+' - '+$('#new22'+a+'').val()+'');
		$('#date3'+a+'').val(''+$('#new3'+a+'').val()+' - '+$('#new33'+a+'').val()+'');
		$('#date4'+a+'').val(''+$('#new4'+a+'').val()+' - '+$('#new44'+a+'').val()+'');
	}).data('datepicker');
}