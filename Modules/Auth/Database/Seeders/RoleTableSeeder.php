<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Auth\Entities\Role;
use Modules\Auth\Enums\RoleEnum;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        $possibleRoles = RoleEnum::cases();
        $data = [];
        foreach ($possibleRoles as $role) {
            $data[] = [
                'name' => $role->name,
            ];
        }
        if ($data) {
            Role::insert($data);
        }
    }
}
