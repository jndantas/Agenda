<?php


namespace App\Repositories;

use App\Models\Address;
use App\Models\Customer;
use App\Repositories\Traits\DefaultQuery;

/**
 * Class CustomerRepository
 * @package App\Repositories
 */
class CustomerRepository
{
    use DefaultQuery;

    /**
     * @var AddressRepository
     */
    private $AddressRepository;


    /**
     * CustomerRepository constructor.
     * @param Customer $customer
     * @param AddressRepository $addressRepository
     */
    public function __construct(Customer $customer, AddressRepository $addressRepository)
    {
        $this->model = $customer;
        $this->AddressRepository = $addressRepository;
    }

    /**
     * @return mixed
     */
    public function getCustomers()
    {
        $customers = $this->model->get();
        return $customers;
    }

    /**
     * @param $request
     */
    public function createCustomer($request)
    {
        $customer = $this->model->create([
            'enterprise' => $request->enterprise,
            'cnpj' => $request->cnpj,
            'phone' => $request->phone,
            'responsible' => $request->responsible,
            'email' => $request->email,
            'address_id' => 5,
            'user_id' => auth()->user()->id
        ]);

        $address = $this->AddressRepository->create([
            'costumer_id' => $customer['id'],
            'cep' => $request->cep,
            'street' => $request->street,
            'district' => $request->district,
            'complement' => $request->complement,
            'number' => $request->number,
            'city' => $request->city,
            'state' => $request->state
        ]);
        $customer = $this->model->find($customer['id']);
        $customer->address_id = $address['id'];
        $customer->save();

        alert()->success('Cliente '. $request->enterprise .' criado com Sucesso!', 'Salvo');

    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCustomerId($id)
    {
        $data = $this->model->where('id', $id)->firstOrFail();
        return $data;
    }

    /**
     * @param $request
     * @param $id
     */
    public function updateCustomer($request, $id)
    {
        $customer = $this->model->where('id', $id)->firstOrFail();
        $data = $request->only(['cnpj', 'enterprise', 'responsible', 'email', 'phone']);
        $customer->update($data);
        alert()->success('Cliente '. $request->enterprise .' atualizado com Sucesso!', 'Atualizado');
    }

    /**
     * @param $id
     */
    public function deleteCustomer($id)
    {
        $customer = $this->model->where('id', $id)->firstOrFail();
        $customer->delete();
        alert()->success('Cliente '. $customer->enterprise .' deletado!', 'Deletado');
    }

}
