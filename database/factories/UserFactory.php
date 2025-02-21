<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User ;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = User::class ;


    public function definition(): array
    {
        return [

            'name' => $this->faker->firstName() .' '. $this->faker->lastName(),
            'img'=> 'default.jpg' ,
            'email' => $this->faker->unique()->safeEmail() ,
            'password' => bcrypt('password'),
            'is_admin' => $this->faker->boolean(10),
            'gender' => $this->faker->boolean(),
            'sold' => $this->faker->numberBetween(100 , 1000),

        
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
