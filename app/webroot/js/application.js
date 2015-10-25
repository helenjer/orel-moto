function resizeblock() {
   var htxt = $('.content-artical').height();	 
   var hban = $('.banners').height();
   if (htxt > hban+481)  {
	    $('.banners').height(htxt-546); 
	    $('.content-artical').height(htxt);
	 }
   else  {$('.content-artical').height(hban+481);}
    $('.content-strip').height($('.content-artical').height());
		$('.ca-text').height($('.content-artical').height()-146);
                
   if ($('.ca-text.index-page').length > 0) {
      $('.banners, .content-artical, .content-strip, .ca-text').css({'height':'+=275'});
   }
		
}

$(document).ready(function(){
  resizeblock();
	// меню
	$('.menu-item.tech, .menu-item.bicycles').mouseover(function(){
	  $(this).next('.submenu').fadeIn();
	})
	
	$('.submenu').mouseleave(function(){
	  $(this).fadeOut();
	});
	
	$('.submenu-item').mouseover(function(){
	  $('.submenu-pic').addClass($(this).attr('class')).removeClass('submenu-item');
	}).mouseleave(function(){
	  $('.submenu-pic').removeClass($(this).attr('class'));
	});
        
        //слайдер
				if ($('#slider').length) $('#slider').nivoSlider();
        
        //партнеры
        $('.cm-partner-item a.company').each(function(){
            $(this).click(function(){
             $('.popup-fade').show();
            $(this).siblings('.cmp-info').find('.video-show').html($(this).siblings('.cmp-info').find('.video-hide').html());
             $(this).siblings('.cmp-info').css('top', ($(window).height() - $(this).siblings('.cmp-info').outerHeight()) / 2 + $(window).scrollTop() - 50 + "px").show(400); 
            });
         });
        
         //видео
         $('.video-item img').each(function(){
            $(this).click(function(){
             $('.popup-fade').show();
             $(this).siblings('.video-item-info').find('.video-show').html($(this).closest('.video-item').find('.video-hide').html());
             $(this).siblings('.video-item-info').css('top', ($(window).height() - $(this).siblings('.video-item-info').outerHeight()) / 2 + $(window).scrollTop() - 50 + "px").show(400); 
            });
         });
        
         $('.popup-fade').click(function(event) {
            if ($(event.target).hasClass('.cmp-info') ||  $(event.target).closest('.cmp-info').length
                 || $(event.target).hasClass('.video-item-info') || $(event.target).closest('.video-item-info').length
                ) return;
            else {
               $('.popup-fade').fadeOut(200);
               $('.cmp-info').hide();
               
               $('.video-item-info, .photo-popup').hide();
               $('.video-show').html('');
               
            }
            event.stopPropagation();
          });
         
         // общая кнопка закрытия
         $('.close').click(function(event) {
            $('.popup-fade').fadeOut(200);
            $(this).closest('.closeable').hide();
            
            $('.video-show').html('');
             
         });
         
         /* Показ/скрытие новостей */
         var numPage = 1;
         var perRage = 5;
         $('.news-one:gt('+ (perRage - 1) +')').hide();
         if ($('.news-one').length > perRage) $('.btn-next-news').show();
         
         $('.btn-next-news').click(function(){
            $('.news-one:lt('+ (perRage * numPage) +')').hide(); 
            $('.news-one:lt('+ (perRage * (numPage+1)) +'):gt('+ (perRage * numPage -1) +')').show();
            numPage++;  
            if (numPage > 1) $('.btn-prev-news').show();
            if (numPage*perRage >= $('.news-one').length) $('.btn-next-news').hide();
            if (($('.btn-prev-news:visible').length > 0) && ($('.btn-next-news:visible').length > 0)) $('.news-nav-sep').show();
               else $('.news-nav-sep').hide();
         });
         
         $('.btn-prev-news').click(function(){
            numPage--;
            $('.news-one:gt('+ (perRage * numPage -1) +')').hide();
            if ((perRage * (numPage-1) -1) > 0)
               $('.news-one:lt('+ (perRage * numPage) +'):gt('+ (perRage * (numPage-1) -1) +')').show();
            else $('.news-one:lt('+ (perRage * numPage) +')').show();
            if (numPage <= 1) $('.btn-prev-news').hide();
            if (numPage*perRage < $('.news-one').length) $('.btn-next-news').show();
            if (($('.btn-prev-news:visible').length > 0) && ($('.btn-next-news:visible').length > 0)) $('.news-nav-sep').show();
               else $('.news-nav-sep').hide();
         });
         
         
         $('.news-title, .btn-news span').click(function(){
             $('.news-announce').toggle('slow');
             $('.news').slideToggle('slow', function(){
               
                /* ресайз :( */
               $('.banners, .content-artical, .content-strip, .ca-text').each(function(){
                  var newsH = $('.news').outerHeight(true);
                  if ($('.news:visible').length > 0) 
                     $(this).height($(this).height() + newsH ); 
                  else $(this).height($(this).height() - newsH );
               });
               });
              $('.btn-news').toggleClass('btn-news-hide');

         });
				 if ($(".gallery").length)	$(".gallery .group1").colorbox({rel:'group1'});
				 
				 // попап фото модели
				 $('.ca-text-left .catl-img').click(function(){
						$('.photo-popup').css({'top': $(document).scrollTop()+ 150})
						$('.popup-fade, .photo-popup').fadeIn(200);
					})
        
				
				/**** админ ****/     //TODO - отдельный файл
				$(".admin-link[data-role='add-video-link']").click(function(e){
					var templ = $(".add-video-block:last"),
							new_node = templ.clone(),
							new_id = parseInt(templ.data('id')) + 1;
					new_node.insertAfter(templ);
					new_node.data('id', new_id).attr('data-id', new_id);
					new_node.find('input').each(function(){
						$(this).attr('name', $(this).attr('name').replace(/[\d]+/,new_id));
						$(this).attr('id', $(this).attr('id').replace(/[\d]+/,new_id));
						$(this).val('');
					});
					new_node.show();
					
					/* ресайз :( */
					$(".content-strip, .content-artical, .ca-text, .banners").each(function(){
						$(this).height($(this).height() + new_node.outerHeight() + 15);
					})
					
					e.preventDefault();
				})
				
				
				$(".admin-link[data-role='del-video-link']").live('click', function(e){
					var add_block = $(this).closest('.add-video-block');
					var id_video =  add_block.find(':hidden').val();
					var bl_h = add_block.outerHeight(); 
					var fl_del = 0;
					if (id_video) {
						if (confirm('Вы уверены, что хотите удалить данное видео?')) {
								$.get(
									"/admin/videos/delete/" + id_video,
									function(data){
										add_block.remove();
										fl_del = 1;
									}
								);	
						}
					} else {
						add_block.remove();
						fl_del = 1;
					}
				
					/* ресайз :( */
					$(".content-strip, .content-artical, .ca-text, .banners").each(function(){
						$(this).height($(this).height() - bl_h - 15);
					})
					e.preventDefault();
				})
				
})

$(window).resize(function() {
 // resizeblock();
});
