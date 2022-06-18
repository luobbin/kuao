// var FLUA = window.FLUA || {};
// FLUA.locales = FLUA.locales || {};
// //console.log(FLUA);
// var lang = 'ZH';
// var reg = new RegExp("(^|&)sl=([^&]*)(&|$)");
// var r = window.location.search.substr(1).match(reg);
// if (r != null){
// 	lang = unescape(r[2]);
// }
// if(lang == null || lang == ''){
// 	var reg = new RegExp("(^| )sellLanguage=([^;]*)(;|$)");
// 	if (arr = document.cookie.match(reg)) {
// 		lang = unescape(arr[2]);
// 	}
// }
// var dynamic = true;
// if(lang != null && lang != ''){
// 	var lang2 = lang.toLowerCase();
// 	var url = './FLUA_files/' + lang2 + '.js'
// 	if(MutiLangFileExists(url)){
// 		//console.log('使用静态缓存文件');
// 		url += '?v=' + (FLUA.langVersion || '');
// 		$.ajax({async: false,url: url,dataType: "script"});
// 		dynamic = false;
// 	}
// }
//
// if(dynamic){
// 	CheckAndGetLocales(lang);
// }
//
// /**
//  * 判断语言包的静态缓存文件是否存在
//  */
// function MutiLangFileExists(url){
// 	var exists = false;
// 	var xmlhttp;
// 	if(window.XMLHttpRequest){
// 	    xmlhttp = new XMLHttpRequest();//其他浏览器
// 	} else if (window.ActiveXObject){
// 	    try {
// 	        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");//旧版IE
// 	    }catch (e) { }
// 	    try {
// 	        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");//新版IE
// 	    }catch (e) { }
// 	    if (!xmlhttp) {
// 	        return false;
// 	    }
// 	}
// 	xmlhttp.open("GET",url,false);
// 	xmlhttp.send();
// 	if(xmlhttp.readyState==4){
// 	    if(xmlhttp.status==200) {
// 	    	exists = true;
// 	    }
// 	}
// 	return exists;
// }
//
// /**
//  * 检查并获取语言包
//  * @param lang2 语言
//  */
// function CheckAndGetLocales(lang2){
// 	if(!(lang2 in FLUA.locales) || !(FLUA.locales[lang2] instanceof Object) || FLUA.locales[lang2].length == 0){
// 		//console.log('动态请求语言包');
// 		var result = $.ajax({url:"https://www.flua.com/MutiLangController.do?getLangs&lang=" + lang2,dataType:"json",async:false,cache:false,type:"post"}).responseText;
// 		result = $.parseJSON(result);
// 		$.each(result,function(langKey,val){
// 			$.each(val,function(key,value){
// 				if(key.includes('.')){
// 					var key1 = key.substring(0,key.indexOf('.'));
// 					var key2 = key.substring(key.indexOf('.')+1);
// 					val[key1] = val[key1] || {};
// 					val[key1][key2] = value;
// 				}
// 			});
// 			FLUA.locales[langKey] = val;
// 		});
// 	}
// }
