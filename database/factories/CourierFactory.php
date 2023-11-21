<?php

namespace Database\Factories;


use App\Enums\CourierStatusType;
use App\Models\Courier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Courier>
 */
class CourierFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Courier::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sender_name' => fake()->name(),
            'sender_address' => fake()->address(),
            'sender_contact' => fake()->phoneNumber(),
            'sender_pincode' => fake()->postcode(),
            'recipient_name' => fake()->name(),
            'recipient_address' => fake()->address(),
            'recipient_contact' => fake()->phoneNumber(),
            'recipient_pincode' => fake()->postcode(),
            'weight' => fake()->randomFloat(min: 50, max: 50000),
            'height' => fake()->randomFloat(min: 1, max: 200),
            'width' => fake()->randomFloat(min: 5, max: 200),
            'length' => fake()->randomFloat(min: 5, max: 200),
            'status' => CourierStatusType::ITEM_ACCEPTED_BY_COURIER,
        ];
    }
}
