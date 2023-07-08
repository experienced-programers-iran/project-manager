<?php

namespace Modules\Project\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Project\Entities\Project;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' =>  $this->faker->text(200),
        ];
    }
}

