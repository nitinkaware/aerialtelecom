<?php

namespace Database\Factories;

use App\Models\Router;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RouterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Router::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sap_id' => Str::random(18),
            'hostname' => $this->faker->domainName,
            'loopback' => $this->faker->ipv4,
            'mac' => $this->faker->macAddress,
        ];
    }
}
