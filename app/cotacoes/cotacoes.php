<?php
$moeda = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
$date = filter_input(INPUT_GET, 'date', FILTER_SANITIZE_STRING);
$date = empty($date) ? date("Y-m-d") : $date;

$res = [];

if(empty($moeda)){
	$res = ['error' => 'not query'];
	send($res);
}

$mod = new App\Cotacao();

$dados = $mod->findWhere("moeda = '{$moeda}' AND data = '{$date}'", 'data DESC');

if(empty($dados)){
	$res = ['error' => 'not data'];
	send($res);
}

//Enviar os dados
send($dados[0]);

function send($dados)
{
	echo json_encode($dados);
	exit();
}