<?php
namespace App;

/**
 *
 */
class Cotacao extends \System\Model
{
	protected $table = 'cotacoes';
	protected $id = 'id';


	public function insert($dados)
	{
		//verificar se ja existe
		//sim, atualiza
		//nao, inserir

		$moeda = $dados['moeda'];
		$data  = $dados['data'];
		$hora  = $dados['hora'];

		$resp = $this->findWhere("moeda = '{$moeda}' AND data = '{$data}'");

		if($resp){
			$this->update($dados, $resp[0]['id']);
			return true;
		} else {
			parent::insert($dados);
			return true;
		}
	}

	//Verificar cotaçao moeda dentro da hora
	public function existeCotacaoHora($moeda)
	{
		if(empty($moeda))
			return false;

		$data  = date("Y-m-d");
		$hora  = date("G");

		//Verificar se existe cotacao da moeda na mesmo hora atual
		//Para conseguir pegar uma cotação por hora
		$resp = $this->findWhere("moeda = '{$moeda}' AND data = '{$data}' AND hora = '{$hora}'");

		if($resp)
			return true;

		return false;
	}

	//Retorna a data da ultima cotação
	public static function dataUltimaCotacao()
	{
		$obj = new self;
		$resp = $obj->findWhere('', 'id DESC', 'LIMIT 1');
		if($resp){
			$data = data_hora($resp[0]['update_at']);
			return "Última cotação {$data}";
		}
	}

}