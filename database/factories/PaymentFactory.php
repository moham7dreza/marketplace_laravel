<?php

namespace Database\Factories;

use App\Enums\OrderStatusEnum;
use App\Enums\PaymentGatewayEnum;
use App\Enums\PaymentTypeEnum;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{

    protected $model = Payment::class;

    public function definition(): array
    {
        //dump('Run Payment Factory ...');
        return [
            'user_id' => User::query()->first() ?? User::factory(),
            'amount' => $this->faker->randomFloat(3, 1000, 9999),
            'status' => OrderStatusEnum::random(),
            'type' => PaymentTypeEnum::random(),
            'gateway' => PaymentGatewayEnum::random(),
            'pay_at' => $this->faker->dateTime,
            'transaction_id' => $this->faker->creditCardNumber,
            'details' => $this->faker->text
        ];
    }
}
