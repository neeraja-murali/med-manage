$(document).ready(function() {
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
});