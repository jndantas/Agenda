
<div class="modal fade" id="newAddress">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Novo Endereço</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
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
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
