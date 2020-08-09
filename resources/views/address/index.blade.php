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
                                    <input data-id="{{$a->id}}" type="checkbox" class="custom-control-input change_address" id="{{$a->id}}" {{ ($a->id === $customer->address_principal ) ? 'checked disabled' : '' }}>
                                    <label class="custom-control-label" for="{{$a->id}}">Tornar Principal</label>
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
