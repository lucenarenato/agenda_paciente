@extends('layouts.app')
@section('external_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
<div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Agenda - Cadastros</div>

                <div class="panel-body">
                                        
                    
                    <ul class="nav nav-tabs">
                      <li role="presentation"><a href="home">Home</a></li>
                      <li role="presentation"><a href="agendamentos">Agendamentos</a></li>
                      <li role="presentation" class="active"><a href="#">Pacientes</a></li>
                      <li role="presentation"><a href="medicos">Medicos</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading painel_cab">
                    Pacientes
                    <a class="btn btn-primary pull-right" href="{{ route('pacientes.create') }}">Novo</a>
                </div>
                <div class="panel-body">
                    @if(count($pacientes) > 0)
                    <table id="paciente_table" class="table table-striped table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pacientes as $paciente)
                            <tr>
                                <td>{{ $paciente->id }}</td>
                                <td>{{ $paciente->nome }}</td>
                                <td>{{ $paciente->telefone }}</td>
                                <td><a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                 <td>
                                    <form action="{{ route('pacientes.destroy', $paciente->id ) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                    </form>
                                </td> 
                                    
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>Não há pacientes cadastrados no momento!</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div><br>
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

@section('external_js')
@if(count($pacientes) > 0)
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#paciente_table').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
                }
            } );            
        } );   
    </script>
@endif
@endsection