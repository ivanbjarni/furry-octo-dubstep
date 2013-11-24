$(function() {
	$( "#slider" ).slider({
		min: 0,
		max: 1000,
		values: [ 0 ],
		slide: function( event, ui ) {
			$( "#betamount" ).html(ui.values[ 0 ] + " kr.");
			$("#slider").show();
		}

	});
	$( "#betamount" ).html($( "#slider" ).slider( "values", 0 ) + " kr.");


});
$(document).ready( function(){
	$( "#bet_btn" ).click(function(event){
		event.preventDefault();
		$.post("savebets.php",
		{
			amount : $( "#betamount" ).text(),
			betchoice : $("input:radio[name=group]:checked").val(),
		},
		function(data){
			$("div.fancy").text(data);
		});
	});

});
	