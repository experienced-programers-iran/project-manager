<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\Role;
use Modules\Auth\Enums\RoleEnum;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Model::unguard();

        $possibleRoles= RoleEnum::cases();
        $data=[];
        foreach ($possibleRoles as $role) {
            $data[]=[
                'name' => $role->name
            ];
        }
        if($data)
            Role::insert($data);
    }
}
