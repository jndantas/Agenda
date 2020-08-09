<?php

namespace App\Models;

use App\Models\Traits\CheckId;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use CheckId;
    public $incrementing = false;

    protected $fillable = [
        'costumer_id', 'cep', 'street','district', 'complement', 'number', 'city', 'state'
    ];

    public function costumer()
    {
        return $this->belongsTo(Customer::class);
    }
}
