<?php

namespace Tests\Unit;

use App\Models\Game;
use App\Models\User;
use Database\Seeders\VariantSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GamePolicyTest extends TestCase
{
    use RefreshDatabase;
    
    public function setUp(): void{
        parent::setUp();
        $this->seed(VariantSeeder::class);
    }

    public function testUserCanJoinFreshGame(): void
    {
        $game = Game::factory()->create();
        $user = User::factory()->create();
        $this->assertTrue($user->can('join', $game));
    }

    public function testUserCannotJoinGameTwice(): void
    {
        $game = Game::factory()->create();
        $user = User::factory()->create();
        $this->assertTrue($user->can('join', $game));
        $user->join($game);
        $this->assertFalse($user->can('join', $game));
    }

    public function testAnotherUserCanJoinGame(): void {
        $game = Game::factory()->create();
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $user1->join($game);
        $this->assertTrue($user2->can('join', $game));
    }
}
