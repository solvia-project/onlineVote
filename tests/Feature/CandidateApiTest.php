<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Election;
use App\Models\Position;
use App\Models\Candidate;
use App\Models\Vote;

class CandidateApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_candidates_endpoint_returns_image_url_and_votes_count(): void
    {
        $election = Election::create([
            'name' => 'Pemilu 2025',
            'status' => 'active',
        ]);

        $position = Position::create([
            'election_id' => $election->id,
            'name' => 'Ketua',
        ]);

        $candidate = Candidate::create([
            'election_id' => $election->id,
            'position_id' => $position->id,
            'name' => 'Calon A',
            'image_path' => 'images/caleg/caleg.png',
        ]);

        Vote::create([
            'election_id' => $election->id,
            'position_id' => $position->id,
            'candidate_id' => $candidate->id,
            'user_id' => 1,
            'cast_at' => now(),
        ]);

        $response = $this->get("/elections/{$election->id}/candidates");

        $response->assertStatus(200)
            ->assertJson(fn ($json) =>
                $json->has(1)
                    ->first(fn ($json) =>
                        $json->where('name', 'Calon A')
                            ->where('position.name', 'Ketua')
                            ->where('votes_count', 1)
                            ->whereType('image_url', ['string', 'null'])
                            ->etc()
                    )
            );
    }
}

