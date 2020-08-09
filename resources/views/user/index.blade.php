@extends('layouts.master')

@section('title', 'Usuários')

@section('breadcrumb_list')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active">Usuários</li>
@endsection

@section('content')

    <div class="card card-solid">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-2x fa-users"></i>
                <a href="{{ route('user.create') }}" class="btn btn-primary btn-circle float-right"><i class="fas fa-plus"></i></a>
        </div>
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                @foreach($users as $u)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                            @if ($u['role'] === 'admin')
                                Administrador
                            @else
                                Usuário
                            @endif
                            <div class="float-right">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" data-id="{{$u['id']}}" id="{{$u['id']}}" {{ $u->status ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="{{$u['id']}}">Ativo</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead mt-4"><b>{{$u['name']}}</b></h2>
                                    <p class="text-muted text-sm"><b>Email: </b> {{$u['email']}} </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Endereço: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Telefone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{gravatar()->avatar($u['email'])}}" alt="" class="img-circle img-fluid mt-4">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                @if (!$u->isAdmin())

                                    <a href="{{ route('user.admin', ['id' => $u->id]) }}" class="btn btn-sm bg-info">
                                        <i class="fas fa-user-cog"></i> Tornar Administrador
                                    </a>
                                @else
                                    <a href="{{ route('user.not.admin', ['id' => $u->id]) }}" class="btn btn-sm bg-info">
                                        <i class="fas fa-lock"></i> Remover Permissões
                                    </a>
                                @endif

                                @if(auth()->user()->id !== $u->id )
                                    <button onclick="handleDelete('{{ $u->id }}')" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> Deletar
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="float-right">
                @if($users->count())
                    <div class="row pt-4">
                        <div class="col">
                            {{ $users->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <!-- /.card-footer -->
    </div>

    <form action="" method="POST" id="deleteForm">
    @csrf
    @method('DELETE')
    <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Apagar Usuário</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center text-bold">
                            Você realmente quer apagar esse Usuário?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não, Volte!</button>
                        <button type="submit" class="btn btn-danger">Sim, Apague!</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js_after')

    <script>
        $(function() {
            $('.custom-control-input').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{(route('user.changeStatus'))}}',
                    data: {'status': status, 'user_id': user_id},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        })
        function handleDelete(id){
            var form = document.getElementById('deleteForm')
            form.action = '/user/' + id
            $('#deleteModal').modal('show')
        }
    </script>
@endsection
