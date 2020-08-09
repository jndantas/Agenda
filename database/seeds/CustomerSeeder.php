<?php

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
            'password' => bcrypt('password')
        ]);

        Customer::create([
            'user_id' => $user->id,
            'enterprise' => 'Nome da empresa',
            'cnpj' => '51.048.638/0001-33',
            'phone'=> '(68) 2835-8239',
            'responsible' => 'Joana Allana Alana Aragão',
            'email' => 'joanaallanaalanaaragao-79@galvao.com' ,
            'address_id' => 1,
        ]);
    }
}
