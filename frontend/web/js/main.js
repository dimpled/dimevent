(function($) {
    "use strict";

 		$.fn.dsLoading = function( action ) {
 		var template = $('<div class="preloader" style=""> <div class="load"> <div class="spinner"></div> <div class="text">Loading...</div> </div> </div>');

        if ( action === "start") {
           $(this).append(template);
        }
 
        if ( action === "stop" ) {
            $(this).find(template).remove();
        }
 
    };


})(jQuery); 