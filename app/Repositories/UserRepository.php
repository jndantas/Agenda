<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Traits\DefaultQuery;

/**
 * Class AddressRepository
 * @package App\Repositories
 */
class UserRepository
{
    use DefaultQuery;

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->paginate(15);
    }

    /**
     * @param $request
     */
    public function createUser($request)
    {
        $this->model->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password')
        ]);

        alert()->success('Usuário '. $request->name . ' criado com sucesso!', 'Salvo');
    }

    /**
     * @param $id
     */
    public function deleteUser($id)
    {
        $user = $this->model->where('id', $id)->firstOrFail();

        if ($user->customers()->count() > 0){
            alert()->error('Usuário não pode ser deletado(a) porque ele(a) possui clientes.', 'Inative o Usuário');
        }else{
            $user->delete();
            alert()->success('Usuário ' .$user->name.  ' Deletado!', 'Deletado');
        }
    }

    /**
     * @param $id
     */
    public function makeAdmin($id)
    {
        $user = $this->model->findOrFail($id);
        $user->role = 'admin';
        $user->save();
        alert()->info('Permissão alterada com sucesso');
    }

    /**
     * @param $id
     */
    public function notAdmin($id)
    {
        $user = $this->model->findOrFail($id);
        $user->role = 'user';
        $user->save();
        alert()->info('Permissão alterada com sucesso');
    }

    /**
     * @param $request
     */
    public function changeStatus($request)
    {
        $user = $this->model->findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();
    }

}
