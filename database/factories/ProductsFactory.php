<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\products ;
use App\Models\User ;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = products::class ;

    
    public function definition(): array
    {
        return [
            "oner_id" => User::factory(),

            "img"   => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTGjCPHh5ztTbRSczjKuVYKJU44nmhEiXQXsA&s' ,
            "price"   =>$this->faker->numberBetween(10 , 1000) ,
            "title"   =>$this->faker->sentence() ,
            "description"   =>$this->faker->text() ,
            "to_sell" =>$this->faker->Boolean() ,
        ];
    }
}
