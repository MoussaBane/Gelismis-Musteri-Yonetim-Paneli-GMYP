<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Customer::class;
    public function definition()
    {
        $tel = $this->faker->unique()->numerify('05#########');
        $customerNumber = $this->faker->unique()->numberBetween(1, 10);

        return [
            'name' => 'Customer' . $customerNumber,
            'lastname' => 'Customer_' . $customerNumber,
            'email' => 'customer' . $customerNumber . '@gmail.com',
            'tel' => $tel,
            'about' => 'I am a ' . $this->faker->country .' citizen.',
            'user_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
