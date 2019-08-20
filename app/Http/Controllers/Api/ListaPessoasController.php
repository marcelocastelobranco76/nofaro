<?php
namespace App\Http\Controllers\Api;

use App\Pessoa;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Resources\ListaPessoasResource;

class ListaPessoasController extends Controller
{
    /**
     * Return uma lista de pessoas.
     *
     * @return ListaPessoasResource
     */
    public function index()
    {
        $pessoas = Pessoa::latest()->paginate(2);
        
        return ListaPessoasResource::collection($pessoas);
    }
   
}
