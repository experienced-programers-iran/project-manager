<?php

namespace Modules\Project\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;
use Modules\Project\Entities\Project;
use Modules\Project\Entities\ProjectDetail;

class ProjectTableSeeder extends Seeder
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
            factory: Project::factory(5)->has(
                factory: ProjectDetail::factory()
            ),
        )->create();
//        Project::factory()
    }
}
