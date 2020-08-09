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
                                <a href="javascript:void(0)" class="btn btn-outline-info float-right" id="createNewAddress" onclick="addAddress()">
                                    <i class="fas fa-address-book mr-2"></i>Novo
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($addresses as $a)
                                        <div class="col-md-3">
                                            <div class="card shadow border-info mb-3" style="max-width: 18rem;">
                                                <div class="card-header">
                                                    <div class="custom-control custom-switch">
                                                        <input data-id="{{$a->id}}" type="checkbox" class="custom-control-input change_address" id="customSwitch1">
                                                        <label class="custom-control-label" for="customSwitch1">Tornar Principal</label>
                                                    </div>
                                                </div>
                                                <div class="card-body text-info">
                                                    <h5 class="card-title">CEP: {{$a['cep']}}</h5>
                                                    <p class="card-text mb-0">{{$a['city']}}, {{$a['state']}}</p>
                                                    <p class="card-text">{{$a['street']}}, {{$a['number']}}, {{$a['complement']}}, {{$a['district']}}</p>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="javascript:void(0)" data-id="{{ $a['id'] }}" class="btn btn-sm btn-danger float-right" onclick="deleteAddress(event.target)"><i class="fas fa-trash"></i></a>
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
        <div class="card-footer">
            <a href="{{route('customer.index')}}" class="btn btn-secondary float-right">Voltar</a>
        </div>
    </div>


    @include('customer.delete')
    @include('address.create')

    <div class="modal fade" id="newAddress">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Novo Endereço</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="modalFormData">
                    <input type="hidden" name="address_id" id="address_id">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="cep">CEP</label>
                                <input type="text" class="form-control" name="cep" id="cep" value="" size="10" maxlength="9">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="uf">Estado</label>
                                <input type="text" id="uf" name="state" size="2" readonly class="form-control-plaintext">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cidade">Cidade</label>
                                <input type="text" id="cidade" name="city" size="40" readonly class="form-control-plaintext">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="bairro">Bairro</label>
                                <input type="text" name="district" id="bairro" size="40" readonly class="form-control-plaintext">
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="rua">Endereço</label>
                                <input type="text" name="street" id="rua" size="60" readonly class="form-control-plaintext">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="number">Número</label>
                                <input type="text" id="number" name="number" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="complement">Complemento</label>
                                <input type="text" id="complement" name="complement" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" onclick="createAddress()">Salvar</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


@endsection

@section('js_after')

    @include('customer.script')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {
            $('.change_address').change(function () {
                var customer_id = '{{$customer['id']}}';
                var address_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{route('customer.address')}}',
                    data: {
                        'customer_id': customer_id,
                        'address_id': address_id
                    },

                    success: function(data){
                        console.log(data.success)
                        Swal.fire(
                            'Sucesso!',
                            'Endereço principal atualizado com sucesso!',
                            'success'
                        ).then(function() {
                            window.location = '{{ route('customer.show', $customer['id']) }}';
                        });
                    }
                });
            })
        });

        function addAddress() {
            $('#modalFormData').trigger("reset");
            $('#newAddress').modal('show');
        }

        function createAddress() {
            var customer = '{{$customer['id']}}';
            var cep = $('#cep').val();
            var state = $('#uf').val();
            var city = $('#cidade').val();
            var district = $('#bairro').val();
            var street = $('#rua').val();
            var number = $('#number').val();
            var complement = $('#complement').val();
            var id = $('#address_id').val();

            let _url = '{{ route('address.store') }}';

            $.ajax({
                url: _url,
                type: "POST",
                data: {
                    id: id,
                    customer: customer,
                    cep: cep,
                    state: state,
                    city: city,
                    district: district,
                    street: street,
                    number: number,
                    complement: complement,
                },
                success:function(data){
                    $('#newAddress').modal('hide');
                    Swal.fire(
                        'Sucesso!',
                        'Novo Endereço cadastrado(a) com sucesso!',
                        'success'
                    ).then(function() {
                        window.location = '{{ route('customer.show', $customer['id']) }}';
                    });
                },
                error: function(response) {
                    $('#titleError').text(response.responseJSON.errors.title);
                    $('#descriptionError').text(response.responseJSON.errors.description);
                }
            });
        }

        function deleteAddress(event) {
            var id  = $(event).data("id");
            let _url = `/address/${id}`;

            $.ajax({
                url: _url,
                type: 'DELETE',
                data: {
                },
                success: function(response) {
                    Swal.fire(
                        'Sucesso!',
                        'Endereço Apagado com sucesso!',
                        'success'
                    ).then(function() {
                        window.location = '{{ route('customer.show', $customer['id']) }}';
                    });
                }
            });
        }

    </script>
@endsection
