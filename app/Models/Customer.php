<?php

namespace App\Models;

use App\Models\Traits\CheckId;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use CheckId;
    public $incrementing = false;

    protected $fillable = [
        'enterprise', 'cnpj', 'phone', 'responsible', 'email', 'user_id','address_principal', 'cep', 'street','district', 'complement', 'number', 'city', 'state'
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
