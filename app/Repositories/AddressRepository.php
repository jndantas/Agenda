<?php


namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Traits\DefaultQuery;
use App\Models\Address;

/**
 * Class AddressRepository
 * @package App\Repositories
 */
class AddressRepository
{
    use DefaultQuery;

    /**
     * @var Customer
     */
    private $CustomerRepository;

    /**
     * AddressRepository constructor.
     * @param Address $address
     * @param Customer $customerRepository
     */
    public function __construct(Address $address, Customer $customerRepository)
    {
        $this->model = $address;
        $this->CustomerRepository = $customerRepository;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getAddressByCustomers($id)
    {
        $customer = $this->CustomerRepository->where('id', $id)->firstOrFail();
        return $this->model->where('customer_id', $customer->id)->get();
    }

    /**
     * @param $request
     */
    public function createAddress($request)
    {
        $address = $this->model->create([
            'customer_id' => $request->customer,
            'cep' => $request->cep,
            'street' => $request->street,
            'district' => $request->district,
            'complement' => $request->complement,
            'number' => $request->number,
            'city' => $request->city,
            'state' => $request->state
        ]);
    }

    /**
     * @param $id
     */
    public function deleteAddress($id)
    {
        $this->model->find($id)->delete();

    }

}
