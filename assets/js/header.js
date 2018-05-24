$(document).ready(function(){
	$( ".dropdown-menu" ).each(function() {
		if($(this).find("a").length == 0){
			$(this).addClass('d-none');
		}
	});
});