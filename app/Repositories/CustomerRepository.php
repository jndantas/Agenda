<?php


namespace App\Repositories;

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
            'cep' => $request->cep,
            'street' => $request->street,
            'district' => $request->district,
            'complement' => $request->complement,
            'number' => $request->number,
            'city' => $request->city,
            'state' => $request->state,
            'address_principal' => 5,
            'user_id' => auth()->user()->id
        ]);

        $address = $this->AddressRepository->create([
            'customer_id' => $customer['id'],
            'cep' => $request->cep,
            'street' => $request->street,
            'district' => $request->district,
            'complement' => $request->complement,
            'number' => $request->number,
            'city' => $request->city,
            'state' => $request->state
        ]);
        $customer = $this->model->find($customer['id']);
        $customer->address_principal = $address['id'];
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
     * @param $request
     */
    public function updateAddress($request)
    {
        $customer = $this->model->find($request->customer_id);
        $address = $this->AddressRepository->find($request->address_id);
        $customer->cep = $address->cep;
        $customer->street = $address->street;
        $customer->district = $address->district;
        $customer->complement = $address->complement;
        $customer->number = $address->number;
        $customer->city = $address->city;
        $customer->state = $address->state;
        $customer->address_principal = $address->id;
        $customer->save();
    }

    /**
     * @param $id
     */
    public function deleteCustomer($id)
    {
        $customer = $this->model->where('id', $id)->firstOrFail();
        $customer->addresses()->delete();
        $customer->delete();
        alert()->success('Cliente '. $customer->enterprise .' deletado!', 'Deletado');
    }

}
