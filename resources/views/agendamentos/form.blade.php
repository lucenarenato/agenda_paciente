@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading painel_cab">
                    Faça o agendamento da consulta médica
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
                    <form action="{{ route('agendamentos.update', $agendamento->id) }}" method="post">
                        {{ csrf_field() }}                        
                        {{ method_field('PUT') }}
                    @else
                    <form action="{{ route('agendamentos.store') }}" method="post">
                        {{ csrf_field() }}
                    @endif
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input id="descricao" type="text" name="descricao" class="form-control" value="{{ $agendamento->descricao }}"/>
                        </div>

                        <div class="form-group">
                            <label for="datahora">Data/Hora</label>
                            <input id="datahora" type="datetime-local" name="datahora" class="form-control" value="{{ strftime('%Y-%m-%dT%H:%M', strtotime($agendamento->datahora)) }}"/>
                        </div>                        

                        <div class="form-group">
                            <label for="paciente_id">Paciente</label>
                            <select name="paciente_id" class="form-control" id="paciente_id" value="{{ $agendamento->id_paciente }}">
                                @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}" {{ $paciente->id == $agendamento->id_paciente ? 'selected="selected"' : ''}}> {{ $paciente->nome }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="medico_id">Médico</label>
                            <select name="medico_id" class="form-control" id="medico_id" value="{{ $agendamento->id_medico }}">
                                @foreach($medicos as $medico)
                                    <option value="{{ $medico->id }}" {{ $medico->id == $agendamento->id_medico ? 'selected="selected"' : ''}}> {{ $medico->nome }}  {{ $medico->especialidade }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="legenda">Legenda</label>
                            <input id="legenda" type="text" name="legenda" class="form-control" value="{{ $agendamento->legenda }}"/>
                        </div>
                        <!-- <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                            Compareceu
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            Remarcou
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                            Faltou
                          </label>
                        </div>   -->                

                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-default" href="{{ url('/agendamentos') }}">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



