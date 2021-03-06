/**
 * 
 */
;
var WebInit = {};
WebInit = {
	height : 600,

	init : function(){
		this.setHeight();
		this.windowResize();
	},

	setHeight : function(){
		jQuery(window).ready(function(){
			var height = jQuery(window).height();
			if(height > WebInit.height){
				height = height - 140;
				jQuery('.middle').css('min-height', height);
			}else{
				jQuery('.middle').css('min-height', '660px');
			}
		});
	},

	windowResize : function(){
		jQuery(window).resize(function() {
		 	var height = jQuery(window).height();

			if(height > WebInit.height){
				height = height - 140;
				jQuery('.middle').css('min-height', height);
			}
		});
	}
}

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