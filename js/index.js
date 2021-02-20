$( "table tbody" ).sortable( {
	update: function( event, ui ) {
    $(this).children().each(function(index) {
			$(this).find('td').last().html(index + 1)
    });
  }
});

$(document).ready(function(){
    alert('Hello');
    $("iframe", "#editor").contents().find("p").addClass("tiny_p");
});

