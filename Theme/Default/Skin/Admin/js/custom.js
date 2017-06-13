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

;
var Vaildate = function(config){
	this.selector = config.selector;
	this.formclass = config.formClass;
}

Vaildate.prototype.form = function(){
	var form = this.formclass;
	jQuery(this.selector).on('click', function(){
		jQuery(form).submit();
	});
}