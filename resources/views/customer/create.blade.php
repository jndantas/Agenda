@extends('layouts.master')

@section('title')
    {{ isset($customer) ? 'Editar Cliente': 'Novo Cliente'}}
@endsection

@section('breadcrumb_list')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('customer.index')}}">Clientes</a></li>
    <li class="breadcrumb-item active">{{ isset($customer) ? 'Editar Cliente': 'Novo Cliente'}}</li>
@endsection

@section('content')

    <form action="{{ isset($customer) ? route('customer.update', $customer->id) : route('customer.store') }}" method="POST">
        @csrf
        @if (isset($customer))
            @method('PUT')
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Dados</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="cnpj">CNPJ</label>
                                <input type="text" name="cnpj" id="cnpj" value="{{ isset($customer) ? $customer->cnpj: old('cnpj') }}" class="form-control @error('cnpj') is-invalid @enderror">
                                @error('cnpj')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <label for="enterprise">Nome da Empresa</label>
                                <input type="text" name="enterprise" id="enterprise" value="{{ isset($customer) ? $customer->enterprise: old('enterprise') }}" class="form-control @error('enterprise') is-invalid @enderror">
                                @error('enterprise')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="responsible">Responsável</label>
                                <input type="text" name="responsible" id="responsible" class="form-control @error('responsible') is-invalid @enderror" value="{{ isset($customer) ? $customer->responsible: old('responsible') }}">
                                @error('responsible')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Email</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ isset($customer) ? $customer->email: old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group col-md-6">
                                <label>Telefone</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ isset($customer) ? $customer->phone: old('phone') }}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>

                        @if(empty($customer))

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="cep">CEP</label>
                                <input type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" id="cep" value="{{ old('cep') }}" size="10" maxlength="9">
                                @error('cep')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-1">
                                <label for="uf">Estado</label>
                                <input type="text" id="uf" name="state" size="2"  value="{{ old('state') }}" readonly class="form-control-plaintext @error('state') is-invalid @enderror">
                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cidade">Cidade</label>
                                <input type="text" id="cidade" name="city" size="40"  value="{{ old('city') }}" readonly class="form-control-plaintext @error('city') is-invalid @enderror">
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bairro">Bairro</label>
                                <input type="text" name="district" id="bairro" size="40"  value="{{ old('district') }}" readonly class="form-control-plaintext @error('district') is-invalid @enderror">

                                @error('district')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="rua">Endereço</label>
                                <input type="text" name="street" id="rua" size="60" readonly  value="{{ old('street') }}" class="form-control-plaintext @error('street') is-invalid @enderror">
                                @error('street')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="number">Número</label>
                                <input type="text" id="number" name="number"  value="{{ old('number') }}" class="form-control @error('number') is-invalid @enderror">
                                @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="complement">Complemento</label>
                                <input type="text" id="complement" name="complement"  value="{{ old('complement') }}" class="form-control @error('complement') is-invalid @enderror">
                                @error('complement')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="{{url()->previous()}}" class="btn btn-secondary">Cancelar</a>
                        <input type="submit" value="Salvar" class="btn btn-success float-right">
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </form>


@endsection
