<?php
namespace App;

/**
 * Site: https://free.currencyconverterapi.com/free-api-key
 *
 */
class CurrConv
{
	private $key;
	private $error = [];

	function __construct(){
		$this->key = API_KEY;

		if(empty($this->key))
			$this->error = "{key} nao foi informada!";
	}

	//Obter cotação
	function getCotacao($moeda)
	{
		if(empty($moeda))
			$this->error = "{moeda} nao foi informada!";

		$url = "https://free.currconv.com/api/v7/convert?q={$moeda}&compact=ultra&apiKey={$this->key}";

    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Origin: https://free.currencyconverterapi.com'));
    	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    	curl_setopt($ch, CURLOPT_REFERER, 'https://free.currencyconverterapi.com');
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($ch, CURLOPT_TIMEOUT, 5);

    	$output = curl_exec($ch);

		// handle error; error output
		if(curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {
			$this->error = json_decode($output);
		}

		curl_close($ch);

		// convert response
		$response = json_decode($output, true);

		//$this->log($output);

		return floatval($response["{$moeda}"]);
		//return 0.239854;
	}

	//Retorna os erros
	public function getError()
	{
		if(empty($this->error))
			return false;

		return $this->error;
	}

	public function log($data)
	{
		$date_log = date("Ymd");
		@file_put_contents(APP_PATH . "data/{$date_log}.log", $data . PHP_EOL, FILE_APPEND);
	}
}