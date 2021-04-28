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
                      <li role="presentation"><a href="pacientes">Pacientes</a></li>
                      <li role="presentation" class="active"><a href="#">Medicos</a></li>
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
                    Médicos
                    <a class="btn btn-primary pull-right" href="{{ route('medicos.create') }}">Novo</a>
                </div>
                <div class="panel-body">
                    @if(count($medicos) > 0)
                    <table id="medico_table" class="table table-striped table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>CRM</th>
                                <th>Telefone</th>
                                <th>especialidade</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medicos as $medico)
                            <tr>
                                <td>{{ $medico->id }}</td>
                                <td>{{ $medico->nome }}</td>
                                <td>{{ $medico->crm }}</td>
                                <td>{{ $medico->telefone }}</td>
                                <td>{{ $medico->especialidade }}</td>
                                <td><a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></a></td>
                                 <td>
                                    <form action="{{ route('medicos.destroy', $medico->id ) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></button>
                                    </form>
                                </td> 
                                    
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <p>Não há médicos cadastrados no momento!</p>
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
@if(count($medicos) > 0)
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#medico_table').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
                }
            } );            
        } );   
    </script>    
@endif
@endsection