var timerx;

$(document).ready(function() {
kosongkan();
	$().ajaxStart(function() {
		//$('#loading').show();
		//$('#result').hide();
		$('#pesan').html('loading... Wait...');
	}).ajaxStop(function() {
		//$('#loading').hide();
		//$('#pesan').fadeIn('slow');
		//$('#pesan').fadeIn(100);
	});

	$('#login_form').submit(function() {
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
			console.log(data);
			arr = JSON.parse(data);
			$('#pesan').html(arr.pesan);
				if (arr.status == '1')
					{ 
						timerx=setInterval(function(){alihkan(arr.alih)},2000); 
					}
				else
					{
						kosongkan();
					}
			}
		})
		return false;
	});
})

function alihkan(url)
{
clearInterval(timerx); // Stop Timer
document.location.href=url; // Alihkan ke URL dalam 3 detik
}

function kosongkan()
{
	$('#nama').val('');
	$('#sandi').val('');
	$('#nama').focus();
}