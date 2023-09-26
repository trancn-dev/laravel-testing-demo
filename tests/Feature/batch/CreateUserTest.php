<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Eloquent\Factories;


class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->make();
    }

    public function testCreateUserCommand()
    {
        $name = $this->user->name;
        $email = $this->user->email;
        $pass = $this->user->password;

        // call action & assert
        $this->artisan("user:create",  [
            'name' => $name,
            'email' => $email,
            'pass' => $pass,
        ])
        ->expectsOutput("User $name ($email) created successfully.")
          ->assertExitCode(0);

        $this->assertDatabaseHas('users', [
            'name' => $name,
            'email' => $email,
            'password' => $pass
        ]);
    }
}
