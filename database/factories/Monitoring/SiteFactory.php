<?php

namespace Database\Factories\Monitoring;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $domian = $this->faker->unique()->domainName(),
            'friendly_name' => $domian,
            'is_domain_valid' => $this->faker->randomElement([true,false]),
            'check_ssl' => $this->faker->randomElement([true, false]),
            'check_domain' => $this->faker->randomElement([true, false]),
        ];
    }
}
