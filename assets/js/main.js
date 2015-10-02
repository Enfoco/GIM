$(document).ready(function (){
    //fill data
    var btnedit='';
    var btndelete = '';
        fillgrid();
        // add data
        $("#frmadd").submit(function (e){
            e.preventDefault();
            $("#loader").show();
            var url = $(this).attr('action');
            var data = $(this).serialize();
            $.ajax({
                url:url,
                type:'POST',
                data:data
            }).done(function (data){
                $("#response").html(data);
                $("#loader").hide();
                fillgrid();
            });
        });
      };

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
