(function( $ ) {
	'use strict';
	$(document).ready(function($){
	/* Rating */
	  $('.comment-form-rating .fa').on('click', function(){
		var onStar = parseInt($(this).data('value'), 10); // The star currently selected
		$('.comment-form-rating').attr('data-rating',onStar);
		$('#comment_rating').val(onStar);
		
	  });
	  /* Rating Clear*/
	  $('#rating_zero').on('click', function(){
		$('.comment-form-rating').attr('data-rating',0);
		$('#comment_rating').val(0);
		
	  });
	  
  });
  
})( jQuery );