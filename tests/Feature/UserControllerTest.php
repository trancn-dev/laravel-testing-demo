<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateUser()
    {

        $data = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => '123'
        ];

        $response = $this->post('/api/users', $data);

        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'User created successfully',
                 ]);

        $this->assertDatabaseHas('users', $data);
    }

    public function testGetUser()
    {
        $user = User::factory()->create();

        $response = $this->get("/api/users/{$user->id}");

        $response->assertStatus(200)
                 ->assertJson(['user' => $user->toArray()]);
    }

    public function testGetUserNotFound()
    {
        $response = $this->get('/api/users/999');

        $response->assertStatus(404)
                 ->assertJson(['message' => 'User not found']);
    }
}
