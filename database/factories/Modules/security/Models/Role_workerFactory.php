<?php

namespace Database\Factories\Modules\security\Models;

use Illuminate\Database\Eloquent\Factories\Factory;

class Role_workerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($this->faker);
        return [
        ];
    }
}

