<?php

namespace App\Models;

use App\Models\Traits\CheckId;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use CheckId;
    public $incrementing = false;

    protected $fillable = [
        'enterprise', 'cnpj', 'phone', 'responsible', 'email', 'address_id'
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

}
