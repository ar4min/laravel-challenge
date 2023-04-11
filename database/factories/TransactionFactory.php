<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'webservice_id' => WebserviceFactory::class,
            'amount' => $this->faker->randomFloat(null, 1000, 100000),
            'type' => array_rand(array_values(Transaction::TYPES)),
        ];
    }
}
