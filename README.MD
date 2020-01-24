# Conversor de Moedas

O projeto Conversor de Moedas foi desenvolvido para permitir a comparação de valores entre a moeda brasileira (Real) em relação as principais moedas do mundo e da América Latina. Nesse projeto foi usado framework Bootstrap 4, jQuery, PHP  e MySQL.

Conheça o projeto: [https://conversormoedas.fvaller.com/](https://conversormoedas.fvaller.com/)

## Installation

Na pasta do projeto tem o arquivo com o banco de dados, você deve configurar um novo banco de dados e importar as tabelas.

Configure o arquivo `.env` com as credencias do banco.

No terminal dentro da pasta do projeto rode o comando:

```bash
composer install
```

## Cotações das moedas

Para obter as cotações consiga uma chave para acesso a API no site https://free.currencyconverterapi.com

Informe ela no arquivo `config.php` dentro da pasta `app/` em `API_KEY`

Para obter as cotações você deve programar uma chamada para o caminho /ajax/cotacoes-obter/?key=UMA-CHAVE-QUALQUER essa chave você deve criar e informa no `config.php` em `API_KEY_LOCAL`


## License
[MIT](https://choosealicense.com/licenses/mit/)