@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">Controle de Pacientes</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Cadastros</div>

                                <div class="panel-body">
                                                        
                                    
                                    <ul class="nav nav-tabs">
                                      <li role="presentation" class="active"><a href="#">Home</a></li>
                                      <li role="presentation"><a href="agendamentos">Agendamentos</a></li>
                                      <li role="presentation"><a href="pacientes">Pacientes</a></li>
                                      <li role="presentation"><a href="medicos">Medicos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Agenda - Cadastros</div>

                <div class="panel-body">
                                        
                    
                    <ul class="nav nav-tabs">
                      <li role="presentation" class="active"><a href="#">Home</a></li>
                      <li role="presentation"><a href="agendamentos">Agendamentos</a></li>
                      <li role="presentation"><a href="pacientes">Pacientes</a></li>
                      <li role="presentation"><a href="medicos">Medicos</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
    <div class="container">
    <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <div class="panel-heading">Aproveite os benefícios de um sistema de controle de pacientes</h1>
          </div>      
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <p class="text-muted small mb-4 mb-lg-0">&copy; Renato de Oliveira Lucena 2018</p>
          </div>
        </div>
      </div>
    </footer>


@endsection
