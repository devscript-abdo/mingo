<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'button_text' => $this->faker->randomElement(['top_slider', 'center_home', 'bottom_home', 'top_products_page', 'single_product','not_set']),
            'image' => 'http://lorempixel.com/1650/400/sports/',
            'link' => '/products',
        ];
    }
}
