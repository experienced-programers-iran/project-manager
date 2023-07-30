<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::factory()
            ->state([
                'email' => 'a@a.com',
                'password' => \Hash::make('123123'),
            ])
            ->create();
        // $this->call("OthersTableSeeder");
    }
}
