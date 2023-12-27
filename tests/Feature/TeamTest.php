<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_create_a_team(){

        // Given: I am a user who is loggedIn
        $this->actingAs(factory('App\User')->create());

        // When: When they hit the endpoint / to create a new team
        $this->post('/teams', [
            'name' => 'Acme'
        ]);

        // Then: There should be a new in the database
        $this->assertDatabaseHas('teams', ['name' => 'Acme']);
    }
}
