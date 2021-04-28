@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Agenda - Cadastros</div>
    
                    <div class="panel-body">
                        <ul class="nav nav-tabs">
                          <li role="presentation"><a href="home">Home</a></li>
                          <li role="presentation"><a href="agendamentos">Agendamentos</a></li>
                          <li role="presentation"><a href="pacientes">Pacientes</a></li>
                          <li role="presentation"><a href="#">Medicos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
