/**
 * [DateTime 时间转换]
 * @type {Object}
 */
var DateTime = {};
DateTime = {
	/**              
     * 时间戳转换日期              
     * @param <int> unixTime    待时间戳(秒)              
     * @param <bool> isFull    返回完整时间(Y-m-d 或者 Y-m-d H:i:s)              
     * @param <int>  timeZone   时区              
     */
    UnixToDate: function(unixTime, isFull, timeZone) {
		/*var isFull = true;
        if (typeof (timeZone) == 'number')
        {
            unixTime = parseInt(unixTime) + parseInt(timeZone) * 60 * 60;
        }
        var time = new Date(unixTime * 1000);
        var ymdhis = "";
        ymdhis += time.getUTCFullYear() + "-";
        ymdhis += (time.getUTCMonth()+1) + "-";
        ymdhis += time.getUTCDate();
        if (isFull === true)
        {
            ymdhis += " " + time.getUTCHours() + ":";
            ymdhis += time.getUTCMinutes() + ":";
            ymdhis += time.getUTCSeconds();
        }
        return ymdhis;*/
        var now = new Date(unixTime*1000);   
        var year = now.getFullYear();    
        var month = now.getMonth()+1;     
        var date = now.getDate();     
        var hour = now.getHours();     
        var minute = now.getMinutes();     
        var second = now.getSeconds();     
        return year+"-"+month+"-"+date+"   "+hour+":"+minute+":"+second; 
    },

    currTime : function(fmt){
    	var date = new Date();
    	var o = {   
		    "M+" : date.getMonth()+1,                 //月份   
		    "d+" : date.getDate(),                    //日   
		    "h+" : date.getHours(),                   //小时   
		    "m+" : date.getMinutes(),                 //分   
		    "s+" : date.getSeconds(),                 //秒   
		    "q+" : Math.floor((date.getMonth()+3)/3), //季度   
		    "S"  : date.getMilliseconds()             //毫秒   
		 };   
		 if(/(y+)/.test(fmt))   
		    fmt=fmt.replace(RegExp.$1, (date.getFullYear()+"").substr(4 - RegExp.$1.length));   
		 for(var k in o)   
		    if(new RegExp("("+ k +")").test(fmt))   
		  		fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));   
		 return fmt;
    },

	datatime : function(datatime){
		return moment(datatime).format('YYYY-MM-DD HH:mm:ss');
	}

}

;
var Selector = {};
Selector = {
    init : function(selector){
        var url = window.location.href;
        url = url.toLowerCase();

        jQuery('.nav-bar').find('li').each(function(){
            var str = jQuery(this).attr('class');
            if(url.indexOf(str) > 0){
                jQuery(this).addClass('bg');
            }
        });
    }
}