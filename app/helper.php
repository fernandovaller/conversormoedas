<?php
//FUNÇÕES ESPECIFICAS DO APP

//Retorna a data e hora padroniza forma de obter data e hora do sistema
function data_hora($formato = 'us') {
  switch (strtolower($formato)) {
    case 'BR': $data = date("d/m/Y G:i:s"); break;
    case 'US': $data = date("Y-m-d G:i:s"); break;
  }
  return $data;
}