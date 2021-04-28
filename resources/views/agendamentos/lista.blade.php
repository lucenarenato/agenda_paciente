@extends('layouts.app')
@section('external_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/jquery.bootpop.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Agenda - Cadastros</div>

                <div class="panel-body">
                                        
                    
                    <ul class="nav nav-tabs">
                      <li role="presentation"><a href="home">Home</a></li>
                      <li role="presentation" class="active"><a href="#">Agendamentos</a></li>
                      <li role="presentation"><a href="pacientes">Pacientes</a></li>
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
                    Agendamentos
                    <a class="btn btn-primary pull-right" href="{{ route('agendamentos.create') }}">Novo</a>
                </div>
                <div class="panel-body">
                    @if(count($agendamentos) > 0)
                    <table id="agendamento_table" class="table table-striped table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Data/Hora</th>
                                <th>Paciente</th>
                                <th>Descrição</th>
                                <th>Médico</th>
                                <th>Especialidade</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                                <th>Legenda</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agendamentos as $agendamento)
                            <tr>
                                <td>{{ $agendamento->id }}</td>
                                <td>{{ date("d/m/Y H:i:s", strtotime($agendamento->datahora)) }}</td>
                                <td>{{ $agendamento->paciente->nome }}</td>
                                <td>{{ $agendamento->descricao }}</td>
                                
                                <td>{{ $agendamento->medico->nome }}</td>
                                <td>{{ $agendamento->medico->especialidade }}</td>
                                <td><a href="{{ route('agendamentos.edit', $agendamento->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></a></td>
                                 <td>
                                    <form action="{{ route('agendamentos.destroy', $agendamento->id ) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></button>
                                    </form>
                                </td> 
                                    <td>{{ $agendamento->legenda }}</td>
                            <!-- <td><button class="btn btn-info demo" >Status</button></td> -->        
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <p>Não há agendamentos cadastrados!</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>


</script>
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

@if(count($agendamentos) > 0)
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#agendamento_table').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
                }
            } );            
        } );   
    </script> 

@endif
@endsection