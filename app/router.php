<?php
use System\Router;
use System\Page;
use System\Config;

//DEFINIR AS ROTAS
//O sistema trabalha exibindo sempre a index

//Config::setDefaultRouter('app');
//Adicionando o caminho ate a aplicao para
//nao interferir nas rotas - url[0]
//Router::setPrefix(['pasta_antes_do_sistemas']);

//GRUPO DE ROTAS DEFAULT (SITE)
//****************************************
//Requisições ao arquivos modulo-actions
Router::any('pages', function(){
	//Page::loads(Router::getURL(1), Config::getDefaultRouter());
	var_dump(Router::getURL(1));
	Page::loads(Router::getURL(1));
});

//requisicoes ajax
//Nome do arquivo vai definir a pasta:
//Ex: paginas-cad
//O arquivo: [paginas/paginas-cad.php]
Router::any('ajax', function(){
	//Page::loads(Router::getURL(1));
	Page::loads(Router::getURL(1));
	exit();
});
