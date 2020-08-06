<?php


namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Traits\DefaultQuery;

class CustomerRepository
{

    use DefaultQuery;

    public function __construct(Customer $costumer)
    {
        $this->model = $costumer;
    }

}
