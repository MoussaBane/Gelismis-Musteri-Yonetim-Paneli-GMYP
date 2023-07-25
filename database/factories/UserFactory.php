<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = User::class;
    public function definition()
    {

        $tel = $this->faker->unique()->numerify('05#########');
        $firstname = $this->faker->firstName;
        $lastname = $this->faker->lastName;
        $usernumber = $this->faker->unique()->numberBetween(10,60);

        return [
            'name' => $firstname.' '.$lastname,
            'email' => $firstname.'.'.$lastname.$usernumber.'@gmail.com',
            'tel' => $tel,
            'password' => bcrypt($tel), // password
            'role' => 'kullanici',
            'image' => 'profile.png',
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
