<?php

namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Http\Request;
use App\Http\Requests\PessoaStoreRequest;

use Auth;
use Session;
use Redirect;
use View;
use DB;
use Input;

class PessoaController extends Controller
{
    
    /** Método construct para permitir acesso aos métodos deste Controller só ao usuário que estiver logado e autorizado. **/
     public function __construct()
     {
        $this->middleware(['auth']);
     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
	        	$search = '';

			$querystringArray = '';

			$searchNome = 	$request->get('searchNome');

			$searchEmail = 	$request->get('searchEmail');

			$querystringArray = ['search' => $search,'searchNome' => $searchNome,'searchEmail' => $searchEmail];

			if(Empty($searchNome) || Empty($searcEmail)) {

				$pessoas = Pessoa::orderBy('nome')->paginate(1);		
			}

			
		
			
			

			if($request->has('filtroEmail') ||  $request->has('filtroNome')) {
			
  			        $filtroEmail = $request->get('filtroEmail');
				
				$filtroNome = $request->get('filtroNome');
				
				$pessoas = Pessoa::where('email', '=',$request->get('searchEmail'))->orwhere('nome','LIKE','%'.$request->get('searchNome').'%')->paginate(1);
 
			        $querystringArray = ['searchNome' => $searchNome,'filtroEmail' => $filtroEmail,'filtroNome' => $filtroNome ,'searchEmail' => $searchEmail];
	          
			       return view('pessoas.index', compact('pessoas', 'querystringArray'));			
		       }
	 	      	 
			
	
			 return view('pessoas.index', compact('pessoas', 'querystringArray'));

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pessoas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(PessoaStoreRequest $request)
   
    {
        /** Validação **/
        
           $regras = $request->validated();
        
        if(!$regras) {

            Session::flash('error', $regras->messagensCadastro()->first());
            return redirect()->back()->withInput();
       
           
        }else{

            /** Cria o objeto pessoa, pega as informações vindas da tela de cadastro e salva **/

            $pessoa = new pessoa; 
            $pessoa->nome      = Input::get('nome');   
            $pessoa->email     = Input::get('email');
            $pessoa->ddd       = Input::get('ddd');
            $pessoa->telefone  = Input::get('telefone');
            
            $pessoa->save();

            /** Mostra mensagem de sucesso e redireciona para a index **/
            Session::flash('message', 'Registro efetuado.');
            return Redirect::to('pessoas');
            
       }


        
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /** Encontra a pessoa pelo id **/
        $pessoa = DB::select('SELECT * FROM pessoas WHERE id = :id', ['id' => $id]);

        /** Mostra o formulário de edição e passa o gênero que será editado **/
        return view('pessoas.edit', compact('pessoa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
     public function update(PessoaStoreRequest $request)
    {
        /** Validação **/
        
           $regras = $request->validated();

           $id = $request->id;

           $email = $request->email;
        
        if(!$regras) {

            Session::flash('error', $regras->mensagensUpdate()->first());
            return redirect()->back()->withInput();
       
           
        }else{


               
             $pessoa = DB::select('SELECT * FROM pessoas WHERE id = :id AND email != :email', ['id' => $id,'email' => $email]);
    
            if(!$pessoa){

                Session::flash('error', $regras->mensagensUpdate()->first());
                 return redirect()->back()->withInput();
             
            }else{


                $pessoa[0]->nome      = Input::get('nome');
                $pessoa[0]->email     = Input::get('email');
                $pessoa[0]->ddd       = Input::get('ddd');
                $pessoa[0]->telefone  = Input::get('telefone');
                
                $pessoaNome     = $pessoa[0]->nome;
                $pessoaEmail    = $pessoa[0]->email;
                $pessoaDDD      = $pessoa[0]->ddd;
                $pessoaTelefone = $pessoa[0]->telefone;         

                $idPessoa       = $pessoa[0]->id;       
            
                DB::update('UPDATE pessoas SET nome = ?, email = ?, ddd = ?, telefone = ? WHERE id = ?',[$pessoaNome,$pessoaEmail,$pessoaDDD,$pessoaTelefone,$idPessoa]);

                /**Redireciona para a lista de pessoas **/
                Session::flash('message', 'Registro atualizado.');
                return Redirect::to('pessoas');
            }
         
       }    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {

            $pessoa = DB::select('SELECT * FROM pessoas WHERE id = :id', ['id' => $id]);
            DB::delete('DELETE FROM pessoas WHERE id = :id', ['id' => $id]);
      
            Session::flash('message', 'Registro excluído.');
            return Redirect::to('pessoas');

    }
}
