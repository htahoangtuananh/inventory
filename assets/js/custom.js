/**
 * Created by VCCORP on 11/23/2017.
 */
$(document).ready(function($){
    var height = $('.content').height();
    $('.main-sidebar').css('height',height);

	$(function () {
		$('.tool-tip').tooltip()
	})

    $("a.deleteLink").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });  
        
	 $('.preview-image a').on('mouseenter', function(evt){
		var target_class = $(this).attr('data-class');
		$('.'+target_class).show();
		$(this).on('mouseleave', function(){
			$('.'+target_class).hide();
		});
	});
		
	$('.dataTable').DataTable();
    
    $('.changeLang').click(function () {
        $('.changeLang').css('padding-top','10px');
        $('#changeLang-link').hide();
        $('#lang-dropdown').removeClass('hidden');
    });
	
	
	setTimeout(function (){
        var h = $(".content-wrapper").height();
        $(".main-sidebar").height(h);
    }, 2000);
});
