@extends('layouts.master')

@section('title')
    {{ isset($user) ? 'Editar Usuário' : 'Criar Usuário'}}
@endsection

@section('breadcrumb_list')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('user.index')}}">Usuários</a></li>
    <li class="breadcrumb-item active">{{ isset($user) ? 'Editar Usuário' : 'Criar Usuário'}}</li>
@endsection

@section('content')

    <section class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Adicionar Usuário</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}" method="post">
                        {{ csrf_field() }}
                        @if (isset($user))
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="" name="name" value="{{ isset($user) ? $user->name : old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ isset($user) ? $user->email : old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer text-right">
                            <button class="btn btn-warning" type="reset">Resetar</button>
                            <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Atualizar': 'Salvar'}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
