var sellLanguage = 'ZH';

function setLanguage(lang){
	if(isNotEmpty(lang)){
		sellLanguage = lang.toUpperCase();
	}
}
/**
* 校验只要是数字（包含正负整数，0以及正负浮点数）就返回true
**/
function isNumber(val){
    var regPos = /^\d+(\.\d+)?$/; //非负浮点数
    var regNeg = /^(-(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*)))$/; //负浮点数
    if(regPos.test(val) || regNeg.test(val)){
        return true;
    }else{
        return false;
    }
}
function toNumber(value){
	if(!isNaN(value))
		return Number(value);
	return 0;
}
function NumberFormatter(value,row,index){
	return toNumber(value);
}
function NumberToMoney(num) {
	if(num==null||num==''||isNaN(num)) return 0.00;
	return (Number(num).toFixed(2) + '').replace(/\d{1,3}(?=(\d{3})+(\.\d*)?$)/g, '$&,');
}

/**精确加法*/
function accAdd(arg1,arg2){
	var r1,r2,m;
	try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}
	try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}
	m=Math.pow(10,Math.max(r1,r2))
	return (arg1*m+arg2*m)/m
}

/**判断是否不为null/''/undefined*/
function isNotEmpty(val){
	if(val==null||typeof(val)=='undefined'){
		return false;
	}
	if(typeof val=='string'&&val.replace(/\s/g, "")==''){
		return false;
	}
	return true;
}

/**判断是否为null/''/undefined*/
function isEmpty(val){
	return !isNotEmpty(val);
}
/**判断是否为null*/
function isNull(val,re){
	if(val == null || typeof(val) == 'undefined'){
		 return isEmpty(re) ? '' : re;
	}
	return val;
}

/**将日期*/
function DateToString(value){

	if (value instanceof Date){
		value = value.getFullYear()+'-'+(value.getMonth()+1)+'-'+value.getDate();
	}
	return value;
}

/**将日期*/
function ShotDateString(value){
	value = isNotEmpty(value)?value.substr(0,10):value;
	return value;
}

//格式化数字输入控件
function createNumberboxInput(){
	var numberboxInput = $(".numberboxInput");

	numberboxInput.each(function(index, element) {
		var maxValue = parseFloat($(this).attr("maxValue"));
		maxValue = isNaN(maxValue) ? 9999999999 : maxValue;
		var minValue = parseFloat($(this).attr("minValue"));
		minValue = isNaN(minValue) ? 0 : minValue;
		var precision = parseInt($(this).attr("precision"));
		precision = isNaN(precision) ? 0 : precision;
		var value = parseFloat($(this).attr("value"));
		value = isNaN(value) ? 1 : value;

        $(element).keypress(function(b) {
			var keyCode = b.keyCode ? b.keyCode : b.charCode;
			if (keyCode != 0 && (keyCode < 48 || keyCode > 57) && keyCode != 8 && keyCode != 37 && keyCode != 39 && keyCode != 45 && keyCode != 46) {
				return false;
			} else {
				return true;
			}
		}).keyup(function(e) {
			var keyCode = e.keyCode ? e.keyCode : e.charCode;
			if((keyCode == 109 || keyCode == 189) && $(element).val() == '-') {return;};
			if(keyCode == 37 || keyCode == 39 || keyCode == 110) {return;};

			var numVal = $(element).val() == 0 ? 0 : parseFloat($(element).val()) || minValue;
			numVal = numVal < minValue ? minValue : numVal;
			numVal = numVal > maxValue ? maxValue : numVal;
			$(element).val(numVal);
		}).blur(function() {
			var numVal = $(element).val() == 0 ? 0 : parseFloat($(element).val()) || minValue;
			numVal = numVal < minValue ? minValue : numVal;
			numVal = numVal > maxValue ? maxValue : numVal;
			$(element).val(numVal);
		});

    });
}
function createDatetimepicker(){
	//日期选择控件
	$(".datetimepickerDiv").each(function(index, element) {
        var startView = $(element).attr("data-startView");
		startView = startView == null || startView == "undefined" || startView == "" ? 2 : startView;
        var minView = $(element).attr("data-minView");
		minView = minView == null || minView == "undefined" || minView == "" ? 2 : minView;
        var todayBtn = $(element).attr("data-todayBtn");
		todayBtn = todayBtn == null || todayBtn == "undefined" || todayBtn == "" ? true : todayBtn == "false" ? false : true ;
		var pickerPosition=$(element).attr("data-pickerPosition");
		pickerPosition = pickerPosition == null || pickerPosition == "undefined" || pickerPosition == "" ? "bottom-left" : pickerPosition ;
		var sellLanguage2 = 'ZH';
		try{ sellLanguage2 = sellLanguage; }catch(e){ console.log(e.message); }

		$(element).datetimepicker({
			language: sellLanguage2 == 'EN' ? 'en' : 'zh-CN',//语言
			//format: format, //String 默认值: 'mm/dd/yyyy'日期转换格式      data-date-format
			autoclose: true, //Boolean 默认值:false 选择完日期自动关闭
			startView: parseInt(startView),//Number, String. 默认值：2, 0 for the minute view, 1 for the hour view, 2 for the day view, 3 for month view (the default), 4 for the 12-month overview, 5 for the 10-year overview. Useful for date-of-birth datetimepickers.
			minView: parseInt(minView),//Number, String. 默认值：0, 'hour' 日期时间选择器所能够提供的最精确的时间选择视图
			//weekStart: 1,//默认值:0. 0(星期日)到6(星期六)
			//startDate: new Date("1997/1/1"),//Date类型,默认值：开始时间.不能小于开始时间
			//endDate: //Date类型,默认值：结束时间.不能大于开始时间
			//daysOfWeekDisabled: [0,1,2,3,4,5,6] //String,Array类型.默认值:"",[]. 不能被选择的week
			todayBtn: "linked",//Boolean, "linked". 默认值: false 如果此值为true 或 "linked"，则在日期时间选择器组件的底部显示一个 "Today" 按钮用以选择当前日期。如果是true的话，"Today" 按钮仅仅将视图转到当天的日期，如果是"linked"，当天日期将会被选中。
			todayHighlight: true,//Boolean. 默认值: false 如果为true, 高亮当前日期。
			todayBtn: todayBtn,
			keyboardNavigation: true,//Boolean. 默认值: true 是否允许通过方向键改变日期。
			forceParse: true,//Boolean. 默认值: true  当选择器关闭的时候，是否强制解析输入框中的值。也就是说，当用户在输入框中输入了不正确的日期，选择器将会尽量解析输入的值，并将解析后的正确值按照给定的格式format设置到输入框中。
			//minuteStep: 10,//Number. 默认值: 5  分钟的间隔
			//showMeridian : true,//是否加上网格
			//initialDate: "2015/5/5",//Date or String. 默认值: new Date() 初始化日期
			//showMeridian: true//Boolean. 默认值: false 以12小时制显示
			pickerPosition: pickerPosition //String. 默认值: 'bottom-right' (还支持 : 'bottom-left') 此选项当前只在组件实现中提供支持。通过设置选项可以讲选择器放倒输入框下方
		}).on('show', function(ev){
			var fixed = $(element).attr("data-fixed");
			if(fixed == "true") {
				$(".datetimepicker").css("position","fixed")
					.css("top", element.getBoundingClientRect().top+$(element).height()+"px")
					.css("left", element.getBoundingClientRect().left+"px");

			} else {
				$(".datetimepicker").css("position","absolute");
			}
			$(".datetimepicker").css("z-index", "119891114")
		});
    });
}

/**bootstrapTable页脚汇总*/
function sumfooterFormatter(data){
	var num = 0;
	for(var i in data){
		num += data[i][this.field]*1000000;
	}
	return num/1000000;
}


//显示消息提示框
/*$._messengerDefaults = {
	extraClasses: 'messenger-fixed messenger-theme-air messenger-on-bottom'
}
function showMessengerTip(text, type, time) {
	type = type == null || type == "undefined" ? 'info' : type;
	time = time == null || time == "undefined" ? 3 : time;
	$.globalMessenger().post({
		 message: text,//提示信息
		 type: type,//消息类型。error、info、success
		 hideAfter: time,
		 hideOnNavigate: true
	 });
}*/

//弹出Bootstrap提示对话框1
function showBootboxAlert(text, time, fn) {
	time = time == null || time == "undefined" ? 3000 : time;
	var okText = "确定";
	var sellLanguage2 = 'ZH';
	try{ sellLanguage2 = sellLanguage; }catch(e){ console.log(e.message); }
	if(sellLanguage2 == 'EN') {
		okText = 'OK';
	}
	var dialog = bootbox.alert({
		size: text.length>20 ? "" : "small",
		message: text,
		className: "bootboxAlertDialog",
		backdrop: true,
		buttons: {
			ok: {
				label: okText
			}
		},
		callback: function(){
			if(fn != null && fn != "undefined") fn();
		}
	});

	dialog.find(".modal-dialog").css('margin-top',$(window).height()/2 - 70+"px");

	if(time >= 0){
		setTimeout(function(){
			dialog.modal('hide');
			if(fn != null && fn != "undefined") fn();
	    }, time);
	}
}

//弹出Bootstrap询问对话框
function showBootboxConfirm(text, fn, ufn) {
	var okText = "确定";
	var cancelText = "取消";
	var sellLanguage2 = 'ZH';
	try{ sellLanguage2 = sellLanguage; }catch(e){ console.log(e.message); }
	if(sellLanguage2 == 'EN') {
		okText = 'YES';
		cancelText = 'NO';
	}
	var dialog = bootbox.confirm({
		size: text.length>20 ? "" : "small",
		message: text,
		className: "bootboxConfirmDialog",
		buttons: {
			confirm: {
				label: okText
			},
			cancel: {
				label: cancelText
			}
		},
		callback: function(r){
			if(r){
				fn();
			} else {
				if(ufn != null && ufn != "undefined") ufn();
			}
		}
	});
	dialog.find(".modal-dialog").css('margin-top',$(window).height()/2 - 70+"px");

}

//弹出Bootstrap自定义对话框，页面是url地址
function showBootboxDialog(title, url, width, height, onlyView, fn, ufn) {
	width = width == null || width == "undefined" ? 500 : width;
	height = height == null || height == "undefined" ? $(window).height()-250 : height;
	onlyView = onlyView == null || onlyView == "undefined" ? true : onlyView;
	var okText = "确定";
	var cancelText = "取消";
	var closeText = "关闭";
	var sellLanguage2 = 'ZH';
	try{ sellLanguage2 = sellLanguage; }catch(e){ console.log(e.message); }
	if(sellLanguage2 == 'EN') {
		okText = 'YES';
		cancelText = 'NO';
		closeText = "CLOSE";
	}

	var dialog = bootbox.dialog({
		title: title,
		message: '<i class="toolsLoadingI"></i><iframe id="bootboxDialogIframe" class="bootboxDialogIframe" width="100%" height="100%" frameborder="0" src="'+url+'"></iframe> ',
		buttons: {
			cancel: {
				label: onlyView ? closeText : cancelText,
				callback: function(){
					if(ufn != null && ufn != "undefined") return ufn();
				}
			},
			ok: {
				label: okText,
				callback: function(){
					//var iframe = document.getElementById('bootboxDialogIframe');
					var iframe = $(this).find(".bootboxDialogIframe")[0];
					if(fn != null && fn != "undefined") return fn(iframe);
				}
			}
		}
	});
	dialog.find('.modal-header').css("padding-top","5px");
	dialog.find('.modal-header').css("padding-bottom","5px");
	dialog.find('.modal-footer').css("padding-top","8px");
	dialog.find('.modal-footer').css("padding-bottom","8px");
	dialog.find('.modal-dialog').width(width);
	dialog.find('.bootbox-body').height(height < 100 ? 100 : height);
	if(onlyView) dialog.find('.btn-primary').remove();
	dialog.find('.bootbox-close-button').click(function(e) {
        if(ufn != null && ufn != "undefined") return ufn();
    });

	dialog.find('.bootboxDialogIframe').load(function(){
		dialog.find('.toolsLoadingI').hide();
		dialog.find('.toolsLoadingI').remove();
	});
	return dialog;
}

//弹出Bootstrap自定义对话框2，页面是html字符串
function showBootboxDialog2(title, content, width, height, onlyView, fn, ufn,init) {
	width = width == null || width == "undefined" ? 500 : width;
	height = height == null || height == "undefined" ? $(window).height()-250 : height;
	onlyView = onlyView == null || onlyView == "undefined" ? true : onlyView;
	var okText = "确定";
	var cancelText = "取消";
	var closeText = "关闭";
	var sellLanguage2 = 'ZH';
	try{ sellLanguage2 = sellLanguage; }catch(e){ console.log(e.message); }
	if(sellLanguage2 == 'EN') {
		okText = 'YES';
		cancelText = 'NO';
		closeText = "CLOSE";
	}

	var dialog = bootbox.dialog({
		title: title,
		message: content == null || content == "undefined" ? '' : content,
		buttons: {
			cancel: {
				label: onlyView ? closeText : cancelText,
				callback: function(){
					if(ufn != null && ufn != "undefined") return ufn();
				}
			},
			ok: {
				label: okText,
				callback: function(){
					if(fn != null && fn != "undefined") return fn();
				}
			}
		}
	});
	dialog.find('.modal-header').css("padding-top","5px");
	dialog.find('.modal-header').css("padding-bottom","5px");
	dialog.find('.modal-footer').css("padding-top","8px");
	dialog.find('.modal-footer').css("padding-bottom","8px");
	dialog.find('.modal-dialog').width(width);
	dialog.find('.bootbox-body').height(height < 100 ? 100 : height);
	dialog.find('.modal-content').css("margin-top", (height/$(window).height()*100+50)+"%");
	if(onlyView) dialog.find('.btn-primary').remove();
	dialog.find('.bootbox-close-button').click(function(e) {
        if(ufn != null && ufn != "undefined") return ufn();
    });
	if(init != null && init != "undefined"){
		dialog.init(init);
	}

	return dialog;
}

//弹出Bootstrap等待框
function showBootboxWait(title, content) {
	var dialog = bootbox.dialog({
		title: title,
		message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i>'+content+'</div>',
		closeButton: false
	});
	dialog.find('.modal-header').css("padding-top","5px");
	dialog.find('.modal-header').css("padding-bottom","5px");
	dialog.find('.modal-footer').css("padding-top","8px");
	dialog.find('.modal-footer').css("padding-bottom","8px");
	dialog.find('.modal-dialog').width(300);
	dialog.find('.bootbox-body').height(40);
	dialog.find('.modal-content').css("margin-top", (300/$(window).height()*100+50)+"%");

	return dialog;
}

//弹出Bootstrap提示框2
function showBootboxTip(text, time) {
	var width = text==null || text.length<20 ? 240 : text.length*12;
	var dialog = bootbox.dialog({
		title: '',
		message: text,
		closeButton: true,
		onEscape: true,
		backdrop: true
	});
	dialog.find('.modal-header').css("padding-top","5px");
	dialog.find('.modal-header').css("padding-bottom","5px");
	dialog.find('.modal-footer').css("padding-top","8px");
	dialog.find('.modal-footer').css("padding-bottom","8px");
	dialog.find('.modal-dialog').width(width);
	dialog.find('.bootbox-body').height(30);
	//dialog.find('.modal-content').css("margin-top", ($(window).height()/2 - 15)+"px");
	dialog.find('.modal-content').css("margin-top", (dialog.height()/2 - 15)+"px");
	$(".modal-backdrop.in").css("opacity","0");

	if(time >= 0){
		setTimeout(function(){
			dialog.modal('hide');
	    }, time);
	}
}
/**删除右边的空格*/
function rtrim(str){
	if(str == null || typeof(str)=='undefined' || typeof str != 'string'){
		return str;
	}
	try{
		return str.replace(/(\s*$)/g,"");
	}catch(e){
		return str;
	}
}

/**删除前后空格*/
function alltrim(str){
	if(isEmpty(str)){
		return str;
	}
	return str.toString().replace(/(^\s*)|(\s*$)/g, "");
}
/**多语言替换*/
function ShowHtmlByLangkey(locales){
	$('[data-langkey]').each(function(index, element) {
		var key = $(this).data('langkey');
		$(this).html(getHtmlByLangkey(locales,key,false));
		$(this).attr('title',$(this).text());
	});
	$('[data-placeholderlangkey]').each(function(index, element) {
		var key = $(this).data('placeholderlangkey');
		$(this).attr('placeholder',getHtmlByLangkey(locales,key,false));
	});



}
/**获取多语言文本*/
function getHtmlByLangkey(locales2,key,langjustify){
	if(isEmpty(key)){
		return '';
	}
	var html = '';
	return html;
}
/**判断两个数组是否有交集*/
function ArrayHasIntersection(arr1,arr2){
	for(var i in arr1){
		if(arr2.indexOf(arr1[i]) > -1){
			return true;
		}
	}
	return false;
}


/**数组合并并去重*/
function MergeArray(arr1,arr2){
    var _arr = new Array();
    for(var i=0;i<arr1.length;i++){
       _arr.push(arr1[i]);
    }
    for(var i=0;i<arr2.length;i++){
        var flag = true;
        for(var j=0;j<arr1.length;j++){
            if(arr2[i]==arr1[j]){
                flag=false;
                break;
            }
        }
        if(flag){
            _arr.push(arr2[i]);
        }
    }
    return _arr;
}

/**
 * 加法运算，避免数据相加小数点后产生多位数和计算精度损失。
 *
 * @param num1加数1 | num2加数2
 */
function numAdd(num1, num2) {
	var baseNum, baseNum1, baseNum2;
	try {
		baseNum1 = num1.toString().split(".")[1].length;
	} catch (e) {
		baseNum1 = 0;
	}
	try {
		baseNum2 = num2.toString().split(".")[1].length;
	} catch (e) {
		baseNum2 = 0;
	}
	baseNum = Math.pow(10, Math.max(baseNum1, baseNum2));
	return (num1 * baseNum + num2 * baseNum) / baseNum;
};
/**
 *减法运算，避免数据相减小数点后产生多位数和计算精度损失。
 *
 * @param num1被减数  |  num2减数
 */
function numSub(num1, num2) {
	var baseNum, baseNum1, baseNum2;
	var precision;// 精度
	try {
		baseNum1 = num1.toString().split(".")[1].length;
	} catch (e) {
		baseNum1 = 0;
	}
	try {
		baseNum2 = num2.toString().split(".")[1].length;
	} catch (e) {
		baseNum2 = 0;
	}
	baseNum = Math.pow(10, Math.max(baseNum1, baseNum2));
	precision = (baseNum1 >= baseNum2) ? baseNum1 : baseNum2;
	return ((num1 * baseNum - num2 * baseNum) / baseNum).toFixed(precision);
};
/**
 * 乘法运算，避免数据相乘小数点后产生多位数和计算精度损失。
 *
 * @param num1被乘数 | num2乘数
 */
function numMulti(num1, num2) {
	var baseNum = 0;
	try {
		baseNum += num1.toString().split(".")[1].length;
	} catch (e) {
	}
	try {
		baseNum += num2.toString().split(".")[1].length;
	} catch (e) {
	}
	return Number(num1.toString().replace(".", "")) * Number(num2.toString().replace(".", "")) / Math.pow(10, baseNum);
};
/**
 * 除法运算，避免数据相除小数点后产生多位数和计算精度损失。
 *
 * @param num1被除数 | num2除数
 */
function numDiv(num1, num2) {
	var baseNum1 = 0, baseNum2 = 0;
	var baseNum3, baseNum4;
	try {
		baseNum1 = num1.toString().split(".")[1].length;
	} catch (e) {
		baseNum1 = 0;
	}
	try {
		baseNum2 = num2.toString().split(".")[1].length;
	} catch (e) {
		baseNum2 = 0;
	}
	with (Math) {
		baseNum3 = Number(num1.toString().replace(".", ""));
		baseNum4 = Number(num2.toString().replace(".", ""));
		return (baseNum3 / baseNum4) * pow(10, baseNum2 - baseNum1);
	}
};

/**lang语言转换成BootstrapTable的locale*/
function ConvertBootstrapTableLang(lang){
	var locale = 'en-US';
	lang = isNull(lang);
	lang = lang.toUpperCase();
	if(lang == 'ZH'){
		locale = 'zh-CN';
	}else if(lang == 'ES'){
		locale = 'es-ES';
	}else if(lang == 'IT'){
		locale = 'it-IT';
	}
	return locale;
}

/**判断并加载js文件*/
function JudgeAndLoadFiles(url){
	var load = true;
    var es = document.getElementsByTagName('script');
    for(var i=0;i<es.length;i++){
    	if(es[i]['src'].indexOf(url)!=-1){
    		load = false;
    		break;
    	}
    }
    if(load){
    	$('head').append('<script src="' + url + '"></script>');
    }
}


/**模拟表单提交同步方式下载文件*/
function downloadFileByFormWithBootstrap(url,id,title,data) {
	var getOptions = $('#' + id).bootstrapTable('getOptions');
	data = data || {};
	$('#' + id + ' thead .filter-control .form-control').each(function(index, element) {
		var val = $(this).val();
		if(val!=null&&val!=''){
			data[$(this).parent().parent().parent().attr('data-field')] = val;
		}

	});
	var i = 0;
	$.each(getOptions.columns[0],function(index,col){
		if(col.switchable && isNotEmpty(col.field)){
			data['ListMap[' + i + ']["key"]'] = col.field;
			data['ListMap[' + i + ']["value"]'] = col.title;
			i++;
		}
	});
	data['sortName'] = getOptions.sortName;
	data['sortOrder'] = getOptions.sortOrder;
	data['fileName'] = title;
	downloadFileByForm(url,data);
}

/**模拟表单提交同步方式下载文件*/
function downloadFileByForm(url,data) {
    var form = $("<form></form>").attr("action", url).attr("method", "post");
    $.each(data,function(key,val){
    	form.append($("<input></input>").attr("type", "hidden").attr("name", key).attr("value", val));
    });
    form.appendTo('body').submit().remove();
}

/**隐藏右键控件(ContextMenu) */
function hideJquerContextMenu(){
	try{
		$.each($.contextMenu.menus,function(index,menu){
			try{
				menu.$menu.trigger('contextmenu:hide');
			}catch(e){
			}
		});
	}catch(e){
	}
}

//引用js库：download.js
function downloadfile(url, file_name) {
	var xmlHttp = null;
	if (window.ActiveXObject) {
		// IE6, IE5 浏览器执行代码
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	} else if (window.XMLHttpRequest) {
		// IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
		xmlHttp = new XMLHttpRequest();
	}
	//2.如果实例化成功，就调用open（）方法：
	if (xmlHttp != null) {
		xmlHttp.open("get", url, true);
		xmlHttp.send();
		xmlHttp.onreadystatechange = doResult; //设置回调函数
	}
	function doResult() {
		if (xmlHttp.readyState == 4) { //4表示执行完成
			if (xmlHttp.status == 200) { //200表示执行成功
				//引用js库：download.js
				download(xmlHttp.responseText, file_name, "text/plain");
			}
		}
	}
}

/**
 * 获取值的数据类型
 * @param value
 * @returns {string}
 */
function getValueType(value){
  return Object.prototype.toString.call(value).slice(8, -1)
}

/**
 * 深度复制对象
 * @param obj1   目标
 * @param obj2   源对象
 * @returns {{}}
 */
function coverObject(obj1,obj2){
	obj1 = obj1 || {};
	obj2 = isObject(obj2) ? obj2 : {};
	$.each(obj1,function(key,value){
		if(key in obj2){
			var value2 = obj2[key];
			var type =  getValueType(value);
			var type2 =  getValueType(value2);
			if(isObject(value)){
				obj1[key] = coverObject(value,obj2[key]);
  			} else if (type === 'Array') { // 拷贝数组
				obj1[key] = type2 === 'Array' ? value2 : [];
  			} else {
				obj1[key] = obj2[key];
			}
		}
	});
	return obj1;
}

/**
 * 判断是否是对象
 * @param obj
 * @returns {boolean}
 */
function isObject(obj){
	return getValueType(obj) === 'Object';
}

/**
 * 获取页面语言
 * @param lang
 * @returns {string} 大写
 */
function getLang(lang){
	if(isEmpty(lang)){
		lang = $('html').attr('lang');
		if(isEmpty(lang)){
			lang = 'ZH';
		}
	}
	lang = lang == 'cn' ? 'ZH' : lang;
	return lang.toUpperCase();
}

/**
 * 获取元素与浏览器之间的距离
 * @param selector  选择器
 * @param type      类型：
 *                     1.元素顶部距离浏览器的顶部之间的距离
 *                     2.元素底部距离浏览器的底部之间的距离
 */
function getElementMargin(selector,type){
	//网页被卷起来的高度
	var wTop = toNumber($(window).scrollTop());
	// 网页工作区域的高度
	var wHeight = toNumber($(window).height());
	//元素距离文档顶端
	var eTop = toNumber($(selector).offset().top);
	//元素的高度
	var eHeight = toNumber($(selector).height());
	var result = 0;
	if(type == 1){
		return eTop - wTop;
	}else if(type == 2){
		return wTop + wHeight - eTop - eHeight;
	}
	return result;
}

/**
 * 将对象复制给子对象
 * @param that
 */
function assignSubObjectParent(that,ignorePrototype){
	if(!Array.isArray(ignorePrototype)){
		ignorePrototype = isNull(ignorePrototype,'init');
		ignorePrototype = ignorePrototype.split(',');
	}
	try{
		$.each(that.__proto__,function(key,value){
			if(!ignorePrototype.includes(key)){
				value.parent = that;
			}
		});
	}catch (e) {
	}
}
