@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading painel_cab">
                    Informe abaixo as informações do paciente
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel-body">
                    @if($method == 'put')
                    <form action="{{ route('pacientes.update', $paciente->id) }}" method="post">
                        {{ csrf_field() }}
                        
                            {{ method_field('PUT') }}
                    @else
                    <form action="{{ route('pacientes.store') }}" method="post">
                        {{ csrf_field() }}
                    @endif
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input id="nome" type="text" name="nome" class="form-control" value="{{ $paciente->nome }}" required/>
                        </div>

                        <div class="form-group">
                            <label for="sexo">Sexo</label><br/>
                            <label class="radio-inline"><input id="sexo" type="radio" name="sexo" value="M" {{ $paciente->sexo == 'M' ? 'checked="checked"' : ''}}>Masculino</label>
                            <label class="radio-inline"><input id="sexo" type="radio" name="sexo" value="F" {{ $paciente->sexo == 'F' ? 'checked="checked"' : ''}}>Feminino</label>                            
                        </div>

                        <div class="form-group">
                            <label for="data_nascimento">Data de nascimento</label>
                            <input id="data_nascimento" type="date" name="data_nascimento" value="{{ $paciente->data_nascimento }}"  class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input id="telefone" type="text" name="telefone" value="{{ $paciente->telefone }}" class="form-control telefone" required/>
                        </div>

                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input id="endereco" type="text" name="endereco" value="{{ $paciente->endereco }}" class="form-control"/>
                        </div>                   

                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-default" href="{{ url('/pacientes') }}">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('external_js')    
	<script src="http://digitalbush.com/wp-content/uploads/2014/10/jquery.maskedinput.js"></script>
    <script type="text/javascript">
        jQuery("input.telefone")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-999?9");  
            } else {  
                element.mask("(99) 9999-9999?9");  
            }  
        });
    </script>    
@endsection

