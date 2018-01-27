@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading painel_cab">
                    Informe abaixo as informações do médico
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
                    <form action="{{ route('medicos.update', $medico->id) }}" method="post">
                        {{ csrf_field() }}                        
                        {{ method_field('PUT') }}
                    @else
                    <form action="{{ route('medicos.store') }}" method="post">
                        {{ csrf_field() }}
                    @endif
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input id="nome" type="text" name="nome" class="form-control" value="{{ $medico->nome }}" required/>
                        </div>

                        <div class="form-group">
                            <label for="crm">CRM</label>
                            <input id="crm" type="text" name="crm" value="{{ $medico->crm }}" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input id="telefone" type="text" name="telefone" value="{{ $medico->telefone }}" class="form-control telefone" required/>
                        </div>

                        <div class="form-group">
                            <label for="especialidade">Especialidade</label>
                            <input id="especialidade" type="text" name="especialidade" value="{{ $medico->especialidade }}" class="form-control especialidade" required/>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-default" href="{{ url('/medicos') }}">Voltar</a>
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