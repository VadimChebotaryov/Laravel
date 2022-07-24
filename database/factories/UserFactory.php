<?php


namespace Database\Factories;
use App\Models\Role;
use Illuminate\Support\Str;

class UserFactory {

 public function definition(): array{

    $role = Role::customer()->first();
    return [
        'role_id' => $role->id,
        'name' => fake()->name(),
        'surname' => fake()->lastName,
        'birthdate' => fake()->dateTimeBetween('-50 years', '-20 years')->format('Y-m-d'),
        'email' => fake()->unique()->safeEmail(),
        'phone' => fake()->unique()->e164PhoneNumber,
        'email_verified_at' => now(),
        'password' => 'poiuytre3457!', // password
        'remember_token' => Str::random(10),
    ];
}

/**
 * Indicate that the model's email address should be unverified.
 *
 * @return static
 */

    public function admin(): static
    {
    return $this->state(function (array $attributes) {
        return [
            'email_verified_at' => null,
            'role_id' => Role::admin()->first()->id,
        ];
    });
}

    public function withEmail(string $email)
{
    return $this->state(function (array $attributes) use ($email) {
        return [
            'email' => $email,
        ];
    });
}
}

