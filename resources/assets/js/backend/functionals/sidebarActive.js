$(document).ready(function () {
	$('#sidebarCollapse').on('click', function () {
		$('#sidebar').toggleClass('active');
	}); 
	// get the current page
	let path = window.location.href;

	// if path is empty
	if (path == '') {
		path = 'http://mnemonic.dev/admin';
	}
	
	// sidebar is targeted
	let target = $('#sidebar li a[href="'+ path + '"]').parents('li');

	target.addClass('active');

	$('[data-toggle="tooltip"]').tooltip();   
});