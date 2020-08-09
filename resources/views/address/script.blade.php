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
