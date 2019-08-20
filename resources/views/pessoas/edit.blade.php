{{-- \resources\views\pessoas\edit.blade.php --}}

@extends('layouts.app')

@section('content')

            <div class="container">

                <h1>Editar pessoas</h1>

                    <!-- Se existir algum erro de ediçao vai aparecer aqui -->                    
                    {{ HTML::ul($errors->all()) }}

                    {{ Form::model($pessoa, array('url' => array('/pessoas', $pessoa[0]->id , $pessoa[0]->email), 'method' => 'PATCH')) }}

                        <div class="form-group">

                    
                    	   {{ Form::label('nome', 'Nome') }}
                           {{ Form::text('nome', $pessoa[0]->nome, array('class' => 'form-control')) }}
                    	
                    	   {{ Form::label('email', 'Email') }}
                           {{ Form::text('email', $pessoa[0]->email, array('class' => 'form-control')) }}

                    	   {{ Form::label('ddd', 'DDD') }}
                           {{ Form::text('ddd', $pessoa[0]->ddd, array('class' => 'form-control')) }}

                           {{ Form::label('telefone', 'Telefone') }}
                           {{ Form::text('telefone', $pessoa[0]->telefone, array('class' => 'form-control')) }}

                    
                        </div>

                    {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}

                </div>

@endsection
