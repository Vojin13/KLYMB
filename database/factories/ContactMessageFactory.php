<?php

namespace Database\Factories;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactMessage>
 */
class ContactMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'message' => $this->faker->realText(1000),
            'user_id' => $this->faker->optional(0.6)->numberBetween(1, User::count()),
            'is_answered' => false,
            'email' => null,
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (ContactMessage $message) {
            if ($message->user_id) {
                $user = User::find($message->user_id);
                $message->email = $user ? $user->email : $this->faker->safeEmail();
            } else {
                $message->email = $this->faker->safeEmail();
            }
        });
    }
}
