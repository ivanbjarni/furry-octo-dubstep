function hideAllMatchesNews(){					
		$(".newsmatch_content").each(function() {
			$(this).hide();
		});
		$("#nothide").show();
	}

$(document).ready(function()
{					
	hideAllMatchesNews();
		
	$( ".newsmatch_title" ).click(function() {
		$( $(this).parent().siblings('.newsmatch_content')).toggle( "slow" );
		console.log("hi");
	});

	$('html,body').animate({scrollTop: $("#nothide").parent().offset().top});

});