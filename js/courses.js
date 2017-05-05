//this is for the pop-up
$(function(){
	$('.search').on('click', function(){
		$('.courses').addClass('animated bounceInDown').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
			function(){
				$(this).removeClass('animated bounceInDown');
		});
		document.getElementById('courses').style.visibility='visible';
	});
});

$(function(){
	$('.close').on('click', function(){
		$('.courses').addClass('animated fadeOutUp').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',
			function(){
				$(this).removeClass('animated fadeOutUp');
				document.getElementById('courses').style.visibility='hidden';
		});
	});
});