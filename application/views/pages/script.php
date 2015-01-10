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
			if(res == "0") {                      
				//alert('Your session has been expired!');
				$('#dark-box').show();
				$('nav,.container').hide();
				//location.href = 'http://localhost/forhotels';                     
			}               
			else{
				$('#dark-box').hide();
				$('nav,.container').show();
			}
		}         
	});
}
setInterval(check, 500);
</script>