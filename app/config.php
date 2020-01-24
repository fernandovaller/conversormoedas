<?php
//CONFIGURAÇÕES GERAIS DO SISTEMA
//Essas configurações se aplicam a todos os sistemas dentro da pasta APP
define('SITE_TITLE', 'SicPages - Simples framework em php');
define('SITE_NAME', 'SICPAGES');
define('SITE_FOOTER', 'Copyright &copy;');

//CONFIG DB
define('DB_HOST', getenv('DB_HOST'));
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PWD',  getenv('DB_PWD'));

//PATH DO SISTEMA
define('URL', getenv('URL'));
define('URL_ADMIN', getenv('URL_ADMIN'));
define('PATH_UPLOADS', 'uploads');


//API https://free.currencyconverterapi.com/free-api-key
define('API_KEY', '');

//pasta padrao do sistema dentro de APP
$CONFIG['default_router'] = '';