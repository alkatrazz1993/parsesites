$(function(){
		var i;
		var x = 0;
		var b = $('.title').length * 2;
		$('.panel > .title').next('.inner').stop().slideToggle();
		$.each($('.panel > .title').next('.inner').find('div'), function( index, element) {
				x = index;
		});
		if(x == 0)
		{
			$.each($('.panel > .title').find('i').css('color', 'grey'));
		}
		$('.panel > .title').click(function(){
		if(x == 0){
			
		}
		else
		{                                   
			$(this).next('.inner').stop().slideToggle();
			for(i=0;i<=b;i++){
				if ($(this).find('i').attr('class') === 'fas fa-plus'){
					
					if ($(this).attr('id') == i){           
							$.each($(this).next('.inner').find('div'), function( index, element) {
								$(element).css("display","none").fadeIn(1000);                       
							});
							$(this).find('i').removeClass("fas fa-plus");
							$(this).find('i').addClass("fas fa-minus");
							break;
						}
				}else{
					if ($(this).attr('id') == i){
						$(this).find('i').removeClass("fas fa-minus");
						$(this).find('i').addClass("fas fa-plus");
						break;
					}
				}
			}
		}//else
    });
});