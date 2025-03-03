<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Commands ;
use App\Models\Products;
use App\Models\User ;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class commandsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Commands::class ;

    
    public function definition(): array
    {
        return [
        "oner_id" =>User::factory() ,
        "vendor_id" =>User::factory() ,
        "product_id" => Products::factory() ,
        "confirmed" =>$this->faker->Boolean(),
        ];
    }
}
