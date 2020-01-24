<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

$cot = new App\Cotacao();
$api = new App\CurrConv();

$moeda = new App\Moeda();
$dados = $moeda->getAll();

//Remove o 1º [BLR]
array_shift($dados);

if($dados)
foreach ($dados as $key => $row) {

	//Padrao de moeda [BRL_codigo]
	$moeda = App\Moeda::standardName($row['codigo']);

	//Verificar se existe cotacao para moeda dentro dessa hora
	if( !$cot->existeCotacaoHora($moeda) ){

		//Chama a api para obter a cotação da moeda
		$cotacao = $api->getCotacao($moeda);

		//Se ouver erros para o loop
		if($api->getError()){
			var_dump($api->getError());
			break;
		}

		if($cotacao){

			//Preparar dados para inserção
			$data['moeda']     = "BRL_{$row['codigo']}";
			$data['cotacao']   = $cotacao;
			$data['data']      = date("Y-m-d");
			$data['hora']      = date("G");
			$data['update_at'] = date("Y-m-d G:i:s");

			//Inserir dados ou Atualizar
			$res = $cot->insert($data);
		}

		//Aguarde ...
		sleep( rand(1,6) );

	} //existeCotacaoHora

}