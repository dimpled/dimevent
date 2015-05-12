
 yii.pageEvents = (function($) {
     var pub = {
         
         isActive: true,
         init: function() {
            
         },
         updateStatus :function(url,data){
			$.ajax({
				  method: "post",
				  url:url,
				  dataType: "json",
				  data:data
				}).done(function(result) {
			    	console.log('log::event-update-field');
			  });
		}

     };

    $(document).on('click', '.btn-update-field', function(event){
    	var url = $(this).data("url");
    	var data = {
    			'pk':$(this).data("pk"),
    			'field':$(this).data("field"),
    			'value':$(this).data("value")
    	};
    	pub.updateStatus(url,data);
    	//return false;
    });

     return pub;
 })(jQuery);
