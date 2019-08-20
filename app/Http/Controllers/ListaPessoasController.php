<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pessoa;

class ListaPessoasController extends Controller
{
    /*
     
     @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('listapessoas.index');
    }
}