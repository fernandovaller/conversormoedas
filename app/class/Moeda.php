<?php
namespace App;

class Moeda
{
	private $moedas = [
		'BRL' => ['codigo'=> 'BRL', 'pais'=> 'Brasil', 'simbol' =>'R$', 'moeda' => 'Real'],
		'USD' => ['codigo'=> 'USD', 'pais'=> 'Estados Unidos', 'simbol' =>'$', 'moeda' => 'Dólar'],
		'EUR' => ['codigo'=> 'EUR', 'pais'=> 'União Europeia', 'simbol' =>'€', 'moeda' => 'Euro'],
		'CNY' => ['codigo'=> 'CNY', 'pais'=> 'China', 'simbol' =>'¥', 'moeda' => 'Iuane chinês'],
		'ARS' => ['codigo'=> 'ARS', 'pais'=> 'Argentina', 'simbol' =>'$', 'moeda' => 'Peso argentino'],
		'MXN' => ['codigo'=> 'MXN', 'pais'=> 'México', 'simbol' =>'$', 'moeda' => 'Peso mexicano'],
		'VEF' => ['codigo'=> 'VEF', 'pais'=> 'Venezuela', 'simbol' =>'Bs S', 'moeda' => 'Bolívar'],
		'UYU' => ['codigo'=> 'UYU', 'pais'=> 'Uruguai', 'simbol' =>'$', 'moeda' => 'Peso uruguaio'],
		'CLP' => ['codigo'=> 'CLP', 'pais'=> 'Chile', 'simbol' =>'$', 'moeda' => 'Peso chileno']
	];

	public function getAll()
	{
		return $this->moedas;
	}

	public function get($id)
	{
		return $this->moedas[$id];
	}

	//Padroniza o nome da moeda para consulta
	public static function standardName($codigo)
	{
		return "BRL_{$codigo}";
	}

}