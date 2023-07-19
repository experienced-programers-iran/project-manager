<?php

namespace Modules\Organization\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Organization\Entities\Organization;

class OrganizationDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Organization::factory(3)->create();
//         $this->call("OthersTableSeeder");
    }
}
