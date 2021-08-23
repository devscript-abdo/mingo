<?php

namespace Database\Factories;

use App\Models\Ads;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ads::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'expired_at' => $this->faker->date(),
            'location' => $this->faker->randomElement(['top_slider', 'center_home', 'bottom_home', 'top_products_page', 'single_product','not_set']),
            'key' => $this->faker->regexify('[A-Za-z0-9]{' . mt_rand(4, 20) . '}'),
            'image' => $this->faker->randomElement(['http://lorempixel.com/400/200/sports/', 'https://source.unsplash.com/random']),
            'url' => '/products',
            'status' => $this->faker->randomElement(['published', 'pending'])
        ];
    }
}
