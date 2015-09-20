$(document).ready(function() {
	$('#welcome-message').fadeIn(1000);

	$('#tab-add-patient').click(function() {
		$('#tab-add-patient').toggleClass('active');
		$('#tab-patients').toggleClass('active');
		$('#input-div').toggleClass('hidden');
		$('#patients-div').toggleClass('hidden');
	});

	$('#tab-patients').click(function() {
		$('#tab-add-patient').toggleClass('active');
		$('#tab-patients').toggleClass('active');
		$('#input-div').toggleClass('hidden');
		$('#patients-div').toggleClass('hidden');
	});

	$('#goto-resident').click(function(){
	    window.location.href = 'resident.php';
	});
});