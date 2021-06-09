$(function() {

	// ajax 윈도우
	$('.wz-ajax-win').magnificPopup({
		type: 'ajax', // inline
		overflowY: 'scroll',
	}); 
	// iframe 윈도우
	$('.wz-iframe-win').magnificPopup({
		type: 'iframe',
		overflowY: 'scroll',
	});
	// modal 윈도우
	$('.wz-modal-win').magnificPopup({
		type: 'ajax', // inline
		preloader: false,
		overflowY: 'scroll',
		modal: true
	});

});