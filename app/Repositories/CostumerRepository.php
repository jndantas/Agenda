<?php


namespace App\Repositories;

use App\Models\Costumer;
use App\Repositories\Traits\DefaultQuery;

class CostumerRepository
{

    use DefaultQuery;

    public function __construct(Costumer $costumer)
    {
        $this->model = $costumer;
    }

}
