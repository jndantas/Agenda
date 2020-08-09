@extends('layouts.master')

@section('title')
    Cliente XYZ
@endsection

@section('breadcrumb_list')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('customer.index')}}">Clientes</a></li>
    <li class="breadcrumb-item active">Cliente XYZ</li>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title float-left">Cliente XYZ</h3>
            <a href="{{route('customer.create')}}" class="btn btn-outline-info float-right"><i class="fas fa-address-book mr-2"></i>Editar</a>
            <a href="{{route('customer.create')}}" class="btn btn-danger float-right mr-2"><i class="fas fa-address-book mr-2"></i>Apagar</a>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">About Me</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Nome da Empresa</strong>

                                    <p class="text-muted">
                                        B.S. in Computer Science from the University of Tennessee at Knoxville
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> CNPJ</strong>

                                    <p class="text-muted">Malibu, California</p>

                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Nome do Responsável</strong>



                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Contato</strong>

                                    <p class="text-muted mb-0"><i class="fas fa-phone mr-2"></i>71 99999-97989</p>
                                    <p class="text-muted"><i class="fas fa-envelope mr-2"></i>email@email.com</p>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">About Me</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> CEP</strong>

                                    <p class="text-muted">
                                        B.S. in Computer Science from the University of Tennessee at Knoxville
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Localização</strong>

                                    <p class="text-muted">Malibu, California</p>

                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Endereço</strong>

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
                                <button type="button" class="btn btn-outline-info float-right" data-toggle="modal" data-target="#newAddress">
                                    <i class="fas fa-address-book "></i>Novo
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card border-info mb-3" style="max-width: 18rem;">
                                            <div class="card-header">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                    <label class="custom-control-label" for="customSwitch1">Tornar Principal</label>
                                                </div>
                                            </div>
                                            <div class="card-body text-info">
                                                <h5 class="card-title">Info card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{route('customer.index')}}" class="btn btn-secondary float-right">Voltar</a>
        </div>
    </div>


<<<<<<< HEAD
    @include('customer.delete')
    @include('address.create')

@endsection

@section('js_after')
=======
>>>>>>> parent of 4580a20... show customers and addresses

@endsection
