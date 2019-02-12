$(document).ready(function(){
	$(window).on('resize', function(){
		var win = $(this);

		if(win.width() >= 768){
			$("#side-menu").removeClass('show');
			$("#side-menu").removeClass('hidden');

			$(".content-backdrop").addClass('d-none');
			$(".dashboard-content").removeClass('disable-overflow');
		}
	});

	$("#mobile-side-menu-btn-opener").on('click', function(event){
		$("#side-menu").addClass('show');
		$("#side-menu").removeClass('hidden');
		
		$(".content-backdrop").toggleClass('d-none');
		$(".dashboard-content").addClass('disable-overflow');
	});

	$(".content-backdrop").on('click', function(event){
		$("#side-menu").removeClass('show');
		$("#side-menu").addClass('hidden');
		
		$(".content-backdrop").toggleClass('d-none');
		$(".dashboard-content").removeClass('disable-overflow');
	});
});