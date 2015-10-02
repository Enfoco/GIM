$(function(){
	var pull		= $('#mmovil');
		menu		= $('nav ul');
		menuHeight	= menu.height();
	$(pull).on('click',function(e){
		e.preventDefault();
		menu.slideToggle();			
	});
	$(window).resize(function(){
		var w = $(window).width();
		if(w>320 && menu.is(':hidden')){
			menu.removeAttr('style');	
		}
	});
});

jQuery(function() {
	jQuery('#allinone_bannerRotator_classic').allinone_bannerRotator({
		skin: 'classic',
		width: 2000,
		height: 760,
		width100Proc:true,
		responsive:true,
		showPreviewThumbs:false,
		defaultEffect: 'fade'
	});		
});
