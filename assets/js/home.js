$(function() {
		
	var table_news = $('#detail-table').DataTable({
		"processing":true,
		"serverSide":true,  
		"order":[], 
		"ajax": {
			url : base_url+'home/detail_datatable',
			type: "GET"  
		},
		"columnDefs":[  
			{  
				"targets":[0],  
				"orderable":false,
			},  
		], 
	});

	$(".search-btn").click(function(){
			var url = $("#url").val();
			if(url!='' && isUrlValid(url)){
				$(".loading").removeClass('d-none');
				$.ajax({
	    			url: base_url+'home/getUrlInfo',
	    			type: 'post',
	    			dataType: 'json',
	    			data: {
	    				url: url
	    			},
	    			success: function ( result ) {
	    				console.log(result);
	    				if(result.title){
	    					$(".debug-box").removeClass("d-none");
	    					$(".debug-box").data('link',url);
	    					$(".preview-img").attr('src',result.image_src);
	    					$(".preview-title").html(result.title);
	    					$(".description").html(result.description);
	    					$(".loading").addClass('d-none');
	    				}
	    				
	    			}
	    		});
			}else if(!isUrlValid(url)){
				swal("Error!", "Please enter valid URL.Your URL must be start with http or https.", "error");
			}else{
				swal("Error!", "Please enter URL before searching.", "error");
			}
	});
	$(".save-btn").click(function(){
			var title = $(".preview-title").html();
			var description = $(".description").html();
			var image = $(".preview-img").attr('src');
			var url = $(".debug-box").data('link');
			$(".loading").removeClass('d-none');
			$.ajax({
	    			url: base_url+'home/saveInfo',
	    			type: 'post',
	    			dataType: 'json',
	    			data: {
	    				title : title,
	    				description : description,
	    				image : image,
	    				url : url
	    			},
	    			success: function ( result ) {
	    				if(result.success){
	    					$(".debug-box").addClass('d-none');
	    					$("#url").val('');
	    					table_news.ajax.reload();
	    					$(".loading").addClass('d-none');
	    					swal(result.title, result.message, "success");
	    				}else{
	    					swal(result.title, result.message, "error");
	    				}
	    			}
	    		});
	});

});
function isUrlValid(url) {
    return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
}