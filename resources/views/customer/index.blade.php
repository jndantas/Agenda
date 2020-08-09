@extends('layouts.master')

@section('title', 'Clientes')

@section('breadcrumb_list')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active">Clientes</li>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title float-left">Lista de clientes</h3>
            <a href="{{route('customer.create')}}" class="btn btn-outline-info float-right"><i class="fas fa-address-book mr-2"></i>Novo</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered dataTable" style="width:100%">
                <thead>
                    <tr>
                        <th>CNPJ</th>
                        <th>Empresa</th>
                        <th>Responsável</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Criado por:</th>
                        <th>Criado em</th>
                        <th width="20%" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($customers as $c)
                    <tr>
                        <td>{{ $c['cnpj'] }}</td>
                        <td>{{ $c['enterprise'] }}</td>
                        <td>{{ $c['responsible'] }}</td>
                        <td>{{ $c['phone'] }}</td>
                        <td>{{ $c['email'] }}</td>
                        <td>{{ $c['user']['name'] }}</td>
                        <td>{{ $c['created_at'] }}</td>
                        <td>
                            <a href="{{route('customer.show', $c['id'])}}" class="btn btn-primary btn-app">
                                <i class="fas fa-eye"></i>Ver
                            </a>
                            <a href="{{route('customer.edit', $c['id'])}}" class="btn btn-info btn-app">
                                <i class="fas fa-edit"></i>Editar
                            </a>
                            <button type="submit" class="btn btn-danger btn-app" onclick="handleDelete('{{ $c['id'] }}')">
                                <i class="fas fa-trash"></i>Apagar
                            </button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <form action="" method="POST" id="deleteForm">
    @csrf
    @method('DELETE')
    <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Apagar Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center text-bold">
                            Você realmente quer apagar esse Cliente?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não, Volte!</button>
                        <button type="submit" class="btn btn-danger">Sim, Apague!</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection

@section('js_after')

    <script>
        function handleDelete(id){
            var form = document.getElementById('deleteForm')
            form.action = '/customer/' + id
            $('#deleteModal').modal('show')
        }
    </script>
@endsection
