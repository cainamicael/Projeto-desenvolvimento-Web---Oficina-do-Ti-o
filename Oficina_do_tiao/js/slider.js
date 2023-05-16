$(function(){

	var curSlide = 0;
	var maxSlide = $('.banner-single').length - 1;
	var delay = 3;
	var sliderInterval;

	initSlider();
	startSlider();


	function initSlider(){
		$('.banner-single').css('opacity','0');
		$('.banner-single').eq(0).css('opacity','1');
		for(var i = 0; i < maxSlide+1; i++){
			var content = $('.bullets').html();
			if(i == 0)
				content+='<span class="active-slider"></span>';
			else
				content+='<span></span>';
			$('.bullets').html(content);
		}
	}

	function startSlider(){
		sliderInterval = setInterval(changeSlide, delay * 1000);
	}

	function changeSlide(){
		var nextSlide = curSlide + 1;
		if(nextSlide > maxSlide){
			nextSlide = 0;
		}
		$('.banner-single').eq(curSlide).animate({'opacity':'0'},500);
		$('.banner-single').eq(nextSlide).animate({'opacity':'1'},500);
		$('.bullets span').removeClass('active-slider');
		$('.bullets span').eq(nextSlide).addClass('active-slider');
		curSlide = nextSlide;
	}

	$('body').on('click','.bullets span',function(){
		var currentBullet = $(this);
		if(currentBullet.index() !== curSlide){
			clearInterval(sliderInterval);
			$('.banner-single').eq(curSlide).animate({'opacity':'0'},500);
			$('.banner-single').eq(currentBullet.index()).animate({'opacity':'1'},500);
			$('.bullets span').removeClass('active-slider');
			currentBullet.addClass('active-slider');
			curSlide = currentBullet.index();
			startSlider();
		}
	});

});
