<?php

namespace Modules\Project\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Project\Entities\ProjectDetail;

class ProjectDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjectDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $start_date=$this->faker->dateTimeThisMonth;
        return [
            'start_date' => $start_date,
            'end_date' => $this->faker->dateTimeBetween(
                startDate:$start_date
            ),
            'budget' =>  $this->faker->randomFloat(2, 0, 10000),
        ];
    }
}

