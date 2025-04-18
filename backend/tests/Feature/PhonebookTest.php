<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PhonebookTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_phonebook_entry()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/phonebook', [
            'name' => 'Test Name',
            'phone' => '1234567890',
            'email' => 'test@example.com',
        ]);

        $response->assertRedirect('/phonebook');

        $this->assertDatabaseHas('phonebooks', [
            'name' => 'Test Name',
            'phone' => '1234567890',
            'email' => 'test@example.com',
            'user_id' => $user->id,
        ]);
    }
}
