<?php

namespace Database\Factories;

use App\Enums\OrderStatusEnum;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{

    protected $model = Order::class;

    public function definition(): array
    {
        //dump('Run Order Factory ...');
        return [
            'user_id' => User::factory(),
            'amount' => $this->faker->randomFloat(3, 1000, 9999),
            'status' => OrderStatusEnum::random(),
            'payment_id' => Payment::factory(),
            'delivery_id' => Delivery::factory(),
        ];
    }
}
