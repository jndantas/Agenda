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
                                    <strong><i class="fas fa-book mr-1"></i> Nome da Empresa</strong>
                                    <p class="text-muted">{{$customer['enterprise']}}</p>
                                    <hr>
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> CNPJ</strong>
                                    <p class="text-muted">{{$customer['cnpj']}}</p>
                                    <hr>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Nome do Responsável</strong>
                                    <p class="text-muted">{{$customer['responsible']}}</p>
                                    <hr>
                                    <strong><i class="far fa-file-alt mr-1"></i> Contato</strong>
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
                                    <strong><i class="fas fa-book mr-1"></i> CEP</strong>
                                    <p class="text-muted">
                                        {{$customer['cep']}}
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Localização</strong>
                                    <p class="text-muted">{{$customer['city']}}, {{$customer['state']}}</p>
                                    <hr>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Endereço</strong>
                                    <p class="text-muted">{{$customer['street']}}, {{$customer['number']}}, {{$customer['complement']}}, {{$customer['district']}}</p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Endereços Cadastrados</h3>
                                <a href="{{route('customer.create')}}" class="btn btn-outline-info float-right"><i class="fas fa-address-book "></i>Novo</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($addresses as $a)
                                    <div class="col-md-3">
                                        <div class="card border-info mb-3" style="max-width: 18rem;">
                                            <div class="card-header">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                    <label class="custom-control-label" for="customSwitch1">Tornar Principal</label>
                                                </div>
                                            </div>
                                            <div class="card-body text-info">
                                                <h5 class="card-title">CEP: {{$a['cep']}}</h5>
                                                <p class="card-text mb-0">{{$a['city']}}, {{$a['state']}}</p>
                                                <p class="card-text">{{$a['street']}}, {{$a['number']}}, {{$a['complement']}}, {{$a['district']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('customer.delete')

@endsection

@section('js_after')

    @include('customer.script')
@endsection
