{{-- \resources\views\pessoas\index.blade.php --}}

@extends('layouts.app')

@section('content')
       <div class="container">
    			
    		     
    			    <div class="form-group">
    				       <form id="form-id" class="navbar-form navbar-left" role="search" action="{!! url('/pessoas') !!}" method="GET" style="margin-left: 25%;margin-bottom: 3%;">

                                <div class="form-group">
                                  {!! csrf_field() !!}
                                

                                   <input type="text" name="searchNome" class="form-control" placeholder="Pesquisar por nome" style="width: 600px;">
				  <input type="checkbox" name="filtroNome" value="1"><span>Filtrar por nome</span>
				
				<input type="text" name="searchEmail" class="form-control" placeholder="Pesquisar por e-mail" style="width: 600px;">
				  <input type="checkbox" name="filtroEmail" value="1"><span>Filtrar por e-mail</span>


                                </div>
                                 <button type="submit" class="btn btn-primary btn-sm" title="Pesquisar">
                                    <span class="btn btn-info pull-left" aria-hidden="true">Pesquisar</span>
                                </button>
                            </form>    
    			</div>
    	</div>

        <div class="container">

            <h1>Lista de pessoas</h1>

            <!--Div com mensagens do sistema -->
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                         <td>ID</td>
            	         <td>NOME</td>
                         <td width="1%">EMAIL</td>
            	         <td width="1%">DDD</td>
                         <td width="1%">TELEFONE</td>	
               	         <td >AÇÕES</td>
                    </tr>
                </thead>
                <tbody>
                  @foreach($pessoas as $key => $value)
                    <tr>
                        <td width="2%">{{ $value->id}}</td>
                        <td width="20%">{{ $value->nome}}</td>
            	          <td>{{ $value->email}}</td>
                        <td>{{ $value->ddd}}</td>
                        <td>{{ $value->telefone}}</td>
                        
                        <!-- Ações : Editar e excluir pessoas -->
                        <td width="10%">
                             <a class="btn btn-info pull-left" style="margin-right: 13px;" href="{{ URL::to('/pessoas/' . $value->id . '/editar') }}">Editar</a>
                
                            <!-- Edita a pessoa (utiliza o método encontrado em GET /pessoas/{id}/editar --> 
                                {{ Form::open(array('style' =>'margin-left: 45%;margin-top: -21%', 'url' => '/pessoas/' . $value->id, 'onsubmit' => 'return ConfirmaDelete()')) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                   {!! Form::submit('Apagar', ['class' => 'btn btn-danger']) !!}
                                {{ Form::close() }}

               
                
               
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                    
                        {{ $pessoas->appends($querystringArray)->links() }}
			
                  
                   </div>
@endsection

