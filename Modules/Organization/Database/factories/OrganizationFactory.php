<?php

namespace Modules\Organization\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Organization\Entities\Organization;

class OrganizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Organization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' =>  $this->faker->text(150),
            'logo' =>  $this->faker->image,
        ];
    }
}

