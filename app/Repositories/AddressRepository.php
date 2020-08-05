<?php


namespace App\Repositories;

use App\Repositories\Traits\DefaultQuery;
use App\Models\Address;

class AddressRepository
{
    use DefaultQuery;

    public function __construct(Address $address)
    {
        $this->model = $address;
    }

}
