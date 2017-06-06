/**
 * 
 */
;
var switchs = {};
switchs = {
	init : function(selector){
		jQuery(selector).click(function(){
			var id = jQuery(this).attr('id');

			//除去active
			jQuery(selector).removeClass('active');
			jQuery(".right").find('li').removeClass('active');

			//添加active
			jQuery(this).addClass('active');
			jQuery(".right").find("#"+id).addClass('active')
		});
	},
}


