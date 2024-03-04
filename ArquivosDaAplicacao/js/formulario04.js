$(document).ready(function () {
	$('#numero').mask('0#');
});


$("#formulario").validate(
	{
		rules: {
			numero: {
				required: true
			}
		},
		messages: {
			numero: {
				required: "Campo obrigatório"
			}
		}
	}
);

