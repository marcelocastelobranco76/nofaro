<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/***A variável fillable define quais os campos que podem ser inseridos pelo usuário do sistema no Banco, o campo guarded protege os campos de inserções. Ele impede que alguém insira dados em alguns campos da nossa tabela pessoas.***/

class Pessoa extends Model
{
    protected $fillable = ['nome','email','ddd','telefone'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'pessoas';
}
