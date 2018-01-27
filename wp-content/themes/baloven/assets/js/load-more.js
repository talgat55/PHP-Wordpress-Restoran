	jQuery(function($){

	//$('.list-load-more').append( '<a href="#" class="btn btn-link-insta load-more"><img src="<?php  echo get_theme_file_uri( '/assets/images/left-arrow.png' ) ?>"> Подписаться</a>' );
	var button = $('.list-load-more .load-more');
	var page = 2;
	var loading = false;
	var type_post = $('.list-load-more').data("type");
	$('body').on('click', '.load-more', function(){
		if( ! loading ) {
			loading = true;
			var data = {
				action: 'be_ajax_load_more',
				page: page,
				query: type_post
			}; 

				console.log(type_post);
			$('.loadmore-loader').addClass(' show-no-posts-load ');

			$.post(beloadmore.url, data, function(res) {
				 
				if( res.success) {
					if(res.data == ''){
						$('.load-more').hide();
						$('.list-load-more').append( '<p class="no-more-load-posts opacity-zero">Нет больше записей</p>' );
						$('.no-more-load-posts').addClass(' show-no-posts-load ');
						$('.no-more-load-posts').delay(2000).fadeOut();
					}
					$('.list-load-more').append( res.data );
					$('.list-load-more').append( button );
					page = page + 1;
					loading = false;
					$('.loadmore-loader').removeClass('show-no-posts-load');
				} else {
					 console.log(res);
				}
			}).fail(function(xhr, textStatus, e) {
				// console.log(xhr.responseText);
			});
		}

		return false;
	});
		
});