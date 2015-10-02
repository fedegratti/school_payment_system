$(document).ready (function()
{
	var tipo = $('#tipo');

	tipo.change (function ()
	{
		if (tipo.val() == 'matricula')
		{
			mostrarOcultar ('none');
		}
		else
		{
			mostrarOcultar ('block');
		}
	});
});

function mostrarOcultar(value) { 

	$('#numeroCuota').css('display',value);

} 
