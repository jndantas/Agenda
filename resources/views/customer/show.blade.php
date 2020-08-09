@extends('layouts.master')

@section('title')
    Cliente {{ $customer['enterprise'] }}
@endsection

@section('breadcrumb_list')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('customer.index')}}">Clientes</a></li>
    <li class="breadcrumb-item active">Cliente {{ $customer['enterprise'] }}</li>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title float-left">Cliente {{ $customer['enterprise'] }}</h3>
            <a href="{{route('customer.edit', $customer['id'])}}" class="btn btn-outline-info float-right"><i class="fas fa-address-book mr-2"></i>Editar</a>
            <button type="submit" class="btn btn-danger float-right mr-2" onclick="handleDelete('{{ $customer['id'] }}')"><i class="fas fa-address-book mr-2"></i>Apagar</button>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Dados</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-building mr-1"></i> Nome da Empresa</strong>
                                    <p class="text-muted">{{$customer['enterprise']}}</p>
                                    <hr>
                                    <strong><i class="fas fa-passport mr-1"></i> CNPJ</strong>
                                    <p class="text-muted">{{$customer['cnpj']}}</p>
                                    <hr>
                                    <strong><i class="fas fa-user-tie mr-1"></i> Nome do Responsável</strong>
                                    <p class="text-muted">{{$customer['responsible']}}</p>
                                    <hr>
                                    <strong><i class="fas fa-address-book mr-1"></i> Contato</strong>
                                    <p class="text-muted mb-0"><i class="fas fa-phone mr-2"></i>{{$customer['phone']}}</p>
                                    <p class="text-muted"><i class="fas fa-envelope mr-2"></i>{{$customer['email']}}</p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Endereço</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-street-view mr-1"></i> CEP</strong>
                                    <p class="text-muted">
                                        {{$customer['cep']}}
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Localização</strong>
                                    <p class="text-muted">{{$customer['city']}}, {{$customer['state']}}</p>
                                    <hr>
                                    <strong><i class="fas fa-road mr-1"></i> Endereço</strong>
                                    <p class="text-muted">{{$customer['street']}}, {{$customer['number']}}, {{$customer['complement']}}, {{$customer['district']}}</p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <hr>
                    @include('address.index')
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{route('customer.index')}}" class="btn btn-secondary float-right">Voltar</a>
        </div>
    </div>


    @include('customer.delete')
    @include('address.create')



@endsection

@section('js_after')

    @include('customer.script')
    @include('address.script')

@endsection
