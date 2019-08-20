ENTREGA DO TESTE BACKEND NO FARO

<p>Lista de pessoas</p>
Inclusão de uma pessoa
Remoção de uma pessoa
Filtro por nome e por e-mail
Descrição
Uma pessoa terá as seguintes informações cadastradas:

Nome
E-mail
DDD
Telefone
A lista de pessoas deve mostrar todas as informações cadastradas e ser ordenada por nome.

Ao incluir uma pessoa as seguintes validações devem ser feitas no backend:

<p>Nome: obrigatório e com no mínimo 2 caracteres
<p>E-mail: obrigatório, ser um e-mail válido e único na base de dados
<p>DDD: opcional, numérico com no máximo 2 dígitos
<p>Telefone: opcional, numérico com 9 dígitos
<p>Antes de remover uma pessoa é preciso mostrar uma confirmação da ação.

<p>O filtro por nome ou e-mail deve ser feito no backend. O nome poderá ser buscado por strings parciais, já o e-mail deve ser por busca exata. Caso a busca seja feita por nome e por e-mail deve ser retornada a lista de pessoas que passem em uma ou (não exclusivo) em outra condição.

<p>A aplicaçao foi desenvolvida utilizando-se a seguinte virtual box :
https://github.com/laravel/homestead

<p>Para instalar a apliçação :
.composer create-project laravel/laravel=5.8.* nofaro --prefer-dist (Instala atraves do Composer a versão 5.8.* do Laravel)
.acessar o MySQL:
mysql -u root -p
.cria o banco de dados:
create database db_nofaro

.clonar a aplicação :
https://github.com/marcelocastelobranco76/nofaro.git

.rodar o comando php artisan migrate para instalar as tabelas e a migrations na base de dados db_nofaro

Para acessar a aplicação:
php artisan serve (roda a aplicação na porta 8000 - http://127.0.0.1:8000)

