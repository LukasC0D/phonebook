<?php

namespace Tests\Unit;

use App\Models\Phonebook;
use PHPUnit\Framework\TestCase;

class PhonebookTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function it_can_create_phonebook_instance()
    {
        $entry = new Phonebook([
            'name' => 'John Do',
            'phone' => '1234567890',
            'email' => 'john@example.com',
            'user_id' => 1
        ]);

        $this->assertEquals('John Do', $entry->name);
        $this->assertEquals('1234567890', $entry->phone);
        $this->assertEquals('john@example.com', $entry->email);
    }

    /** @test */
    public function it_belongs_to_user()
    {
        $entry = new Phonebook();
        $this->assertTrue(method_exists($entry, 'user'));
    }
}

