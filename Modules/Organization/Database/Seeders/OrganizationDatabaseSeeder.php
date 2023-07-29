<?php

namespace Modules\Organization\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;
use Modules\Organization\Entities\Organization;
use Modules\Project\Entities\Project;
use Modules\Project\Entities\ProjectDetail;

class OrganizationDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Model::unguard();

        User::factory(5)->has(
            factory: Organization::factory(rand(1, 3))
                ->has(
                    factory: Project::factory(rand(1, 3))
                        ->has(
                            factory: projectDetail::factory()
                        )
                )
        )->create();

    }
}
