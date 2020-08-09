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

@include('customer.delete')

@endsection

@section('js_after')

@include('customer.script')
@endsection
