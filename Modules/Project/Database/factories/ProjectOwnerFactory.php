<?php

namespace Modules\Project\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Project\Entities\ProjectOwner;

class ProjectOwnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjectOwner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'transferred_at' => $this->faker->dateTimeThisMonth,
            'previous_owner_id' =>  null,
        ];
    }
}

