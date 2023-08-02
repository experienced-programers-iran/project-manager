<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
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
