<?php


namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Traits\DefaultQuery;
use App\Models\Address;

class AddressRepository
{
    use DefaultQuery;

    /**
     * @var Customer
     */
    private $CustomerRepository;

    public function __construct(Address $address, Customer $customerRepository)
    {
        $this->model = $address;
        $this->CustomerRepository = $customerRepository;
    }

    public function getAddressByCustomers($id)
    {
        $customer = $this->CustomerRepository->where('id', $id)->firstOrFail();
        return $this->model->where('customer_id', $customer->id)->get();
    }

}
