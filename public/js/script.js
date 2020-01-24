jQuery(document).ready(function($) {
	//Mascara de moeda
	$('.moeda').mask('000.000.000.000.000,00', {
		reverse: true
	});
});

$(document).on('submit', '#form-valor', function(event) {
	event.preventDefault();

	//Pegar o valor informado convertido de string para float
	let valorBRL = strToFloat($('.moeda').val());

	//Se não for digitado nada retorno false e limpa os valores
	if(valorBRL == '' || valorBRL == 'NaN' || valorBRL == null){
		clear();
		return false;
	}

	//Pegas todos os elementos que aguardam valores
	//Recurso usado para ter o array onde demos informar o valor da conversão
	let moedas = $('.vlrmoeda');

	//Repetição pula a moeda do BRL [i=1]
	for (let i=1; i < moedas.length; i++) {

		let moeda = $(moedas[i]).data('id');

		//Url para objer a cotação da moeda
		let url = `/ajax/cotacoes/?q=${moeda}`;

		//Usando Axio para fazer a requisição com os valores
		axios.get(url)
			.then((response) => {
				let cotacao = response.data['cotacao'];
				let total = (parseFloat(valorBRL) * cotacao).toFixed(2);

				if (total != 'NaN'){
					//Aplica o valor da conversão a moeda
					$(`#${moeda}`).html(total);
				}
			});
	} //for

});


$(document).on('keyup', '#moeda', function(event) {
	event.preventDefault();
	let val = $(this).val();
	if (val === '') val = 0;
	$('#BRL_BRL').html(val);
	$('.btn-converter').submit();
});

//Volta o valor de todas as moedas para zero
function clear() {
	let moedas = $('.vlrmoeda');
	for (let i = 1; i < moedas.length; i++) {
		let moeda = $(moedas[i]).data('id');
		$(`#${moeda}`).html(0);
	}
}

//Converte de esting para float
function strToFloat(value) {
	return parseFloat( value.replace(/\./g, '').replace(',', '.') );
}