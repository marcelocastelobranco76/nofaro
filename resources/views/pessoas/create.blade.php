{{-- \resources\views\pessoas\create.blade.php --}}

@extends('layouts.app')

@section('content')

        <div class="container">


            <h1>Cadastrar pessoa</h1>

                <!-- Se existir algum erro de cadastro vai aparecer aqui -->
                {{ HTML::ul($errors->all()) }}

                {{ Form::open(array('url' => 'pessoas' , 'method' => 'POST')) }}

                <div class="form-group">

            	
            	    {{ Form::label('nome', 'Nome') }}
                    {{ Form::text('nome', Input::old('nome'),array('getElementById' => 'nome', 'class' => 'form-control', 'placeholder' => 'Informe o nome') ) }}
                  

            	    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', Input::old('email'), array('getElementById' => 'email', 'class' => 'form-control', 'placeholder' => 'Informe o email')) }}
            	
            	    {{ Form::label('ddd', 'DDD') }}
                    {{ Form::text('ddd', Input::old('ddd'), array('class' => 'form-control', 'placeholder' => 'Informe o DDD')) }}

            	    {{ Form::label('telefone', 'Telefone') }}
                    {{ Form::text('telefone', Input::old('telefone'), array('class' => 'form-control', 'placeholder' => 'Informe o telefone')) }}
                

                </div>

                {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}

        </div>

@endsection
