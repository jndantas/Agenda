<?php

use App\Models\Address;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin admin',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);

        $customer = Customer::create([
            'user_id' => $user->id,
            'enterprise' => 'Nome da empresa',
            'cnpj' => '51.048.638/0001-33',
            'phone'=> '(68) 2835-8239',
            'responsible' => 'Joana Allana Alana Aragão',
            'email' => 'joanaallanaalanaaragao-79@galvao.com' ,
            'cep'=> '69310-015',
            'address_principal' => '2',
            'street'=> 'Alameda SD-02',
            'district'=> 'Aeroporto',
            'complement'=> 'Praça',
            'number'=> '453',
            'city'=> 'Boa Vista',
            'state'=> 'RR',
        ]);

        Address::create([
            'customer_id' => $customer->id,
            'cep'=> '69310-015',
            'street'=> 'Alameda SD-02',
            'district'=> 'Aeroporto',
            'complement'=> 'Praça',
            'number'=> '453',
            'city'=> 'Boa Vista',
            'state'=> 'RR',
        ]);
    }
}
