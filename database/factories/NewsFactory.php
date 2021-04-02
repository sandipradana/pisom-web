<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(100),
            'content' => $this->faker->text(500),
            'category_id' => 1,
            'thumbnail' => 'news/default.jpg',
            'date' => date("Y-m-d"),
        ];
    }
}
