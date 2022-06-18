function vs(){
	 var fotmail = $.trim($('.tian').val());
		if(fotmail == ''){
			alert('Filling in your Email plesae!');
			$('.tian').focus();
			return false;
		}else{
			if(!ismail(fotmail)){
				alert('Filling in the correct mailbox format please!');
				$('.tian').focus();
				return false;
			}
		}
		var datstr ='fotmail='+(fotmail);
		setTimeout(function(){
			location.reload();
		}, 1000);
		$.post('web_file/send/footer.php', datstr, function(e){
			alert('Thanks for your message!!!');
			$('.tian').val('');
			
		});
}

function ismail(a){
	return /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(a) ? !0 : !1;
}

//
//
// if(!document.getElementById('down_doc'))
// {
//     jQuery(function ($) {
//         $.scrollUp({
// 			zIndex:999998,
//             scrollName: 'returnTop', // Element ID
//             topDistance: '800', // Distance from top before showing element (px)
//             topSpeed: 500, // Speed back to top (ms)
//             animation: 'fade', // Fade, slide, none
//             animationInSpeed: 300, // Animation in speed (ms)
//             animationOutSpeed: 300, // Animation out speed (ms)
//             scrollText: ' ', // Text for element
//             activeOverlay: false // Set CSS color to display scrollUp active point, e.g '#00FFFF'
//         });
//
// 		$('.checkbox_mystyle').click(function(){
// 			$(this).toggleClass('selected');
// 		});
//
//     });
// }
